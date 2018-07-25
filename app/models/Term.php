<?php
namespace Bridge\App\Model;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Database\Model\Taxonomy;
/**
 * @Bridge\Annotation\Model(
 * name="category", 
 * virtual=true, 
 * virtualType="term",
 * repository = "Bridge\App\Repository\TermRepository",
 * persistent = "Bridge\App\Persistent\TermPersistent",
 * api_controller = "Bridge\App\Service\TermController",
 * api_routes = {
 * 		"collection" 	= "get_items",
 *   	"item" 			= "get_item",
 *      "create" 		= "create",
 *      "update" 		= "update",
 *      "delete" 		= "delete",
 * },
 * meta = {
 * 		"label" = "Comments",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
class Category extends Taxonomy {
	public $term_id;
	public $name;
	
	public $slug;

	public $term_group;
	

}