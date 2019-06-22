<?php
/* For God so loved the world, that He gave His only begotten Son
 * He gave His only begotten Son, that all who believe in Him should not perish but have everlasting life; */

defined( 'ABSPATH' ) or die( 'Jesus Christ is the Lord . ' );

/**
 * To create a meta tag based on stripe key
 **/
function stripeCustSkMetaTag_aleluya() {
  return 'oo_stripe_'.hash('ripemd160', get_option('oo_stripe_sk_key_aleluya') ).'_customer_id_aleluya';
}

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

  //Used for some js
  $reg_url_aleluya = wp_registration_url();
  $reg_url2_aleluya = $reg_url_aleluya.(( strpos($reg_url_aleluya, "?" ) === false ) ? '?' : '&' ) . 'child_id_aleluya=';

  //Create an object to reference the ajax url use in the oo-aleluya.js
  wp_localize_script( 'oo_aleluya_js', 'oo_ajax_aleluya',
            array( 'ajax_url_aleluya' => admin_url( 'admin-ajax.php' ),
                   'nonce_aleluya' => wp_create_nonce('oo_nonce_aleluya'),
                   'reg_url_aleluya' => $reg_url_aleluya,
                   'reg_url2_aleluya' => $reg_url2_aleluya,
                   'can_reg_aleluya' => get_option( 'users_can_register' ),
                   'is_logged_in_aleluya' => is_user_logged_in(),
                   'user_email_aleluya' => wp_get_current_user()->user_email,
                   'edit_user_link_aleluya' => get_edit_user_link(),
                    ) 
          );

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



/**
 * Hallelujah - send a POST notification to an IFTTT Webhook
 */
function ifttt_post_notify_aleluya($v1_aleluya, $v2_aleluya, $v3_aleluya) {

  //nonce verified outside of this function from oo_notify_init_aleluya

  update_option('oo_sponsor_request_ifttt_event_name_aleluya','new_cpnh_child_sponsor_request_aleluya');
  $eventName_aleluya = get_option('oo_sponsor_request_ifttt_event_name_aleluya');
  $eventKey_aleluya  = get_option('oo_ifttt_key_aleluya');

  // The data to send to the API
  $postData_aleluya = array(
      'value1' => $v1_aleluya,
      'value2' => $v2_aleluya,
      'value3' => $v3_aleluya
  );

  // Setup cURL

  $body_aleluya = json_encode($postData_aleluya);

  $args_aleluya = [
    'body' => $body_aleluya,
    'timeout' => 50,
    'redirection' => 4,
    'blocking' => true,
    'httpversion' => '1.0',
    'headers' => array(
      'Content-Type: application/json'
    ),
    'cookies' => array()
  ];

  $response_aleluya = wp_remote_post( "https://maker.ifttt.com/trigger/$eventName_aleluya/with/key/$eventKey_aleluya" );


  // Check for errors
  //if($response_aleluya === FALSE){
  //    die(curl_error($ch_aleluya));
  //}
  echo "Hallelujah - " . $response_aleluya["response"]["message"];

  // Decode the response
  //$responseData = json_decode($response, TRUE);

  // Print the date from the response
  //echo $responseData['published'];

}

/** 
 * When we are interested in supporting a child, this is called from the front end 
 **/

//Helps so that nonce function available etc
add_action( 'wp_ajax_oo_support_request_aleluya', 'wp_ajax_oo_support_request_aleluya' );

function wp_ajax_oo_support_request_aleluya() {
  if( !isset($_POST["oo_name_aleluya"]) && isset($_POST["oo_email_aleluya"])  ) { //TODO: hallelujah Handle via ajax
    $data_aleluya = array( );
    wp_verify_nonce($_POST['oo_nonce_aleluya'], 'nonce_aleluya');
    $email_aleluya = sanitize_email( $_POST["oo_email_aleluya"] );
    $oo_child_id_aleluya = intval( $_POST["oo_email_id_aleluya"] ); //the Lord is good, sorry poorly named param right now
    $child_aleluya = new Child_aleluya($oo_child_id_aleluya);
    $oo_nicknames_aleluya = $child_aleluya->nick_names_aleluya;
    $oo_currently_sponsored_aleluya = $child_aleluya->sponsored_by_id_aleluya;

    $notes_aleluya = $oo_currently_sponsored_aleluya ? "Thankfully this child has a sponsor assigned at this moment, though you can still donate a one time payment to the child. " : "";
    if(is_user_logged_in()) {
      if(!$oo_currently_sponsored_aleluya) {
        $child_aleluya->set_child_sponsor_id_aleluya(wp_get_current_user()->ID, "requesting");
      }      
    }

    if( get_option('oo_sponsor_request_ifttt_event_name_aleluya') ) ifttt_post_notify_aleluya($oo_child_id_aleluya, $oo_nicknames_aleluya, $email_aleluya);

    error_log_aleluya("✝ Aleluya sending mail - " .
        mail( get_option('oo_notify_emails_aleluya') ,
              "hallelujah - new request to Sponsor Child","✝ Child ID: $oo_id_aleluya - ✝ Child Nicknames: $oo_nicknames_aleluya - ✝ Reply to Email: $email_aleluya"
            ), 1
      );

    // This is currently used as an ajax alert response
    $data_aleluya["msg_aleluya"] = "Great we have received your request for ".$oo_nicknames_aleluya." and will be contacting you soon. ".$notes_aleluya.". God willing we hope to reply within 24-48 hours to $email_aleluya. Praise God for you in Jesus name";

    wp_send_json_success( $data_aleluya );

  }
}