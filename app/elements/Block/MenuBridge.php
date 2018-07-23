<?php

namespace Bridge\App\Element\Block;


if (!defined('ABSPATH'))
	exit;


use Bridge\Template\Element\Block;
/**
 * @Bridge\Annotation\Element(
 * name="menu_bridge", 
 * type="block", 
 * template="blocks/menu/standard.html.twig",
 * templates={
 * 		
 * },
 * meta= {
 * 		"label" = "Menu Bridge",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
final class MenuBridge extends Block {

	public function data($args = [], $context = []) {
		if(isset($args['menu_id'])) {
			$context['menu'] = \Bridge\Element::type('menu')->query('menu_memory', $args['menu_id'])->results();
		}
		return $context;
	}


	
}


