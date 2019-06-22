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



// Hallelujah, functional shortcut
function oo_make_child_thumb_aleluya( $child_post_id_aleluya) {
  $curChild_aleluya = new Child_aleluya($child_post_id_aleluya);
  $curChild_aleluya->make_child_thumb_aleluya();
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

/**
 * Show the statistics of a child in a table like format, meant for the full width of a post
 **/

function oo_child_pagestats_htmlstr_aleluya($id_aleluya) {
  global $public_child_fields_aleluya,$oo_upload_url_aleluya;
  $newUrl_aleluya = $oo_upload_url_aleluya."thumbs-aleluya/".$id_aleluya."-512x512-aleluya.jpg";
  $nick_names_aleluya  = get_post_meta($id_aleluya, "nick_names_aleluya", true);
  $description_aleluya = get_post_meta($id_aleluya, "description_aleluya", true);
  $morelink_aleluya    = esc_url(get_post_permalink($id_aleluya));
  oo_make_child_thumb_aleluya($id_aleluya);

  ob_start(); // Since we return a string
  ?>


  <div class='oo_child_pagestats' align='center'>
    <div class="child_img_holder_aleluya" align="center" style="width:45%;min-width:256px;min-height:256px;background: url(<?php echo  $newUrl_aleluya ?>);">&nbsp;</div>
    <table style="display:block-inline;max-width:45%;min-width:256px;">
        <tr><td colspan='2' class='name_aleluya' align="center"> <?php echo  $nick_names_aleluya ?> </td></tr>
        <tr><td align='center'>
          <div class='oo_child_desc_aleluya'>
           
              <div class="child_description_aleluya" > <?php echo  $description_aleluya ?></div><br/>
              <div class="show_content" align="center"><button class="btn btn-primary" onclick="window.oo_aleluya.sponsor_button_clicked_aleluya(<?php echo $id_aleluya ?>);">Sponsor this Child</button></div>
           
          </div>
        </tr></td>
        <tr><td align='center'>
          <table class='oo_child_meta_aleluya'>
<?php
    foreach($public_child_fields_aleluya as $cf_aleluya => $cf_desc_aleluya) {
      $cf_val_aleluya = get_post_meta($id_aleluya, $cf_aleluya)[0];
      ?>      
        <tr><td class='label_aleluya'><?php echo $cf_desc_aleluya ?>: </td><td class='content_aleluya'>
          <?php echo $cf_val_aleluya ?>
        </td></tr>
<?php
    }
  $bd_val_aleluya = get_post_meta($id_aleluya, "birth_date_aleluya")[0] . "";
  $bd_date_aleluya = DateTime::createFromFormat('Y/n/j', $bd_val_aleluya);
  $now_aleluya    = new DateTime();

  $age_aleluya   = $bd_date_aleluya ? $now_aleluya->diff($bd_date_aleluya) : "";

  ?>
      <tr><td class='label_aleluya'>Age: </td><td class='content_aleluya'> <?php echo $age_aleluya->y ?></td></tr>
      </table>
    </tr></td>
    </table>
    
  </div>
<?php
  $str_aleluya = ob_get_contents(); 
  ob_end_clean();
  return $str_aleluya;


}



/**
 * Hallelujah, modify the content of child_aleluya custom posts, after the header
 **/
//Thank You Jesus for https://www.wpbeginner.com/wp-tutorials/how-add-signature-ads-post-content-wordpress/
function oo_after_child_post_content_aleluya($in_content_aleluya){
    //if (is_single()) {
    if( get_post_type() == "child_aleluya" ) {
      $nick_names_aleluya   = get_post_meta( get_the_ID(), "nick_names_aleluya", true );

    error_log_aleluya("Praise Jesus - ".get_the_ID());
      //$fin_content_aleluya = oo_child_register_js_aleluya().'<button  class="btn btn-primary" onclick="oo_sponsor_button_clicked_aleluya(' .get_the_ID(). ');">Sponsor this Child</button>';

      $fin_content_aleluya = oo_child_register_js_aleluya();
      $fin_content_aleluya .= oo_donation_block_shortcode_aleluya_func( array( "heading_aleluya" => "p", "expandable_aleluya" => "yes", "purpose_aleluya" => $nick_names_aleluya ) );
      $fin_content_aleluya .= oo_child_pagestats_htmlstr_aleluya(get_the_ID());

      return $fin_content_aleluya . $in_content_aleluya;
    } else {
      return $in_content_aleluya;
    }

}
add_filter( "the_content", "oo_after_child_post_content_aleluya" );


