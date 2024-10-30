<?php
 /*
 * Plugin Name: Login Logout Shortcode Simple
 * Plugin URI: http://wordpress.org/extend/plugins/login-logout-shortcode-simple/
 * Version: 1.0
 * Author: Clodoaldo Xavier Gomes
 * Description: Protect your pages by just adding a shortcode. No need to know programming.
 * Text Domain: login-logout-shortcode-simple
 * License: GPLv3
 *
 * @package Login Logout Shortcode Simple
 */

 /*
    "WordPress Plugin Template" Copyright (C) 2019 Michael Simpson  (email : michael.d.simpson@gmail.com)

    This following part of this file is part of WordPress Plugin Template for WordPress.

    WordPress Plugin Template is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    WordPress Plugin Template is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Contact Form to Database Extension.
    If not, see http://www.gnu.org/licenses/gpl-3.0.html
*/

$LoginLogoutShortcodeSimple_minimalRequiredPhpVersion = '5.0';
define('LOGIN_LOGOUT_SHORTCODE_SIMPLE', plugin_dir_url( __FILE__ ));
define('LOGIN_LOGOUT_SHORTCODE_SIMPLE_URL', plugins_url('',__FILE__));
define('LOGIN_LOGOUT_SHORTCODE_SIMPLE_DIR', plugin_dir_path(__FILE__));
define('LOGIN_LOGOUT_SHORTCODE_SIMPLE_SITE', site_url());

if ( ! defined( 'LOGIN_LOGOUT_SHORTCODE_SIMPLE_PLUGIN_VERSION' ) ) define( 'LOGIN_LOGOUT_SHORTCODE_SIMPLE_PLUGIN_VERSION', '1.2.3' );
if ( ! defined( 'LOGIN_LOGOUT_SHORTCODE_SIMPLE_PLUGIN_DIR_PATH' ) ) define( 'LOGIN_LOGOUT_SHORTCODE_SIMPLE_PLUGIN_DIR_PATH', plugins_url( '', __FILE__ ) );
if ( ! defined( 'LOGIN_LOGOUT_SHORTCODE_SIMPLE_PLUGIN_BASENAME' ) ) define( 'LOGIN_LOGOUT_SHORTCODE_SIMPLE_PLUGIN_BASENAME', plugin_basename( __FILE__) );

/**
 * Check the PHP version and give a useful error message if the user's version is less than the required version
 * @return boolean true if version check passed. If false, triggers an error which WP will handle, by displaying
 * an error message on the Admin page
 */
function LoginLogoutShortcodeSimple_noticePhpVersionWrong() {
    global $LoginLogoutShortcodeSimple_minimalRequiredPhpVersion;
    echo '<div class="updated fade">' .
      __('Error: plugin "Login Logout Shortcode Simple" requires a newer version of PHP to be running.',  'login-logout-shortcode-simple').
            '<br/>' . __('Minimal version of PHP required: ', 'login-logout-shortcode-simple') . '<strong>' . $LoginLogoutShortcodeSimple_minimalRequiredPhpVersion . '</strong>' .
            '<br/>' . __('Your server\'s PHP version: ', 'login-logout-shortcode-simple') . '<strong>' . phpversion() . '</strong>' .
         '</div>';
}


function LoginLogoutShortcodeSimple_PhpVersionCheck() {
    global $LoginLogoutShortcodeSimple_minimalRequiredPhpVersion;
    if (version_compare(phpversion(), $LoginLogoutShortcodeSimple_minimalRequiredPhpVersion) < 0) {
        add_action('admin_notices', 'LoginLogoutShortcodeSimple_noticePhpVersionWrong');
        return false;
    }
    return true;
}


/**
 * Initialize internationalization (i18n) for this plugin.
 * References:
 *      http://codex.wordpress.org/I18n_for_WordPress_Developers
 *      http://www.wdmac.com/how-to-create-a-po-language-translation#more-631
 * @return void
 */
function LoginLogoutShortcodeSimple_i18n_init() {
    $pluginDir = dirname(plugin_basename(__FILE__));
    load_plugin_textdomain('login-logout-shortcode-simple', false, $pluginDir . '/languages/');
}


//////////////////////////////////
// Run initialization
/////////////////////////////////

// Initialize i18n
add_action('plugins_loaded','LoginLogoutShortcodeSimple_i18n_init');

// Run the version check.
// If it is successful, continue with initialization for this plugin
if (LoginLogoutShortcodeSimple_PhpVersionCheck()) {
    // Only load and run the init function if we know PHP version can parse it
    include_once('login-logout-shortcode-simple_init.php');
    LoginLogoutShortcodeSimple_init(__FILE__);
}
