<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $wpdb;
$post_id = $wpdb->get_var( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '[login-logout-shortcode-simple-login-page]'" );
if ($post_id) {
wp_delete_post( $post_id, true );
echo __('Page deleted.', 'login-logout-shortcode-simple').'<br>';
}
?>