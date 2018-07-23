<?php
namespace Bridge\App\Element\Header;

if (!defined('ABSPATH')) {
	exit;
}

use Bridge\Template\Element\Header;

/**
 * @Bridge\Annotation\Element(
 * name="standard", 
 * type="header", 
 * template="theme/header/standard/standard.html.twig",
 * meta={
 * 		"theme/header/standard/dark.html.twig"="Dark"
 * },
 * meta={
 * 		"label"="Standard",
 *   	"description"= "",
 *    	"icon"= "fa fa-home"
 * })
 */
class Standard extends Header {

	public function data($args = [], $context = []) {

		return $context;
	}

}