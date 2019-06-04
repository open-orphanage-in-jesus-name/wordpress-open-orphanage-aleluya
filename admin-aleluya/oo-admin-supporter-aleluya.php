<?php
// For God so loved the world, that He gave His only begotten Son, that all who believe in Him should not perish
// but have everlasting life

/**
 * This file enabled custom profile fields for a user. Some fields store a users address and other
 * details that would help with communication and stripe charges. We also use this to interface
 * with the card details for a user. These are not stored nor transferred through our app, but 
 * are handled fully by stripe.
 */


//thanks Jesus for https://www.cssigniter.com/how-to-add-a-custom-user-field-in-wordpress/

/**
 * Custom profile fields, Hallelujah
 */

add_action( 'show_user_profile', 'oo_show_extra_supporter_profile_fields_aleluya' );
add_action( 'edit_user_profile', 'oo_show_extra_supporter_profile_fields_aleluya' );

function oo_show_extra_supporter_profile_fields_aleluya( $user_aleluya ) {
  $last4_aleluya = get_user_meta($user_aleluya->ID, "last4_".stripeCustSkMetaTag_aleluya(), $last4_aleluya)[0];
  ?>
  <h3><?php esc_html_e( '🕆 Personal Information', 'crf' ); ?></h3>

  <table class="form-table">
    <tr>
      <th><label for="zipcode_aleluya"><?php esc_html_e( '🕆 Zipcode', 'crf' ); ?></label></th>
      <td>
        <input type="number"
             min="10000"
             max="99999"
             step="1"
             id="zipcode_aleluya"
             name="zipcode_aleluya"
             value="<?php echo get_user_meta( get_current_user_id(), 'zipcode_aleluya')[0]?>"
             class="regular-text"
        />
      </td>
    </tr>

    <tr>
      <th><label for=""><?php esc_html_e( '🕆 Credit Card Info', 'crf' ); ?></label></th>
      <td>

        
          <div class="form-row">

            <div id="card-element-aleluya">
              <!-- A Stripe Element will be inserted here. -->
            </div>

            <!-- Used to display form errors. -->
            <div id="card-errors-aleluya" role="alert"></div>

            <button id="newcard-button-aleluya">Assign <?php if ($last4_aleluya) { echo "New"; }?> Card</button>

            <label for="card-element-aleluya">
              <p>Set <?php if ($last4_aleluya) { echo "New"; }?> Credit or Debit Card Information via <a href="https://stripe.com">Stripe</a> we will not charge you right now, we do not store nor transmit this on this site.</p>
              <?php
              if( $last4_aleluya ) {
?>
                <p>Currently, <a href="https://www.stripe.com">Stripe</a> reported the card you have registered with us ends in <?php echo $last4_aleluya?>.</p>
<?php
              }?>
            </label>
            
          </div>

         

      </td>
    </tr>


ALELUYA;
  </table>
  <?php
}



add_action( 'user_profile_update_errors', 'oo_supporter_profile_update_errors_aleluya', 10, 3 );


function oo_supporter_profile_update_errors_aleluya( $errors, $update, $user ) {
  if ( ! $update ) {
    return;
  }

  if ( empty( $_POST['zipcode_aleluya'] ) ) {
    $errors->add( 'zipcode_aleluya', __( '<strong>ERROR</strong>: Please enter your postal or zipcode.', 'crf' ) );
  }

  
}


add_action( 'personal_options_update', 'oo_update_supporter_profile_fields_aleluya' );
add_action( 'edit_user_profile_update', 'oo_update_supporter_profile_fields_aleluya' );

function oo_update_supporter_profile_fields_aleluya( $user_id_aleluya ) {
  if ( ! current_user_can( 'edit_user', $user_id_aleluya ) ) {
    return false;
  }

  //if ( ! empty( $_POST['zipcode_aleluya'] ) && intval( $_POST['zipcode_aleluya'] ) >= 1900 ) {
    update_user_meta( get_current_user_id(), 'zipcode_aleluya', $_POST['zipcode_aleluya']  );
  //}

  stripeCreateOrUpdateCustomer_aleluya(get_current_user_id());
}

//Add the stripe api script to the site
if( get_option('oo_stripe_pk_key_aleluya') ) {
  add_action('admin_footer', 'oo_stripe_footer_aleluya');
  add_action( 'admin_enqueue_scripts', function() { wp_enqueue_script( "oo_stripe_aleluya", 'https://js.stripe.com/v3/' ); });

}


function oo_stripe_footer_aleluya(){
  ?>
  <script>
    var stripe_aleluya = Stripe('<?php echo preg_replace( "/[^a-zA-Z0-9_@+-=]/", "", get_option('oo_stripe_pk_key_aleluya') ); ?>');

    // Create an instance of Elements.
    var elements_aleluya = stripe_aleluya.elements();

    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style_aleluya = {
      base: {
        background: "#fafafa",
        color: '#32325d',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
          color: '#aab7c4'
        }
      },
      invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
      }
    };

    // Create an instance of the card Element.
    var card_aleluya = elements_aleluya.create('card', {style: style_aleluya});

    // Add an instance of the card Element into the `card-element` <div>.
    card_aleluya.mount('#card-element-aleluya');

    function oo_stripeTokenHandler_aleluya(token_aleluya) {
      // Insert the token ID into the form so it gets submitted to the server
      var form_aleluya = document.getElementById('your-profile');
      var hiddenInput_aleluya = document.createElement('input');
      hiddenInput_aleluya.setAttribute('type', 'hidden');
      hiddenInput_aleluya.setAttribute('name', 'oo_stripe_token_aleluya');
      hiddenInput_aleluya.setAttribute('value', token_aleluya.id);
      form_aleluya.appendChild(hiddenInput_aleluya);

      var errorElement_aleluya = document.getElementById('card-errors-aleluya');
      errorElement_aleluya.textContent = "Hallelujah - the new card will be assigned when you click 'Update Profile'. Thank You and God guide us and bless you in Jesus Holy name.";
       alert("Hallelujah - the new card will be assigned when you click 'Update Profile'. Thank You and God guide us and bless you in Jesus Holy name.");

    }
    // Create a token or display an error when the form is submitted.
    var button_aleluya = document.getElementById('newcard-button-aleluya');
    button_aleluya.addEventListener('click', function(event_aleluya) {
      event_aleluya.preventDefault();

      stripe_aleluya.createToken(card_aleluya).then(function(result_aleluya) {
        if (result_aleluya.error) {
          // Inform the customer that there was an error.
          var errorElement_aleluya = document.getElementById('card-errors-aleluya');
          errorElement_aleluya.textContent = result_aleluya.error.message;
        } else {
          // Send the token to your server.
          oo_stripeTokenHandler_aleluya(result_aleluya.token);
        }
      });
    });



  </script>
  <?php
};

/**
 * Child support section
 */