<?php

namespace Bridge;
 

if (!defined('ABSPATH'))
	exit;

class Control {


	protected $controls = [];

	public function add($name, $class) {
		$this->controls[$name] = $class;
	}

	static public function field($name) {
		if(isset(self::$instance->controls[$name])) {
			return self::$instance->controls[$name];
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