=== Simple SCSS Compiler ===
Contributors: kidadavid
Donate link: https://www.paypal.com/paypalme/kidadavid
Tags: scss, compiler, simple, development, css
Requires at least: 5.0
Tested up to: 5.9
Stable tag: 1.0
Requires PHP: 5.6
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Simple SCSS Compiler makes it easy for you to automatically compile your SCSS files to CSS, thus providing you with a hassle-free development experience.

== Description ==

You love to use SCSS but you don't like to use node libraries or online tools to convert your SCSS code to CSS? You don't find other solutions user friendly enough?

**Give this plugin a chance to make your theme development better!**

= Donations =
I wrote this plugin in my spare time and it is always going to be free with full functionality. If you like my work please consider making a [donation](https://www.paypal.com/paypalme/kidadavid) to help continuous and fast development.

== Installation ==

1. Upload the entire simple-scss-compiler folder to the */wp-content/plugins/* directory.
2. Activate the plugin through the Plugins screen (*Plugins > Installed Plugins*).
3. Visit the plugin setting to configure as needed (*Settings > Simple SCSS Compiler*).

== Frequently Asked Questions ==

= How does this plugin work? =

After you activate the plugin you need to go to its settings page (*Settings > Simple SCSS Compiler*). There you can add file groups which are basically one or multiple input files with your SCSS code in it and an output file for your CSS code. (*Remember to use full path of files relative to your WordPress document root, for example: /wp-content/themes/theme/styles.scss*). Then click on "Save settings" and the plugin will convert your input SCSS files to your output CSS file automatically.

= Does it effect the performance of the site? =

A little bit. The plugin runs every time your site is opened and checks if your input files were modified since the last time the site was visited. Only if they were then it compiles them to CSS. So, it shouldn't make the site slower than a couple of milliseconds, depending on how many SCSS code it needs to compile of course.

= I found a bug, or have a feature request. What can I do? =

Just write to me on the "Support" tab here on the [plugin's WordPress page](https://wordpress.org/support/plugin/simple-scss-compiler/) and I will look into it as soon as I can.

== Screenshots ==

1. Settings on the dashboard

== Changelog ==

= 1.0 =
* Official release

= 0.3 =
* Improves performance.
* Fixes SCSS import.
* Adds warning to output.

= 0.2 =
* Improves security.
* Cleans settings from options after uninstallation.
* Puts "Settings" link on "Plugins" page.

= 0.1 =
* Development release with basic functionalities.
