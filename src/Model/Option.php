<?php
namespace Bridge\Model;

if (!defined('ABSPATH')) {
	exit;
}
/**
 * @Bridge\Annotation\Model(
 * name="option", 
 * virtual=true, 
 * virtualType="option",
 * repository = "Bridge\Repository\OptionRepository",
 * persistent = "Bridge\Persistent\OptionPersistent",
 * meta = {
 * 		"label" = "Options",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
class Option extends Model {

	

}