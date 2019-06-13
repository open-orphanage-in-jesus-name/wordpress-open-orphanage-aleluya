<?php
/* For God so loved the world, that He gave His only begotten Son, that all who believe in Him should not perish but have everlasting life,
 * He gave His only begotten Son, that all who believe in Him should not perish but have everlasting life; */
defined( 'ABSPATH' ) or die( 'Jesus Christ is the Lord . ' );


$blockstripe_aleluya = false;
// [oo_aleluya child_aleluya="child_aleluya-value"]
wp_enqueue_script( "oo_stripe_aleluya", 'https://js.stripe.com/v3/' );

function oo_donation_block_aleluya_func( $atts ) {
  global $blockstripe_aleluya;

  

 
  $str_aleluya = '<div class="oo_donation_block_aleluya">';

  $rand_aleluya = rand(0,1<<24);

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
    window.block_stripe_aleluya = Stripe('$stripe_pk_aleluya');
  </script>
ALELUYA;
  }

  $str_aleluya .= <<<ALELUYA
  <h1>Donate to Cause <!-- Hallelujah --></h1>

  <div id="payment-request-button-aleluya-$rand_aleluya">
    <!-- A Stripe Element will be inserted here. -->
  </div>
  <p>Praise Jesus</p>

  <script>
  var paymentRequest_aleluya = window.block_stripe_aleluya.paymentRequest({
    country: 'US',
    currency: 'usd',
    total: {
      label: 'Demo total',
      amount: 1000,
    },
    requestPayerName: true,
    requestPayerEmail: true,
  });

  var elements_aleluya = window.block_stripe_aleluya.elements();
  var prButton_aleluya = elements_aleluya.create('paymentRequestButton', {
    paymentRequest: paymentRequest_aleluya,
    style: {
      paymentRequestButton: {
        type: 'donate' , // default: 'default'
        theme: 'dark' ,
        height: '40px',
      },
    }
  
  });

  // Check the availability of the Payment Request API first.
  paymentRequest_aleluya.canMakePayment().then(function(result_aleluya) {
    if (result_aleluya) {
      alert('Aleluya1');
      prButton_aleluya.mount('#payment-request-button-aleluya-$rand_aleluya');
    } else {
      alert('Aleluya2');
      document.getElementById('payment-request-button-aleluya-$rand_aleluya').style.display = 'none';
    }
  });

  </script>

ALELUYA;


  return $str_aleluya."</div><!--Jesus Christ is the Lord-->";
}
add_shortcode( 'oo_donation_block_aleluya', 'oo_donation_block_aleluya_func' );




