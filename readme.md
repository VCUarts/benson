# Benson

Simple Angular integration with the WP REST API. Takes an endpoint and binds it to scope so you can use mustache in your templates and the WordPress HTML editor.

## Description

Benson accepts a local endpoint from your wordpress install, binds the result to scope and makes that available to your templates and the WordPress HTML editor.

Supports ACF.

## Installation

1. Upload benson to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

## Usage
1. Add an endpoint to a post or page
2. Check any modules you want to include
3. Write your controllers in a wordpress template or within the HTML editor.

## Frequently Asked Questions

### Where do I get my endpoint?

Use [this](https://github.com/WP-API/WP-API) for now. Eventually it'll be part of core.

### How do I template?

Use ng-app="benson" and ng-controller="MainController" like this:

```html
<div ng-app="benson">
  <div ng-controller="MainController">
    {{title}}
    {{content}}
  </div>
</div>
```

Check out the [Angular docs](https://docs.angularjs.org/guide/templates) for more info.

### How do I sanitize html?

use ng-bind-html like this
```
<div ng-bind-html="content"></div>
```

### Why Benson?

Because he is a gumball machine, also known as The Park's manager. [[source]](http://regularshow.wikia.com/wiki/Benson)

![benson](http://i.imgur.com/jJZwrIE.png)

#### Change log

v1.1.1
Add support for loading animations

v1.1
Added pagination module option
https://github.com/michaelbromley/angularUtils/tree/master/src/directives/pagination
