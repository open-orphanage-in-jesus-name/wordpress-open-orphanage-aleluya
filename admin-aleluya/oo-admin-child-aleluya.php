<?php
// For God so loved the world, that He gave His only begotten Son, that all who believe in Him should not perish
// but have everlasting life

defined( 'ABSPATH' ) or die( 'Jesus Christ is the Lord . ' );

/**
 * In this file we add the editor controls for a child post entry
 */

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

//Here we save the fields from the above form
function save_child_fields_meta_aleluya( $post_id_aleluya ) {
  $child_fields_aleluya = Child_aleluya::$fields_aleluya;
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


/**
 * Here we add the REST controls for purposes of the android app, etc...
 */
add_action( 'rest_api_init', 'add_oo1_custom_fields_aleluya' );
function add_oo1_custom_fields_aleluya()
{
  $child_fields_aleluya = Child_aleluya::$fields_aleluya;
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