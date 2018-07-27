<?php
namespace Bridge\App\Controller\Auth;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Http\Controller\Controller;

/**
 * @Bridge\Annotation\Route(
 * name="auth_signup", 
 * path="auth/signup", 
 * middleware="auth"
 * )
 */
class SignupController extends Controller {
  
	public function response($request) {
		$data = []; 
		echo $this->view('auth/signup.twig', $data);
	}

}