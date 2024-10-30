<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
 * Clodoaldo Xavier Gomes
 * 01/12/2019
 */ 
 
 /**
 * Get the user's roles
 * @since 1.0.0
 */

 if( is_user_logged_in() ) {
 $current_user_id = get_current_user_id();
 echo get_the_author_meta( 'display_name', $current_user_id ).'<br>';
 $user = wp_get_current_user();
 $roles = ( array ) $user->roles; 
 $user_role = $user->roles[0]; // administrtor // subscriber
  echo ucfirst($user_role).'<br>';
 wp_loginout( home_url() ); // Display "Log Out" link.
 }

 
$CanSeeSpecialData = get_option( 'LoginLogoutShortcodeSimple_Plugin_CanSeeSpecialData');
$CanSeeSpecialData = str_replace(" ","",$CanSeeSpecialData);

$CanSeeSpecialData = explode(",", $CanSeeSpecialData ) ;
//$CanSeeSpecialData = array();

$roles = array('subscriber','administrator');
$user = wp_get_current_user();


function checkForRole($CanSeeSpecialData, array $array) {
    foreach($CanSeeSpecialData as $role) {
        if(in_array($role, $array)) {
            return true;
        }
    }

    return false;
}

	if(checkForRole($CanSeeSpecialData, (array) $user->roles)) {
	return true;
	}
  	else { 
		if(! is_user_logged_in() ) {
		include_once( LOGIN_LOGOUT_SHORTCODE_SIMPLE_DIR .'pages/login-logout-shortcode-simple-login-page.php');
		}
		else
		{
		echo '<br><h3>'. esc_html( __('You are logged in, but you do not have access to this content.', 'login-logout-shortcode-simple' )).'</h3><br>';
		}
	
	
  	die();
	}
		
?>