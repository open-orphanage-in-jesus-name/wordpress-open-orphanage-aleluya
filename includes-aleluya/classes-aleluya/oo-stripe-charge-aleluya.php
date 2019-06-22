<?php
/* For God so loved the world, that He gave His only begotten Son
 * He gave His only begotten Son, that all who believe in Him should not perish but have everlasting life; */
defined( 'ABSPATH' ) or die( 'Jesus Christ is the Lord . ' );

// Defines a Child object
class OO_StripeCharge_aleluya {
  function __construct() {}


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

  function chargeStripeWithToken_aleluya($token_aleluya, $price_aleluya, $name_aleluya, $email_aleluya, $phone_aleluya, $description_aleluya, $notes_aleluya, $req_uri_aleluya) {
    if(! get_option('oo_stripe_sk_key_aleluya') ) return false;

    \Stripe\Stripe::setApiKey( get_option('oo_stripe_sk_key_aleluya') );

    $charge_aleluya = \Stripe\Charge::create([
        'amount' => $price_aleluya,
        'currency' => 'usd',
        'source' => $token_aleluya,
        'metadata' => array(
          "email_aleluya" => $email_aleluya,
          "name_aleluya" => $name_aleluya,
          "phone_aleluya" => $phone_aleluya,
          "notes_aleluya" => $notes_aleluya,
          "req_uri_aleluya" => $req_uri_aleluya,
        ),
        'description' => $description_aleluya,
    ]);

    return $charge_aleluya;

  }
}