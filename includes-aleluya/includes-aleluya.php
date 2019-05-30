<?php
/* For God so loved the world, that He gave His only begotten Son
 * He gave His only begotten Son, that all who believe in Him should not perish but have everlasting life; */
defined( 'ABSPATH' ) or die( 'Jesus Christ is the Lord . ' );

require_once( dirname( __FILE__ ) . '/roles-aleluya.php' );
require_once( dirname( __FILE__ ) . '/basic-auth-aleluya.php' );

/** Admin from filter, thank You Lord Jesus for https://www.wpbeginner.com/plugins/how-to-change-sender-name-in-outgoing-wordpress-email/ */
// Function to change email address

function wpb_sender_email_aleluya( $original_email_address ) {
    return 'aleluya@concernedpeopleforhaiti.org';
}

// Function to change sender name
function wpb_sender_name_aleluya( $original_email_from ) {
    return 'Concerned People for Haiti';
}

// Hooking up our functions to WordPress filters
//add_filter( 'wp_mail_from', 'wpb_sender_email_aleluya' );
//add_filter( 'wp_mail_from_name', 'wpb_sender_name_aleluya' );
/** End admin from filter **/

/** Change login logo, thank You Jesus for https://www.wpoptimus.com/637/change-wordpress-logo-signup-admin/ */
function my_login_logo_aleluya() {
?>
<style type="text/css">
body.login div#login h1 a {
 background-image: url(https://i1.wp.com/concernedpeopleforhaiti.org/wp-content/uploads/2019/01/cropped-logo-render1-only-world-with-k-81px-aleluya.png?resize=54%2C54&ssl=1);
padding-bottom: 30px;
}
</style>
 <?php
}
//add_action( 'login_enqueue_scripts', 'my_login_logo_aleluya' );
