<?php

namespace Bridge\Template;
 

if (!defined('ABSPATH'))
	exit;

class Twig_Extension {

	public $dirs = [];
	public $functions = [];
	public $filters = [];
	public $globals = [];
	public $escapers = [];

	public function add_dir($dir, $priority = 10) {
		$this->dirs[$dir] = $priority;
	}
	public function add_function($name, $function) {
		$this->functions[$name] = $function;
	}
	public function add_filter($name, $filter) {
		$this->filters[$name] = $filter;
	}
	public function add_escaper($name, $escaper) {
		$this->escapers[$name] = $escaper;
	}
	public function add_global($name, $class) {
		$this->globals[$name] = $class;
	}


	


	private static $instance;
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	public function __clone() {
		_doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', 'bridge'), '1.6');
	}
	public function __wakeup() {
		_doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', 'bridge'), '1.6');
	}
}