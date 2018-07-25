<?php
namespace Bridge\App\Model;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Database\Model\Model;
/**
 * @Bridge\Annotation\Model(
 * name="link", 
 * virtual=true, 
 * virtualType="link",
 * repository = "Bridge\App\Repository\LinkRepository",
 * persistent = "Bridge\App\Persistent\LinkPersistent",
 * meta = {
 * 		"label" = "Comments",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
class Link extends Model {

	

}