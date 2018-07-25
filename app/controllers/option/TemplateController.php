<?php
namespace Bridge\App\Controller\Option;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Http\Controller\OptionController as Controller;

/**
 * @Bridge\Annotation\Route(
 * name="option_template", 
 * path="admin/option_template", 
 * middleware="admin",
 * args= {
 * 		"label" = "Template",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */

class TemplateController extends Controller {

	
	public function fields() {
		
		$options = [];
		$fields = [];
		$headers = \Bridge\Header::all();
		if($headers) {
			$select = [];
			foreach ($headers as $key => $header) {
				if(is_array($header)) {
					$header = (object)$header;
				}
				$select[$header->id] = isset($header->title) ? $header->title : $header->id;
			}
			$options[] = [
				'name'	=> 'header_template',
				'title'	=> 'Template Header',
				'type'	=> 'select',
				'options' => $select
			];
			$header_name = get_option('header_template');
			if($header_name) {
				$header = \Bridge\Header::get($header_name);
				foreach ($header->callable->options() as $key => $field) {
					$options[] = $field;
				}
			}
		}



		$footers = \Bridge\Footer::all();
		if($footers) {
			$select = [];
			foreach ($footers as $key => $footer) {
				if(is_array($footer)) {
					$footer = (object)$footer;
				}
				$select[$footer->id] = isset($footer->title) ? $footer->title : $footer->id;
			}
			$options[] = [
				'name'	=> 'footer_template',
				'title'	=> 'Footer Header',
				'type'	=> 'select',
				'options' => $select
			];
			$footer_name = get_option('footer_template');
			if($footer_name) {
				$footer = \Bridge\Footer::get($footer_name);
				if(isset($footer->callable)) {
					foreach ($footer->callable->options() as $key => $field) {
						$options[] = $field;
					}
				}
			}
		}
		return $options;
	}


	public function response($request) {
		$this->updater($this->fields(), $request);
		$data = [];
		$data['options'] = $this->options($this->fields(), $request);
		echo $this->view('options/option.twig', $data);
	}
}