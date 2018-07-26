<?php
namespace Bridge\App\Model;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Database\Model\Model;
/**
 * @Bridge\Annotation\Model(
 * name="option", 
 * virtual=true, 
 * virtualType="option",
 * repository = "Bridge\App\Repository\OptionRepository",
 * persistent = "Bridge\App\Persistent\OptionPersistent",
 * meta = {
 * 		"label" = "Options",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
class Option extends Model {

		


}