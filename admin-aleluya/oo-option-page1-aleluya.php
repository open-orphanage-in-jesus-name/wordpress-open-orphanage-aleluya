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
  //reference on adding submenus: add_submenu_page( 'oo_show_option_page1_aleluya', '✝ About Jesus', 'About Jesus Christ', 'administrator', 'oo_about_Jesus_aleluya', 'oo_show_about_Jesus_page_aleluya' );
	//call register settings function
	//add_action( 'admin_init', 'register_oosettings_aleluya' );
}

function register_oosettings_aleluya() { // whitelist options

  register_setting( 'oo-option-group1-aleluya', 'oo_email_address_from_address_aleluya' );
  register_setting( 'oo-option-group1-aleluya', 'oo_email_address_from_name_aleluya' );
  register_setting( 'oo-option-group1-aleluya', 'oo_administrator_logo_aleluya' );
  register_setting( 'oo-option-group1-aleluya', 'oo_sponsor_request_ifttt_event_name_aleluya');
  register_setting( 'oo-option-group1-aleluya', 'oo_ifttt_key_aleluya');
  register_setting( 'oo-option-group1-aleluya', 'oo_notify_emails_aleluya');
  register_setting( 'oo-option-group1-aleluya', 'oo_stripe_pk_key_aleluya');
  register_setting( 'oo-option-group1-aleluya', 'oo_stripe_sk_key_aleluya');
  register_setting( 'oo-option-group1-aleluya', 'oo_stripe_plan_code1_aleluya');
  register_setting( 'oo-option-group1-aleluya', 'stripe_plan1_dl_aleluya');
}


