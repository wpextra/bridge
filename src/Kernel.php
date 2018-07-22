<?php

if ( defined( 'ABSPATH' ) && ! defined( 'BRIDGE_VERSION' ) ) {
	require_once dirname( __FILE__ ) . '/Loader.php';
	$loader = new Bridge_Loader();
	$loader->init();
}
