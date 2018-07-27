<?php
namespace Bridge\App\Controller\Console;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Http\Controller\Controller;

/**
 * @Bridge\Annotation\Route(
 * name="console_build", 
 * path="console/build", 
 * middleware="admin"
 * )
 */
class BuildController extends Controller {
  
	public function response($request) {
		$data = []; 
		echo $this->view('console/build.twig', $data);
	}

}