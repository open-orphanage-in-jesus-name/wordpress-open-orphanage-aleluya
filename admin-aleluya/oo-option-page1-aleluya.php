<?php
// For God so loved the world, that He gave His only begotten Son
// that all who believe in Him should not perish but have everlasting life
defined( 'ABSPATH' ) or die( 'Jesus Christ is the Lord . ' );

if ( is_admin() ){ // admin actions
  add_action( 'admin_menu', 'add_oomenu_aleluya' );
  add_action( 'admin_init', 'register_oosettings_aleluya' );
} else {
  // non-admin enqueues, actions, and filters
}
function add_oomenu_aleluya() {
	//create new top-level menu
  add_menu_page('Open Orphanage Settings', '✝ Open Orphanage', 'administrator', 'oo_show_option_page1_aleluya', 'oo_show_option_page1_aleluya', "https://perffection.com/img/favicon32-aleluya.png?7aleluya" );
  add_submenu_page( 'oo_show_option_page1_aleluya', '✝ About Jesus', 'About Jesus Christ', 'administrator', 'oo_about_Jesus_aleluya', 'oo_show_about_Jesus_page_aleluya' );
	//call register settings function
	//add_action( 'admin_init', 'register_oosettings_aleluya' );
}

function register_oosettings_aleluya() { // whitelist options
  register_setting( 'oo-option-group1-aleluya', 'new_option_name' );
  register_setting( 'oo-option-group1-aleluya', 'some_other_option' );
  register_setting( 'oo-option-group1-aleluya', 'option_etc' );
}
function oo_show_about_Jesus_page_aleluya() {
?>
<div class="wrap">
  <h1>About Jesus Christ the Lord of Lords</h1>
<div class="arc-cont"><iframe src="https://api.arclight.org/videoPlayerUrl?refId=1_529-jf-0-0&apiSessionId=5c54ed1f415d58.03282961&player=bc.vanilla5&dtm=0&playerStyle=default" allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe><style>.arc-cont{position:relative;display:block;margin:10px auto;width:100%}.arc-cont:after{padding-top:59%;display:block;content:""}.arc-cont>iframe{position:absolute;top:0;bottom:0;right:0;left:0;width:98%;height:98%;border:0}</style></div>
</div>
<?
}
//
function oo_show_option_page1_aleluya() {
?>


<div class="wrap">
<h1>✝ Open Orphanage Plugin Options</h1>
Hallelujah
<form method="post" action="options.php">
<?php
settings_fields( 'oo-option-group1-aleluya' );
do_settings_sections( 'oo-option-group1-aleluya' );
?>
	<table class="form-table">
		<tr valign="top">
		<th scope="row">Change Email From:</th>
		<td><input type="text" name="new_option_name" value="<?php echo esc_attr( get_option('new_option_name') ); ?>" /></td>
		</tr>

		<tr valign="top">
		<th scope="row">Aleluya </th>
		<td><input type="text" name="some_other_option" value="<?php echo esc_attr( get_option('some_other_option') ); ?>" /></td>
		</tr>

		<tr valign="top">
		<th scope="row">Options, Etc.</th>
		<td><input type="text" name="option_etc" value="<?php echo esc_attr( get_option('option_etc') ); ?>" /></td>
		</tr>
  </table>
<?php submit_button(); ?>
</form>

</div>

<?php
} //end function show_oo_option_page_aleluya
?>
