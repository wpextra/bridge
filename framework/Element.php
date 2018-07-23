<?php

namespace Bridge;
 

if (!defined('ABSPATH'))
	exit;

class Element {


	protected $elements = [];

	public function add($name, $class) {
		$this->elements[$name] = $class;
	}

	static public function type($name) {
		if(isset(self::$instance->elements[$name])) {
			$repository = self::$instance->elements[$name];
			return new \Bridge\Service\ElementGateway($repository);
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