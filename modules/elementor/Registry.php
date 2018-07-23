<?php

namespace Bridge\Module\Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

use Bridge\Module\Elementor\Widget;

class Registry  {


	public function __construct() {
		add_action( 'elementor/widgets/widgets_registered', array(&$this, 'init'));

	}
	public function init() {
		add_action( 'elementor/elements/categories_registered', array(&$this, 'register_category'));
		require __DIR__ . '/Widget.php';
		$this->register_widget();
	}

	public function register_category( $elements_manager) {
		$elements_manager->add_category(
			'wpe-blocks',
			[
				'title' => __( 'Blocks', 'wpe' ),
				'icon' => 'fa fa-plug',
			]
		);
	}

	public function register_widget() {
		$blocks = \Bridge\Element::type('block')->query('all', null, ['callable'])->results();
		foreach ($blocks as $name => $block) {
			if(null !== $callable = $block->callable) {
				$class = new Widget();
				$class->setName($block->id);
				$class->setTitle($block->title);
				$class->setOptions($callable->options());
				$class->setIcon('eicon-coding');
				\Elementor\Plugin::instance()->widgets_manager->register_widget_type($class);
			}
		}
	}
}