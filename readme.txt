=== Genesis Footer Builder ===
Contributors: varun21, aniash_29, ruchika_wp
Donate Link: 
Tags: genesis, genesiswp, genesis footer, footer customization
Requires at least: 3.6
Tested up to: 4.1
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Genesis Footer Builder allows you to customize the site footer just as you want. This plugin exclusively works with Genesis framework.

== Description ==

Genesis Footer Builder helps you customize the site footer with ease. No more tinkering with functions.php; just configure the plugin options to update the site footer.

After activating the plugin, go to plugin settings page and start customizing the credits text, brand name, copyrights date / duration. You can additionally include privacy policy and disclaimer pages in the footer credits.

The plugin also allows you to add a footer menu to the site.

You can configure the options and go with the plugin default credits text or you can completely customize it using the Custom Footer Copyrights area in the plugin. The Custom Footer Copyrights area allows you to use valid HTML markup and supports the use of shortcodes. Along with Genesis shortcodes, you can use your custom defined shortcodes as well. In addition to this, Genesis Footer Builder also provides the shortcodes for each of the options you set-up in the plugin.

= Genesis Footer Builder allows you to: =

1. Specify custom brand name for use in the footer credits, which otherwise defaults to the site title.
1. Specify the copyright year or duration to be included in the copyright notice. Defaults to current year.
1. Select and set *Privacy Policy* and *Disclaimer* pages from the dropdown for use in the footer information.
1. Customize the footer credits text completely (in case the plugin's default credits text doesn't work for you).
1. Set-up and display a footer menu on the site.

= Add Privacy Policy and Disclaimer pages =

Yes, you read it right. If you want to add *Privacy Policy* and *Disclaimer* page links in the footer information, just select the pages from the dropdown and save the settings. Bingo! The footer information will then include Privacy Policy and Disclaimer pages.

= Shortcodes for extra customization =

Genesis Footer Builder offers various shortcodes for using the options that you set-up on the settings page. Now, when you want to set-up your own custom credits text, you can use these shortcodes in the Custom Footer Copyrights area (to display the values of the available options) and customize the text to your liking.

== Installation ==

Log in to your WordPress dashboard, navigate to the Plugins menu and click Add New. In the search field type “Genesis Footer Builder” and click Search Plugins. Once you’ve found the plugin you can install it by simply clicking “Install Now”.

Or you can follow the steps given below:

1. Upload the entire `genesis-footer-builder` folder to the `/wp-content/plugins/` directory.
1. DO NOT change the name of the `genesis-footer-builder` folder.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Once activated, visit the **Genesis Footer Builder** page in the Genesis Menu.
1. Set up the options as required.
1. Save the changes.

== Frequently Asked Questions ==

= All my pages are not listed in the dropdown. Where are the other pages that I've created? =

The *Privacy Policy* and *Disclaimer* pages dropdown only includes the **Published** pages. Drafts, Pending Review, Trashed pages will not be included in the pages dropdown.

Make sure, the pages to be used as Privacy Policy and Disclaimer are published. The dropdown lists all the published pages on the site and allows you to select a page to be used as the Privacy Policy and Disclaimer page respectively.

= How do I set up the footer menu? I do not see any menu in the site footer! =

Check if the *Insert Footer Menu* option is enabled in the plugin options. If yes, navigate to the WordPress Menus page, create a new menu or select an existing menu and assign **Genesis Footer Builder Menu** location to the menu.

= How does the Custom Footer Copyrights work? =

The Custom Footer Copyrights textarea allows you to compose the footer credits text as you want it to appear in the site footer.

The textarea allows you to use plain text, HTML tags, entities and shortcodes (Genesis shortcodes, custom defined shortcodes and the shortcodes provided by the plugin).

= Can I use the options that I've set in the fields, to customize the text for the footer? =

The plugin provides the shortcodes for each of the plugin options. Once, you've set up the options as required, you can use the shortcodes provided on the settings page in *Custom Footer Copyrights* area. 

Example: Once, you've set the *Brand Name* option to *John Doe*, you can use [gfb-brand] shortcode as follows:

Add the following to *Custom Footer Copyrights* textarea:
`Copyright &copy; [gfb-brand] &middot; All Rights Reserved`
The copyright message in the site footer will change to:
`Copyright © John Doe · All Rights Reserved`

== Screenshots ==

1. Genesis Footer Builder: Brand name and copyrights duration
1. Genesis Footer Builder: Select Privacy policy and Disclaimer pages
1. Genesis Footer Builder: Register and insert the footer menu
1. Genesis Footer Builder: Custom Footer Copyrights area

== Changelog ==

= Version 1.0 =
Stable version.