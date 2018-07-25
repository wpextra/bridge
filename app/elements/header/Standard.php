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
 * template="header/standard/standard.twig",
 * meta={
 * 		"header/standard/dark.twig"="Dark"
 * },
 * meta={
 * 		"label"="Standard",
 *   	"description"= "",
 *    	"icon"= "fa fa-home"
 * })
 */
class Standard extends Header {

	public function configure() {
		$this->add_option([
			'name' => 'header_logo',
			'title' => 'Logo',
			'type' => 'file_input'
		]);
		$this->add_option([
			'name' => 'header_menu',
			'title' => 'Header Menu',
			'type' => 'text'
			
		]);
	}

}