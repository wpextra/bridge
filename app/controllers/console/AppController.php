<?php
namespace Bridge\App\Controller\Console;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Http\Controller\Controller;

/**
 * @Bridge\Annotation\Route(
 * name="console_app", 
 * path="console/apps", 
 * middleware="admin"
 * )
 */
class AppController extends Controller {
  
	public function response($request) {
		$data = []; 
		echo $this->view('console/apps.twig', $data);
	}

}