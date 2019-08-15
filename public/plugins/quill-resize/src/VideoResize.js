import defaultsDeep from 'lodash/defaultsDeep'
import DefaultOptions from './DefaultOptions'
import { DisplaySize } from './modules/DisplaySize'
import { Toolbar } from './modules/Toolbar'
import { Resize } from './modules/Resize'

const knownModules = { DisplaySize, Toolbar, Resize }

/**
 * Custom module for quilljs to allow user to resize <img> elements
 * (Works on Chrome, Edge, Safari and replaces Firefox's native resize behavior)
 * @see https://quilljs.com/blog/building-a-custom-module/
 */
export default class VideoResize {

  constructor(quill, options = {}) {
    // save the quill reference and options
    this.quill = quill

    // Apply the options to our defaults, and stash them for later
    // defaultsDeep doesn't do arrays as you'd expect, so we'll need to apply the classes array from options separately
    let moduleClasses = false
    if (options.modules) {
      moduleClasses = options.modules.slice()
    }

    // Apply options to default options
    this.options = defaultsDeep({}, options, DefaultOptions)

    // (see above about moduleClasses)
    if (moduleClasses !== false) {
      this.options.modules = moduleClasses
    }

    // disable native video resizing on firefox
    document.execCommand('enableObjectResizing', false, 'false')

    // respond to clicks inside the editor
    this.quill.root.addEventListener('click', evt => {
      this.handleClick(evt)
    }, false)

    this.quill.root.parentNode.style.position = this.quill.root.parentNode.style.position || 'relative'

    // setup modules
    this.moduleClasses = this.options.modules

    this.modules = []

    this.onUpdate = () => {
      this.repositionElements()
      this.modules.forEach(
        (module) => {
          module.onUpdate()
        }
      )
    }

    this.checkVideo = evt => {
      if (this.vid) {
        if (evt.keyCode == 46 || evt.keyCode == 8) {
          window.Quill.find(this.vid).deleteAt(0)
        }
        this.hide()
      }
    }
  }

  initializeModules () {
    this.removeModules()

    this.modules = this.moduleClasses.map(
      ModuleClass => new (knownModules[ModuleClass] || ModuleClass)(this)
    )

    this.modules.forEach(
      (module) => {
        module.onCreate()
      }
    )

    this.onUpdate()
  }

  removeModules () {
    this.modules.forEach(
      (module) => {
        module.onDestroy()
      }
    )

    this.modules = []
  }

  handleClick (evt) {
    if (evt.target === this.quill.root) {
      const videos = this.quill.root.querySelectorAll('iframe')        
      for (let i = 0; i <videos.length; ++i) {
        const rect = videos[i].getBoundingClientRect()
        if (evt.clientX < rect.x) {
          continue
        }
        if (evt.clientX > rect.right) {
          continue
        }
        if (evt.clientY < rect.y) {
          continue
        }
        if (evt.clientY > rect.bottom) {
          continue
        }
        if (videos[i] && videos[i].tagName && videos[i].tagName.toUpperCase() === 'IFRAME') {
          if (this.vid === videos[i]) {
            // we are already focused on this video
            return
          }
          if (this.vid) {
            // we were just focused on another video
            this.hide()
          }
          // clicked on an video inside the editor
          this.show(videos[i])
        } else if (this.vid) {
          // clicked on a non video
          this.hide()
        }
        return
      }
    }
    if (this.vid) {
      // clicked on a non video
      this.hide()
    }
  }

  show (vid) {
    // keep track of this vid element
    this.vid = vid

    this.showOverlay()

    this.initializeModules()
  }

  showOverlay () {
    if (this.overlay) {
      this.hideOverlay()
    }

    this.quill.setSelection(null)

    // prevent spurious text selection
    this.setUserSelect('none')

    // listen for the video being deleted or moved
    document.addEventListener('keyup', this.checkVideo, true)
    this.quill.root.addEventListener('input', this.checkVideo, true)

    // Create and add the overlay
    this.overlay = document.createElement('div')
    Object.assign(this.overlay.style, this.options.overlayStyles)

    this.quill.root.parentNode.appendChild(this.overlay)

    this.repositionElements()
  }

  hideOverlay () {
    if (!this.overlay) {
      return
    }

    // Remove the overlay
    this.quill.root.parentNode.removeChild(this.overlay)
    this.overlay = undefined

    // stop listening for video deletion or movement
    document.removeEventListener('keyup', this.checkVideo)
    this.quill.root.removeEventListener('input', this.checkVideo)

    // reset user-select
    this.setUserSelect('')
  }

  repositionElements () {
    if (!this.overlay || !this.vid) {
      return
    }

    // position the overlay over the video
    const parent = this.quill.root.parentNode
    const rect = this.vid.getBoundingClientRect()
    const containerRect = parent.getBoundingClientRect()

    Object.assign(this.overlay.style, {
      left: `${rect.left - containerRect.left - 1 + parent.scrollLeft}px`,
      top: `${rect.top - containerRect.top + parent.scrollTop}px`,
      width: `${rect.width}px`,
      height: `${rect.height}px`
    })
  }

  hide () {
    this.hideOverlay()
    this.removeModules()
    this.vid = undefined
  }

  setUserSelect (value) {
    [
      'userSelect',
      'mozUserSelect',
      'webkitUserSelect',
      'msUserSelect',
    ].forEach((prop) => {
      // set on contenteditable element and <html>
      this.quill.root.style[prop] = value
      document.documentElement.style[prop] = value
    })
  }
}

if (window.Quill) {
  window.Quill.register('modules/videoResize', VideoResize)
}
