<?php

namespace Bridge;
 

if (!defined('ABSPATH'))
	exit;

class Metadata {


	protected $metadatas = [];

	public function add($name, $class) {
		$this->metadatas[$name] = $class;
	}

	static public function repo($name) {
		if(isset(self::$instance->metadatas[$name])) {
			$repository = self::$instance->metadatas[$name];
			return new \Bridge\Service\MetadataGateway($repository);
		}
	}
	static public function type($name) {
		if(isset(self::$instance->metadatas[$name])) {
			$repository = self::$instance->metadatas[$name];
			return new \Bridge\Service\MetadataGateway($repository);
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