<?php
namespace Bridge\App\Controller\Member;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Http\Controller\Controller;

/**
 * @Bridge\Annotation\Route(
 * name="member", 
 * path="account", 
 * middleware="member"
 * )
 */
class MemberController extends Controller {
  
	public function response($request) {
		$data = []; 
		echo $this->view('member/member.twig', $data);
	}

}