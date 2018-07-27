<?php
namespace Bridge\App\Controller\Console;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Http\Controller\Controller;

/**
 * @Bridge\Annotation\Route(
 * name="console", 
 * path="console", 
 * middleware="admin"
 * )
 */
class ConsoleController extends Controller {
  
	public function response($request) {
		$data = []; 
		echo $this->view('console/console.twig', $data);
	}

}