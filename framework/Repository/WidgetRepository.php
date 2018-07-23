<?php

namespace Bridge\Repository;


if (!defined('ABSPATH'))
	exit;

use Bridge\Storage\Element as Storage;
use Bridge\Object\Element;
use Bridge\Object\ElementCollection;

class WidgetRepository extends Repository { 
	
	public function collections() {
		return Storage::instance()->widgets;
	}


	public function all($args = []) {
		if (!empty($this->collections()) ) {
			return $this->collections();
		}
	}

	public function find($name) {
		if ( null !== $item = $this->data_find($name) ) {
			return new $item;
		}
	}
}
