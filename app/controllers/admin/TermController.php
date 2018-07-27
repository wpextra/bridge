<?php
namespace Bridge\App\Controller\Admin;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Http\Controller\Controller;

/**
 * @Bridge\Annotation\Route(
 * name="admin_terms", 
 * path="admin/term/{taxonomy}", 
 * middleware="admin"
 * )
 */
class TermController extends Controller {

	public function response($request) {
		$data = [];
		echo $this->view('admin/terms.twig', $data);
	}

}