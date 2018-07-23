<?php

namespace Bridge;


if (!defined('ABSPATH'))
	exit;

class Repository {

	protected $repositories = [];

	public function add($name, $class) {
		$this->repositories[$name] = $class;
	}

	static public function repo($name) {
		if(isset(self::$instance->repositories[$name])) {
			$repository = self::$instance->repositories[$name];
			return new \Bridge\Service\RepoGateway($repository);
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