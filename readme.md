# Benson

Simple Angular integration with the WP REST API. Takes an endpoint and binds it to scope so you can use mustache in your templates and the WordPress HTML editor.

## Description 

Benson accepts a local endpoint from your wordpress install, binds the result to scope and makes that available to your templates and the WordPress HTML editor.

Supports ACF.

## Installation 

1. Upload benson to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add an endpoint to a post or page

## Frequently Asked Questions 

### Where do I put my endpoint? 

Ummm... you can't. It's not done yet... sorry.

### How do I sanitize html? 

use ng-bind-html like this
```
<div ng-bind-html="content"></div>
```

### Why Benson?

Because he is a gumball machine, also known as The Park's manager. [[source]](http://regularshow.wikia.com/wiki/Benson)

![benson](http://i.imgur.com/jJZwrIE.png)

