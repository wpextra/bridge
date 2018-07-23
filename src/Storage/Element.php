<?php

namespace Bridge\Storage;


if (!defined('ABSPATH'))
	exit;
use Bridge\Helper\Reader;

class Element {

	public $categories = [];
	public $headers = [];
	public $footers = [];
	public $blocks = [];
	public $popups = [];
	public $menus = [];
	public $widgets = [];

	public function add_category($name, $class) {
		$this->categories[$name] = $class;
	}

	public function add_header($class) {
		$reader = new Reader();
		$annotation = $reader->element(get_class($class));
		if($annotation) {
			$data = [];
			$data['id'] = $annotation->name;
			$data['type'] = $annotation->type;
			$data['class'] = get_class($class);
			$data['meta'] = $annotation->meta;
			$this->headers[] = $data;
		}
	}

	public function add_footer($class) {
		$reader = new Reader();
		$annotation = $reader->element(get_class($class));
		if($annotation) {
			$data = [];
			$data['id'] = $annotation->name;
			$data['type'] = $annotation->type;
			$data['class'] = get_class($class);
			$data['meta'] = $annotation->meta;
			$this->footers[] = $data;
		}
	}

	public function add_popup($class) {
		$reader = new Reader();
		$annotation = $reader->element(get_class($class));
		if($annotation) {
			$data = [];
			$data['id'] = $annotation->name;
			$data['type'] = $annotation->type;
			$data['class'] = get_class($class);
			$data['meta'] = $annotation->meta;
			$this->popups[] = $data;
		}
	}

	public function add_block($class) {
		$reader = new Reader();
		$annotation = $reader->element(get_class($class));
		if($annotation) {
			$data = [];
			$data['id'] = $annotation->name;
			$data['type'] = $annotation->type;
			$data['class'] = get_class($class);
			$data['meta'] = $annotation->meta;
			$this->blocks[] = $data;
		}
	}

	public function add_widget($widget) {
		$this->widgets[] = array_merge([
			'id'            =>   
			'description'   => '',
			'class'         => '',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>'
		], $widget);
	}

	public function add_menu($data) {
		$this->menus[] = array_merge([
			'id'	=> $name,
			'items' => []
		], $data);
	}

	public function add_menu_item($menu, $item) {
		if(isset($this->menus[$menu])) {
			$this->menus[$menu]['items'][] = $item;
		}
	}


	private static $instance;
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	public function __clone() {
		_doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', 'bridge'), '1.6');
	}
	public function __wakeup() {
		_doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', 'bridge'), '1.6');
	}
}