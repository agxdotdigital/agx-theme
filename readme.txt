=== AGX Theme ===

Contributors: agxdotdigital
Requires at least: 4.7
Tested up to: 5.9
Stable tag: 2.5.0
Version: 2.5.0
Requires PHP: 5.6
License: GNU General Public License v3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Tags: agx, digital marketing agency, ads management, google partner, inbound marketing, content marketing, ppc, paid media, web development

A simple and lightweight digital marketing agency theme for the page builder

***AGX Theme*** is distributed under the terms of the GNU GPL v3 or later.

== Description ==

A simple and lightweight digital marketing agency theme for the page builder

This theme resets the WordPress environment and prepares it for smooth operation of Elementor.

Screenshot's images & icons are licensed under: Creative Commons (CC0), https://creativecommons.org/publicdomain/zero/1.0/legalcode

== Installation ==

1. In your site's admin panel, go to Appearance > Themes and click `Add New`.
2. Type "AGX theme" in the search field.
3. Click `Install` and then `Activate` to start using the theme.
4. Navigate to Appearance > Customize in your admin panel and customize to your needs.
5. A notice box may appear, recommending you to install Elementor Page Builder Plugin. You can either use it or any other editor.
6. Create a new page, click `Edit with Elementor`.
7. Once the Elementor Editor is launched, click on the library icon, pick one of the many ready-made templates and click `Insert`.
8. Edit the page content as you wish, you can add, remove and manipulate any of the elements.
9. Enjoy :)

== Customizations ==

Most users will not need to edit the files for customizing this theme.
To customize your site's appearance, simply use ***Elementor***.

However, if you have a particular need to adapt this theme, please read on.

= Style & Stylesheets =

All of your site's styles should be handled directly inside ***Elementor***.
You should not need to edit the SCSS files in this theme in ordinary circumstances.

However, if for some reason there is still a need to add or change the site's CSS, please use a child theme.

= Hooks =

To prevent the loading of any of the these settings, use the following as boilerplate and add the code to your child-theme `functions.php`:
```php
add_filter( 'choose-from-the-list-below', '__return_false' );
```

* `agx_theme_enqueue_style`                 enqueue style
* `agx_theme_enqueue_theme_style`           load theme-specific style (default: load)
* `agx_theme_load_textdomain`               load theme's textdomain
* `agx_theme_register_menus`                register the theme's default menu location
* `agx_theme_add_theme_support`             register the various supported features
* `agx_theme_add_woocommerce_support`       register woocommerce features, including product-gallery zoom, swipe & lightbox features
* `agx_theme_register_elementor_locations`  register elementor settings
* `agx_theme_content_width`                 set default content width to 800px
* `agx_theme_page_title`                    show\hide page title (default: show)
* `agx_theme_viewport_content`              modify `content` of `viewport` meta in header

== Frequently Asked Questions ==

**Does this theme support any plugins?**

AGX theme includes support for WooCommerce.

**Can Font Styles be added thru the theme's css file?**

Yes, ***but*** best practice is to use the styling capabilities in the Elementor plugin.

== Copyright ==

This theme, like WordPress, is licensed under the GPL.
Use it as your springboard to building a site with ***Elementor***.

AGX theme bundles the following third-party resources:

Font Awesome icons for theme screenshot
License: SIL Open Font License, version 1.1.
Source: https://fontawesome.com/v4.7.0/

Image for theme screenshot, Copyright AGX
License: CC0 1.0 Universal (CC0 1.0)


== Changelog ==

= 2.5.0 - 2022-01-26 =
* Tweak: Added keyboard navigation to AGX theme menus
* Tweak: Added Skip Links for better accessibility
* Tweak: Added underline for text links in Post Content for better accessibility 
* Tweak: Removed `outline: none` from inputs for better accessibility
* Fix: Footer menu location is not being presented on sites that are not running Elementor

