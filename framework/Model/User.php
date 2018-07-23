<?php
namespace Bridge\Model;

if (!defined('ABSPATH')) {
	exit;
}
/**
 * @Bridge\Annotation\Model(
 * name="user", 
 * virtual=true, 
 * virtualType="user",
 * repository = "Bridge\Repository\UserRepository",
 * persistent = "Bridge\Persistent\UserPersistent",
 * meta = {
 * 		"label" = "Comments",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
class User extends Model {

	

}