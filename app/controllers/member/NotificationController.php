<?php
namespace Bridge\App\Controller\Member;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Http\Controller\Controller;

/**
 * @Bridge\Annotation\Route(
 * name="member_notification", 
 * path="account/notification", 
 * middleware="member"
 * )
 */
class NotificationController extends Controller {
  
	public function response($request) {
		$data = []; 
		echo $this->view('member/notification.twig', $data);
	}

}