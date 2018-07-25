<?php

namespace Bridge\Module\Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

add_action( 'elementor/elements/categories_registered', function($elements_manager) {
	$elements_manager->add_category(
		'wpe-blocks',
		[
			'title' => __( 'Blocks', 'wpe' ),
			'icon' => 'fa fa-plug',
		]
	);
});


add_action( 'elementor/widgets/widgets_registered', function() {
	require_once dirname( __FILE__ ) . '/widget.php';
	$blocks = \Bridge\Block::all();
	foreach ($blocks as $name => $block) {
		$block = \Bridge\Block::get($name);
	
		if(null !== $callable = $block->callable) {

			$class = new Widget();
			$class->setName($block->id);
			$class->setTitle($block->id);
			$class->setOptions($callable->options());
			$class->setIcon('eicon-coding');
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type($class);
		}
	}
});
