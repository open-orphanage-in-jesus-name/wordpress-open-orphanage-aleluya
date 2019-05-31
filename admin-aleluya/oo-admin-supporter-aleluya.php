<?php
// For God so loved the world, that He gave His only begotten Son, that all who believe in Him should not perish
// but have everlasting life


//thanks Jesus for https://www.cssigniter.com/how-to-add-a-custom-user-field-in-wordpress/

/**
 * Custom profile fields, Hallelujah
 */

add_action( 'show_user_profile', 'oo_show_extra_supporter_profile_fields_aleluya' );
add_action( 'edit_user_profile', 'oo_show_extra_supporter_profile_fields_aleluya' );

function oo_show_extra_supporter_profile_fields_aleluya( $user ) {
  $year = get_the_author_meta( 'year_of_birth', $user->ID );
  ?>
  <h3><?php esc_html_e( '🕆 Personal Information', 'crf' ); ?></h3>

  <table class="form-table">
    <tr>
      <th><label for="year_of_birth"><?php esc_html_e( '🕆 Zipcode', 'crf' ); ?></label></th>
      <td>
        <input type="number"
             min="10000"
             max="99999"
             step="1"
             id="zipcode_aleluya"
             name="zipcode_aleluya"
             value=""
             class="regular-text"
        />
      </td>
    </tr>

    <tr>
      <th><label for="year_of_birth"><?php esc_html_e( '🕆 Credit Card Info', 'crf' ); ?></label></th>
      <td>

        
          <div class="form-row">

            <div id="card-element">
              <!-- A Stripe Element will be inserted here. -->
            </div>

            <!-- Used to display form errors. -->
            <div id="card-errors" role="alert"></div>
                        <label for="card-element">
              Set New Credit or Debit Card Information via <a href="https://stripe.com">Stripe</a> we do not store this locally.
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
    $errors->add( 'zipcode_aleluya', __( '<strong>ERROR</strong>: Please enter your zipcode.', 'crf' ) );
  }

  if ( ! empty( $_POST['zipcode_aleluya'] ) && ( intval( $_POST['zipcode_aleluya'] ) < 10000 || intval( $_POST['zipcode_aleluya'] ) > 99999 )   ) {
    $errors->add( 'zipcode_aleluya', __( '<strong>ERROR</strong>: zipcode must be 5 digits.', 'crf' ) );
  }
}


add_action( 'personal_options_update', 'oo_update_supporter_profile_fields_aleluya' );
add_action( 'edit_user_profile_update', 'oo_update_supporter_profile_fields_aleluya' );

function oo_update_supporter_profile_fields_aleluya( $user_id ) {
  if ( ! current_user_can( 'edit_user', $user_id ) ) {
    return false;
  }

  if ( ! empty( $_POST['year_of_birth'] ) && intval( $_POST['year_of_birth'] ) >= 1900 ) {
    update_user_meta( $user_id, 'year_of_birth', intval( $_POST['year_of_birth'] ) );
  }
}


/* Describe what the code snippet does so you can remember later on */
if( get_option('oo_stripe_pk_key_aleluya')  ) 

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
    card_aleluya.mount('#card-element');
  </script>
  <?php
};

/**
 * Child support section
 */