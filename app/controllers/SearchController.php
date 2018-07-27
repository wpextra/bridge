<?php
namespace Bridge\App\Controller\Console;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Http\Controller\Controller;

/**
 * @Bridge\Annotation\Route(
 * name="search", 
 * path="search", 
 * middleware="member"
 * )
 */
class SearchController extends Controller {
  
	public function response($request) {
		$data = []; 
		echo $this->view('search.twig', $data);
	}

}