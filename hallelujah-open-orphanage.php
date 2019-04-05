<?php
/*
Plugin Name:  ✝ Open Orphanage
Plugin URI:   https://openorphanage.org
Description:  Basic Open Source Orphanage Management - Currently used alongside https://play.google.com/store/apps/details?id=org.openorphanage.m1aleluya2
Version:      20190404
Author:       loveJesus in Jesus name
Author URI:   https://perffection.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  ooorg_aleluya
Domain Path:  /languages
*/

/* For God so loved the world, that He gave His only begotten Son
 * He gave His only begotten Son, that all who believe in Him should not perish but have everlasting life; */

defined( 'ABSPATH' ) or die( 'Jesus Christ is the Lord . ' );

require_once( dirname( __FILE__ ) . '/includes-aleluya/includes-aleluya.php' );
if ( is_admin() ) {
    // we are in admin mode
    require_once( dirname( __FILE__ ) . '/admin-aleluya/oo-admin-aleluya.php' );
}


/**  In progress
	*  * Block Initializer.
	*   */
require_once plugin_dir_path( __FILE__ ) . 'src/init.php';


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
				#	'post_ID'=> $object_aleluya['id'],
				#  'first_name_aleluya'
        #);//[$field_name];//, true);
#return true;
error_log(" ALeluya " . $field_name_aleluya . " - $value_aleluya - ".$object_aleluya->ID);
        return update_post_meta($object_aleluya->ID, $field_name_aleluya, $value_aleluya)[0];
}

add_action( 'rest_api_init', 'add_oo1_custom_fields_aleluya' );

