<?php
namespace Bridge\App\Middleware;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Http\Middleware\Middleware;

/**
 * @Bridge\Annotation\Middleware(
 * name="admin"
 * )
 */
class AdminMiddleware extends Middleware {

	
	public function authorize() {
		if(!$this->user()) {
			if(defined( 'BRIDGE_SENTINEL_INSTALLED')) {
				wp_redirect(home_url('/auth/login'));
			} else {
				wp_redirect(home_url('/wp-login.php'));
			}
		}
		return true;
		
	}
	public function user() {
		if ( ! function_exists( 'wp_get_current_user' ) ) {
			return false;
		}
		$user = wp_get_current_user();
		if(isset( $user->ID ) && $user->ID !== 0) {
			return $user->data;
		} else {
			return false;
		}
	}
}