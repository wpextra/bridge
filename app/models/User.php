<?php
namespace Bridge\App\Model;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Database\Model\Model;
/**
 * @Bridge\Annotation\Model(
 * name="user", 
 * virtual=true, 
 * virtualType="user",
 * repository = "Bridge\App\Repository\UserRepository",
 * persistent = "Bridge\App\Persistent\UserPersistent",
 * api_controller = "Bridge\App\Service\UserController",
 * api_routes = {
 * 		"collection" 	= "get_items",
 *   	"item" 			= "get_item",
 *      "create" 		= "create",
 *      "update" 		= "update",
 *      "delete" 		= "delete",
 * },
 * meta = {
 * 		"label" = "Users",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
class User extends Model {

	

}