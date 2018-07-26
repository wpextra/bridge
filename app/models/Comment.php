<?php
namespace Bridge\App\Model;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Database\Model\Model;
/**
 * @Bridge\Annotation\Model(
 * name="comment", 
 * virtual=true, 
 * virtualType="comment",
 * repository = "Bridge\App\Repository\CommentRepository",
 * persistent = "Bridge\App\Persistent\CommentPersistent",
 * api_controller = "Bridge\App\Service\CommentController",
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
class Comment extends Model {

	 /**
     * @var integer
     */
    public $comment_ID;
    /**
     * @var integer
     */
    public $comment_post_ID;
    /**
     * @var string
     */
    public $comment_author;
    /**
     * @var string
     */
    public $comment_author_email;
    /**
     * @var string
     */
    public $comment_author_url;
    /**
     * @var string
     */
    public $comment_author_IP;
    /**
     * @var DateTime
     */
    public $comment_date;
    /**
     * @var DateTime
     */
    public $comment_date_gmt;
    /**
     * @var string
     */
    public $comment_content;
    /**
     * @var integer
     */
    public $comment_karma;
    /**
     * @var string
     */
    public $comment_approved;
    /**
     * @var string
     */
    public $comment_agent;
    /**
     * @var string
     */
    public $comment_type;
    /**
     * @var integer
     */
    public $comment_parent;
    /**
     * @var integer
     */
    public $user_id;
    /**
     * @var array
     */
    public $meta = array();

	

}