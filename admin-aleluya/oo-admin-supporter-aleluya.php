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
  $last4_aleluya = get_user_meta($user_aleluya->ID, "last4_".stripeCustSkMetaTag_aleluya(), true);
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
    <tr>
      <th><label for="one_time_donation_aleluya">Support Us with a One Time Charge: </label></th>
      <td>
        <?php if (!$last4_aleluya) { echo "Please first insert your credit card information above and click save."; } else { ?>
          <style>
            #oo_one_time_donation_aleluya {background: #beeece; border-radius: 2px; border: 1px solid black; box-shadow: 1px 1px 1px black; }
          </style>
          <script>
            function oo_one_time_donation_button_clicked_aleluya(){
               var data_aleluya = {
                  action: 'oo_one_time_supporter_donation_aleluya',
                  purpose_aleluya: jQuery("#oo_one_time_donation_purpose_aleluya").val(),
                  price_aleluya: jQuery("#oo_one_time_donation_price_aleluya").val()
                };

                jQuery.post(ajaxurl, data_aleluya, function(response_aleluya) {
                  console.log("Hallelujah - " + JSON.stringify(response_aleluya));
                  if(response_aleluya.success === true) {
                    jQuery("#oo_one_time_donation_notice_aleluya").html("<b>"+response_aleluya.data.html_aleluya+"</b>");
                  } else {
                    jQuery("#oo_one_time_donation_notice_aleluya").html( "The Lord is good - error processing your card: <b> " + response_aleluya.data +"</b>");
                  }
                });
            }
          </script>

          <table id="oo_one_time_donation_aleluya">
            <tr>
              <td align="right">Donation in Dollars: </td>
              <td><input type="number"
                     min="0"
                     max="9999"
                     step="1"
                     id="oo_one_time_donation_price_aleluya"
                     name="oo_one_time_donation_price_aleluya"
                     value="0"
                     class="regular-text"/></td>
            </tr><tr>
              <td align="right">Donation Note or Purpose: </td>
              <td><input type="text" name="oo_one_time_donation_purpose_aleluya" id="oo_one_time_donation_purpose_aleluya" /></td>
            </tr>
            <tr>
              <td id="oo_one_time_donation_notice_aleluya"></td>
              <td><button id="oo_one_time_donation_button_aleluya" onclick="oo_one_time_donation_button_clicked_aleluya();"  type="button">Please Charge my Card Above Amount</button></td>
          </table>
          <br/>
        <?php } ?>
      </td>
    </tr>

  </table>
  <?php
}

