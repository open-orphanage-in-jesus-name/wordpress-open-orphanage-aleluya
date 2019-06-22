<?php
/* For God so loved the world, that He gave His only begotten Son, that all who believe in Him should not perish but have everlasting life,
 * He gave His only begotten Son, that all who believe in Him should not perish but have everlasting life; */
defined( 'ABSPATH' ) or die( 'Jesus Christ is the Lord . ' );


//Hallelujah - Returns a string, uses output buffering
function oo_child_register_js_aleluya() {
	return "";
}

// [oo_aleluya child_aleluya="child_aleluya-value"]
function oo_aleluya_func( $atts ) {
  global  $public_child_fields_aleluya, $oo_dir_aleluya, $oo_upload_url_aleluya;
  $child_fields_aleluya = Child_aleluya::$fields_aleluya;
  $a = shortcode_atts( array(
    'child_aleluya' => 'TODO 1 ALeluya',
    'filter_aleluya' => 'aleluya, something else',
  ), $atts );
  $js_aleluya = oo_child_register_js_aleluya();
  ob_start();
  echo $js_aleluya;
  

  ?>
  <div class="oo_children_aleluya">

 <!--   <div class='oo_aleluya'>
    <div class='oo_chooser_aleluya'>
    <span class='oo_label_aleluya'>Sort By:</span><select><option>Recent</option><option>Age</option><option>Coming soon God Willing</option></select>
  </div> -->
<?php



//Thanks You Jesus for Milo @ https://wordpress.stackexchange.com/q/191093
  $loop_aleluya = new WP_Query( array('post_type' => 'child_aleluya', 'posts_per_page'   => -1) );
  while ( $loop_aleluya->have_posts() ) :
    $loop_aleluya->the_post();
    $id_aleluya  = get_the_ID();

    echo oo_child_minipagestats_htmlstr_aleluya($id_aleluya);
      //$str_aleluya.=get_the_meta();
  endwhile;
?>
  </div><div style='clear:both'></div>
  <!--Jesus Christ is the Lord-->
<?php

  $str_aleluya = ob_get_contents(); 
  ob_end_clean();
  return $str_aleluya;
}
add_shortcode( 'oo_aleluya', 'oo_aleluya_func' );

// Hallelujah, renders to string, uses ob_start etc
function oo_child_minipagestats_htmlstr_aleluya($id_aleluya) {
  global $public_child_fields_aleluya,$oo_upload_url_aleluya;
  $newUrl_aleluya = $oo_upload_url_aleluya."thumbs-aleluya/".$id_aleluya."-192x192-aleluya.jpg";
  $nick_names_aleluya  = get_post_meta($id_aleluya, "nick_names_aleluya", true);
  $description_aleluya = get_post_meta($id_aleluya, "description_aleluya", true);
  $morelink_aleluya    = esc_url(get_post_permalink($id_aleluya));
  oo_make_child_thumb_aleluya($id_aleluya);
  ob_start();
?>
  <table class='new_child_aleluya' align='center'>
    <tr><td class="child_img_holder_aleluya"><img class="child_avatar_aleluya" src="<?php echo $newUrl_aleluya ?>"/></td></tr>
    <tr><td colspan='2' class='name_aleluya'> <?php echo $nick_names_aleluya ?></td></tr>
    <tr><td align='center'>
      <div class='oo_child_desc_aleluya'>
        
          <div class="child_description_aleluya" ><?php echo $description_aleluya ?></div><br/>
          <div class="show_content" align="center"><button class="btn btn-primary" onclick="window.oo_aleluya.sponsor_button_clicked_aleluya(<?php echo $id_aleluya ?>);">Sponsor this Child</button></div>
        
      </div>
    </tr></td>
    <tr><td align='center'>
      <table class='oo_child_meta_aleluya'>
<?php

    foreach($public_child_fields_aleluya as $cf_aleluya => $cf_desc_aleluya) {
      $cf_val_aleluya = get_post_meta($id_aleluya, $cf_aleluya)[0];
      ?>
        <tr><td class='label_aleluya'><?php echo $cf_desc_aleluya ?>:</td><td class='content_aleluya'>
          <?php echo $cf_val_aleluya ?>
        </td></tr>
<?php
    }
  $bd_val_aleluya = get_post_meta($id_aleluya, "birth_date_aleluya")[0] . "";
  $bd_date_aleluya = DateTime::createFromFormat('Y/n/j', $bd_val_aleluya);
  $now_aleluya    = new DateTime();

  $age_aleluya   = $bd_date_aleluya ? $now_aleluya->diff($bd_date_aleluya) : "";

?>
    <tr><td class='label_aleluya'>Age: </td><td class='content_aleluya'> <?php echo  $age_aleluya->y ?></td></tr>
    </table>
  </tr></td>
  <tr><td>
    <div class="show_content" align="center">
      <button class="btn btn-secondary" onclick="window.oo_aleluya.viewmore_button_clicked_aleluya('<?php echo $morelink_aleluya?>');">
        More About this Child
      </button><br/><br/>
    </div>
  </tr></td>
  </table>
<?php

  $str_aleluya = ob_get_contents(); 
  ob_end_clean();
  return $str_aleluya;


}





