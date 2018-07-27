<?php
namespace Bridge\App\Controller\Auth;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Http\Controller\Controller;

/**
 * @Bridge\Annotation\Route(
 * name="auth_signout", 
 * path="auth/signout", 
 * middleware="auth"
 * )
 */
class SignoutController extends Controller {

	public function response($request) {
		$data = []; 
		if(is_user_logged_in()) {
			wp_logout();
			wp_set_current_user(0);
			wp_redirect(home_url('/'));
			exit();
		} 
		echo $this->view('auth/signout.twig', $data);
	}

}