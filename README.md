# Netflex Newsletter Foundation
**The documentation and features are a work in progress!**

Boilerplate with tested markup for newsletters and components for easy integration with Netflex marketing.


## Installation
Install with composer, using `composer require netflex/newsletter-foundation`
Package will be installed with standard components, and without header and footer.

## Edit config
To edit config, first copy the config file to your project using `php artisan vendor:publish --tag=config`
The config can then be found in `config/newsletter-foundation.php`
The config is documented with context for the different settings.

## Setting up templates and components in Netflex
To register the default template in Netflex, use the artisan command `php artisan nnf:register:template` *(not implemented yet)*
This will create a view in resources/views/newsletters and register it in Netflex as the default newsletter template.

To register all components in the package in Netflex, use the command `php artisan nnf:register:components` *(not implemented yet)*
Please note that component images must be added manually in netflex, as adding this via API is not supported.

To register a template manually that uses the foundation template, add a view in your `resources/views/newsletters` folder with the following content:

    @include('nnf::templates.foundation')

This includes the foundation template from the package. You can then register the template as normal in Netflex.

You may also extend the foundation layout using 

    @extends('nnf::layouts.foundation')

If you want to register one of the package components inside netflex, you should use the prefix `nnf::` as a part of the path, in example `nnf::one-column`

**Remember to fill the code-field with "newsletter_component" on all components registered in netflex, and on all block builder areas added to a newsletter template to filter out these components from page builder templates.**

## Base components
The base components are foundation blocks that are used as building blocks inside components. These can not be added directly as an editable component.
|Component|Filename/class|Description|
|--|--|--|
| Image | Netflex\NewsletterFoundation\ View\Components\Image | Base image component for newsletter. Implements responsivity, image formats and links. |
| Button | button.blade.php | Base button component. Implements button element that will work in most e-mail clients. Must be used via other component, not inline configurable. |
| Content row | content-row.blade.php | Wraps content in block |
| Content block | content-block.blade.php | Wraps content rows as a block inside a grid or table |
| Default content | default-content.blade.php | Default setup for grid, includes editable image, inline editable title and content. |
| Entry content | Netflex\NewsletterFoundation\ View\Components\EntryContent | Handles content from entries to entry-list and main-entry components. Implements variables that depends on NewsletterEntryListContract.


## Default components
The following components are included as default:
|Component|Filename/class|Description|
|--|--|--|
| One column | one-columns.blade.php | One wide column, configurable with or without image, text and title |
| Two columns | two-columns.blade.php | Two columns, highly configurable by width on columns and setup for content and image in different columns. Possible to turn responsivity (collapsible columns) on/off in config. |
| Three columns | three-columns.blade.php | Three column component with image and content. Configurable for image/content on/off. |
| Four columns | four-columns.blade.php | Four column component. Same as three column component |
| Five columns | five-columns.blade.php | Five column component. Same as three and four column component. Should only be used for small texts and icons, as columns are very narrow on desktop |
| One image | one-image.blade.php | Single full width image implemeting base button module. Used for header images/banners |
| Button Row | button-row.blade.php | Button row component, that enables creation of multiple configurable buttons in a row. |

## Customizing default components
You may publish the assets to your project using the command `php artisan vendor:publish --tag=views`
This will copy templates, layouts and components to `resources/views/vendor/netflex-newsletter-foundation`

## Extending
To implement your own components, you may reuse the existing anonymous base components with the `nnf::` prefix when using a component from your project, in example `<x-nnf::default-content />`
For using class components, use `x-nff-` , in example `<x-nnf-image />` 


