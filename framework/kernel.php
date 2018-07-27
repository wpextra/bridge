<?php
namespace Bridge;

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}


final class Kernel {
	
	public function start() {
		$this->constants();
		$this->before_load();
		$this->load();
		$this->after_load();
		$this->build();
		$this->after_build();
		$this->register();
		$this->complete();
	}

	public function constants() {
		define('BRIDGE_FRAMEWORK_VERSION', '0.7.9' );
		define('BRIDGE_FRAMEWORK_PATH', plugin_dir_path( __FILE__ ) );
		define('BRIDGE_FRAMEWORK_URL', plugin_dir_url( __FILE__ ) );
		define('BRIDGE_FRAMEWORK_ASSET_URL', plugin_dir_url( __FILE__ ).'assets/' );
	}

	public function before_load() {
		do_action('bridge_preloaded');
	}
	public function load() {
		\Bridge\Autoloader::instance();
		$core = new \Bridge\Core();
	}

	public function after_load() {
		do_action('bridge_loaded');
	}

	public function build() {
		/** register default function here */
		$twig = \Bridge\Template\Twig_Extension::instance();
		$twig->add_global('form', new \Bridge\Form());

		/** end register  */

		/** this place to register your application */
		do_action('bridge_started');
		do_action('bridge_theme');

		/** collect application metadata */
		\Bridge\Api::discover();
		\Bridge\Block::discover();
		\Bridge\Footer::discover();
		\Bridge\Header::discover();
		\Bridge\Middleware::discover();
		\Bridge\Model::discover();
		\Bridge\Popup::discover();
		\Bridge\Route::discover();
		\Bridge\Menu::discover();
		\Bridge\Container::discover();
		\Bridge\Widget::discover();
		\Bridge\Control::discover();
		do_action('bridge_extension');
	}

	public function after_build() {
		do_action('bridge_builded');
	}
	
	public function register() {
		new \Bridge\Setup\Listener();
		new \Bridge\Setup\Register();
		new \Bridge\Setup\Template();
		new \Bridge\Setup\MetaboxUser();
		new \Bridge\Setup\MetaboxPost();
		new \Bridge\Setup\MetaboxTerm();
		new \Bridge\Template\Template();
	}
	public function complete() {
		do_action('bridge_complete');
	}
}



