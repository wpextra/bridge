<?php
namespace Bridge\App\Controller\Console;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Http\Controller\Controller;

/**
 * @Bridge\Annotation\Route(
 * name="console_cronjob", 
 * path="console/cronjob", 
 * middleware="admin"
 * )
 */
class CronjobController extends Controller {
  
	public function response($request) {
		$data = []; 
		echo $this->view('console/apps.twig', $data);
	}

}