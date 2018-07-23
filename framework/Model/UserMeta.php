<?php
namespace Bridge\Model;

if (!defined('ABSPATH')) {
	exit;
}
/**
 * @Bridge\Annotation\Model(
 * name="user_meta", 
 * virtual=true, 
 * virtualType="user_meta",
 * repository = "Bridge\Repository\UserMetaRepository",
 * persistent = "Bridge\Persistent\UserMetaPersistent",
 * meta = {
 * 		"label" = "Comments",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
class UserMeta extends Model {

	

}