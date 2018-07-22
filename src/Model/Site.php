<?php
namespace Bridge\Model;

if (!defined('ABSPATH')) {
	exit;
}
/**
 * @Bridge\Annotation\Model(
 * name="site", 
 * virtual=true, 
 * virtualType="site",
 * repository = "Bridge\Repository\SiteRepository",
 * persistent = "Bridge\Persistent\SitePersistent",
 * meta = {
 * 		"label" = "Comments",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
class Site extends Model {

	

}