<?php
namespace Bridge\App\Controller\Console;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Http\Controller\Controller;

/**
 * @Bridge\Annotation\Route(
 * name="console_config", 
 * path="console/config", 
 * middleware="admin"
 * )
 */
class ConfigController extends Controller {
  
	public function response($request) {
		$data = []; 
		echo $this->view('console/config.twig', $data);
	}

}