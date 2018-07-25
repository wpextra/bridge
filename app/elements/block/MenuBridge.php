<?php

namespace Bridge\App\Element\Block;


if (!defined('ABSPATH'))
	exit;


use Bridge\Template\Element\Block;
/**
 * @Bridge\Annotation\Element(
 * name="menu_bridge", 
 * type="block", 
 * template="blocks/menu/memory.twig",
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
			 $context['menu'] = \Bridge\Menu::load($args['menu_id']);
		}
		return $context;
	}
}


