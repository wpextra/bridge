<?php

namespace Bridge\Object;


if (!defined('ABSPATH'))
	exit;


class MenuItem extends BaseObject {

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

	public function doChildrens() {
		$childrens = [];
		if(isset($this->item->childrens)) {
			foreach ($this->item->childrens as $key => $child) {
				$childrens[] = new MenuItem($child);
			}
		}
		return $childrens;
	}

}


