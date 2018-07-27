<?php
namespace Bridge\App\Controller\Console;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Http\Controller\Controller;

/**
 * @Bridge\Annotation\Route(
 * name="console_swagger", 
 * path="console/api", 
 * middleware="admin"
 * )
 */
class SwaggerController extends Controller {
  
	public function response($request) {
		$data = []; 
		echo $this->view('console/swagger.twig', $data);
	}

}