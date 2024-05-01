=== Salamander Bootstrap Shortcodes ===
Contributors: gillespieza
Tags: shortcodes, columns, permalinks, internal linking, dropcaps
Donate link: http://www.salamanderthemes.net/
Requires at least: 3.8
Tested up to: 4.2
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Theme-independent, Bootstrap 3-compatible shortcodes for permalinks, dividers, dropcaps, lists, multi-column layouts, alert boxes, and more.

== Description ==
NOTE: This plugin is mostly obsolete since the introduction of Gutenberg Blocks, but might still be useful if you are using the Classic Editor.

= Acknowledgements =
Icons were provided by:
* \"FamFamFam Silk\" icons by Mark James (available under the Creative Commons Attribution 2.5 License, and downloadable [here](http://www.famfamfam.com/lab/icons/silk/)
* WooFunction Iconset, available under the GPL, [here](http://www.woothemes.com/2009/09/woofunction/)

This plugin was built using [scbFramework](https://github.com/scribu/wp-scb-framework) by scribu and Andrey \"Rarst\" Savchenko

== Installation ==
1. Download and unzip to the \'wp-content/plugins/\' directory,
2. Activate the plugin through the \'Plugins\' menu in WordPress.
3. Use the shortcodes in your posts and pages. See FAQ for more.

== Frequently Asked Questions ==
= Why yet another shortcode plugin? =
Honestly, this is mostly \"practicing\" creating a plugin. Plus, I use this code on all the sites I manage, and manually updating them all is a pain, so sharing it here to push update notices seemed like a good idea.

= Why use the *[permalink]* shortcode? =
Even though WordPress now comes with a way to link to internal content, these links will break if you happen to change the post slug, or move your posts around a bit (say, archiving them under a parent page, or something), or move from a development site to a production site. What you should really be doing is linking to the post or page ID, like www.yourdomain.com/?p=1234, but that's ugly and not very SEO-friendly. This shortcode creates a link to the post by ID, not slug or name.

= How do I use *[permalink]* =
This shortcode creates a link to the permalink address of a post or page, with optional arguments for setting a jump-link, defining the anchor text as well as HTML attributes `class`, `target`, `rel`, and `title`.
Simplest example: [permalink id="123"]
Full example: [permalink id="123" title="Some Title" text="My 123rd post!" target="_blank" rel="nofollow" class="stylethis" jump="section2"]
* "id" is the numerical ID of the post or page. See the []Codex FAQ here](http://codex.wordpress.org/FAQ_Working_with_WordPress#How_do_I_determine_a_Post.2C_Page.2C_Category.2C_Tag.2C_Link.2C_Link_Category.2C_or_User_ID.3F) if you need help finding an ID. This tag is required.
* "title" is the HTML attribute "title" that may appear in the anchor tag.  If `title` is left blank, the link text (if provided) or post title is used rather than leaving the title attribute blank (good SEO). This tag is optional.
* "text" is the text that you want the front-end user to see. This tag is optional. If you leave "text" blank, the code with use the post title to create the front-end user text.
* "target" is used to specify the HTML attribute "target". For example, if you want to force the link to open in a new window, you would put target="_blank". See the [HTML reference](http://www.w3schools.com/tags/att_a_target.asp) for more. This tag is optional.
* "rel" is used to specify the HTML attribute "rel", which specifies the relationship between the current document and the linked document. For example, you might use "nofollow" on an unendorsed document, like a paid link. See the [HTML reference](http://www.w3schools.com/tags/att_a_rel.asp) for more. This tag is optional.
* "class" is the HTML attribute "class" that may appear in the anchor tag. If your theme has specific classes for certain styles of links, by all means please add a class tag. This tag is optional.
* "jump" is used to create jump-links to an element with a specified id within the page (like href="#top")

= How do I use [topdivider] =
This shortcode adds a styled div that looks like a horizontal rule, with a jump-link to #top. Optional tags allow specifying Bootstrap glyphicons
Simple example: use [topdivider]
This inserts a horizontal line with a jump-link to the top of your page using the HTML anchor #top.
Full example: use [topdivider glyphicon="glyphicon glyphicon-menu-up"]
This inserts a horizontal line with a jump-link to the top of your page using the HTML anchor #top, and allows you to specify a Bootstrap Glyphicon to use next to the word "Top". See the [Bootstrap Glyphicons](http://getbootstrap.com/components/#glyphicons-glyphs) for a full list.

= How do I use [spacer] =
Sometimes you might need some spacing but don't want to change the CSS because it's just a once-off. And you might not want empty paragraph tags or brs all over the place. Use shortcode [spacer] to create a 10px high blank spacer. You can use multiples or you can use [spacer height="50"] to create a 50px high spacer. Substitute any pixel value for a custom height.

= How do I use [hr] =
To include a horizontal rule, use the shortcode [hr]. You can also specify styles for the line, such as [hr style="dotted"] and [hr style="dashed"]. You can also insert your own custom class name in style="".



== Screenshots ==
1. Easy columns

== Changelog ==
= 29 May 2015 =
* Updated code to be bootstrap 3 compatible
* Updated code documentation to standards
* Added Bootstrap Glyphicon support to [topdivider]
* Updated CSS for alert boxes that should have yellowish backgrounds (such as [note_box] )

= 12 July 2013 =
* Added do_shortcode($content) to [heading], [callout], [pullquote]

= 10 June 2013 =
* Added [plain_box] shortcode
* Added ability to specify style=\"whatever\" to alert boxes and column shortcodes - in case a specific case needs different styling. Eg: [plain_box style=\"font-size: 12px; margin-bottom: 0\"]some stuff here[/plain_box]

= 09 May 2013 =
* Added ability to specify jump points in [permalink] shortcode. Eg, to link to #top in a page: [permalink id=123 jump=top]Jump here[/permalink]

= 23 April 2013 =
* Added [pullquote] shortcode

= 10 April 2013 =
* Neatened and condensed some code - collapsed multiple similar functions into a single function (alert boxes, columns)]
* Added new alertbox shortcodes: [video_box], [plus_box], [contact_box], [arrow_right_box], [arrow_left_box], [arrow_up_box], [arrow_down_box], [bluearrow_right_box], [bluearrow_left_box], [bluearrow_up_box], [bluearrow_down_box], [basket_box], [book_box], [camera_box], [chart_box], [comment_box], [folder_box], [hammer_box], [home_box], [lightbulb_off_box], [news_box], [save_box], [screen_on_box], [screen_off_box], [screwdriver_box], [twitter_box], [user_black_box], [user_blue_box], [user_business_box], [users_box], [users_business_box]
* Changed [idea_box] to [lightbulb_on_box]

= 24 March 2013 =
* added [sub_title]

= 07 March 2013 =
* added scbFramework
* added Icon attributions