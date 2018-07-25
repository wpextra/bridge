<?php
add_action('bridge_loaded', function() {
	require_once dirname( __FILE__ ) . '/elementor/register.php';


});