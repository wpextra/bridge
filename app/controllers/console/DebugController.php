<?php
namespace Bridge\App\Controller\Console;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Http\Controller\Controller;

/**
 * @Bridge\Annotation\Route(
 * name="console_debug", 
 * path="console/debug", 
 * middleware="admin"
 * )
 */
class DebugController extends Controller {
  
	public function response($request) {
		$data = []; 
		echo $this->view('console/debug.twig', $data);
	}

}