<?php
// For God so loved the world, that He gave His only begotten Son, that all who believe in Him should not perish
// but have everlasting life
defined( 'ABSPATH' ) or die( 'Jesus Christ is the Lord . ' );

/**
 * Charge a stripe customer a price in dollars and tag with description
 * Return the Stripe charge object
 **/

function chargeStripeCustomer_aleluya($customer_code_aleluya, $price_aleluya, $description_aleluya) {
  $stripe_charge_aleluya = new OO_StripeCharge_aleluya();
  return $stripe_charge_aleluya->chargeStripeCustomer_aleluya($customer_code_aleluya, $price_aleluya, $description_aleluya);
  
}

function chargeStripeWithToken_aleluya($token_aleluya, $price_aleluya, $name_aleluya, $email_aleluya, $phone_aleluya, $description_aleluya, $notes_aleluya, $req_uri_aleluya) {
  $stripe_charge_aleluya = new OO_StripeCharge_aleluya();
  return $stripe_charge_aleluya->chargeStripeWithToken_aleluya($token_aleluya, $price_aleluya, $name_aleluya, $email_aleluya, $phone_aleluya, $description_aleluya, $notes_aleluya, $req_uri_aleluya);
  
}


