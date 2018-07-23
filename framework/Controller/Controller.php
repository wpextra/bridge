<?php

namespace Bridge\Controller;

use Bridge\Template;
abstract class Controller {

	public function api_response() {
		return [];
	}
	public function response($request) {
		
	}

	public function container($name) {

	}


	public function enqueue_scripts() {}
	public function admin_enqueue_scripts() {}


	public function view($templates, $data = [], $context = []) {
		$template = new Template();
		return $template->render($templates, $data);
	}
}