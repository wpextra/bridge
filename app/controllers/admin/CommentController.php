<?php
namespace Bridge\App\Controller\Admin;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Http\Controller\Controller;

/**
 * @Bridge\Annotation\Route(
 * name="admin_comment", 
 * path="admin/comments", 
 * middleware="admin"
 * )
 */
class CommentController extends Controller {

	public function response($request) {
		$data = [];

		echo $this->view('admin/pages.twig', $data);
	}

}