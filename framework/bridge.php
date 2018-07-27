<?php

if (!defined('ABSPATH'))
	exit;

use Bridge\Template;

class Bridge {

	
	static public function context() {
		$context = [];
		return $context;
	}

	static public function render($templates, $data = [], $context = []) {
		$template = new Template();
		echo $template->render($templates, $data);
	}
}