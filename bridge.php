<?php
/**
* Plugin Name: BRIDGE
* Plugin URI: http://www.wpextra.co/bridge
* Description: Bridge is powerfull toolkits to build enterprise web application for wordpress.
* Version: 1.0.1
* Author: wpextra.co
* Author URI: http://www.wpextra.co
* Text Domain: bridge
* Domain Path: /assets/langs/
*/



if ( defined( 'ABSPATH' ) && ! defined( 'BRIDGE_VERSION' ) ) {
	require_once dirname( __FILE__ ) . '/app/setup.php';
	require_once dirname( __FILE__ ) . '/config/config.php';
	require_once dirname( __FILE__ ) . '/startup.php';
	$app = new \Bridge\Startup();
	$app->start();


}

