<?php
namespace Bridge\App\Model;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Database\Model\PostType;
/**
 * @Bridge\Annotation\Model(
 * name="post", 
 * virtual=true, 
 * virtualType="post",
 * repository = "Bridge\App\Repository\PostRepository",
 * persistent = "Bridge\App\Persistent\PostPersistent",
 * api_controller = "Bridge\App\Service\PostController",
 * api_routes = {
 * 		"collection" 	= "get_items",
 *   	"item" 			= "get_item",
 *      "create" 		= "create",
 *      "update" 		= "update",
 *      "delete" 		= "delete",
 * },
 * meta = {
 * 		"label" = "Posts",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
class Post extends PostType {

	
	

}