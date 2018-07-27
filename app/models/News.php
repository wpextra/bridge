<?php
namespace Bridge\App\Model;

if (!defined('ABSPATH')) {
	exit;
}

use Bridge\Database\Model\PostType;

/**
 * @Bridge\Annotation\Model(
 * name="news", 
 * virtual=true, 
 * virtualType="post_type",
 * repository = "Bridge\App\Repository\PostRepository",
 * persistent = "Bridge\App\Persistent\PostPersistent",
 * meta 		= {
 * 		"title"  = "News"
 * })
 */
class News extends PostType {

	/**
	 * @Bridge\Annotation\Field(
	 * type="text"
	 * )
	 * */
	public $headline;


	

}