<?php

namespace Bridge\Builder;
 

if (!defined('ABSPATH'))
	exit;

use Bridge\Object\RawMenuItem;

class MenuBuilder {

	protected $items;

	public function __construct($items) {
		$this->items = $items;
	}

	public function build() {
		$index = array();
		$menu = array();
		foreach ($this->items as $item ) {
			if ( isset($item->ID) ) {
				$index[$item->ID] = new RawMenuItem($item);
			}
		}
		foreach ( $index as $item ) {
			if (isset($item->parent) && $item->parent && isset($index[$item->parent]) ) {
				$index[$item->parent]->add_child($item);
			} else {
				$menu[] = $item;
			}
		}
		return $menu;
	}

	public function buildFromMemory() {
		$index = array();
		$menu = array();
		foreach ($this->items['items'] as $item ) {
			if ( isset($item['id']) ) {
				$index[$item['id']] = new RawMenuItem($item);
			}
		}
		foreach ( $index as $item ) {
			if (isset($item->parent) && $item->parent && isset($index[$item->parent]) ) {
				$index[$item->parent]->add_child($item);
			} else {
				$menu[] = $item;
			}
		}
		return $menu;
	}
	
}