//
function oo_show_option_page1_aleluya() {
?>


<div class="wrap">
<h1>✝ Open Orphanage Plugin Options</h1>

<?php if ( get_option('oo_stripe_plan_code1_aleluya') && strpos(get_option('oo_stripe_plan_code1_aleluya'),"plan_") !== 0 ) { 
  delete_option('oo_stripe_plan_code1_aleluya');?>
  <div class="notice notice-error is-dismissible">
    <p><b>God is good!</b>  <br/>
    <strong>ERROR</strong>: the code provided by stripe starts with plan_ , you had <?php echo get_option('oo_stripe_plan_code1_aleluya')?> </p>
  </div>
<?php } ?>
<?php if ( get_option('oo_stripe_sk_key_aleluya') && strpos(get_option('oo_stripe_sk_key_aleluya'),"sk_") !== 0 ) { 
  delete_option('oo_stripe_sk_key_aleluya');?>
  <div class="notice notice-error is-dismissible">
    <p><b>God is good!</b>  <br/>
    <strong>ERROR</strong>: the code provided by stripe starts with sk_ , you had <?php echo get_option('oo_stripe_sk_key_aleluya')?> </p>
  </div>
<?php } ?>
<?php if ( get_option('oo_stripe_pk_key_aleluya') && strpos(get_option('oo_stripe_pk_key_aleluya'),"pk_") !== 0 ) { 
  delete_option('oo_stripe_pk_key_aleluya');?>
  <div class="notice notice-error is-dismissible">
    <p><b>God is good!</b>  <br/>
    <strong>ERROR</strong>: the code provided by stripe starts with pk_ , you had <?php echo get_option('oo_stripe_pk_key_aleluya')?> </p>
  </div>
<?php } ?>

<?php
if ( ! get_option( 'users_can_register' ) ) {
?>
<script>
  function oo_enable_user_registration_aleluya() {
    var data_aleluya = {
      action: 'oo_enable_user_registration_aleluya'
    };

    jQuery.get(ajaxurl, data_aleluya, function(response_aleluya) {
      console.log("Hallelujah - " + JSON.stringify(response_aleluya));
      if(response_aleluya.success === true) {
        jQuery("#enable-registration-notice-aleluya").html(response_aleluya.data.html_aleluya);
      } else {
        alert("Error  - Aleluya " + JSON.stringify(response_aleluya))
      }
    });

  }
</script>

  <div class="notice notice-warning is-dismissible">
    <p><b>God is good!</b>  <br/>
      <span id="enable-registration-notice-aleluya">We recommend that you enable User Registration in the General Site settings, and set the initial type to Donor/Sponsor, in order that individuals can register as supporters of Children, to help automate payments and communication. Would you like us to do it for you? <button onclick="oo_enable_user_registration_aleluya();">Enable User Registration</button></span></p>
  </div>

<?php
}

$opts_aleluya = array('oo_stripe_pk_key_aleluya', 'oo_stripe_sk_key_aleluya', 'oo_stripe_plan_code1_aleluya', 'stripe_plan1_dl_aleluya');
$alltrue_aleluya = true;
foreach( $opts_aleluya as $opt_aleluya ) $alltrue_aleluya = ($alltrue_aleluya && get_option($opt_aleluya));
if( !$alltrue_aleluya ) { 
  ?>
  
  <div class="notice notice-warning is-dismissible">
    <p><b>Praise Jesus for His Kindness</b> <br/> 
      If you want to maximize the benefit of the program, please sign up with <a href="https://www.stripe.com">Stripe</a> and fill out all the fields below.</p>
  </div>

  <?php
}

?>
<p>Welcome to the <a href="https://openorphanage.org">Open Orphanage</a> administrator for <a href="https://wordpress.org">Wordpress</a> in <a href="https://www.jesusfilm.org/watch/jesus.html/english.html">Jesus</a> name, Hallelujah.
</p>

<form method="post" action="options.php">
<?php
settings_fields( 'oo-option-group1-aleluya' );
do_settings_sections( 'oo-option-group1-aleluya' );
?>
	<table class="form-table">
		<tr valign="top">

		<th scope="row">Change Email From Address:</th>
		  <td>
        <input type="text" name="oo_email_address_from_address_aleluya" value="<?php echo esc_attr( get_option('oo_email_address_from_address_aleluya') ); ?>" /><br/>
        <p>What email addresss do you want the emails generated by the system to appear from? Please notice if this is not congruent with the PHP settings, mailing system or DNS settings, it will likely go to spam or fail to deliver.</p>
      </td>
		</tr>
    <th scope="row">Change Email From Name:</th>
      <td>
        <input type="text" name="oo_email_address_from_name_aleluya" value="<?php echo esc_attr( get_option('oo_email_address_from_name_aleluya') ); ?>" /><br/>
        <p>What name do you want the emails generated by the system to appear from?</p>
      </td>
    </tr>

    <th scope="row">Emails to notify upon sponsorship requests:</th>
      <td>
        <input type="text" name="oo_notify_emails_aleluya" value="<?php echo esc_attr( get_option('oo_notify_emails_aleluya') ); ?>" /><br/>
        <p>Coma separated list of emails to notify upon sponsorship requests.</p>
      </td>
    </tr>

		<tr valign="top">
		<th scope="row">Url for Administrator Logo:</th>
		  <td>
        <input type="text" name="oo_administrator_logo_aleluya" value="<?php echo esc_attr( get_option('oo_administrator_logo_aleluya') ); ?>" />
        <p>Replace the login logo from Wordpress, for your sponsors when they register or log in.</p>
      </td>
		</tr>

    <tr valign="top">
    <th scope="row">IFTTT New sponsor request event name:</th>
      <td>
        <input type="text" name="oo_sponsor_request_ifttt_event_name_aleluya" value="<?php echo esc_attr( get_option('oo_sponsor_request_ifttt_event_name_aleluya') ); ?>" />
        <p>An <a href="https://www.ifttt.com">IFTTT</a> event name to fire when a new sponsor request is made.</p>
      </td>
    </tr>



    <tr valign="top">
    <th scope="row">IFTTT User Webhook key:</th>
      <td>
        <input type="text" name="oo_ifttt_key_aleluya" value="<?php echo esc_attr( get_option('oo_ifttt_key_aleluya') ); ?>" />
        <p>An <a href="https://www.ifttt.com">IFTTT</a> Webhook key for IFTTT events fired.</p>
      </td>
    </tr>

    <tr valign="top">
    <th scope="row">Stripe PK Api key:</th>
      <td>
        <input type="text" name="oo_stripe_pk_key_aleluya" value="<?php echo esc_attr( get_option('oo_stripe_pk_key_aleluya') ); ?>" />
        <p>To enable <a href="https://www.stripe.com">Stripe</a> card processing, please place your <a href="https://stripe.com/docs/keys">PK api key</a>.</p>
      </td>
    </tr> 
    <tr valign="top">
    <th scope="row">Stripe SK Api key:</th>
      <td>
        <input type="text" name="oo_stripe_sk_key_aleluya" value="<?php echo esc_attr( get_option('oo_stripe_sk_key_aleluya') ); ?>" />
        <p>To enable <a href="https://www.stripe.com">Stripe</a> card processing, please also place your <a href="https://stripe.com/docs/keys">SK api key</a>.</p>
      </td>
    </tr>
    <tr valign="top">
    <th scope="row">Stripe Subcription Child Plan Code:</th>
      <td>
        <input type="text" name="oo_stripe_plan_code1_aleluya" value="<?php echo esc_attr( get_option('oo_stripe_plan_code1_aleluya') ); ?>" />
        <p>The <a href="https://stripe.com/docs/billing/subscriptions/creating">subscription plan code</a> that has been set up with <a href="https://www.stripe.com">Stripe</a> for monthly card processing, it looks something like <b>plan_ABq4Gg4zLGXq6e</b>.</p>
      </td>
    </tr>
    <tr valign="top">
    <th scope="row">Stripe Subcription Monthly Cost:</th>
      <td>
        <input type="number" name="stripe_plan1_dl_aleluya" value="<?php echo esc_attr( get_option('stripe_plan1_dl_aleluya', 40) ); ?>" />
        <p>The amount of dollars per month that the plan above bills. It is not automatically populated and should match what you have made for the plan.</p>
      </td>
    </tr>


  </table>
<?php submit_button(); ?>
</form>

</div>

<?php
} //end function show_oo_option_page_aleluya




add_action( 'wp_ajax_oo_enable_user_registration_aleluya', 'wp_ajax_oo_enable_user_registration_aleluya'   );
function wp_ajax_oo_enable_user_registration_aleluya() {
  update_option( 'users_can_register', true );
  update_option( 'default_role', 'donor_aleluya');
  $data_aleluya = array("html_aleluya" => __("Hallelujah - the options are now updated."));
  wp_send_json_success( $data_aleluya );

  //wp_send_json_error();
}

?>
