<?php
/*******************************************************************
* Load only when needed
* */
if ( defined( 'ABSPATH' ) && ! defined( 'BRIDGE_FRAMEWORK_VERSION' ) ) {
	require_once dirname( __FILE__ ) . '/framework.php';
	require_once dirname( __FILE__ ) . '/kernel.php';
}
