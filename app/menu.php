<?php


add_action('bridge_complete', function() {

	\Bridge\Menu::wp('main_menu', [
		'title' => 'Main Menu'
	]);

	\Bridge\Menu::menu('hello', [
		'id' => 'console',
		'title' => 'Console Menu',
		'description' => '',
		'icon' => 'dripicons-rocket'
	]);

	\Bridge\Menu::item('hello', [
		'id'	=> 'general',
		'title' => 'Console',
		'description' => '',
		'icon' => 'dripicons-rocket',
		'path' => '/bridge_option'
	]);
	
	
	\Bridge\Menu::admin('admin', [
		'id' => 'admin',
		'title' => 'Bridge',
		'description' => '',
		'icon' => 'dripicons-rocket'
	]);
	\Bridge\Menu::item('admin', [
		'id'	=> 'home',
		'title' => '',
		'description' => '',
		'icon' => 'mdi mdi-access-point-network',
		'path' => '/admin'
	]);
	\Bridge\Menu::item('admin', [
		'id'	=> 'content',
		'title' => 'Post Type',
		'description' => '',
		'icon' => 'mdi mdi-format-align-justify',
		'path' => '/admin'
	]);
	\Bridge\Menu::item('admin', [
		'id'	=> 'term',
		'title' => 'Taxonomies',
		'description' => '',
		'icon' => 'mdi mdi-chart-timeline',
		'path' => '/admin/terms'
	]);
	\Bridge\Menu::item('admin', [
		'id'	=> 'data',
		'title' => 'Data',
		'description' => '',
		'icon' => 'mdi mdi-format-align-justify',
		'path' => '/data'
	]);

	\Bridge\Menu::item('admin', [
		'id'	=> 'comments',
		'title' => 'Discussions',
		'description' => '',
		'icon' => 'mdi mdi-comment-alert-outline',
		'path' => '/admin/comments'
	]);


	\Bridge\Menu::item('admin', [
		'id'	=> 'members',
		'title' => 'Members',
		'description' => '',
		'icon' => 'mdi mdi-artist',
		'path' => '/admin/members'
	]);

	$schemas= \Bridge\Model::all();;
	if($schemas) {
		foreach ($schemas as $key => $schema) {
			if(is_array($schema)) {
				$schema = (object)$schema;
			}

			if(($schema->virtual && $schema->virtualType === 'post_type') || $schema->virtual && $schema->virtualType === 'post') {
					\Bridge\Menu::item('admin', [
					'parent'	=> 'content', 
					'id'	=> 'content_sd'.$schema->id,
					'title' => isset($schema->meta['title']) ? $schema->meta['title'] : $schema->id,
					'description' => '',
					'icon' => isset($schema->meta['icon']) ? $schema->meta['icon'] : $schema->id,
					'path' => '/admin/content/'.$schema->id
				]);
			} else if($schema->virtual && $schema->virtualType === 'taxonomy') {
				\Bridge\Menu::item('admin', [
					'parent'	=> 'term',
					'id'	=> 'taxonomy_'.$schema->id,
					'title' => isset($schema->meta['title']) ? $schema->meta['title'] : $schema->id,
					'description' => '',
					'icon' => isset($schema->meta['icon']) ? $schema->meta['icon'] : $schema->id,
					'path' => '/admin/term/'.$schema->id
				]);
			} else {
				\Bridge\Menu::item('admin', [
					'parent'	=> 'data',
					'id'	=> 'data_'.$schema->id,
					'title' => isset($schema->meta['title']) ? $schema->meta['title'] : $schema->id,
					'description' => '',
					'icon' => isset($schema->meta['icon']) ? $schema->meta['icon'] : $schema->id,
					'path' => '/admin/data/'.$schema->id
				]);
			
			}
		}
	}




	\Bridge\Menu::menu('console', [
		'id' => 'console',
		'title' => 'Console Menu',
		'description' => '',
		'icon' => 'dripicons-rocket'
	]);

	\Bridge\Menu::item('console', [
		'id'	=> 'general',
		'title' => 'Console',
		'description' => '',
		'icon' => 'dripicons-rocket',
		'path' => '/bridge_option'
	]);
	\Bridge\Menu::item('console', [
		'id'	=> 'config',
		'title' => "Settings",
		'description' => '',
		'icon' => 'dripicons-rocket',
		'path' => '/option_template'
	]);
	\Bridge\Menu::item('console', [
		'id'	=> 'debug',
		'title' => "Debug",
		'description' => '',
		'icon' => 'dripicons-rocket',
		'path' => '/option_template'
	]);
	\Bridge\Menu::item('console', [
		'id'	=> 'cronjob',
		'title' => "Cronjobs",
		'description' => '',
		'icon' => 'dripicons-rocket',
		'path' => '/option_template'
	]);
	
	\Bridge\Menu::item('console', [
		'id'	=> 'apis',
		'title' => "Swagger",
		'description' => '',
		'icon' => 'dripicons-rocket',
		'path' => '/option_template'
	]);
	\Bridge\Menu::item('console', [
		'id'	=> 'apps',
		'title' => "App's",
		'description' => '',
		'icon' => 'dripicons-rocket',
		'path' => '/option_template'
	]);
	\Bridge\Menu::item('console', [
		'id'	=> 'help',
		'title' => "Helps",
		'description' => '',
		'icon' => 'dripicons-rocket',
		'path' => '/option_template'
	]);

	\Bridge\Menu::menu('member_aside', [
		'id' => 'member_aside',
		'title' => 'Member Menu',
		'description' => '',
		'icon' => 'dripicons-rocket'
	]);

	\Bridge\Menu::item('member_aside', [
		'id'	=> 'general',
		'title' => 'Dashboard',
		'description' => '',
		'icon' => 'dripicons-rocket',
		'path' => '/bridge_option'
	]);
	\Bridge\Menu::item('member_aside', [
		'id'	=> 'option_template',
		'title' => "API's",
		'description' => '',
		'icon' => 'dripicons-rocket',
		'path' => '/option_template'
	]);
	\Bridge\Menu::item('member_aside', [
		'id'	=> 'application',
		'title' => "Applications",
		'description' => '',
		'icon' => 'dripicons-rocket',
		'path' => '/option_template'
	]);
	\Bridge\Menu::item('member_aside', [
		'id'	=> 'documentation',
		'title' => "Docs",
		'description' => '',
		'icon' => 'dripicons-rocket',
		'path' => '/option_template'
	]);


	\Bridge\Menu::menu('member_top', [
		'id' => 'member_aside',
		'title' => 'Member Menu',
		'description' => '',
		'icon' => 'dripicons-rocket'
	]);
	\Bridge\Menu::item('member_top', [
		'id'	=> 'general',
		'title' => 'Dashboard',
		'description' => '',
		'icon' => 'dripicons-rocket',
		'path' => '/bridge_option'
	]);
	\Bridge\Menu::item('member_top', [
		'id'	=> 'option_template',
		'title' => "API's",
		'description' => '',
		'icon' => 'dripicons-rocket',
		'path' => '/option_template'
	]);
	\Bridge\Menu::item('member_top', [
		'id'	=> 'application',
		'title' => "Applications",
		'description' => '',
		'icon' => 'dripicons-rocket',
		'path' => '/option_template'
	]);
	\Bridge\Menu::item('member_top', [
		'id'	=> 'documentation',
		'title' => "Docs",
		'description' => '',
		'icon' => 'dripicons-rocket',
		'path' => '/option_template'
	]);
}); 