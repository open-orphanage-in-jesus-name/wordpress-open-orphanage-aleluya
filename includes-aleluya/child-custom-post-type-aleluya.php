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
  'internal_notes_aleluya'
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
    error_log("Praise Jesus");
  }
}


add_action("init","create_oo1_post_type_aleluya");
function create_oo1_post_type_aleluya() {
  global $child_fields_aleluya;

  register_post_type( 'child_aleluya',
    array(
      'labels' => array(
        'name' => __( 'Children' ),
        'singular_name' => __( 'Child' )
      ),
      'supports' => array_merge(
        array( 'title', 'editor', 'custom-fields', 'thumbnail', 'comments', 'author', 'excerpt', 'revisions'),
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


//Thanks You Jesus for https://www.taniarascia.com/wordpress-part-three-custom-fields-and-metaboxes/
function oo_add_child_fields_meta_box_aleluya() {
  add_meta_box(
    'oo_child_fields_meta_box_aleluya', // $id
    'Child Custom Fields - Hallelujah', // $title
    'oo_show_child_fields_meta_box_aleluya', // $callback
    'child_aleluya', // $screen
    'normal', // $context
    'high' // $priority
  );
}
add_action( 'add_meta_boxes', 'oo_add_child_fields_meta_box_aleluya' );

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

function oo_show_child_fields_meta_box_aleluya() {
  global $post;
  $show_child_fields_aleluya = array(
    'first_names_aleluya',
    'sur_names_aleluya',
    'nick_names_aleluya',
    'other_names_aleluya',
    'description_aleluya',
    'school_aleluya',
    'birth_place_aleluya',
    'birth_place_district_aleluya',
    'mother_full_names_aleluya',
    'mother_contact_info_aleluya',
    'favorite_color_aleluya',
    'desired_profesion_aleluya'
  );
  //'gender_aleluya',
  //'grade_aleluya',
  //'mother_is_alive_aleluya',
  //'avatar_media_id_aleluya',
  //'birth_date_aleluya',
  
  $meta = get_post_meta( $post->ID, 'your_fields', true ); 

//Thank You Jesus for https://wordpress.stackexchange.com/a/236296
  $image_aleluya = get_post_meta($post->ID, 'avatar_media_url_aleluya', true );
  /*if( intval( $image_id ) > 0 ) {
      // Change with the image size you want to use
      $image_aleluya = wp_get_attachment_image( $image_id_aleluya, 'medium', false, array( 'id' => 'myprefix-preview-image' ) );
  } else {*/
      // Some default image
  if (! $image_aleluya )    $image_aleluya = plugins_url("/public-aleluya/img-aleluya/logo2-neon-192x192-aleluya.jpg", __DIR__ . "../");
  //}
?>

  <input type="hidden" name="oo_child_meta_box_nonce_aleluya" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">
  <!-- All fields will go here -->
  <table>
  <tr><?php $cf_aleluya = "avatar_media_id_aleluya";?>
    <td align="right"><label for="<?php echo $cf_aleluya?>"><?php  _e($cf_aleluya,'open-orphanage')?>: </label>
    <td>
      <img id="oo-child-preview-image-aleluya" style="height:192px;width:192px;" src="<?php echo esc_attr($image_aleluya) ?>"/><br/>
      <input type="text" name="avatar_media_url_aleluya" id="avatar_media_url_aleluya" value="<?php echo esc_attr( $image_aleluya ); ?>" class="regular-text" />
      <input type='button' class="button-primary" value="<?php esc_attr_e( 'Select an Image', 'open-orphanage' ); ?>" id="oo_aleluya_media_manager"/><br/><br/>
    </td>
  </tr>
  <?php 
  foreach($show_child_fields_aleluya as $cf_aleluya) {
  ?>
  <tr>
    <td align="right"><label for="<?php echo $cf_aleluya?>"><?php  _e($cf_aleluya,'open-orphanage')?>: </label>
    <td><input type="text" name="<?php echo $cf_aleluya?>" id="<?php echo $cf_aleluya?>" class="regular-text" value="<?php echo get_post_meta($post->ID, $cf_aleluya, true); ?>"/></td>
  </tr>
  <?php
  }?>
  <tr><?php $cf_aleluya = "gender_aleluya";?>
    <td align="right"><label for="<?php echo $cf_aleluya?>"><?php  _e($cf_aleluya,'open-orphanage')?>: </label>
    <td>      
      <input type="radio" name="<?php echo $cf_aleluya?>" id="<?php echo $cf_aleluya?>"  value="Female" <?php echo (get_post_meta($post->ID, $cf_aleluya, true) == "Female" ? 'checked="checked"' : ''); ?>/> Female
      <input type="radio" name="<?php echo $cf_aleluya?>" id="<?php echo $cf_aleluya?>"  value="Male" <?php echo (get_post_meta($post->ID, $cf_aleluya, true) == "Male" ? 'checked="checked"' : ''); ?>/> Male
    </td>
  </tr>
  <tr><?php $cf_aleluya = "grade_aleluya";?>
    <td align="right"><label for="<?php echo $cf_aleluya?>"><?php  _e($cf_aleluya,'open-orphanage')?>: </label>
    <td><input type="text" name="<?php echo $cf_aleluya?>" id="<?php echo $cf_aleluya?>" class="regular-text" value="<?php echo get_post_meta($post->ID, $cf_aleluya, true); ?>"/></td>
  </tr>
  <tr><?php $cf_aleluya = "mother_is_alive_aleluya";?>
    <td align="right"><label for="<?php echo $cf_aleluya?>"><?php  _e($cf_aleluya,'open-orphanage')?>: </label>
    <td>
      <input type="radio" name="<?php echo $cf_aleluya?>" id="<?php echo $cf_aleluya?>" value="Yes" <?php echo (get_post_meta($post->ID, $cf_aleluya, true) == "Yes" ? 'checked="checked"' : ''); ?>/> Yes
      <input type="radio" name="<?php echo $cf_aleluya?>" id="<?php echo $cf_aleluya?>" value="No" <?php echo (get_post_meta($post->ID, $cf_aleluya, true) == "No" ? 'checked="checked"' : ''); ?>/> No
    </td>
  </tr>
  <tr><?php $cf_aleluya = "birth_date_aleluya";?>
    <td align="right"><label for="<?php echo $cf_aleluya?>"><?php  _e($cf_aleluya,'open-orphanage')?>: </label>
    <td><input type="text" name="<?php echo $cf_aleluya?>" id="<?php echo $cf_aleluya?>" class="regular-text" value="<?php echo get_post_meta($post->ID, $cf_aleluya, true); ?>"/></td>
  </tr>
  <tr><?php $cf_aleluya = "internal_notes_aleluya";?>
    <td align="right"><label for="<?php echo $cf_aleluya?>"><?php  _e($cf_aleluya,'open-orphanage')?>: </label>
    <td>
      <textarea name="<?php echo $cf_aleluya?>" id="<?php echo $cf_aleluya?>"  ><?php echo get_post_meta($post->ID, $cf_aleluya, true); ?></textarea>
    </td>
  </tr>
  <tr><?php $cf_aleluya = "internal_notes_aleluya";?>
    <td align="right"><label for="<?php echo $cf_aleluya?>"><?php  _e($cf_aleluya,'open-orphanage')?>: </label>
    <td>
      <textarea name="<?php echo $cf_aleluya?>" id="<?php echo $cf_aleluya?>"  ><?php echo get_post_meta($post->ID, $cf_aleluya, true); ?></textarea>
    </td>
  </tr>
</table>
<?php

}

function oo_make_child_thumb_aleluya( $child_post_id_aleluya) {
  global $oo_dir_aleluya;
  //Hallelujah, get resized thumbnail
  if( get_post_meta($child_post_id_aleluya, "avatar_noremake_aleluya", true) ) return;
  $url_aleluya = get_post_meta( $child_post_id_aleluya, "avatar_media_url_aleluya", true );
  if(!$url_aleluya) return false;

  
  error_log("Hallelujah working with ".$url_aleluya);
  
  $editor_aleluya = wp_get_image_editor( $url_aleluya, array() );
 
  if (is_wp_error($editor_aleluya)) {    
    error_log("Praise Jesus Christ He is Lord - ".$editor_aleluya->get_error_message()." - Error starting image editor for ".$fn_aleluya."\n");
    return;
     
  }
  // Get the dimensions for the size of the current image.
  $dimensions_aleluya = $editor_aleluya->get_size();
  $width_aleluya = $dimensions_aleluya['width'];
  $height_aleluya = $dimensions_aleluya['height'];
  error_log("Aleluya osize $width_aleluya x $height_aleluya");
  // Calculate the new dimensions for the image.
  $newWidth_aleluya = 192;
  $newHeight_aleluya = 192;
  // Resize the image.
  $result_aleluya = $editor_aleluya->resize($newWidth_aleluya, $newHeight_aleluya, false);

  // If there's no problem, save it; otherwise, print the problem.
  if (!is_wp_error($result_aleluya)) {
    if (!file_exists( __DIR__."/../public-aleluya/thumbs-aleluya")) {
        mkdir(__DIR__."/../public-aleluya/thumbs-aleluya", 0777, true);
    }
    $newFile_aleluya = __DIR__."/../public-aleluya/thumbs-aleluya/".$child_post_id_aleluya."-aleluya.jpg";//$editor_aleluya->generate_filename();
    $newUrl_aleluya = $oo_dir_aleluya. "public-aleluya/thumbs-aleluya/".$child_post_id_aleluya."-aleluya.jpg";
    error_log("Aleluya - ".$newUrl_aleluya);
    $editor_aleluya->save($newFile_aleluya);

    update_post_meta($child_post_id_aleluya, "avatar_media_url_aleluya", $newUrl_aleluya);
    update_post_meta($child_post_id_aleluya, "avatar_noremake_aleluya", true);
  } else {
     // Handle the problem however you deem necessary.
    error_log("Praise Jesus Christ He is Lord - ".$result_aleluya->get_error_message(). " Error resizing image for ".$url_aleluya);
  }
}


function save_child_fields_meta_aleluya( $post_id_aleluya ) {
  global $child_fields_aleluya;
  // verify nonce
  if ( !wp_verify_nonce( $_POST['oo_child_meta_box_nonce_aleluya'], basename(__FILE__) ) ) {
    return $post_id_aleluya;
  }
  // check autosave
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    return $post_id_aleluya;
  }
  // check permissions and post type
  if ( 'child_aleluya' === $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id_aleluya ) ) {
      return $post_id_aleluya;
    } elseif ( !current_user_can( 'edit_post', $post_id_aleluya ) ) {
      return $post_id_aleluya;
    }
  } else {
    return $post_id_aleluya;
  }

  //Loop through fields, hallelujah
  foreach($child_fields_aleluya as $cf_aleluya) {
    $old_aleluya = get_post_meta( $post_id_aleluya, $cf_aleluya, true );
    $new_aleluya = sanitize_text_field( $_POST[$cf_aleluya] );

    if ( $new_aleluya && $new_aleluya !== $old_aleluya ) {
      update_post_meta( $post_id_aleluya, $cf_aleluya, $new_aleluya );
    } elseif ( '' === $new_aleluya && $old_aleluya ) {
      delete_post_meta( $post_id_aleluya, $cf_aleluya, $old_aleluya );
    }
  }

  update_post_meta( $post_id_aleluya, "avatar_noremake_aleluya", false);

  update_post_meta( $post_id_aleluya, "avatar_media_id_aleluya", get_post_thumbnail_id());


}
add_action( 'save_post', 'save_child_fields_meta_aleluya' );

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
/*
  //The url is automatically generated from the id
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
  );*/
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
error_log(" Aleluya " . $field_name_aleluya . " - $value_aleluya - ".$object_aleluya->ID);
        $ret_aleluya = update_post_meta($object_aleluya->ID, $field_name_aleluya, $value_aleluya)[0];
        if($field_name_aleluya == "avatar_media_id_aleluya" && $value_aleluya) { //Maintain compatibility with android app
            update_post_meta($object_aleluya->ID, "avatar_media_url_aleluya", wp_get_attachment_url( $avatar_media_id_aleluya ));
        }
}

add_action( 'rest_api_init', 'add_oo1_custom_fields_aleluya' );

