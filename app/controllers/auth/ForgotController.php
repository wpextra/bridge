<?php
namespace Bridge\App\Controller\Auth;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Http\Controller\Controller;

/**
 * @Bridge\Annotation\Route(
 * name="auth_fogot", 
 * path="auth/forgot", 
 * middleware="auth"
 * )
 */
class ForgotController extends Controller {
  
	public function response($request) {
		$data = []; 
		echo $this->view('auth/forgot.twig', $data);
	}

}