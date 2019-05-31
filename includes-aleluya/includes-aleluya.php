<?php
/* For God so loved the world, that He gave His only begotten Son
 * He gave His only begotten Son, that all who believe in Him should not perish but have everlasting life; */
defined( 'ABSPATH' ) or die( 'Jesus Christ is the Lord . ' );

require_once( dirname( __FILE__ ) . '/child-custom-post-type-aleluya.php' );
require_once( dirname( __FILE__ ) . '/roles-aleluya.php' );
require_once( dirname( __FILE__ ) . '/basic-auth-aleluya.php' );
require_once( dirname( __FILE__ ) . '/show-children-shortcode-aleluya.php');
require_once( dirname( __FILE__ ) . '/notify1-aleluya.php');
require_once( dirname( __FILE__ ) . '/charges-aleluya.php');
require_once( dirname( __FILE__ ) . '/supporters-aleluya.php');
/** Admin from filter, thank You Lord Jesus for https://www.wpbeginner.com/plugins/how-to-change-sender-name-in-outgoing-wordpress-email/ */
// Function to change email address

function wpb_sender_email_aleluya( $original_email_address ) {
    return get_option('oo_email_address_from_address_aleluya');
}

// Function to change sender name
function wpb_sender_name_aleluya( $original_email_from ) {
    return get_option('oo_email_address_from_name_aleluya');
}

// Hooking up our functions to WordPress filters
if( get_option('oo_email_address_from_address_aleluya') )  add_filter( 'wp_mail_from', 'wpb_sender_email_aleluya' );
if( get_option('oo_email_address_from_name_aleluya') )  add_filter( 'wp_mail_from_name', 'wpb_sender_name_aleluya' );
/** End admin from filter **/

/** Change login logo, thank You Jesus for https://www.wpoptimus.com/637/change-wordpress-logo-signup-admin/ */
function my_login_logo_aleluya() {
?>
  <style type="text/css">
  body.login div#login h1 a {
   background-image: url(<?php echo get_option('oo_administrator_logo_aleluya')?>);
   padding-bottom: 30px;
  }
  </style>
 <?php
}

if(get_option('oo_administrator_logo_aleluya'))  add_action( 'login_enqueue_scripts', 'my_login_logo_aleluya' );
