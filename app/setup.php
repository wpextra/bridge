<?php


add_action('bridge_started', function() {
	$config = \Bridge\Config::instance();
	$config->add_collection('api', BRIDGE_PATH.'app/apis');
	$config->add_collection('controller', BRIDGE_PATH.'app/controllers');
	$config->add_collection('model', BRIDGE_PATH.'app/models');
	$config->add_collection('header', BRIDGE_PATH.'app/elements/Header');
	$config->add_collection('footer', BRIDGE_PATH.'app/elements/Footer');
	$config->add_collection('block', BRIDGE_PATH.'app/elements/Header');
	$config->add_collection('popup', BRIDGE_PATH.'app/elements/Popup');
	$config->add_collection('middleware', BRIDGE_PATH.'app/middlewares');
	$config->add_collection('repository', BRIDGE_PATH.'app/repository');
	$config->add_collection('persistent', BRIDGE_PATH.'app/persistent');
	$config->add_collection('control', BRIDGE_PATH.'app/controls');

	$twig = \Bridge\Template\Twig_Extension::instance();
	$twig->add_dir(BRIDGE_PATH.'resources/views', 0);
	$twig->add_dir(get_template_directory().'/resources/views', 999);
	$twig->add_dir(get_stylesheet_directory().'/resources/views', 1000);
});