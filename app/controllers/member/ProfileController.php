<?php
namespace Bridge\App\Controller\Member;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Http\Controller\Controller;

/**
 * @Bridge\Annotation\Route(
 * name="member_profile", 
 * path="account/profile", 
 * middleware="member"
 * )
 */
class ProfileController extends Controller {
  
	public function response($request) {
		$data = []; 
		echo $this->view('member/profile.twig', $data);
	}

}