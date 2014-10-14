SilverStripe Gallery Provider
=============================

Installation
------------
- Simply drop into silverstripe root (using whatever method)
- Ensure the folder is named 'gallery'

Usage
-----
Apply the extension to your DataObject (eg. Page type) via extensions.

```php
class GalleryPage extends Page {
	private static $extensions = ['Gallery'];
	//...
}
```

Or using the config system

```yml
GalleryPage:
  extensions:
    - Gallery
```

About
-----
This module has been built in the most modular way I could think of, in order to keep out of a devloper's way and easily allow changes (rather than imposing a style or method or achieving a goal). To this end the module is applied as an extension rather than defining a stand alone page type, which allows for application to more than one page type or the ability to use this gallery module without the cms module. _It is not necessary to create a GalleryPage type, the above is only an example_.

To this end the templates are also modular to a point. The ones included are only for use as a starting point (which happened to cover 80% of my usecases), everything can be overwritten in the theme or the project dir.

- The template is written as an include to match the Extension style application of the functionality to a model class. `<% include Gallery %>`
- The javascript lightbox used is kept in it's own include so one only need create this template (Lightbox.ss) rather than having to define (or rather copy & paste) a whole page type template eg. just to make a few small edits.

Notes
-----
- Includes a copy of Fancybox (v1, no license purchase necessary)
- If `GridFieldSortableRows` or `GridFieldBulkEditingTools` are installed, the module will make use of these automatically.
### Warning
**By default this module will remove an image on deletion, it expects a 1:1 relation between `GalleryImage` and it's related `Image`**