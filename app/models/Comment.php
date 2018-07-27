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
 * repository = "Bridge\App\Repository\CommentRepository",
 * persistent = "Bridge\App\Persistent\CommentPersistent",
 * )


 * @Bridge\Annotation\ApiModel(
 * url_base		= "comments", 
 * controller 	= "Bridge\App\Service\CommentController",
 * operations 	= {
 * 		"collection"  = "GET",
 *   	"item" 		  = "GET",
 *   	"update" 	  = "PUT",
 *   	"create" 	  = "CREATE",
 *   	"delete" 	  = "DELETE"
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