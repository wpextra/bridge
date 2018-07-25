<?php

namespace Bridge\App\Element\Block;


if (!defined('ABSPATH'))
	exit;

use Bridge\Template\Element\Block;

/**
 * @Bridge\Annotation\Element(
 * name="widget", 
 * type="block",
 * template="blocks/widget/standard.twig",
 * templates={
 * 		
 * }, 
 * meta= {
 * 		"label" = "Widget",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
final class Widget extends Block {


	public function data($args = [], $context = []) {
		$data = [];
		if(isset($args['name'])) {
			$widget_name = $args['name'];
			if ( is_active_sidebar($widget_name) ) :
				ob_start(); 
				dynamic_sidebar($widget_name);
				$data['widget'] = ob_get_clean();
			endif;
		}
		return $data;
	}
}