<?php
namespace Bridge\App\Middleware;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Http\Middleware\Middleware;

/**
 * @Bridge\Annotation\Middleware(
 * name="console"
 * )
 */

class ConsoleMiddleware extends Middleware {

	
	public function authorize() {
		if(!$this->user()) {
			wp_redirect(home_url('/auth/signin'));
			
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