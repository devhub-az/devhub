# Quill VideoResize Module

A module for Quill rich text editor to allow videos to be resized.
Lazily adaptated from [kensnyder/quill-image-resize-module](https://github.com/kensnyder/quill-image-resize-module)


## Usage

### Webpack/ES6

```javascript
import Quill from 'quill';
import VideoResize from 'quill-video-resize-module';

Quill.register('modules/VideoResize', VideoResize);

const quill = new Quill(editor, {
    // ...
    modules: {
        // ...
        videoResize: {
            // See optional "config" below
        }
    }
});
```

/!\ You also need to add CSS to disable pointer-events in the video iframe while in editor mode to prevent

```css
.quill-editor iframe {
    pointer-events: none;
}
```

### Script Tag

Copy video-resize.min.js into your web root or include from node_modules

```html
<script src="/node_modules/quill-video-resize-module/video-resize.min.js"></script>
```

```javascript
var quill = new Quill(editor, {
    // ...
    modules: {
        // ...
        VideoResize: {
            // See optional "config" below
        }
    }
});
```

/!\ You also need to add CSS to disable pointer-events in the video iframe while in editor mode to prevent

```css
.quill-editor iframe {
    pointer-events: none;
}
```

### Config

For the default experience, pass an empty object, like so:
```javascript
var quill = new Quill(editor, {
    // ...
    modules: {
        // ...
        VideoResize: {}
    }
});

Functionality is broken down into modules, which can be mixed and matched as you like. For example,
the default is to include all modules:

```javascript
const quill = new Quill(editor, {
    // ...
    modules: {
        // ...
        VideoResize: {
            modules: [ 'Resize', 'DisplaySize', 'Toolbar' ]
        }
    }
});
```

Each module is described below.

#### `Resize` - Resize the video

Adds handles to the video's corners which can be dragged with the mouse to resize the video.

The look and feel can be controlled with options:

```javascript
var quill = new Quill(editor, {
    // ...
    modules: {
        // ...
        VideoResize: {
            // ...
            handleStyles: {
                backgroundColor: 'black',
                border: 'none',
                color: white
                // other camelCase styles for size display
            }
        }
    }
});
```

#### `DisplaySize` - Display pixel size

Shows the size of the video in pixels near the bottom right of the video.

The look and feel can be controlled with options:

```javascript
var quill = new Quill(editor, {
    // ...
    modules: {
        // ...
        VideoResize: {
            // ...
            displayStyles: {
                backgroundColor: 'black',
                border: 'none',
                color: white
                // other camelCase styles for size display
            }
        }
    }
});
```

#### `Toolbar` - Video alignment tools

Displays a toolbar below the video, where the user can select an alignment for the video.

The look and feel can be controlled with options:

```javascript
var quill = new Quill(editor, {
    // ...
    modules: {
        // ...
        VideoResize: {
            // ...
            toolbarStyles: {
                backgroundColor: 'black',
                border: 'none',
                color: white
                // other camelCase styles for size display
            },
            toolbarButtonStyles: {
                // ...
            },
            toolbarButtonSvgStyles: {
                // ...
            },
        }
    }
});
```

#### `BaseModule` - Include your own custom module

You can write your own module by extending the `BaseModule` class, and then including it in
the module setup.

For example,

```javascript
import { Resize, BaseModule } from 'quill-video-resize-module';

class MyModule extends BaseModule {
    // See src/modules/BaseModule.js for documentation on the various lifecycle callbacks
}

var quill = new Quill(editor, {
    // ...
    modules: {
        // ...
        VideoResize: {
            modules: [ MyModule, Resize ],
            // ...
        }
    }
});
```
