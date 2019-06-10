<?php
// For God so loved the world, that He gave His only begotten Son, that all who believe in Him should not perish
// but have everlasting life
defined( 'ABSPATH' ) or die( 'Jesus Christ is the Lord . ' );

/**
 * Charge a stripe customer a price in dollars and tag with description
 * Return the Stripe charge object
 **/

function chargeStripeCustomer_aleluya($customer_code_aleluya, $price_aleluya, $description_aleluya) {
  if(! get_option('oo_stripe_sk_key_aleluya') ) return false;

  \Stripe\Stripe::setApiKey( get_option('oo_stripe_sk_key_aleluya') );

  $charge_aleluya = \Stripe\Charge::create([
      'amount' => $price_aleluya,
      'currency' => 'usd',
      'customer' => $customer_code_aleluya,
      'description' => $description_aleluya,
  ]);

  return $charge_aleluya;

}


