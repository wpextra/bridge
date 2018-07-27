<?php
namespace Bridge\App\Controller\Console;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Http\Controller\Controller;

/**
 * @Bridge\Annotation\Route(
 * name="hello", 
 * path="hello", 
 * middleware="member"
 * )
 */
class HelloController extends Controller {
  
	public function response($request) {
		$data = []; 
		echo $this->view('hello.twig', $data);
	}

}