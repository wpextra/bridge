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

	 /**
     * @var integer
     */
    public $ID;
    /**
     * @var string
     */
    public $user_login;
    /**
     * @var string
     */
    public $user_pass;
    /**
     * @var string
     */
    public $user_nicename;
    /**
     * @var string
     */
    public $user_email;
    /**
     * @var string
     */
    public $user_url;
    /**
     * @var DateTime
     */
    public $user_registered;
    /**
     * @var string
     */
    public $user_activation_key;
    /**
     * @var string
     */
    public $user_status;
    /**
     * @var string
     */
    public $display_name;
    /**
     * @var array
     */
    public $meta = array();


}