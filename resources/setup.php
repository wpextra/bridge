<?php
namespace Bridge\Resources;

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

class Assets {

	public function __construct() {
		add_action('admin_enqueue_scripts', array($this, 'bridge_enqueue_scripts'));
		add_action('wp_enqueue_scripts', array($this, 'bridge_enqueue_scripts'));
		if(!defined( 'BRIDGE_WHITELABEL_INSTALLED')) {
			add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'));
		} 
	}

	public function admin_enqueue_scripts() {
		wp_register_style(
			'bridge_admin_standard',
			BRIDGE_ASSET_URL . 'css/admin.min.css',
			['bridge_shared'],
			BRIDGE_VERSION
		);
		wp_register_script(
			'bridge_admin_standard',
			BRIDGE_ASSET_URL . 'js/script.min.js',
			['bridge_shared'],
			BRIDGE_VERSION
		);
		wp_enqueue_style( 'bridge_admin_standard' );
		wp_enqueue_script( 'bridge_admin_standard' );
	}

	
	public function bridge_enqueue_scripts() {
		wp_register_style(
			'bridge_shared',
			BRIDGE_ASSET_URL . 'css/style.min.css',
			[],
			BRIDGE_VERSION
		);
		wp_register_script(
			'bridge_shared-vendor',
			BRIDGE_ASSET_URL . 'js/vendor.min.js',
			[],
			BRIDGE_VERSION
		);
		wp_register_script(
			'bridge_shared',
			BRIDGE_ASSET_URL . 'js/script.min.js',
			['bridge_shared-vendor'],
			BRIDGE_VERSION
		);
	}
}

new Assets();