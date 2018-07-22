<?php

namespace Bridge\Repository;


if (!defined('ABSPATH'))
	exit;
use Bridge\Storage\Element as Storage;
use Bridge\Object\MenuItem;
use Bridge\Object\Menu;
use Bridge\Builder\MenuBuilder;

class MenuRepository extends ElementRepository { 

	public function collections() {
		return Storage::instance()->menus;
	}

	public static  function buildFromDB($menu) {
		$menu = new MenuBuilder(wp_get_nav_menu_items($menu));
		$items = $menu->build();
		return new Menu($items);
	}

	public static function buildFromMemory($menu) {
		$menu = new MenuBuilder($menu, '');
		$items = $menu->buildFromMemory();
		return new Menu($items);
	}

	public function all($args = []) {
		$terms = get_terms(array(
			'taxonomy' => 'nav_menu'
		));
		$menus = [];
		foreach ($terms as $key => $term) {
			$menus[$term->term_id] = self::buildFromDB($term->term_id);
		}
		foreach ($this->collections() as $key => $menu) {
			$menus[$key] = array_merge([
				'segment' => $menu['segment'],
				'id' => $menu['id'],
				'title' => $menu['title'],
				'icon' => $menu['icon'],
				'items' => $menu['items']
			]);
		}

		return $menus;
	}

	public function all_memory($args = []) {
		
		$menus = [];
		foreach ($terms as $key => $term) {
			$menus[$term->term_id] = self::buildFromDB($term->term_id);
		}
		return $menus;
	}



	public function find($name) {
		return self::buildFromDB($name);
	}



	public function locations(){
		
		$menus = [];

		$terms = get_terms(array(
			'taxonomy' => 'nav_menu'
		));
		foreach ($terms as $key => $term) {
			$menus[$term->slug] = [
				'segment' => 'wordpress',
				'id' => $term->term_id,
				'title' => $term->name,
				'icon' => '',
				'description' => $term->description
			];
		}

		foreach ($this->collections() as $key => $menu) {
			$menus[$key] = array_merge([
				'segment' => $menu['segment'],
				'id' => $menu['id'],
				'title' => $menu['title'],
				'icon' => $menu['icon'],
				'description' => $menu['description']
			]);
		}
		
		return $menus;
	}

	

	public function menu_wordpress($name) {
		return self::buildFromDB($name);
	}

	public function menu_memory($name) {
		if ( null !== $item = $this->data_find($name) ) {
			return self::buildFromMemory($item);
		}
	}

	
}

