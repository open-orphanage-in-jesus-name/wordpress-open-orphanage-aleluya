<?php
/* For God so loved the world, that He gave His only begotten Son, that all who believe in Him should not perish but have everlasting life,
 * He gave His only begotten Son, that all who believe in Him should not perish but have everlasting life; */
defined( 'ABSPATH' ) or die( 'Jesus Christ is the Lord . ' );


$blockstripe_aleluya = false;
// [oo_aleluya child_aleluya="child_aleluya-value"]
wp_enqueue_script( "oo_stripe_aleluya", 'https://js.stripe.com/v3/' );
//wp_enqueue_script( 'oo_child_admin_aleluya_js', plugins_url( '/public-aleluya/js-aleluya/oo-child-admin-aleluya.js' , __DIR__.'../'), array('jquery'), '0.1' );

add_action( 'wp_ajax_oo_stripe_donation_aleluya', 'wp_ajax_oo_stripe_donation_aleluya'   );

function wp_ajax_oo_stripe_donation_aleluya() {
  $data_aleluya = array( );

  try {

    if ( !wp_verify_nonce( $_POST['oo_nonce_aleluya'], basename(__FILE__).$_POST['oo_rand_aleluya'] ) ) {
      $data_aleluya["msg_aleluya"] = __("Invalid Nonce","open-orphanage");
      wp_send_json_error( $data_aleluya );
      return;
    }

    if ( ! is_email( $_POST['oo_email_aleluya'] ) ) {
      $data_aleluya["msg_aleluya"] = __("Invalid Email","open-orphanage");
      wp_send_json_error( $data_aleluya );
      return false;
    }

    $email_aleluya = sanitize_email(  $_POST['oo_email_aleluya'] );
    $name_aleluya = sanitize_text_field( $_POST['oo_name_aleluya'] );
    $phone_aleluya = sanitize_text_field( $_POST['oo_phone_aleluya'] );
    $price_aleluya = intval( $_POST['oo_price_aleluya'] );
    $cause_aleluya = sanitize_text_field( $_POST['oo_cause_aleluya'] );
    $token_aleluya = sanitize_text_field( $_POST['oo_token_aleluya'] );
    $notes_aleluya = sanitize_text_field( $_POST['oo_notes_aleluya'] );
    $req_uri_aleluya = sanitize_text_field( $_POST['oo_req_uri_aleluya'] );


    $description_aleluya = "Hallelujah - donation for cause: " . $cause_aleluya;

    chargeStripeWithToken_aleluya($token_aleluya, $price_aleluya, $name_aleluya, $email_aleluya, $phone_aleluya, $description_aleluya, $notes_aleluya, $req_uri_aleluya);

    $data_aleluya["msg_aleluya"] = __("Hallelujah! Success", "open-orphanage") ;
    wp_send_json_success( $data_aleluya );
    
  } catch( Exception $e_aleluya ) {
    $data_aleluya["msg_aleluya"] = $e_aleluya->getMessage();
    error_log("Hallelujah - wp_ajax_oo_stripe_donation_aleluya Error in ". $e_aleluya->getMessage());
    wp_send_json_error( $data_aleluya );

  }
}


