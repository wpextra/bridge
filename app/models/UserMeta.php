<?php
namespace Bridge\App\Model;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Database\Model\Model;
/**
 * @Bridge\Annotation\Model(
 * name="user_meta", 
 * virtual=true, 
 * virtualType="user_meta",
 * repository = "Bridge\App\Repository\UserMetaRepository",
 * persistent = "Bridge\App\Persistent\UserMetaPersistent",
 * meta = {
 * 		"label" = "Comments",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
class UserMeta extends Model {

	

}