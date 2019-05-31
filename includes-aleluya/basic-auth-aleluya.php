<?php 
// For God so loved the world, that He gave His only begotten Son, that all who believe in Him should not perish but have everlasting life
/**
 * From plugin JSON Basic Authentication
 *  https://github.com/WP-API/Basic-Auth
 * The Android app is set to require SSL
 */

function json_basic_auth_handler_aleluya( $user ) {
  global $wp_json_basic_auth_error;

  $wp_json_basic_auth_error = null;

  // Don't authenticate twice
  if ( ! empty( $user ) ) {
    return $user;
  }

  // Check that we're trying to authenticate
  if ( !isset( $_SERVER['PHP_AUTH_USER'] ) ) {
    return $user;
  }

  $username = $_SERVER['PHP_AUTH_USER'];
  $password = $_SERVER['PHP_AUTH_PW'];

  /**
   * In multi-site, wp_authenticate_spam_check filter is run on authentication. This filter calls
   * get_currentuserinfo which in turn calls the determine_current_user filter. This leads to infinite
   * recursion and a stack overflow unless the current function is removed from the determine_current_user
   * filter during authentication.
   */
  remove_filter( 'determine_current_user', 'json_basic_auth_handler', 20 );

  $user = wp_authenticate( $username, $password );

  add_filter( 'determine_current_user', 'json_basic_auth_handler', 20 );

  if ( is_wp_error( $user ) ) {
    $wp_json_basic_auth_error = $user;
    return null;
  }

  $wp_json_basic_auth_error = true;

  return $user->ID;
}
add_filter( 'determine_current_user', 'json_basic_auth_handler_aleluya', 20 );

function json_basic_auth_error_aleluya( $error ) {
  // Passthrough other errors
  if ( ! empty( $error ) ) {
    return $error;
  }

  global $wp_json_basic_auth_error;

  return $wp_json_basic_auth_error;
}
add_filter( 'rest_authentication_errors', 'json_basic_auth_error_aleluya' );
