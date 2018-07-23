<?php
namespace Bridge\Model;

if (!defined('ABSPATH')) {
	exit;
}
/**
 * @Bridge\Annotation\Model(
 * name="link", 
 * virtual=true, 
 * virtualType="link",
 * repository = "Bridge\Repository\LinkRepository",
 * persistent = "Bridge\Persistent\LinkPersistent",
 * meta = {
 * 		"label" = "Comments",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
class Link extends Model {

	

}