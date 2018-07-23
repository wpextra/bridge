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
 * template="theme/footer/standard/standard.html.twig",
 * templates={
 * 		"theme/footer/standard/dark.html.twig"="Dark"
 * },
 * meta= {
 * 		"label" = "Standard",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
class Standard extends Footer {

	

}