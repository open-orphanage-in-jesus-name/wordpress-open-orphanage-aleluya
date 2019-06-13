<?php
/*
Plugin Name:  ✝ Open Orphanage
Plugin URI:   https://openorphanage.org
Description:  Basic Open Source Orphanage Management - Currently used alongside https://play.google.com/store/apps/details?id=org.openorphanage.m1aleluya2
Version:      0.1.20190612a
Author:       loveJesus in Jesus name
Author URI:   https://perffection.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  open-orphanage
Domain Path:  /languages-aleluya
*/

/* For God so loved the world, that He gave His only begotten Son
 * He gave His only begotten Son, that all who believe in Him should not perish but have everlasting life; */

defined( 'ABSPATH' ) or die( 'Jesus Christ is the Lord . ' );

require __DIR__ . '/vendor/autoload.php';

$oo_dir_aleluya = plugin_dir_url(__FILE__);

function load_plugin_textdomain_aleluya() {
  load_plugin_textdomain('open-orphanage', false, basename( dirname( __FILE__ ) ) . '/languages-aleluya/' );
}

add_action( 'plugins_loaded', 'load_plugin_textdomain_aleluya' );


require_once( dirname( __FILE__ ) . '/includes-aleluya/includes-aleluya.php' );

if ( is_admin() ) {
    // we are in admin mode
    require_once( dirname( __FILE__ ) . '/admin-aleluya/oo-admin-aleluya.php' );
}


/**  In progress
	*  Gutenberg Block Initializer.
	**/
require_once plugin_dir_path( __FILE__ ) . 'src/init.php';





