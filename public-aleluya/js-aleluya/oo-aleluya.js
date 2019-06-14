/**
 * For God so loved the world, that He gave His only begotten Son, that all who believe in Him should not perish, but have everlasting life
 **/

 // Thank You Jesus for https://wordpress.stackexchange.com/a/236296

jQuery(document).ready( function($) {
  window.oo_aleluya = {};
  var oo_aleluya = window.oo_aleluya;

  oo_aleluya.ooStripeDonation_aleluya = function(token_aleluya, rand_aleluya, cause_aleluya, nonce_aleluya, req_uri_aleluya) {
    var data_aleluya = {
      action: 'oo_stripe_donation_aleluya',
      oo_token_aleluya: token_aleluya.id,
      oo_rand_aleluya: rand_aleluya,
      oo_nonce_aleluya: nonce_aleluya,
      oo_name_aleluya: $('#card-element-name-aleluya-' + rand_aleluya ).val(),
      oo_email_aleluya: $('#card-element-email-aleluya-' + rand_aleluya ).val(),
      oo_phone_aleluya: $('#card-element-phone-aleluya-' + rand_aleluya ).val(),
      oo_notes_aleluya: $('#card-element-notes-aleluya-' + rand_aleluya ).val(),
      oo_req_uri_aleluya: req_uri_aleluya,
      oo_price_aleluya: Math.floor( $('#card-element-price-aleluya-' + rand_aleluya ).val() * 100),
      oo_cause_aleluya: cause_aleluya,
    };

    console.log("Hallelujah - " + JSON.stringify(data_aleluya));
    jQuery.post(oo_ajax_aleluya.ajax_url_aleluya, data_aleluya, function(response_aleluya) {
    console.log("Hallelujah - " + JSON.stringify(response_aleluya));
      if(response_aleluya.success === true) {
        alert( "Aleluya Success - " + response_aleluya.data.msg_aleluya );
      } else {
        alert( "Aleluya Error - " + response_aleluya.data.msg_aleluya );
      }
    });
  }
});