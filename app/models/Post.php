<?php
namespace Bridge\App\Model;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Database\Model\PostType;

/**
 * @Bridge\Annotation\Model(
 * name="post", 
 * virtual=true, 
 * virtualType="post",
 * repository = "Bridge\App\Repository\PostRepository",
 * persistent = "Bridge\App\Persistent\PostPersistent",
 * meta 		= {
 * 		"title"  = "Posts"
 * })
 * @Bridge\Annotation\ApiModel(
 * url_base		= "posts", 
 * controller 	= "Bridge\App\Service\PostController",
 * operations 	= {
 * 		"collection"  = "GET",
 *   	"item" 		  = "GET",
 *   	"update" 	  = "PUT",
 *   	"create" 	  = "CREATE",
 *   	"delete" 	  = "DELETE"
 * })
 */
class Post extends PostType {

	
	

}