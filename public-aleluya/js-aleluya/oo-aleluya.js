/**
 * For God so loved the world, that He gave His only begotten Son, that all who believe in Him should not perish, but have everlasting life
 **/

 // Thank You Jesus for https://wordpress.stackexchange.com/a/236296
var oo_children_aleluya = [];

jQuery(document).ready( function($) {
  window.oo_aleluya = {};

  window.oo_aleluya.ooStripeDonation_aleluya = function(token_aleluya, rand_aleluya, cause_aleluya, nonce_aleluya, req_uri_aleluya) {
    var data_aleluya = {
      action: 'oo_stripe_donation_aleluya',
      oo_token_aleluya: token_aleluya.id,
      oo_rand_aleluya: rand_aleluya,
      oo_nonce_aleluya: oo_ajax_aleluya.nonce_aleluya,
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


  /**
   * When clicking on a sponsor this child button
   */
  window.oo_aleluya.sponsor_button_clicked_aleluya = function(id_aleluya) {
    var email_aleluya = oo_ajax_aleluya.user_email_aleluya;

    if(! oo_ajax_aleluya.is_logged_in_aleluya ) {
      if ( ! oo_ajax_aleluya.can_reg_aleluya ) {
        email_aleluya = prompt('Please enter your email, we will use this to contact you regarding sponsoring the requested child:');
      } else {
        alert('Hallelujah thanks again for you interest! We will send you to the registration page, where you can create a user for yourself. If you already have a user then Log In Instead please. After you do this please come back to this page and click sponsor again. Sorry please be patient as we are working to make this a bit easier.');
        window.location = oo_ajax_aleluya.reg_url2_aleluya + id_aleluya; // Creates a url for later storing which child we will try and register Hallelujah
        return;
      }
    } else {
      alert("Praise Jesus Christ - We will send you to the back end where you can scroll down to confirm sign up and pay for your monthly support for this child.")
    }

    if (!email_aleluya) return;

    var data_aleluya = {
      'action': 'oo_support_request_aleluya',
      'oo_email_id_aleluya': id_aleluya,
      'oo_email_aleluya': email_aleluya,
      'oo_nonce_aleluya': oo_ajax_aleluya.nonce_aleluya,
    };

    console.log("Hallelujah Support Request - " + JSON.stringify(data_aleluya));

    jQuery.post(oo_ajax_aleluya.ajax_url_aleluya, data_aleluya, function(response_aleluya) {
      console.log("Hallelujah Support Response - " + JSON.stringify(response_aleluya));
      if(response_aleluya.success === true) {
        if( ! oo_ajax_aleluya.is_logged_in_aleluya ) { // Inability to register assumed hallelujah          
          alert( "Aleluya Success - " + response_aleluya.data.msg_aleluya );
        } else {
          console.log('Hallelujah: ' + response_aleluya.data.msg_aleluya);
          window.location = oo_ajax_aleluya.edit_user_link_aleluya;
        }    
      } else {
        alert( "Aleluya Error - " + response_aleluya.data.msg_aleluya );
      }
    });

  }

  /**
   * When clicking on view more about this child button
   */
  window.oo_aleluya.viewmore_button_clicked_aleluya = function(url_aleluya) {
    window.location = url_aleluya;
  }


  /**
   * Create a stripe donation block
   * uuid_aleluya is the UUID suffix for form elements
   */
  window.oo_aleluya.create_stripe_donation_form_aleluya = function(uuid_aleluya, purpose_aleluya, req_uri_aleluya ) {

    oo_tog_forms_aleluya[uuid_aleluya] = 0;

    // Custom styling can be passed to options when creating an Element.
    var oo_block_elements_aleluya = oo_block_stripe_aleluya.elements();

    // Create an instance of the card Element.
    var card_aleluya = oo_block_elements_aleluya.create('card', {style: oo_stripe_style_aleluya});

    // Add an instance of the card Element into the `card-element` <div>.
    card_aleluya.mount( '#card-element-aleluya-' + uuid_aleluya );

    card_aleluya.addEventListener('change', function(event_aleluya) {
      var displayError_aleluya = document.getElementById('card-errors-aleluya-' + uuid_aleluya);
      if (event_aleluya.error) {
        displayError_aleluya.textContent = event_aleluya.error.message;
      } else {
        displayError_aleluya.textContent = '';
      }
    });


    var form_aleluya = document.getElementById('payment-form-aleluya-' + uuid_aleluya);
    form_aleluya.addEventListener('submit', function(event_aleluya) {
      event_aleluya.preventDefault();

      oo_block_stripe_aleluya.createToken(card_aleluya).then(function(result_aleluya) {
        if (result_aleluya.error) {
          // Inform the customer that there was an error.
          var errorElement_aleluya = document.getElementById('card-errors-aleluya-' + uuid_aleluya);
          errorElement_aleluya.textContent = result_aleluya.error.message;
        } else {
          // Send the token to your server.
          window.oo_aleluya.ooStripeDonation_aleluya(result_aleluya.token, uuid_aleluya, purpose_aleluya, oo_ajax_aleluya.nonce_aleluya, req_uri_aleluya);
        }
      });
      return false;
    });
  };


});


