<?php

namespace Bridge;


if (!defined('ABSPATH'))
	exit;

class Container {

	protected $services = [];

	public function add($name, $class) {
		$this->services[$name] = $class;
	}

	static public function get($name) {
		if(isset(self::$instance->services[$name])) {
			return self::$instance->services[$name];
		}
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