<?php
namespace Bridge\App\Controller\Auth;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Http\Controller\Controller;

/**
 * @Bridge\Annotation\Route(
 * name="auth_singin", 
 * path="auth/signin", 
 * middleware="auth"
 * )
 */
class SigninController extends Controller {
  
	public function response($request) {
		$data = []; 
		if($_POST) 
		{  
			global $wpdb;  
			$username = $wpdb->escape($_REQUEST['username']);  
			$password = $wpdb->escape($_REQUEST['password']);  
			$remember = $wpdb->escape($_REQUEST['rememberme']);  

			if($remember) $remember = "true";  
			else $remember = "false";  

			$login_data = array();  
			$login_data['user_login'] = $username;  
			$login_data['user_password'] = $password;  
			$login_data['remember'] = $remember;  
			$user_verify = wp_signon( $login_data, false );   

			if ( is_wp_error($user_verify) )   
			{  
				$data['errors'] = "Invalid login details";  
			} else
			{    
				wp_redirect(home_url('/hello'));  
			}  
		} 
		echo $this->view('auth/signin.twig', $data);
	}

}