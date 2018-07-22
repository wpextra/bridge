<?php

namespace Bridge;
 

if (!defined('ABSPATH'))
	exit;

class TwigExtension {

	public $dirs = [];
	public $functions = [];
	public $filters = [];
	public $global = [];
	public $escapers = [];

	public function add_dir($dir) {
		$this->dirs[] = $dir;
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
		$this->globas[$name] = $class;
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