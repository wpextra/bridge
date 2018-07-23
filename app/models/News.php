<?php
namespace Bridge\App\Model;

if (!defined('ABSPATH')) {
	exit;
}

use Bridge\Model\PostType;
/**
 * @Bridge\Annotation\Model(
 * name="news", 
 * virtual=true, 
 * virtualType="post_type",
 * repository = "Bridge\Repository\PostRepository",
 * persistent = "Bridge\Persistent\PostPersistent",
 * meta = {
 * 		"label" = "News",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
class News extends PostType {

	

}