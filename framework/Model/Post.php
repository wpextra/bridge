<?php
namespace Bridge\Model;

if (!defined('ABSPATH')) {
	exit;
}
/**
 * @Bridge\Annotation\Model(
 * name="post", 
 * virtual=true, 
 * virtualType="post",
 * repository = "Bridge\Repository\PostRepository",
 * persistent = "Bridge\Persistent\PostPersistent",
 * meta = {
 * 		"label" = "Posts",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
class Post extends Model {

	protected $mappings = [
		'id'	=> 'ID'
	];
	
	public $ID;
	public $post_author;
	public $post_date;
	public $post_date_gmt;
	public $post_content;
	public $post_title;
	public $post_excerpt;
	public $post_status;
	public $comment_status;
	public $ping_status;
	public $post_password;
	public $post_name;
	public $to_ping;
	public $pinged;
	public $post_modified;
	public $post_modified_gmt;
	public $post_content_filtered;
	public $post_parent;
	public $guid;
	public $menu_order;
	public $post_type;
	public $post_mime_type;
	public $comment_count;
	
	
	

}