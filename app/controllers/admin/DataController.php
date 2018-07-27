<?php
namespace Bridge\App\Controller\Admin;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Http\Controller\Controller;

/**
 * @Bridge\Annotation\Route(
 * name="admin_data", 
 * path="admin/data/{data_type}", 
 * middleware="admin"
 * )
 */
class DataController extends Controller {

	public function response($request) {
		$data = [];

		echo $this->view('admin/pages.twig', $data);
	}

}