<?php

namespace Bridge\Object;


if (!defined('ABSPATH'))
	exit;


class RawMenuItem extends BaseObject {

	public $id;
	public $name;
	public $title;
	public $description;
	public $content;
	public $thumbnail;
	public $guid;
	public $url;
	public $parent = 0;
	public $level = 0;
	public $order = 0;
	public $classes;
	public $route;
	public $link;
	public $childrens = array();
	public $segment;
	

	protected $mappings = [
		'id'	=> 'ID',
		'parent'	=> 'menu_item_parent',
		'order' => 'menu_order'
	];

	private $type;

	public function __construct($item) {
		$this->item = $item;
		$this->_extractor($item);
	}

	public function doTitle() {
		$title = null;
		if(null == $title && isset($item->title)) {
			$title = $item->title;
		}
		if(null == $title && isset($item->__title)) {
			$title = $item->__title;
			echo $title;
		}
		if(null == $title && isset($item->post_title)) {
			$title = $item->post_title;
		}

		return $title;
	}

	public function doUrl() {
		if ( !isset($this->url) || !$this->url ) {
			if ( isset($this->_menu_item_type) && $this->_menu_item_type == 'custom' ) {
				$this->url = $this->_menu_item_url;
			} else if ( isset($this->menu_object) && method_exists($this->menu_object, 'get_link') ) {
				$this->url = $this->menu_object->link();
			}
		}
		return $this->url;
	}


	public function add_child( $item ) {
		$this->classes['has-children'] = 'has-children';
		$this->childrens[] = $item;
	}
}


