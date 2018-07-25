<?php
if (!defined('ABSPATH'))
	exit;

use Bridge\Template;
class Bridge {

	static public function context() {
		$context = [];
		$context['site'] = new \Bridge\Object\Site();
		return $context;
	}

	static public function render($templates, $data = [], $context = []) {
		\Bridge\Menu::load(10);
		$template = new Template();
		echo $template->render($templates, $data);
	}
}