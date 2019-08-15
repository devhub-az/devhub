import { BaseModule } from './BaseModule'

export class Resize extends BaseModule {
  onCreate () {
    // track resize handles
    this.boxes = []

    // add 4 resize handles
    this.addBox('nwse-resize') // top left
    this.addBox('nesw-resize') // top right
    this.addBox('nwse-resize') // bottom right
    this.addBox('nesw-resize') // bottom left    

    this.handleMouseup = () => {
      // reset cursor everywhere
      this.setCursor('')
      // stop listening for movement and mouseup
      document.removeEventListener('mousemove', this.handleDrag)
      document.removeEventListener('mouseup', this.handleMouseup)
    }

    this.handleDrag = evt => {
      if (!this.vid) {
        // image not set yet
        return
      }
      // update image size
      const deltaX = evt.clientX - this.dragStartX
      const deltaY = evt.clientY - this.dragStartY
      if (this.dragBox === this.boxes[0] || this.dragBox === this.boxes[3]) {
        this.vid.width = Math.round(this.preDragWidth - deltaX)
        this.vid.height = Math.round(this.preDragHeight - deltaY)
      } else {
        this.vid.width = Math.round(this.preDragWidth + deltaX)
        this.vid.height = Math.round(this.preDragHeight + deltaY)
      }
      this.requestUpdate()
    }

    this.positionBoxes()
  }

  onDestroy () {
    // reset drag handle cursors
    this.setCursor('')
  }

  positionBoxes () {
    const handleXOffset = `${-parseFloat(this.options.handleStyles.width) / 2}px`
    const handleYOffset = `${-parseFloat(this.options.handleStyles.height) / 2}px`

    const l = [
      { left: handleXOffset, top: handleYOffset },        // top left
      { right: handleXOffset, top: handleYOffset },       // top right
      { right: handleXOffset, bottom: handleYOffset },    // bottom right
      { left: handleXOffset, bottom: handleYOffset }     // bottom left
    ]

    // set the top and left for each drag handle
    l.forEach((pos, idx) => {
      Object.assign(this.boxes[idx].style, pos)
    })
  }

  addBox (cursor) {
    // create div element for resize handle
    const box = document.createElement('div')

    // Star with the specified styles
    Object.assign(box.style, this.options.handleStyles)
    box.style.cursor = cursor

    // Set the width/height to use 'px'
    box.style.width = `${this.options.handleStyles.width}px`
    box.style.height = `${this.options.handleStyles.height}px`

    // listen for mousedown on each box
    box.addEventListener('mousedown', evt => {
      this.handleMousedown(evt)
    }, false)
    // add drag handle to document
    this.overlay.appendChild(box)
    // keep track of drag handle
    this.boxes.push(box)
  }

  handleMousedown (evt) {
    // note which box
    this.dragBox = evt.target
    // note starting mousedown position
    this.dragStartX = evt.clientX
    this.dragStartY = evt.clientY
    // store the width before the drag
    this.preDragWidth = this.vid.getBoundingClientRect().width
    this.preDragHeight = this.vid.getBoundingClientRect().height
    // set the proper cursor everywhere
    this.setCursor(this.dragBox.style.cursor)
    // listen for movement and mouseup
    document.addEventListener('mousemove', this.handleDrag, false)
    document.addEventListener('mouseup', this.handleMouseup, false)
  }

  setCursor (value) {
    [
      document.body,
      this.vid,
    ].forEach((el) => {
      el.style.cursor = value   // eslint-disable-line no-param-reassign
    })
  }
}
