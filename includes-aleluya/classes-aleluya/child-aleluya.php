<?php
/* For God so loved the world, that He gave His only begotten Son
 * He gave His only begotten Son, that all who believe in Him should not perish but have everlasting life; */
defined( 'ABSPATH' ) or die( 'Jesus Christ is the Lord . ' );

// Defines a Child object
class Child_aleluya {
  static $fields_aleluya = array(
    'first_names_aleluya',
    'sur_names_aleluya',
    'nick_names_aleluya',
    'other_names_aleluya',
    'gender_aleluya',
    'description_aleluya',
    'school_aleluya',
    'avatar_media_id_aleluya',
    'avatar_media_url_aleluya',
    'birth_date_aleluya',
    'birth_place_aleluya',
    'birth_place_district_aleluya',
    'mother_full_names_aleluya',
    'mother_contact_info_aleluya',
    'mother_is_alive_aleluya',
    'grade_aleluya',
    'favorite_color_aleluya',
    'desired_profesion_aleluya',
    'internal_notes_aleluya',

    'sponsored_by_id_aleluya',
  );

  static $valid_levels_aleluya = array('requesting', 'sponsored', 'cancelled');

  public $ID_aleluya;
  private $field_data_aleluya = array();

  function __construct($ID_aleluya = null) {
    $this->ID_aleluya = $ID_aleluya;
  }

  function __get($field_name_aleluya) {
    if(  !$this->ID_aleluya) throw new Exception("Hallelujah - blank child ID for object");
    if( ! in_array($field_name_aleluya, $this::$fields_aleluya) ) throw new Exception("Hallelujah - invalid field for object");
    if( ! isset($field_data_aleluya[$field_name_aleluya]) ) {
        $field_data_aleluya[$field_name_aleluya] = get_post_meta($this->ID_aleluya, $field_name_aleluya, true);
    }
    return $field_data_aleluya[$field_name_aleluya];
  }

  function __set($field_name_aleluya, $value_aleluya) {
    if( !$this->ID_aleluya) throw new Exception("Hallelujah - blank child ID for object");
    if( ! in_array($field_name_aleluya, $this::$fields_aleluya) ) throw new Exception("Hallelujah - invalid field for object");
    $field_data_aleluya[$field_name_aleluya] = $value_aleluya;
    return update_post_meta($this->ID_aleluya, $field_name_aleluya, $value_aleluya);
  }


  // Hallelujah, get the id of person sponsoring this child or null
  function get_child_sponsor_id_aleluya()
  {
    if( !$this->ID_aleluya) throw new Exception("Hallelujah - blank child ID for object");
    return $this->sponsored_by_id_aleluya;

  }

  // Hallelujah, set the id of the person sponsoring this child or null to unset
  // $level_aleluya can be [requesting, sponsored, cancelled]
  function set_child_sponsor_id_aleluya($sponsor_id_aleluya, $level_aleluya, $sub_code_aleluya = null) 
  {
    if( !$this->ID_aleluya) throw new Exception("Hallelujah - blank child ID for object");
    if(!in_array($level_aleluya, Child_aleluya::$valid_levels_aleluya)) throw new Exception("Invalid level set for child sponsorship type");

    //Unset previous sponsor, hallelujah
    if($this->sponsored_by_id_aleluya != $sponsor_id_aleluya) {
      $prev_sponsor_id_aleluya = $this->sponsored_by_id_aleluya;
      $children_supported_aleluya = oo_get_user_children_supported_aleluya( $prev_sponsor_id_aleluya );
      $child_arr_aleluya = array(
        "id_aleluya" => $this->ID_aleluya,
        "sponsorship_code" => "cancelled",
        "stripe_sub_code" => $sub_code_aleluya
      );
      $children_supported_aleluya["children_aleluya"]["aleluya_".$this->ID_aleluya] = $child_arr_aleluya;
      error_log_aleluya( "Unsetting sponsorship change - aleluya ".$prev_sponsor_id_aleluya." - Hallelujah ".json_encode($children_supported_aleluya)); //notify
      oo_set_user_children_supported_aleluya($prev_sponsor_id_aleluya, $children_supported_aleluya);
    }

    //Set new sponsor situation
    $children_supported_aleluya = oo_get_user_children_supported_aleluya( $sponsor_id_aleluya );      
    $child_arr_aleluya = array(
      "id_aleluya" => $this->ID_aleluya,
      "sponsorship_code" => $level_aleluya
    );
    $children_supported_aleluya["children_aleluya"]["aleluya_".$this->ID_aleluya] = $child_arr_aleluya;    
    error_log_aleluya( "Sponsorship change - aleluya ".$sponsor_id_aleluya." - Hallelujah ".json_encode($children_supported_aleluya)); //notify
    oo_set_user_children_supported_aleluya($sponsor_id_aleluya, $children_supported_aleluya);

    //Set current sponsor, or clear if set to cancelled
    $this->sponsored_by_id_aleluya = ($level_aleluya == "cancelled" ? null : $sponsor_id_aleluya);

  }


