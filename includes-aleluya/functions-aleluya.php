<?php
/* For God so loved the world, that He gave His only begotten Son
 * He gave His only begotten Son, that all who believe in Him should not perish but have everlasting life; */

defined( 'ABSPATH' ) or die( 'Jesus Christ is the Lord . ' );

/**
 * Get the thumbnail directory
 **/
function oo_thumb_dir_aleluya() {
  //$upload_dir_aleluya   = trailingslashit(wp_upload_dir()["path"]);
  $thumb_dir_aleluya    = trailingslashit(WP_CONTENT_DIR)."uploads/oo-aleluya/thumbs-aleluya/";
  if ( ! file_exists( $thumb_dir_aleluya ) ) {
    error_log_aleluya("Aleluya");
    wp_mkdir_p( $thumb_dir_aleluya );
  }

  return $thumb_dir_aleluya;

}

/**
 * Add our required scripts:
 *  - The Open Orphanage Script
 *  - JQUery
 *  - Stripe if we have a code 
 */
add_action( 'wp_enqueue_scripts', function() {
  //Open Orphanage and Jquery
  //Jquery is used for:
  //  - Ajax calls
  //  - Animation
  //  - Late Calling, ease of use
  wp_enqueue_script( 'oo_aleluya_js', plugins_url( '/public-aleluya/js-aleluya/oo-aleluya.js' , __DIR__.'../'), array('jquery'), '0.1' );

  //Create an object to reference the ajax url use in the oo-aleluya.js
  wp_localize_script( 'oo_aleluya_js', 'oo_ajax_aleluya',
            array( 'ajax_url_aleluya' => admin_url( 'admin-ajax.php' ) ) );

  // Stripe library
  wp_enqueue_script( "oo_stripe_aleluya", 'https://js.stripe.com/v3/' ) ;

  wp_enqueue_style( "oo_css_aleluya", plugins_url( '/public-aleluya/css-aleluya/oo-aleluya.css' , __DIR__.'../') ) ;

} );


/** 
 * Admin from filter, thank You Lord Jesus for https://www.wpbeginner.com/plugins/how-to-change-sender-name-in-outgoing-wordpress-email/ 
 * Here we are overriding the outgoing from address and email if they are set.
 * Please note that these must also be in accordance with the mail/smtp and dns settings to be properly deliverable.
 */
// Function to change email address
function oo_sender_email_aleluya( $original_email_address ) {
    return get_option('oo_email_address_from_address_aleluya');
}

// Function to change email sender name
function oo_sender_name_aleluya( $original_email_from ) {
    return get_option('oo_email_address_from_name_aleluya');
}

// Hooking up our functions to WordPress filters
if( get_option('oo_email_address_from_address_aleluya') )  add_filter( 'wp_mail_from', 'oo_sender_email_aleluya' );
if( get_option('oo_email_address_from_name_aleluya') )  add_filter( 'wp_mail_from_name', 'oo_sender_name_aleluya' );
/** End admin email from filter **/


/**
 * Admin Login Logo override, since we are doing user registrations via the wordpress system.
 * thank You Jesus for https://www.wpoptimus.com/637/change-wordpress-logo-signup-admin/ 
 */
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
