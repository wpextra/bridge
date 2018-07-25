<?php
namespace Bridge;

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}


final class Startup {
	
	public function start() {
		$this->constants();
		$this->before_load();
		$this->files();
		$this->after_load();
		$this->build();
		$this->after_build();
		$this->initiated();
		$this->complete();
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
	public function before_load() {
		do_action('bridge_preloaded');
	}
	public function files() {
		require_once plugin_dir_path( __FILE__ )  . 'vendor/autoload.php';
		require_once plugin_dir_path( __FILE__ )  . 'framework/bridge.php';
		require_once plugin_dir_path( __FILE__ )  . 'framework/autoloader.php';
		require_once plugin_dir_path( __FILE__ )  . 'framework/core/src/startup.php';
		require_once plugin_dir_path( __FILE__ )  . 'framework/client/src/startup.php';
		require_once plugin_dir_path( __FILE__ )  . 'framework/connect/src/startup.php';
		require_once plugin_dir_path( __FILE__ )  . 'framework/kernel/src/startup.php';
		require_once plugin_dir_path( __FILE__ )  . 'app/setup.php';
	}

	public function after_load() {
		do_action('bridge_loaded');
	}

	public function build() {
		\Bridge\Autoloader::instance();
		$framework = new \Bridge\Framework();
		$framework->start();
		do_action('bridge_started');
		do_action('bridge_theme');
		$framework->build();
		\Bridge\Kernel\Framework::instance();
		do_action('bridge_extension');
	}

	public function after_build() {
		do_action('bridge_builded');
	}

	public function initiated() {
		new \Bridge\Kernel\Listener();
		new \Bridge\Kernel\Registry();
	}
	public function complete() {
		do_action('bridge_complete');
	}
}



