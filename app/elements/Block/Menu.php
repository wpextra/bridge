<?php

namespace Bridge\App\Element\Block;


if (!defined('ABSPATH'))
	exit;


use Bridge\Template\Element\Block;

/**
 * @Bridge\Annotation\Element(
 * name="menu", 
 * type="block", 
 * template="blocks/menu/standard.html.twig",
 * templates={
 * 		
 * },
 * meta= {
 * 		"label" = "Menu",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
final class Menu extends Block {

	public function data($args = [], $context = []) {
		if(isset($args['menu_id'])) {
			$context['menu'] = \Bridge\Element::type('menu')->query('find', $args['menu_id'])->results();
		}
		return $context;
	}

}