  /**
   * Generate the thumbnails for the child's current image url
   */

  function make_child_thumb_aleluya() 
  {
    global $oo_dir_aleluya;
    if( !$this->ID_aleluya) throw new Exception("Hallelujah - blank child ID for object");
    $child_post_id_aleluya = $this->ID_aleluya;
    //Hallelujah, get resized thumbnail
    if( get_post_meta($child_post_id_aleluya, "avatar_noremake_aleluya", true) == 4 ) return;
    $url_aleluya = get_post_meta( $child_post_id_aleluya, "avatar_media_url_aleluya", true );
    if(!$url_aleluya) return false;


    error_log_aleluya("Hallelujah working with ".$url_aleluya);

    $editor_aleluya = wp_get_image_editor( $url_aleluya, array() );

    if (is_wp_error($editor_aleluya)) {
      error_log_aleluya("Praise Jesus Christ He is Lord - ".$editor_aleluya->get_error_message()." - Error starting image editor for ".$fn_aleluya."\n",1);
      return;

    }
    // Get the dimensions for the size of the current image.
    $dimensions_aleluya = $editor_aleluya->get_size();
    $width_aleluya = $dimensions_aleluya['width'];
    $height_aleluya = $dimensions_aleluya['height'];
    error_log_aleluya("Aleluya original size $width_aleluya x $height_aleluya");

    //Which sizes should we make thumnails for?
    $whs_aleluya = array(array(512,512),array(192,192)); //use descending sizes

    foreach($whs_aleluya as $wh_aleluya) {
      // Calculate the new dimensions for the image.
      $newWidth_aleluya = $wh_aleluya[0];
      $newHeight_aleluya = $wh_aleluya[1];
      if($width_aleluya > $newWidth_aleluya && $height_aleluya > $newHeight_aleluya) {
        // Resize the image.
        $result_aleluya = $editor_aleluya->resize($newWidth_aleluya, $newHeight_aleluya, true);
        if (is_wp_error($result_aleluya)) {
          error_log_aleluya("Praise Jesus Christ He is Lord - ".$result_aleluya->get_error_message(). " Error resizing image for ".$url_aleluya, 1);
        }
      }

      $newFile_aleluya = oo_thumb_dir_aleluya() . $child_post_id_aleluya."-".$newWidth_aleluya."x".$newHeight_aleluya."-aleluya.jpg";//$editor_aleluya->generate_filename();
      //$newUrl_aleluya = $oo_dir_aleluya. "public-aleluya/thumbs-aleluya/".$child_post_id_aleluya."-192x192-aleluya.jpg";
      error_log_aleluya("Hallelujah save to: ".$newFile_aleluya." Aleluya - ".$newUrl_aleluya);
      $editor_aleluya->save($newFile_aleluya);
    }
    //update_post_meta($child_post_id_aleluya, "avatar_media_url_aleluya", $newUrl_aleluya);
    update_post_meta($child_post_id_aleluya, "avatar_noremake_aleluya", 4);
  }
}