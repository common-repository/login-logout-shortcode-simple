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
 
		echo '<h3>'.esc_html( __('Login Page', 'login-logout-shortcode-simple' )).'</h3>';
		$url_page_login = site_url( '/login-page/', '' );
			$args = array(
				'redirect' => get_option( 'LoginLogoutShortcodeSimple_Plugin_PageRedirect'), 
				'form_id' => 'loginform-custom',
				'label_username' => __( 'Email' ),
				'label_password' => __( 'Password' ),
				'label_remember' => __( 'Remember Me' ),
				'label_log_in' => __( 'Login' ),
				'remember' => true
			);
			wp_login_form( $args );
			?>
			<h5>
			<a href="<?php echo wp_lostpassword_url( $url_page_login ); ?>" title="Lost Password"><?php echo __('Lost Password', 'login-logout-shortcode-simple' ); ?></a></h5>
		<p>
		<?php echo __('The password will be sent to your mailbox.', 'login-logout-shortcode-simple' ); ?>
		
		
		<?php 
		
			if ( get_option( 'LoginLogoutShortcodeSimple_Plugin_UsersCanRegister' )=="yes" ) {
						$link = '<br>';
						$link .= $before . '<a href="' . esc_url( wp_registration_url() ) . '">' . __( 'Register' ) . '</a>' . $after;
						echo '<h5>'.$link.'</h5>';
			}
		
?>