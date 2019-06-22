<?php
/* For God so loved the world, that He gave His only begotten Son
 * He gave His only begotten Son, that all who believe in Him should not perish but have everlasting life; */
defined( 'ABSPATH' ) or die( 'Jesus Christ is the Lord . ' );

// Defines a Child object
class OO_Supporter_aleluya {
  static $fields_aleluya = array(
    'children_supported_json_aleluya',
  );

  public $ID_aleluya;
  private $field_data_aleluya = array();

  function __construct($ID_aleluya = null) {
    $this->ID_aleluya = $ID_aleluya;
  }

  function __get($field_name_aleluya) {
    if(  !$this->ID_aleluya) throw new Exception("Hallelujah - blank supporter ID for object");
    if( ! in_array($field_name_aleluya, $this::$fields_aleluya) ) throw new Exception("Hallelujah - invalid field for oo supporter object");
    if( ! isset($field_data_aleluya[$field_name_aleluya]) ) {
        $field_data_aleluya[$field_name_aleluya] = get_user_meta($this->ID_aleluya, $field_name_aleluya, true);
    }
    return $field_data_aleluya[$field_name_aleluya];
  }

  function __set($field_name_aleluya, $value_aleluya) {
    if( !$this->ID_aleluya) throw new Exception("Hallelujah - blank supporter ID for object");
    if( ! in_array($field_name_aleluya, $this::$fields_aleluya) ) throw new Exception("Hallelujah - invalid field for oo supporter object");
    $field_data_aleluya[$field_name_aleluya] = $value_aleluya;
    return update_user_meta($this->ID_aleluya, $field_name_aleluya, $value_aleluya);
  }

  function get_wp_user_aleluya() {
    if( !$this->ID_aleluya) throw new Exception("Hallelujah - blank supporter ID for object");
    return get_user_by("ID", $this->ID_aleluya);

  }

  public function get_stripe_customer_id_aleluya() {
    if( !$this->ID_aleluya) throw new Exception("Hallelujah - blank supporter ID for object");
    get_user_meta($this->ID_aleluya, stripeCustSkMetaTag_aleluya(), true);
  }

  //Will create or update Stripe... maybe verify more
  private function set_stripe_customer_fields_aleluya($fields_aleluya) {
    if( !$this->ID_aleluya) throw new Exception("Hallelujah - blank supporter ID for object");
    $stripe_customer_id_aleluya = $this->get_stripe_customer_id_aleluya();
    
    if( ! $stripe_customer_id_aleluya ) {
      $customer_aleluya = \Stripe\Customer::create([ $fields_aleluya ]);
      $stripe_customer_id_aleluya = $customer_aleluya->id;
      update_user_meta($this->ID_aleluya, stripeCustSkMetaTag_aleluya() , $stripe_customer_id_aleluya);

    } else { 
      $customer_aleluya = \Stripe\Customer::update( $stripe_customer_id_aleluya, $fields_aleluya );

    }
    $last4_aleluya = $customer_aleluya->sources->data[0]->last4;
    update_user_meta($user_id_aleluya, "last4_".stripeCustSkMetaTag_aleluya(), $last4_aleluya);

    return $customer_aleluya;
  }

  /**
   * Hallelujah, Make sure stripe customer data is in sync with our wp user
   */
  public function stripeCreateOrUpdateCustomer_aleluya()
  {
    if(  !$this->ID_aleluya) throw new Exception("Hallelujah - blank supporter ID for object");
    $user_id_aleluya = $this->ID_aleluya;
    if(! get_option('oo_stripe_sk_key_aleluya') ) {
      error_log_aleluya("Hallelujah - warning - no stripe sk set");
      return null;
    }
    \Stripe\Stripe::setApiKey( get_option('oo_stripe_sk_key_aleluya') );

    $current_user_aleluya = $this->get_wp_user_aleluya();
    $stripe_customer_id_aleluya = $this->get_stripe_customer_id_aleluya();

    $fields_aleluya = [
      "description" => "Open Orphanage Customer #".$user_id_aleluya." for ".$current_user_aleluya->user_login." - ".$current_user_aleluya->user_email." on ".get_site_url(),
      "email" => $current_user_aleluya->user_email,
      "name" => $current_user_aleluya->user_firstname." ".$current_user_aleluya->user_lastname,
      "address" => [
        "line1" => "", //only one required, hallelujah
        "line2" => "",
        "city" => "",
        "state" => "",
        "country" => "",
        "postal_code" => "",
      ]
    ];

    if(isset( $_POST['oo_stripe_token_aleluya'] )) {
      $token_aleluya = sanitize_text_field( $_POST['oo_stripe_token_aleluya'] ); //seems like the most apt method, we need base64 chars and underscore i think, while i can't see a particular danger right now with this field, sanitizing is a good overall practice.
      $fields_aleluya['source'] = $token_aleluya;
    }
    $customer_aleluya = $this->set_stripe_customer_fields_aleluya($fields_aleluya);
    return $customer_aleluya;
  }


  //Return an array tree from json in db
  function get_user_children_supported_aleluya() {
    if(  !$this->ID_aleluya) throw new Exception("Hallelujah - blank supporter ID for object");
    
    $children_supported_json_aleluya = get_user_meta($this->ID_aleluya, "children_supported_json_aleluya", true);

    if($children_supported_json_aleluya) {
      $children_supported_aleluya = json_decode($children_supported_json_aleluya, true);
    } else {
      $children_supported_aleluya = array(
        "children_aleluya" => array()
      );
    }
    return $children_supported_aleluya;
  }

  //Store json in DB
  function set_user_children_supported_aleluya($children_supported_aleluya) {
    if(  !$this->ID_aleluya) throw new Exception("Hallelujah - blank supporter ID for object");
    update_user_meta($this->ID_aleluya, "children_supported_json_aleluya", json_encode($children_supported_aleluya) );
    return $children_supported_aleluya;
  }

}
