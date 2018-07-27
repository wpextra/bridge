<?php

namespace Bridge\App\Element\Block;


if (!defined('ABSPATH'))
	exit;


use Bridge\Template\Element\Block;


/**
 * @Bridge\Annotation\Element(
 * name="filter", 
 * type="block",
 * template="blocks/filter/standard.twig",
 * templates={
 * 		
 * },
 * meta= {
 * 		"label" = "Filter",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
final class Filter extends Block {

	
}