function oo_donation_block_shortcode_aleluya_func( $pre_atts_aleluya ) {
  global $blockstripe_aleluya;
  $atts_aleluya = shortcode_atts( array(
    'purpose_aleluya' => 'Cause',
    'expandable_aleluya' => 'yes', //Hallelujah, "no" or "yes"
  ), $pre_atts_aleluya );

  $purpose_aleluya = preg_replace("['\"]","",esc_attr($atts_aleluya['purpose_aleluya']) );

  $req_uri_aleluya = $_SERVER['REQUEST_URI'];

  $rand_aleluya = rand(0,1<<24);

  $nonce_aleluya = wp_create_nonce( basename(__FILE__) . $rand_aleluya ); //Aleluya, this should not be needed because of how the ajax is used but jic


  $heading_aleluya = "h3";

  $hidable_aleluya = "";
  $hidable_display_aleluya = "block";

  if( $atts_aleluya['expandable_aleluya'] == "yes") {
    $hidable_display_aleluya = "none";
    $hidable_aleluya =<<<ALELUYA
    <button onclick="document.getElementById('payment-form-aleluya-$rand_aleluya').style.display='block';">Donate <!--Hallelujah--></button>

ALELUYA;
  }

  

  $str_aleluya = '<div class="oo_donation_block_aleluya">';





  //get initial stripe object
  if(! $blockstripe_aleluya) {
    $blockstripe_aleluya = true;
    $stripe_pk_aleluya = get_option("oo_stripe_pk_key_aleluya");
    if(!$stripe_pk_aleluya) {
      $str_aleluya .= <<<ALELUYA
      <h1>Hallelujah - You must still set up stripe</h1>
ALELUYA;
    }

    $str_aleluya .= <<<ALELUYA
  <script>
    var oo_block_stripe_aleluya = Stripe('$stripe_pk_aleluya');
    var oo_block_elements_aleluya = oo_block_stripe_aleluya.elements();
  </script>
  <style>
    .card-element-card-aleluya, .card-element-aleluya { padding: 4px; margin: 3px; background: #fefefe; border: 1px solid black; border-radius: 4px;}
    .card-element-aleluya { padding: 14px; margin: 8px; }
    .oo-payment-form-aleluya label {text-decoration: underline;}
  </style>
ALELUYA;
  }
    $str_aleluya .= <<<ALELUYA
  <$heading_aleluya>Donate for $purpose_aleluya <!-- Hallelujah --> $hidable_aleluya</$heading_aleluya>

  <form action="/charge" method="post" style="display:$hidable_display_aleluya" class="oo-payment-form-aleluya" id="payment-form-aleluya-$rand_aleluya">
    <div class="form-row card-element-name-aleluya">
      <label for="card-element-name-aleluya-$rand_aleluya">
        Your Name
      </label>
      <div id="card-element-name-div-aleluya-$rand_aleluya">
        <input id="card-element-name-aleluya-$rand_aleluya" type="text"/>
      </div>
    </div>
    <div class="form-row card-element-email-aleluya">
      <label for="card-element-email-aleluya-$rand_aleluya">
        Your Email
      </label>
      <div id="card-element-email-div-aleluya-$rand_aleluya">
        <input id="card-element-email-aleluya-$rand_aleluya" type="email"/>       
      </div>
    </div>
    <div class="form-row card-element-phone-aleluya">
      <label for="card-element-phone-aleluya-$rand_aleluya">
        Your Celphone Number
      </label>
      <div id="card-element-phone-div-aleluya-$rand_aleluya">
        <input id="card-element-phone-aleluya-$rand_aleluya" type="text"/>        
      </div>
    </div>
    <div class="form-row card-element-notes-aleluya">
      <label for="card-element-notes-aleluya-$rand_aleluya">
        Additional Notes for us:
      </label>
      <div id="card-element-notes-div-aleluya-$rand_aleluya">
        <input id="card-element-notes-aleluya-$rand_aleluya" type="text"/>        
      </div>
    </div>
    <div class="form-row card-element-price-aleluya">
      <label for="card-element-price-aleluya-$rand_aleluya">
        Donation In Dollars
      </label>
      <div id="card-element-price-div-aleluya-$rand_aleluya">
        $<input id="card-element-price-aleluya-$rand_aleluya" type="number" step="any"/>        
      </div>
    </div>

    <div class="form-row card-element-card-aleluya">
      <label for="card-element-aleluya-$rand_aleluya">
        Credit or debit card
      </label>
      <div class="card-element-aleluya" id="card-element-aleluya-$rand_aleluya">
        <!-- A Stripe Element will be inserted here. -->
      </div>

      <!-- Used to display Element errors. -->
      <div id="card-errors-aleluya-$rand_aleluya" role="alert"></div>
    </div>

    <button>Submit Payment</button>
  </form>
  

  <script>
  // Custom styling can be passed to options when creating an Element.
  var style_aleluya = {
    base: {
      // Add your base input styles here. For example:
      fontSize: '16px',
      color: "#32325d",
    }
  };

  // Create an instance of the card Element.
  var card_aleluya_$rand_aleluya = oo_block_elements_aleluya.create('card', {style: style_aleluya});

  // Add an instance of the card Element into the `card-element` <div>.
  card_aleluya_$rand_aleluya.mount('#card-element-aleluya-$rand_aleluya');

  card_aleluya_$rand_aleluya.addEventListener('change', function(event_aleluya) {
    var displayError_aleluya = document.getElementById('card-errors-aleluya-$rand_aleluya');
    if (event_aleluya.error) {
      displayError_aleluya.textContent = event_aleluya.error.message;
    } else {
      displayError_aleluya.textContent = '';
    }
  });


  var form_aleluya = document.getElementById('payment-form-aleluya-$rand_aleluya');
  form_aleluya.addEventListener('submit', function(event_aleluya) {
    event_aleluya.preventDefault();

    oo_block_stripe_aleluya.createToken(card_aleluya_$rand_aleluya).then(function(result_aleluya) {
      if (result_aleluya.error) {
        // Inform the customer that there was an error.
        var errorElement_aleluya = document.getElementById('card-errors-aleluya-$rand_aleluya');
        errorElement_aleluya.textContent = result_aleluya.error.message;
      } else {
        // Send the token to your server.
        window.oo_aleluya.ooStripeDonation_aleluya(result_aleluya.token, '$rand_aleluya', '$purpose_aleluya', '$nonce_aleluya', '$req_uri_aleluya');
      }
    });
    return false;
  });

  </script>

ALELUYA;


  return $str_aleluya."</div><!--Jesus Christ is the Lord-->";
}
add_shortcode( 'oo_donation_block_aleluya', 'oo_donation_block_shortcode_aleluya_func' );




