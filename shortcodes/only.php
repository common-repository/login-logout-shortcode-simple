<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
 * Clodoaldo Xavier Gomes
 * 01/12/2019
 */ 
include_once( LOGIN_LOGOUT_SHORTCODE_SIMPLE_DIR .'LoginLogoutShortcodeSimple_ShortCodeLoader.php');

class LoginLogoutShortcodeSimpleOnly extends LoginLogoutShortcodeSimple_ShortCodeLoader {
    /**
     * @param  $atts shortcode inputs
     * @return string shortcode content
     */
    public function handleShortcode($atts) {
        $content = "";
        require_once(LOGIN_LOGOUT_SHORTCODE_SIMPLE_DIR. 'pages/only.php' );
        return $content;
    }
}