function ifttt_post_notify_aleluya($v1_aleluya, $v2_aleluya, $v3_aleluya) {
update_option('oo_sponsor_request_ifttt_event_name_aleluya','new_cpnh_child_sponsor_request_aleluya');
	$eventName_aleluya = get_option('oo_sponsor_request_ifttt_event_name_aleluya');
	$eventKey_aleluya  = get_option('oo_ifttt_key_aleluya');

	// The data to send to the API
	$postData_aleluya = array(
			'value1' => $v1_aleluya,
			'value2' => $v2_aleluya,
			'value3' => $v3_aleluya
	);

	// Setup cURL
	$ch_aleluya = curl_init("https://maker.ifttt.com/trigger/$eventName_aleluya/with/key/$eventKey_aleluya");
	curl_setopt_array($ch_aleluya, array(
			CURLOPT_POST => TRUE,
			CURLOPT_RETURNTRANSFER => TRUE,
			CURLOPT_HTTPHEADER => array(
			//		'Authorization: '.$authToken,
					'Content-Type: application/json'
			),
			CURLOPT_POSTFIELDS => json_encode($postData_aleluya)
	));

	// Send the request
	$response_aleluya = curl_exec($ch_aleluya);

	// Check for errors
	if($response_aleluya === FALSE){
			die(curl_error($ch_aleluya));
	}
  echo "Success! $response_aleluya";

	// Decode the response
	//$responseData = json_decode($response, TRUE);

	// Print the date from the response
	//echo $responseData['published'];

}
if(isset($_POST["oo_email_aleluya"])) {
	$email_aleluya = $_POST["oo_email_aleluya"];
	$oo_id_aleluya = $_POST["oo_email_id_aleluya"];
  $oo_nicknames_aleluya = get_post_meta($oo_id_aleluya,"nick_names_aleluya")[0];
  //ifttt_post_notify_aleluya($oo_id_aleluya, $oo_nicknames_aleluya, $email_aleluya);
	error_log("✝ Aleluya sending mail" .
	mail("woodlybaptiste803@gmail.com,aleluya@protonmail.com","hallelujah - new request to Sponsor Child","✝ Child ID: $oo_id_aleluya - ✝ Child Nicknames: $oo_nicknames_aleluya - ✝ Reply to Email: $email_aleluya"));
  echo "Great we have received your request for ".$oo_nicknames_aleluya." and will be contacting you soon, please bear with us as we are developing the system. God willing we hope to reply within 24-48 hours to $email_aleluya . Praise God for you in Jesus name";
	exit;
}
// [oo_aleluya child_aleluya="child_aleluya-value"]
function oo_aleluya_func( $atts ) {
	global $child_fields_aleluya, $public_child_fields_aleluya;
	$a = shortcode_atts( array(
		'child_aleluya' => 'TODO 1 ALeluya',
		'filter_aleluya' => 'aleluya, something else',
	), $atts );
	$str_aleluya = "";


	$str_aleluya .=<<<ALELUYA
<style>
  div.oo_aleluya {}
  div.oo_aleluya td.label_aleluya { width:112px; font-weight:900; text-align: right;padding-right: 8px;}
  div.oo_aleluya td.content_aleluya {}
  div.oo_aleluya td { vertical-align: top; border:0px; padding: 0px; }
  div.oo_aleluya img.child_avatar_aleluya { display: inline-block; vertical-align:top;  height:224px; max-width:224px; width:224px; border-radius: 4px; border: 1px solid black; padding: 1px;margin: 2px;}
  div.oo_aleluya .new_child_aleluya  { float: left; max-width:256px; border-radius:8px; margin: 2px; padding-top:2px; border: 1px solid #888; display: block-inline; }
  div.oo_aleluya .oo_child_meta_aleluya, .oo_child_desc_aleluya  { margin:4px; padding: 0px; border: 0px; vertical-align: top; width: 240px; margin-top: 0px; display: inline-block;}
  div.oo_aleluya td.name_aleluya {text-align: center; font-weight: 900;font-size:larger;}
  div.oo_aleluya div.child_description_aleluya { line-height: 2.5ex;  text-align: justify; height: 10ex; min-height: 10ex; overflow: hidden;
  text-overflow: ellipsis;}
  div.oo_aleluya td.child_img_holder_aleluya {text-align: center}
</style>
ALELUYA;

  $str_aleluya .=<<<ALELUYA
<script>
var oo_children_aleluya = [];
function oo_sponsor_button_clicked_aleluya(id_aleluya) { 
  var email_aleluya = prompt('Please enter your email, we will use this to contact you regarding sponsoring the requested child:');
  
  if (!email_aleluya) return;
  var xhr_aleluya = new XMLHttpRequest();
  xhr_aleluya.open('POST', '/');
  xhr_aleluya.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  xhr_aleluya.onload = function() {
    if (xhr_aleluya.status === 200) {
        alert('Hallelujah: ' + xhr_aleluya.responseText);
    }
    else {
        alert('Hallelujah Request failed.  Returned status of ' + xhr_aleluya.status);
    }
  };
  xhr_aleluya.send(encodeURI('oo_email_id_aleluya='+id_aleluya+'&oo_email_aleluya='+email_aleluya));
}
</script>
ALELUYA;
	$str_aleluya .= "<div class='oo_aleluya'>";

	$str_aleluya .=<<<ALELUYA
  <div class='oo_chooser_aleluya'>
	<span class='oo_label_aleluya'>Sort By:</span><select><option>Recent</option><option>Age</option><option>Coming soon God Willing</option></select>
	</div>
ALELUYA;

//Thanks You Jesus for Milo @ https://wordpress.stackexchange.com/q/191093
  $loop_aleluya = new WP_Query( array('post_type' => 'child_aleluya') );
  while ( $loop_aleluya->have_posts() ) :
		$loop_aleluya->the_post();
		$id_aleluya  = get_the_ID();
		$str_aleluya.="<table class='new_child_aleluya' align='center'>";
		$str_aleluya.='<tr><td class="child_img_holder_aleluya"><img class="child_avatar_aleluya" src="' . wp_get_attachment_url( get_post_meta( $id_aleluya,  'avatar_media_id_aleluya')[0]) . '"/></td></tr>';
    $str_aleluya .= "<tr><td colspan='2' class='name_aleluya'>" . get_post_meta($id_aleluya, "nick_names_aleluya")[0] . "</td></tr>";

		$str_aleluya .= "<tr><td align='center'><table class='oo_child_desc_aleluya'><tr/>";
		$str_aleluya .= "<td>";
		$str_aleluya .= '<div class="child_description_aleluya" >'. get_the_content().'</div><br/>';
		$str_aleluya .= '<div class="show_content" align="center"><button class="btn btn-primary" onclick="oo_sponsor_button_clicked_aleluya(' .$id_aleluya. ');">Sponsor this Child</button></div>';
		$str_aleluya .= "</td></tr>";
		$str_aleluya .= "</table></tr></td>";

		$str_aleluya .= "<tr><td align='center'><table class='oo_child_meta_aleluya'>";
		foreach($public_child_fields_aleluya as $cf_aleluya => $cf_desc_aleluya) {
			$cf_val_aleluya = get_post_meta($id_aleluya, $cf_aleluya)[0];
			
				$str_aleluya .=<<<ALELUYA
        <tr><td class='label_aleluya'>$cf_desc_aleluya: </td><td class='content_aleluya'>
				$cf_val_aleluya
				</td></tr>
ALELUYA;
			
		}
		$bd_val_aleluya = get_post_meta($id_aleluya, "birth_date_aleluya")[0] . "";
		$bd_date_aleluya = DateTime::createFromFormat('Y/n/j', $bd_val_aleluya);
    $now_aleluya    = new DateTime();
    $age_aleluya   = $now_aleluya->diff($bd_date_aleluya);

		$str_aleluya .= "<tr><td class='label_aleluya'>Age: </td><td class='content_aleluya'>";
		$str_aleluya .= $age_aleluya->y ;
		$str_aleluya .= "</td></tr>";
		$str_aleluya .= "</table></tr></td>";
		$str_aleluya .= "</table>";

			//$str_aleluya.=get_the_meta();
  endwhile;

  return $str_aleluya . "</div><div style='clear:both'></div><!--Jesus Christ is the Lord-->";
}
add_shortcode( 'oo_aleluya', 'oo_aleluya_func' );


