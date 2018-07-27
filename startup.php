<?php
namespace Bridge;

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}


final class Startup {
	
	public function start() {
		$this->constants();
		$this->files();
		$this->build();
	}

	public function constants() {
		define('BRIDGE_VERSION', '1.0.1' );
		define('BRIDGE_PATH', plugin_dir_path( __FILE__ ) );
		define('BRIDGE_URL', plugin_dir_url( __FILE__ ) );
		define('BRIDGE_ASSET_URL', plugin_dir_url( __FILE__ ).'assets/' );
		$hostname = $_SERVER['SERVER_NAME']; 
		switch ($hostname) {
			case 'stencil.com':
			define('BRIDGE_API_URL', 'http://stencil.com/wpextra.co/wp-json/bridge/v2');
			break;
			default:
			define('BRIDGE_API_URL', 'http://wpextra.co/wp-json/bridge/v2');
		}
	}

	public function files() {
		require_once plugin_dir_path( __FILE__ )  . 'vendor/autoload.php';
		require_once plugin_dir_path( __FILE__ )  . 'framework/loader.php';
		require_once plugin_dir_path( __FILE__ )  . 'app/setup.php';
	}

	public function build() {
		$framework = new \Bridge\Kernel();
		$framework->start();
	}

	
}

