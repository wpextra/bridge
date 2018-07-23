<?php

namespace Bridge\Object;


if (!defined('ABSPATH'))
	exit;


class BaseCollection  extends  \ArrayObject  {
	
	public $items = [];
	public $itemClass;

	public function __construct($collections = [], $itemClass = null) {
		parent::__construct($collections);
	}

	public function items($collections = []) {
		$items = [];
		if ( is_null($collections) ) {
			$collections = [];
		}
		foreach ( $collections as $collection ) {
			if (is_a($collection, $this->itemClass) ) {
				$collection = $collection;
			} else {
				$collection = new $this->itemClass($collection);
			}
			if (is_a($collection, $this->itemClass)) {
				$items[] = $collection;
			}
		}
		return $items;
	}

}


