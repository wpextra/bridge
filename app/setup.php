<?php


add_action('bridge_started', function() {

	\Bridge\Twig::dir(BRIDGE_PATH.'resources/views', 0);
	\Bridge\Twig::dir(get_template_directory().'/resources/views', 999);
	\Bridge\Twig::dir(get_stylesheet_directory().'/resources/views', 1000);

	\Bridge\Config::dir('api', BRIDGE_PATH.'app/apis');
	\Bridge\Config::dir('controller', BRIDGE_PATH.'app/controllers');
	\Bridge\Config::dir('model', BRIDGE_PATH.'app/models');
	\Bridge\Config::dir('header', BRIDGE_PATH.'app/elements/Header');
	\Bridge\Config::dir('footer', BRIDGE_PATH.'app/elements/Footer');
	\Bridge\Config::dir('block', BRIDGE_PATH.'app/elements/Header');
	\Bridge\Config::dir('popup', BRIDGE_PATH.'app/elements/Popup');
	\Bridge\Config::dir('middleware', BRIDGE_PATH.'app/middlewares');
	\Bridge\Config::dir('repository', BRIDGE_PATH.'app/repository');
	\Bridge\Config::dir('persistent', BRIDGE_PATH.'app/persistent');
	\Bridge\Config::dir('control', BRIDGE_PATH.'app/controls');

	\Bridge\Menu::add('bridge_admin', [
		'segment' => 'admin',
		'title' => 'Bridge',
		'description' => '',
		'icon' => ''
	]);

	\Bridge\Menu::item('bridge_admin', [
		'id'	=> 'home',
		'title' => 'Home',
		'description' => '',
		'icon' => '',
		'route' => 'bridge_admin'
	]);

	\Bridge\Menu::item('bridge_admin', [
		'id'	=> 'analytic',
		'title' => 'Analytics',
		'description' => '',
		'icon' => '',
		'route' => 'bridge_app_installed'
	]);

	\Bridge\Menu::item('bridge_admin', [
		'id'	=> 'service',
		'title' => 'Service',
		'description' => '',
		'icon' => '',
		'route' => 'bridge_app_installed'
	]);

	\Bridge\Menu::item('bridge_admin', [
		'id'	=> 'howto',
		'title' => 'How to',
		'description' => '',
		'icon' => '',
		'route' => 'bridge_app_installed'
	]);

	\Bridge\Menu::item('bridge_admin', [
		'id'	=> 'my_app',
		'title' => 'My Apps',
		'description' => '',
		'icon' => '',
		'route' => 'bridge_app_installed'
	]);

	\Bridge\Menu::item('bridge_admin', [
		'id'	=> 'app',
		'title' => 'Apps',
		'description' => '',
		'icon' => '',
		'route' => 'bridge_app'
	]);

	\Bridge\Menu::item('bridge_admin', [
		'parent' => 'app',
		'id'	=> 'plugin',
		'title' => 'Plugins',
		'description' => '',
		'icon' => '',
		'route' => 'bridge_app_plugin'
	]);

	\Bridge\Menu::item('bridge_admin', [
		'parent' => 'app',
		'id'	=> 'theme',
		'title' => 'Themes',
		'description' => '',
		'icon' => '',
		'route' => 'bridge_app_theme'
	]);

	\Bridge\Menu::item('bridge_admin', [
		'parent' => 'app',
		'id'	=> 'widget',
		'title' => 'Widgets',
		'description' => '',
		'icon' => '',
		'route' => 'bridge_app_widget'
	]);

	\Bridge\Menu::item('bridge_admin', [
		'parent' => 'app',
		'id'	=> 'integration',
		'title' => 'Integrations',
		'description' => '',
		'icon' => '',
		'route' => 'bridge_app_integrations'
	]);

	if(!defined('BRIDGE_KOMODO_INSTALLED')) {
		\Bridge\Menu::item('bridge_admin', [
			'id'	=> 'pro',
			'title' => 'Pro Version',
			'description' => '',
			'icon' => '',
			'route' => 'pro_version'
		]);
	} 

	\Bridge\Menu::add('bridge_option', [
		'segment' => 'admin',
		'title' => 'Options',
		'description' => '',
		'icon' => ''
	]);
	
});