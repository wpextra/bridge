<?php
namespace Bridge\App\Model;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Database\Model\Model;
/**
 * @Bridge\Annotation\Model(
 * name="comment_meta", 
 * virtual=true, 
 * repository = "Bridge\App\Repository\CommentMetaRepository",
 * persistent = "Bridge\App\Persistent\CommentMetaPersistent"
 * )
 */
class CommentMeta extends Model {

	public $comment_id;

	public $post_id;

	public $meta_key;

	public $meta_value;

	

}