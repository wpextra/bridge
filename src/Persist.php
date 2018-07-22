<?php

namespace Bridge;
 

if (!defined('ABSPATH'))
	exit;

class Persist {

	static public function model($name) {
		$metadata = Metadata::type('schema')->find($name)->get();
		if($metadata) {
			return new \Bridge\Service\PersistGateway($metadata);
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