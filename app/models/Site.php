<?php
namespace Bridge\App\Model;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Database\Model\Model;
/**
 * @Bridge\Annotation\Model(
 * name="site", 
 * virtual=true, 
 * virtualType="site",
 * repository = "Bridge\App\Repository\SiteRepository",
 * persistent = "Bridge\App\Persistent\SitePersistent",
 * api_controller = "Bridge\App\Service\SiteController",
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
class Site extends Model {

	

}