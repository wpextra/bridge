<?php
namespace Bridge\App\Model;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Database\Model\Model;
/**
 * @Bridge\Annotation\Model(
 * name="post_meta", 
 * virtual=true, 
 * virtualType="post_meta",
 * repository = "Bridge\App\Repository\PostMetaRepository",
 * persistent = "Bridge\App\Persistent\PostMetaPersistent")
 */
class PostMeta extends Model {

	public $meta_id;

	public $post_id;

	public $meta_key;

	public $meta_value;

	

}