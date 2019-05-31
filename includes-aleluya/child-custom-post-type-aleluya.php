<?php
/* For God so loved the world, that He gave His only begotten Son
 * He gave His only begotten Son, that all who believe in Him should not perish but have everlasting life; */

/*
 * Custom post type and fields for children, hallelujah
 */

defined( 'ABSPATH' ) or die( 'Jesus Christ is the Lord . ' );


$child_fields_aleluya = array(
  'first_names_aleluya',
  'sur_names_aleluya',
  'nick_names_aleluya',
  'other_names_aleluya',
  'gender_aleluya',
  'description_aleluya',
  'school_aleluya',
  'avatar_media_id_aleluya',
  'birth_date_aleluya',
  'birth_place_aleluya',
  'birth_place_district_aleluya',
  'mother_full_names_aleluya',
  'mother_contact_info_aleluya',
  'mother_is_alive_aleluya',
  'grade_aleluya',
  'favorite_color_aleluya',
  'desired_profesion_aleluya',
);

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
function create_oo1_post_type_aleluya() {
  global $child_fields_aleluya;

  register_post_type( 'child_aleluya',
    array(
      'labels' => array(
        'name' => __( 'Children' ),
        'singular_name' => __( 'Child' )
      ),
      'supports' => array_merge(
        array( 'title', 'editor', 'custom-fields', 'thumbnail', 'comments', 'author', 'excerpt'),
        array_merge(
          $child_fields_aleluya,
          array("avatar_media_url_aleluya")
        )
      ),
      'show_in_rest' => true,
      'public' => true,
      'has_archive' => true,
      'description' => 'Children to aid - aleluya',
      'menu_position' => 20,
      'template' =>  array(
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
          ),

      //'template_lock' => 'all',
    )
  );
}

add_action( 'init', 'create_oo1_post_type_aleluya' );
function add_oo1_custom_fields_aleluya()
{
  global $child_fields_aleluya;
  $args_aleluya = array(
      'type' => 'string',
      'description' => 'First Names aleluya',
      'single' => true,
      'show_in_rest' => true,
    );

  foreach($child_fields_aleluya as $cf_aleluya) {
    register_meta( 'post', $cf_aleluya, $args_aleluya );
    register_meta( 'child_aleluya', $cf_aleluya, $args_aleluya );


    register_rest_field(
      'child_aleluya',
       $cf_aleluya,
      array(
          'get_callback'    => 'get_oo1_post_meta_cb_aleluya', // custom function name
          'update_callback' => 'update_oo1_post_meta_cb_aleluya', // custom function name
          'schema'          => array(
            'description' => __($cf_aleluya),
            'type' => 'string'
           )
      )
    );

  }
  register_meta( 'post', "avatar_media_url_aleluya", $args_aleluya );
  register_meta( 'child_aleluya', "avatar_media_url_aleluya", $args_aleluya );

  register_rest_field(
    'child_aleluya',
    'avatar_media_url_aleluya',
    array(
        'get_callback'    => 'get_oo1_avatar_media_url_post_meta_cb_aleluya', // custom function name
        'update_callback' => null, //'update_oo1_avatar_url_post_meta_cb_aleluya', // custom function name
        'schema'          => array(
          'description' => __("Avatar Url ALeluya"),
          'type' => 'string'
         )
    )
  );
}

function get_oo1_avatar_media_url_post_meta_cb_aleluya($object_aleluya, $field_name_aleluya, $request){
  error_log(" Aleluya " . $field_name_aleluya . " - ".$object_aleluya['id']);
  $avatar_media_id_aleluya = get_post_meta($object_aleluya['id'], 'avatar_media_id_aleluya')[0];
  if( !$avatar_media_id_aleluya )
    return "";
  return wp_get_attachment_url( $avatar_media_id_aleluya );
}

function get_oo1_post_meta_cb_aleluya($object_aleluya, $field_name_aleluya, $request){
        //$child_aleluya=get_post($object['id']);//[$field_name];//, true);
error_log(" Aleluya " . $field_name_aleluya . " - ".$object_aleluya['id']);
        return get_post_meta($object_aleluya['id'], $field_name_aleluya)[0];
}
function update_oo1_post_meta_cb_aleluya($value_aleluya, $object_aleluya, $field_name_aleluya){
        #wp_update_post(array(
        # 'post_ID'=> $object_aleluya['id'],
        #  'first_name_aleluya'
        #);//[$field_name];//, true);
#return true;
error_log(" ALeluya " . $field_name_aleluya . " - $value_aleluya - ".$object_aleluya->ID);
        return update_post_meta($object_aleluya->ID, $field_name_aleluya, $value_aleluya)[0];
}

add_action( 'rest_api_init', 'add_oo1_custom_fields_aleluya' );