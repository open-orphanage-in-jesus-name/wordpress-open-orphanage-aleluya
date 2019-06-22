<?php
// For God so loved the world, that He gave His only begotten Son, that all who believe in Him should not perish
// but have everlasting life

defined( 'ABSPATH' ) or die( 'Jesus Christ is the Lord . ' );

// As you are dealing with plugin settings,
// I assume you are in admin side

add_action( 'admin_enqueue_scripts', 'oo_load_wp_media_files_aleluya' );
function oo_load_wp_media_files_aleluya( $page_aleluya ) {

  // change to the $page where you want to enqueue the script
  if( $page_aleluya == 'post.php' ) {

    // Enqueue WordPress media scripts
    wp_enqueue_media();
    // Enqueue custom script that will interact with wp.media
    wp_enqueue_script( 'oo_child_admin_aleluya_js', plugins_url( '/public-aleluya/js-aleluya/oo-child-admin-aleluya.js' , __DIR__.'../'), array('jquery'), '0.1' );

  }
}

require_once( dirname( __FILE__ ) . '/oo-admin-supporter-aleluya.php' );
require_once( dirname( __FILE__ ) . '/oo-admin-child-aleluya.php' );
require_once( dirname( __FILE__ ) . '/oo-option-page1-aleluya.php' );