add_action( 'wp_ajax_oo_one_time_supporter_donation_aleluya', 'wp_ajax_oo_one_time_supporter_donation_aleluya'   );
function wp_ajax_oo_one_time_supporter_donation_aleluya() {
  $description_aleluya = sanitize_text_field($_POST["purpose_aleluya"]);
  $price_aleluya = intval($_POST["price_aleluya"]) ;
  $customer_code_aleluya = get_user_meta(get_current_user_id(), stripeCustSkMetaTag_aleluya(), true);
  try {
    if( ! chargeStripeCustomer_aleluya($customer_code_aleluya, $price_aleluya * 100, $description_aleluya) ) {
      wp_send_json_error();
    } else {
      $data_aleluya = array("html_aleluya" => __("Hallelujah - your card has been charged ").  "$".$price_aleluya);
      wp_send_json_success( $data_aleluya );
    }
  } catch (Exception $e_aleluya) {
    wp_send_json_error($e_aleluya->getMessage());
  }
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
  error_log_aleluya("Hallelujah - stripe enque");
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
 * Child support section, hallelujah
 */

add_action( 'user_profile_update_errors', 'oo_child_support_update_errors_aleluya', 10, 3 );


function oo_child_support_update_errors_aleluya( $errors, $update, $user_aleluya ) {
  if ( ! $update ) {
    return;
  }

  $last4_aleluya = get_user_meta($user_aleluya->ID, "last4_".stripeCustSkMetaTag_aleluya(), true);

  //We cannot accept a sponsorship with no card details
  if( !empty($_POST['accept_sponsorship_aleluya']) && !$last4_aleluya ) {
    $errors->add( 'accept_sponsorship_aleluya', __( '<strong>ERROR</strong>: You must first add your card above.', 'crf' ) );
  }

}


add_action( 'personal_options_update', 'oo_child_support_fields_aleluya' );
add_action( 'edit_user_profile_update', 'oo_child_support_fields_aleluya' );

function oo_child_support_fields_aleluya( $user_id_aleluya ) {
  if ( ! current_user_can( 'edit_user', $user_id_aleluya ) ) {
    return false;
  }

  if(!empty($_POST['cancel_sponsorship_aleluya'])) {
    update_user_meta(get_current_user_id(), 'cancel_sponsorship_aleluya', true);
    foreach($_POST['cancel_sponsorship_aleluya'] as $id_aleluya) {
      $child_aleluya = new Child_aleluya($id_aleluya);
      $child_aleluya->set_child_sponsor_id_aleluya(wp_get_current_user()->ID,"cancelled");

    }
  }

  if(!empty($_POST['accept_sponsorship_aleluya'])) {
    foreach($_POST['accept_sponsorship_aleluya'] as $id_aleluya) {
      //Safety check, make sure child is not also being canceled
      $cancel_aleluya = false;
      if(!empty($_POST['cancel_sponsorship_aleluya'])) {
        foreach($_POST['cancel_sponsorship_aleluya'] as $idc_aleluya) {
          if($idc_aleluya == $id_aleluya) $cancel_aleluya = true;
        }
      }

      if(! $cancel_aleluya ) {
        //Ok child is being accepted, begin subscription!
        update_user_meta(get_current_user_id(), 'begin_sponsorship_aleluya', true);
        $child_aleluya = new Child_aleluya($id_aleluya);
        $child_aleluya->set_child_sponsor_id_aleluya(wp_get_current_user()->ID," sponsored", $sub_code_aleluya);
      }
    }
  }

}

$begin_subscription_aleluya = false;

function oo_begin_subscription_notice_aleluya(){
  if( ! get_user_meta(get_current_user_id(), 'begin_sponsorship_aleluya', true) ) {
    return;
  }
  update_user_meta(get_current_user_id(), 'begin_sponsorship_aleluya', false);
  ?>
  <div class="notice notice-success is-dismissible">
     <p>Hallelujah - Thank you for sponsoring this child, your card has been charged <?php echo get_option('stripe_plan1_dl_aleluya')?>$ and will be charged again in 1 month.</p>
  </div>
<?php
}

$end_subscription_aleluya = false;

function oo_cancel_subscription_notice_aleluya(){
  if( ! get_user_meta(get_current_user_id(), 'cancel_sponsorship_aleluya', true) ) {
    return;
  }
  update_user_meta(get_current_user_id(), 'cancel_sponsorship_aleluya', false);

  ?>
    <div class="notice notice-success is-dismissible">
       <p>Hallelujah - You have removed this child from your list, you will not be charged a monthly fee.</p>
   </div>
<?php
}

add_action('admin_notices', 'oo_begin_subscription_notice_aleluya');
add_action('admin_notices', 'oo_cancel_subscription_notice_aleluya');

add_action( 'show_user_profile', 'oo_show_child_support_profile_fields_aleluya' );
add_action( 'edit_user_profile', 'oo_show_child_support_profile_fields_aleluya' );

function oo_stripe_start_subscription( $user_id_aleluya, $child_id_aleluya) {
  global $begin_subscription_aleluya;
  if(! get_option('oo_stripe_sk_key_aleluya') ) return null;
  \Stripe\Stripe::setApiKey( get_option('oo_stripe_sk_key_aleluya') );

  $customer_code_aleluya = get_user_meta($user_id_aleluya, stripeCustSkMetaTag_aleluya(), true );
  $plan_code_aleluya     = get_option("oo_stripe_plan_code1_aleluya");

  $sub_aleluya = \Stripe\Subscription::create([
    "customer" => $customer_code_aleluya,
    "items" => [
      [
        "plan" => $plan_code_aleluya,
      ],
    ]
  ]);

  $sub_code_aleluya = $sub_aleluya["id"];
  update_post_meta($child_id_aleluya, 'stripe_sub_code_aleluya', $sub_code_aleluya );

  $begin_subscription_aleluya = true;

  return $sub_code_aleluya;
}


function oo_stripe_stop_subscription( $user_id_aleluya, $child_id_aleluya) {
  global $end_subscription_aleluya;
  if(! get_option('oo_stripe_sk_key_aleluya') ) return null;
  \Stripe\Stripe::setApiKey( get_option('oo_stripe_sk_key_aleluya') );

	try {
		$sub_code_aleluya = get_post_meta($child_id_aleluya, 'stripe_sub_code_aleluya', true);
		$sub_aleluya = \Stripe\Subscription::retrieve($sub_code_aleluya);
		$sub_aleluya->cancel();
	} catch (Exception $e_aleluya) {
		error_log_aleluya("Hallelujah - Stripe error in oo_stripe_stop_subscription : ".$e_aleluya->getMessage(), 2);

	}
  delete_post_meta($child_id_aleluya, 'stripe_sub_code_aleluya');
  $end_subscription_aleluya = true;



}

function oo_show_child_support_profile_fields_aleluya( $user_aleluya ) {
  global $oo_upload_url_aleluya;

  $children_supported_aleluya = oo_get_user_children_supported_aleluya($user_aleluya);

  ?>
  <h3><?php esc_html_e( '🕆 Children I am Supporting (Hallelujah)', 'crf' ); ?></h3>

  <?php
  if( empty( $children_supported_aleluya["children_aleluya"] ) ) {
    ?>
    <p>You currently are not registered as a supporter of any children with this orphanage.</p>

    <?php
  } else {
  ?>
  <style>
    img.oo_avatar_aleluya {height:128px;width:128px;text-align: top;padding:2px;border: 1px solid black; border-radius: 4px; box-shadow: 1px 1px 1px white;margin: 8px;}
  </style>
  <table class="form-table">

  <?php
    foreach( $children_supported_aleluya["children_aleluya"] as $child_aleluya ) {
      $post_status_aleluya = get_post_status( $child_aleluya["id_aleluya"] );
      if ( FALSE === $post_status_aleluya || "trash" == $post_status_aleluya) {
        continue;
      }
      oo_make_child_thumb_aleluya($child_aleluya["id_aleluya"]);
      $nick_names_aleluya = get_post_meta($child_aleluya["id_aleluya"],"nick_names_aleluya",true);
      $avatar_media_url_aleluya =  $oo_upload_url_aleluya."thumbs-aleluya/".$child_aleluya["id_aleluya"]."-192x192-aleluya.jpg";

    ?>

      <tr valign="top">

      <th scope="row"><?php echo $nick_names_aleluya; ?></th>
        <td>
          <img src="<?php echo $avatar_media_url_aleluya; ?>" align="left" class="oo_avatar_aleluya"/>
          <?php
          if($child_aleluya["sponsorship_code"] == "requesting") {
            ?>
            <p>You are in the process of sponsoring  <?php echo  $nick_names_aleluya." - ".$child_aleluya["id_aleluya"] ?></p>
            <p> <input type="checkbox" name="accept_sponsorship_aleluya[]" value="<?php echo $child_aleluya["id_aleluya"] ?>"/> check here and save profile to begin sponsorship at <?php echo get_option('stripe_plan1_dl_aleluya')?>$ a month! </p>
            <p><em><input type="checkbox" name="cancel_sponsorship_aleluya[]" value="<?php echo $child_aleluya["id_aleluya"] ?>"/> check here and save profile to cancel sponsorship request.</em>

            <?php
          } else if($child_aleluya["sponsorship_code"] == "sponsored") { ?>
            <p>Hallelujah! You are currently sponsoring this child! </p>
            <p><em><input type="checkbox" name="cancel_sponsorship_aleluya[]" value="<?php echo $child_aleluya["id_aleluya"] ?>"/> check here and save profile to cancel your sponsorship, you will no longer be charged <?php echo get_option('stripe_plan1_dl_aleluya')?>$ a month.</em></p>


            <?php
          } else { ?>
            <p>You have canceled sponsoring this child.</p>

          <?php
        }
        ?>
        </td>
      </tr>
    <?php
    }
  }
  ?>
  </table>
  <?php
}

