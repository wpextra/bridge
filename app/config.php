<?php


/***********************************************
* Register Directories
* Docs http://developer.wpextra.co/docs/configuration
* *********************************************/

add_action('bridge_started', function() {

	\Bridge\Twig::dir(BRIDGE_PATH.'resources/views', 0);
	\Bridge\Twig::dir(get_template_directory().'/resources/views', 999);
	\Bridge\Twig::dir(get_stylesheet_directory().'/resources/views', 1000);

	\Bridge\Config::dir('api', dirname( __FILE__ ) . '/apis');
	\Bridge\Config::dir('controller', dirname( __FILE__ ) . '/controllers');
	\Bridge\Config::dir('model', dirname( __FILE__ ) . '/models');
	\Bridge\Config::dir('header', dirname( __FILE__ ) . '/elements/header');
	\Bridge\Config::dir('footer', dirname( __FILE__ ) . '/elements/footer');
	\Bridge\Config::dir('block', dirname( __FILE__ ) . '/elements/block');
	\Bridge\Config::dir('popup', dirname( __FILE__ ) . '/elements/popup');
	\Bridge\Config::dir('middleware', dirname( __FILE__ ) . '/middlewares');
	\Bridge\Config::dir('repository', dirname( __FILE__ ) . '/repository');
	\Bridge\Config::dir('persistent', dirname( __FILE__ ) . '/persistent');
	\Bridge\Config::dir('control', dirname( __FILE__ ) . '/controls');
	\Bridge\Config::dir('container', dirname( __FILE__ ) . '/repository');
	\Bridge\Config::dir('container', dirname( __FILE__ ) . '/persistent');
	\Bridge\Config::dir('container', dirname( __FILE__ ) . '/services');
	
});
