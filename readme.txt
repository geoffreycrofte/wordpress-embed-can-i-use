=== Embed Can I Use ===
Contributors: CreativeJuiz
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=P39NJPCWVXGDY&lc=FR&item_name=Embed%20Can%20I%20Use%20%2d%20WP%20Plugin&item_number=%23wp%2dciue&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted
Tags: embed, embedded, Can I use, CIU, table, browsers, support
Requires at least: 4.0
Tested up to: 6.7.1
Stable tag: 1.0.0

Add Can I Use support tables to your WordPress web site thanks to this shortcode.
`[ciu_embed]`



== Description ==

Add Can I Use support tables to your WordPress web site thanks to this shortcode.
`[ciu_embed]`.
This plugin uses the embed system created by http://caniuse.bitsofco.de/ by inserting a JavaScript file into your blog posts. This JavaScript file is inserted only if you current post uses this shortcode and will add a dynamic responsive iframe into your post.

**Basic Usage**
`
[ciu_embed feature="css-hyphens" periods="-1,current,+1,+2"]
`

**How to use attributes for this shortcode?**

* `feature`: simply take the words in Can I Use URI placed just after `#feat=`. Example with http://caniuse.com/#feat=audio, the value of `feature` is `audio`
* `periods`: represents browsers generations to display. In the example below, you will display the current version, the previous one and two next versions.





== Installation ==

You can use one of both method :

**Installation via your Wordpress website**

1. Go to the **admin menu 'Plugins' -> 'Install'** and **search** for 'Embed Can I Use'
1. **Click** 'install' and **activate it**
1. Use the `[ciu_embed]` shortcode where you need it

**Manual Installation**

1. **Download** the plugin (it's better :p)
1. **Unzip** `embed-can-i-use` folder into the `/wp-content/plugins/` directory
1. **Activate the plugin** through the 'Plugins' menu in WordPress
1. Use the `[ciu_embed]` shortcode where you need it


== Frequently Asked Questions ==

= No question for the moment =


== Screenshots ==

1. An example of an Embedded Can I Use table

== Changelog ==

= 1.0.0 =
* The first stable version, tell me if you find something wrong.

== Upgrade Notice ==

= 1.0.0 =
Try it ;)
