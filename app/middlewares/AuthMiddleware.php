<?php
namespace Bridge\App\Middleware;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Middleware\Middleware;

/**
 * @Bridge\Annotation\Middleware(
 * name="auth"
 * )
 */
class AuthMiddleware extends Middleware {

	public function authorize() {
		if($this->user()) {
			if(defined( 'BRIDGE_MEMBER_INSTALLED')) {
				wp_redirect(home_url('/account'));
			} else {
				wp_redirect(home_url('/wp-admin'));
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