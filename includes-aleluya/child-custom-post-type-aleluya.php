<?php
/* For God so loved the world, that He gave His only begotten Son
 * He gave His only begotten Son, that all who believe in Him should not perish but have everlasting life; */

/*
 * Custom post type and fields for children, hallelujah
 */

defined( 'ABSPATH' ) or die( 'Jesus Christ is the Lord . ' );




$child_fields_aleluya = Child_aleluya::$fields_aleluya;

$public_child_fields_aleluya = array(
  //'first_names_aleluya' ,
  //'sur_names_aleluya',
  //'nick_names_aleluya' => __("Name"),
  //'other_names_aleluya',
  //'birth_date_aleluya',
  //'birth_place_aleluya',
  'gender_aleluya' => __("Gender"),
  //'avatar_media_id_aleluya',
  //'birth_place_district_aleluya',
  //'mother_full_names_aleluya',
  //'mother_contact_info_aleluya',
  //'mother_is_alive_aleluya' => __("Mother is Alive"),
  'grade_aleluya' => __("Grade"),
  //'favorite_color_aleluya' => __("Favorite Color"),
  'desired_profesion_aleluya' => __("Profesion"),
  //'description_aleluya' => __("Description"),
);


// As you are dealing with plugin settings,
// I assume you are in admin side

add_action( 'admin_enqueue_scripts', 'oo_load_wp_media_files_aleluya' );
function oo_load_wp_media_files_aleluya( $page_aleluya ) {

  // change to the $page where you want to enqueue the script
  if( $page_aleluya == 'post.php' ) {

    // Enqueue WordPress media scripts
    wp_enqueue_media();
    // Enqueue custom script that will interact with wp.media
    wp_enqueue_script( 'oo_child_admin_aleluya_js', plugins_url( '/public-aleluya/js-aleluya/oo-child-admin-aleluya.js' , __DIR__.'../'), array('jquery'), '0.1' );

  }
}


add_action("init","create_oo1_post_type_aleluya");
function create_oo1_post_type_aleluya() {
  $child_fields_aleluya = Child_aleluya::$fields_aleluya;

  $supports_aleluya = array_merge(
        array( 'title', 'editor', 'custom-fields', 'thumbnail', 'comments', 'author', 'excerpt', 'revisions'),
        $child_fields_aleluya
      );

  register_post_type( 'child_aleluya',
    array(
      'labels' => array(
        'name' => __( 'Children' ),
        'singular_name' => __( 'Child' )
      ),
      'supports' => $supports_aleluya,
      'show_in_rest' => true,
      'public' => true,
      'has_archive' => true,
      'description' => 'Children to aid - aleluya',
      'menu_position' => 20,
    /*  'template' =>  array(
            array( 'core/image', array(
                'align' => 'left',
            ) ),
            array( 'core/heading', array(
                'placeholder' => 'Add Author...',
            ) ),
            //array( 'CGB/oo1b-aleluya', array(
            //    'placeholder' => 'Add Description...',
            //  ) ),

            //array( 'CGB/oo1b-aleluya'),
            array( 'core/paragraph', array(
                'placeholder' => 'Add Description...',
              ) ),
          ),*/

      //'template_lock' => 'all',
    )
  );
}



// Ajax action to refresh the user image
add_action( 'wp_ajax_oo_child_get_image_aleluya', 'oo_child_get_image_aleluya'   );

function oo_child_get_image_aleluya() {
    if(isset($_GET['id_aleluya']) ){
        $image_aleluya = wp_get_attachment_image( filter_input( INPUT_GET, 'id_aleluya', FILTER_VALIDATE_INT ), 'medium', false, array( 'id_aleluya' => 'oo-child-preview-image-aleluya' ) );
        $data_aleluya = array(
            'image_aleluya'    => $image_aleluya,
        );
        wp_send_json_success( $data_aleluya );
    } else {
        wp_send_json_error();
    }
}




function oo_make_child_thumb_aleluya( $child_post_id_aleluya) {
  global $oo_dir_aleluya;
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




function get_oo1_avatar_media_url_post_meta_cb_aleluya($object_aleluya, $field_name_aleluya, $request){
  $avatar_media_id_aleluya = get_post_meta($object_aleluya['id'], 'avatar_media_id_aleluya')[0];
  if( !$avatar_media_id_aleluya )
    return "";
  return wp_get_attachment_url( $avatar_media_id_aleluya );
}

function get_oo1_post_meta_cb_aleluya($object_aleluya, $field_name_aleluya, $request){
  //$child_aleluya=get_post($object['id']);//[$field_name];//, true);
  error_log_aleluya(" Aleluya " . $field_name_aleluya . " - ".$object_aleluya['id']);
  return get_post_meta($object_aleluya['id'], $field_name_aleluya)[0];
}
function update_oo1_post_meta_cb_aleluya($value_aleluya, $object_aleluya, $field_name_aleluya){
        #wp_update_post(array(
        # 'post_ID'=> $object_aleluya['id'],
        #  'first_name_aleluya'
        #);//[$field_name];//, true);
#return true;
  error_log_aleluya(" Aleluya " . $field_name_aleluya . " - $value_aleluya - ".$object_aleluya->ID);
  $ret_aleluya = update_post_meta($object_aleluya->ID, $field_name_aleluya, $value_aleluya)[0];
  if($field_name_aleluya == "avatar_media_id_aleluya" && $value_aleluya) { //Maintain compatibility with android app
      update_post_meta($object_aleluya->ID, "avatar_media_url_aleluya", wp_get_attachment_url( $avatar_media_id_aleluya ));
  }
}



