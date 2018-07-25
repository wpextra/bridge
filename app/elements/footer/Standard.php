<?php
namespace Bridge\App\Element\Footer;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Template\Element\Footer;

/**
 * @Bridge\Annotation\Element(
 * name="standard", 
 * type="footer", 
 * template="footer/standard/standard.twig",
 * templates={
 * 		"footer/standard/dark.twig"="Dark"
 * },
 * meta= {
 * 		"label" = "Standard",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */

class Standard extends Footer {

	

}