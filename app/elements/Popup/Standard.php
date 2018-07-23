<?php
namespace Bridge\App\Element\Popup;

if (!defined('ABSPATH')) {
	exit;
}

use Bridge\Template\Element\Popup;

/**
 * @Bridge\Annotation\Element(
 * name="standard", 
 * type="footer", 
 * template="popup/standard/standard.html.twig",
 * templates={
 * 		"popup/standard/dark.html.twig"="Dark"
 * },
 * meta= {
 * 		"label" = "Standard",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
class Standard extends Popup {

	

}