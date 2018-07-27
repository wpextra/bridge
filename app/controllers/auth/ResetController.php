<?php
namespace Bridge\App\Controller\Auth;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Http\Controller\Controller;

/**
 * @Bridge\Annotation\Route(
 * name="auth_reset", 
 * path="auth/reset", 
 * middleware="auth"
 * )
 */
class ResetController extends Controller {
  
	public function response($request) {
		$data = []; 
		echo $this->view('auth/reset.twig', $data);
	}

}