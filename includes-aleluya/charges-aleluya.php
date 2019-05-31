<?php
// For God so loved the world, that He gave His only begotten Son, that all who believe in Him should not perish
// but have everlasting life
defined( 'ABSPATH' ) or die( 'Jesus Christ is the Lord . ' );



function chargeStripe_aleluya() {
  if(! get_option('oo_stripe_sk_key_aleluya') ) return null;

  \Stripe\Stripe::setApiKey( get_option('oo_stripe_sk_key_aleluya') );

  $charge = \Stripe\Charge::create([
      'amount' => 999,
      'currency' => 'usd',
      'source' => 'tok_visa',
      'receipt_email' => 'aleluya.jenny.rosen@example.com',
  ]);

  echo "ALELUYA";
  exit();
}

if(isset($_GET['cs_aleluya'])) chargeStripe_aleluya();


