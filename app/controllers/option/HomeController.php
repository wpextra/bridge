<?php
namespace Bridge\App\Controller\Option;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Http\Controller\OptionController as Controller;

/**
 * @Bridge\Annotation\Route(
 * name="bridge_option", 
 * path="admin/option", 
 * middleware="admin",
 * args= {
 * 		"label" = "Options",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */

class HomeController extends Controller {

	
	public function fields() {
		$options = [];
		$options[] = [
				'name'	=> 'test',
				'title'	=> 'Test',
				'type'	=> 'text'
			];
		return $options;
	}


	public function response($request) {
		$this->updater($this->fields(), $request);
		$data = [];
		$data['options'] = $this->options($this->fields(), $request);
		echo $this->view('options/option.twig', $data);
	}
}