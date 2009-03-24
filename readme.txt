=== Constructor  ====
Author: Anton Shevchuk
Author URI: http://anton.shevchuk.name/

Theme URI: http://anton.shevchuk.name/wordpress/theme-constructor-for-wordpress/

== Description ==

Wordpress Constructor Theme, it's many-in-one theme:
* six sidebar positions and three layouts
* configured colors
* configured fonts
* configured footer text
* NexGen Gallery slideshow support
* widget ready

Build your own theme on [settings page](/wp-admin/themes.php?page=functions.php).

For Wordpress version 2.7+

== Installation ==

1. Upload `constructor` to the `/wp-content/themes/` directory
2. Make a folders `images` and `cache` writable
3. Activate the theme through the 'Themes' menu in WordPress

== Make Theme ==

1. Change current theme (upload images, change position, set layout etc).
2. Go to export tab and click on export button, save file as `config.php`
3. Go to CSS tab and copy all text, and save it in new file `styles.css`
4. Create new folder in folder `/wp-content/themes/constructor/themes`
   and upload `config.php`, `styles` and all used images to it
5. Change path to images in `config.php` (see `images` section)

== Make Images ==

1. Open `constructor/themes/example/design.psd` in Photoshop
2. Click on `slice` tool - you can see current slice for example theme
3. Disable visibility for layers group `example`
4. Draw new design (or use some stock images)
5. `Save as` new PSD file
6. `Save for Web&Devices` - click save
7. All images now aviable in folder `images`, default is 12 images