=== Open Orphanage ===
Contributors: loveJesus
Donate link: https://www.openorphanage.org/
Tags: Jesus,sponsorship,communications,orphans,church,poverty,funding,android,Bible,orphanages,children,love
Requires at least: 5.0
Tested up to: 5.2.1
Stable tag: trunk
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Praise Jesus, a plugin that works with an Android app, to help orphanages with the process of sponsoring orphans, and God willing more in the future.

== Description ==

### Mission

🕆 Serve the Lord, [Jesus Christ](https://www.jesusfilm.org/watch/jesus.html/english.html), by providing free and open source software for orphanages, to help manage their operations and communications and to aid with meeting needs through fundraising and sponsorship.

 - [Homepage - hallelujah](https://openorphanage.org)
 - [WP Github Repo - praise the Lord Jesus Christ](https://github.com/open-orphanage-in-jesus-name/wordpress-open-orphanage-aleluya)
 - [Android App - hallelujah](https://play.google.com/store/apps/details?id=org.openorphanage.m1aleluya2)
 - [Facebook page - hallelujah](https://www.facebook.com/Open-Orphanage-in-Jesus-name-2168084633282357)
 
### How does this work?

The project is still in early stages. We have are working on an [Android app](https://play.google.com/store/apps/details?id=org.openorphanage.m1aleluya2) that we are hoping to make it easier for on-site people at the orphanage to keep the children on site updated and able to communicate with sponsors. Right now it allows the creation of children, their listing on a page, and some routing for sponsors to sign up to the site. It can email the website owners about which child a sponsor is interested in, as well as signing up sponsors as stripe customers to register for monthly sponsorships. Currently, no payments are taken on site but we hope to incorporate this in our next release.


The basic flow after installing is.
1. Create the children through the administrator, or soon via the [Android app](https://play.google.com/store/apps/details?id=org.openorphanage.m1aleluya2) (it still has some work to go). Fill the fields you can, please use the format mentioned for dates for now, you can use an estimated date for Birthday if needed. There is a nickname field so real names are not necessarily displayed publically. In the android app, the picture must have finished uploading before you save the child at this point. 
2. Use either the Guten block, or the [oo_aleluya/] shortcode to insert the list of children on a page or post.
3. When a sponsor sees the children, he can click on 'sponsor this child'.
4. Depending on if Stripe is enabled, and public registrations are allowed, 
    1. If these are not, then it will ask the potential sponsor for their email and message the website owner with it, optionally triggering and IFTTT call as well. 
    2. If they are, and the user is not logged in, then it will take the user to the WordPress registration page. The logo can be over-ridden in the admin with the orphanage logo. And the user will be registered as a supporter/donor, as well as a Stripe customer created. They can log in and manage their profile, and in the future, we pray they can communicate with the children they sponsor.
    3. If they are logged in, it will message the website owners about the child and interested sponsor email.
5. If Stripe is enabled, once they are registered they can also set their payment details in the User/Your Profile section of the administrator.
6. If Stripe is enabled, you may also create arbitrary donation forms via [oo_donation_block_aleluya purpose_aleluya="(string)" expandable_aleluya="(yes/no)"/] or Gutenberg.

At this point, you would agree with the person about the child and subscription, where you could start a monthly charge with them on stripe. You could also manually organize communications via email and fund fees with the person if they agree. We hope to further automate these tasks in the next releases, God willing and if we live.

### Plans

Short Term.
 - Allow sponsors to sign up for monthly donations. (Works, flow needs improvement)
 - Allow sponsors to have supervised semi-regular communication with their sponsored children, and provide special donations for birthdays and special needs.
 - Allow donations for arbitrary orphanage projects. (Works)
 - Incorporate into a central hub where people can comment on the orphanages.

We hope Eventually
 - Facilitate other orphanage management processes, progress tracking, checklists, etc.
 - Newsletter sending and advertising
 - Connect with materials about adoptions.
 - More communication facilities.
 - Provide links to other methods of fundraising (Gofundme,  Paypal, etc...)

And other things. If you use this please [get in touch with us](mailto:loveJesus@openorphanage.org).



### External Services

The plug-in can optionally work with both IFTTT and with Stripe. 

#### 🕆 Stripe
Currently, the plug-in allows integration with [Stripe](https://www.stripe.com). When a person signs up as a donor, it will create a stripe customer for the donor and attempt to synchronize the stripe customer details from WordPress to Stripe. We are working on the on-site charging mechanism, at this time you are notified by email the child that a sponsor is interested in, and the user's email address. If stripe is not enabled, then you are still forwarded a users email when they indicate interest in a child. No card information is handled by the plugin other than contact information. Please note that the stripe API keys are stored right now in clear text, and demonstrated to other administrators and those who have access to the database and backup SQL files.

 - View the [Stripe Privacy Policy](https://stripe.com/privacy)

#### 🕆 IFTTT
If you place an [IFTTT](https://www.ifttt.com) web service key and event name, this will call that IFTTT web service upon a person being interested in sponsoring a child. We may in the future expand what can be done through this service. Please note that the IFTTT API keys are stored right now in clear text, and demonstrated to other administrators and those who have access to the database and backup SQL files.

 - View the [IFTTT Privacy Policy](https://ifttt.com/privacy)

== Installation ==


1. Upload the plugin files to the `/wp-content/plugins/open-orphanage` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Use the Settings->✝ Open Orphanage screen to configure the plugin, the fields all have descriptions. 
1. If you want to incorporate IFTTT or Stripe you will need to sign up with those services and provide the valid API keys. With Stripe please start with the test API keys to get a feel for everything.
1. Create a monthly plan for Stripe in their control panel, and enter the code and amount of dollars that plan charges per month in the 🕆 Open Orphanage settings page.

== Frequently Asked Questions ==

= Why make this, is this free? =

James 1:27: Religion that is pure and undefiled before God, the Father, is this: to visit orphans and widows in their affliction, and to keep oneself unstained from the world.   
- ESV2011

Yes, there is no plan to charge for the software.

= How far along is this? =

At this point: you can enter children, display them, get emailed by interested sponsors, link these sponsors as stripe customers, start and stop support subscriptions, easily create forms in any page to donate to arbitrary needs without user signing up.

= What Requirements does this have? =

It should run on a website served over https and must be able to communicate (make REST calls) from the server. PHP should also have gd or imagemagick installed.

= What financial details handled or stored by the plugin? =

Only details regarding a users email address and name are stored on site. Stripe handles the storage of card information, and it is not handled by the plugin. 

= Does this rely on another plugin? Any Javascripts? =

God be praised, the makes of wordpress have been doing an excellent job and it should work just fine out of the box. It does rely on JQuery and the Stripe JS.
== Screenshots ==

1. ✝ Displaying the children in the frontend
2. ✝ Editing a Child post
3. ✝ Open Orphanage settings

== Changelog ==

= 0.2.20190621b =
 * Hallelujah - continue major refactoring with classes and externalize scripts and many other things
 * Hallelujah - image fix

= 0.2.20190621a =
 * Hallelujah - refactoring with classes and many other things
 * Hallelujah - Praise Jesus - Show a child's sponsor in the admin, Better preview images in admin, Alerts while sponsoring, Do not list erased or children posts in trash in admin, misc fixes, better centering of panel buttons etc

= 0.1.20190615b =
 * Hallelujah - tame some debug log postings, new screenshots

= 0.1.20190615a =
 * Hallelujah - bugfix for some templates
 
= 0.1.20190614b =
 * Hallelujah - fix location of uploads
 * Hallelujah - Praise Jesus, show profile details in child page

= 0.1.20190614a =
 * Hallelujah - Automatically place 1 time donation boxes in children and some profile information.
 * Hallelujah - Donate button placement and toggle
 * Hallelujah - children layout fix, remove sort feature which is currently not working, fix error in unsubscribe.

= 0.1.20190613b =
 * Hallelujah - bugfix, autosave yes as default on new donation form, allow multiple stripe donation forms same page.

= 0.1.20190613a =
 * Hallelujah - Insert payment form from outside Admin:  Can create a payment form using Gutenberg or shortcode. It optionally can display the form after button click, and stores which is the purpose of the donation, as well as allowing the supporter to input additional notes, name, etc.
   * [oo_donation_block_aleluya purpose_aleluya="(string)" expandable_aleluya="(yes/no)"/]

= 0.1.20190612b =
 * Hallelujah - bugfix to not overwrite original url in db

= 0.1.20190612a =
 * Hallelujah - create 192x192 thumbnail version of children
 * Hallelujah - add random Bible verse widget

= 0.1.20190609a =
 * Hallelujah - one time charge, sorter fix, no limit to 10 children on a page

= 0.1.20190607a =
 * Hallelujah - register child button on that child's page
 * Hallelujah - warning messages and enabling user registration switch from the OO aleluya page
 * Hallelujah - admin error messages, flow of registration changes

= 0.1.201906046b =
* Hallelujah, praise Jesus Christ - You can now set a new cropped image from the wordpress admin (Thanks [Darren](https://wordpress.stackexchange.com/a/302962) ). Additionally, it now uses the description field for the mini post, which can link fully to the child, Hallelujah.  

= 0.1.201906046a =
* Praise the Lord: You can now add children and edit them from within wordpress. Also you can add notes. The picture used is the featured image (Please upload a square image for now.). Beginning of Internationalization.

= 0.1.20190604a =
* Praise Jesus, a supporter can now choose a child, and become a sponsor to that child within the website if a plan code has been set. Sponsorship can also be cancelled. 

= 0.1.20190603 =
* Hallelujah, First version on wordpress.com





== Upgrade Notice ==
= 0.2.20190621a =
 * Hallelujah - continue refactoring, please notify us of any bugs loveJesus@openorphanage.org

= 0.2.20190621a =
 * Hallelujah - large update, please notify us of any bugs loveJesus@openorphanage.org

= 0.1.20190614a =
 * Hallelujah - Should work well praise Jesus.

= 0.1.20190613a =
 * Hallelujah - bugfix.

= 0.1.20190613a =
 * Hallelujah - Should work well. You now have a new shortcode and gutenberg block you can put in pages.

= 0.1.20190612a =
 * Praise Jesus - This will downsize thumbs to 192x192 pixels

= 0.1.20190609a =
 * Hallelujah - It should work better.

= 0.1.20190607a =
 * You will see a button on the child's page. There are not as many alerts when registering a child. More WP admin notices and help.

= 0.1.20190606b =
 * Now we store the url to the avatar image instead of the id because of the cropping mechanism.

= 0.1.20190606a =
 * Changing featured image on a child changes that child's media image ID.

= 0.1.20190604a =
 * No changes required

= 0.1.20190603 =
 * First wordpress.com version, no upgrade path.

== Arbitrary section ==

Above all we hope you come to know [Jesus Christ](https://www.jesusfilm.org/watch/jesus.html/english.html) as Lord and Savior, He is good.
