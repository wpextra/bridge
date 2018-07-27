<?php
namespace Bridge\Resources;

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}



/**
 * Theme style
 */
add_action('wp_enqueue_scripts', function() {

	wp_register_script(
		'bridge_vendor',
		BRIDGE_ASSET_URL . 'js/vendor.min.js',
		[],
		BRIDGE_VERSION
	);

	wp_register_style(
		'bridge_shared',
		BRIDGE_ASSET_URL . 'css/style.min.css',
		[],
		BRIDGE_VERSION
	);
	
	wp_register_script(
		'bridge_shared',
		BRIDGE_ASSET_URL . 'js/script.min.js',
		['bridge_vendor'],
		BRIDGE_VERSION
	);

	wp_register_style(
		'datatable',
		BRIDGE_ASSET_URL . 'css/dataTables.min.css',
		['bridge_vendor'],
		BRIDGE_VERSION
	);

	wp_register_script(
		'datatable',
		BRIDGE_ASSET_URL . 'js/jquery.dataTables.min.js',
		['bridge_vendor'],
		BRIDGE_VERSION
	);
	wp_register_script(
		'datatable_bootstrap',
		BRIDGE_ASSET_URL . 'js/dataTables.bootstrap4.min.js',
		['datatable'],
		BRIDGE_VERSION
	);



	wp_enqueue_style( 'bridge_shared' );
	wp_enqueue_script( 'bridge_shared' );
	
});
/**
 * aDMIN style
 */
add_action('admin_enqueue_scripts', function() {
	
	wp_register_script(
		'bridge_vendor',
		BRIDGE_ASSET_URL . 'js/vendor.min.js',
		[],
		BRIDGE_VERSION
	);
	
	wp_register_style(
		'bridge_shared',
		BRIDGE_ASSET_URL . 'css/style.min.css',
		[],
		BRIDGE_VERSION
	);
	
	wp_register_script(
		'bridge_shared',
		BRIDGE_ASSET_URL . 'js/script.min.js',
		['bridge_vendor'],
		BRIDGE_VERSION
	);

	wp_register_style(
		'bridge_admin',
		BRIDGE_ASSET_URL . 'css/admin.min.css',
		['bridge_shared'],
		BRIDGE_VERSION
	);
	wp_register_script(
		'bridge_admin',
		BRIDGE_ASSET_URL . 'js/script.min.js',
		['bridge_shared'],
		BRIDGE_VERSION
	);

	wp_register_style(
		'datatable',
		BRIDGE_ASSET_URL . 'css/dataTables.min.css',
		['bridge_vendor'],
		BRIDGE_VERSION
	);

	wp_register_script(
		'datatable',
		BRIDGE_ASSET_URL . 'js/jquery.dataTables.min.js',
		['bridge_vendor'],
		BRIDGE_VERSION
	);
	wp_register_script(
		'datatable_bootstrap',
		BRIDGE_ASSET_URL . 'js/dataTables.bootstrap4.min.js',
		['datatable'],
		BRIDGE_VERSION
	);
	
	wp_enqueue_style( 'bridge_admin' );
	wp_enqueue_script( 'bridge_admin' );
});



