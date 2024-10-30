<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$meta_key = '[login-logout-shortcode-simple-login-page]';
$post_content = '[login-logout-shortcode-simple-login-page]';
$post_meta = '[login-logout-shortcode-simple-login-page]';
$post_title = 'Login Page';
$post_name = 'login-logout-shortcode-simple-login-page';
// create page
global $wpdb;
$post_id_p = $wpdb->get_var( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = $meta_key" );
if (!$post_id_p) {
$post_id = wp_insert_post(array (
'post_type' => 'page',
'post_title' =>  $post_title,
'post_name' => $post_name,
'post_content' => $post_content,
'post_status' => 'publish',
'comment_status' => 'closed',   
'ping_status' => 'closed',      
));
if ($post_id) {
add_post_meta($post_id, $post_meta, $post_name);
}
}
?>