<?php
namespace Bridge\App\Controller\Admin;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Http\Controller\Controller;

/**
 * @Bridge\Annotation\Route(
 * name="bridge_admin", 
 * path="admin", 
 * middleware="admin"
 * )
 */
class AdminController extends Controller {

	public function response($request) {
		$data = [];
		echo $this->view('admin/home.twig', $data);
	}

}