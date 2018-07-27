<?php
namespace Bridge\App\Model;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Database\Model\Taxonomy;

/**
 * @Bridge\Annotation\Model(
 * name="post_tag", 
 * virtual=true, 
 * virtualType="taxonomy",
 * repository = "Bridge\App\Repository\TermRepository",
 * persistent = "Bridge\App\Persistent\TermPersistent",
 * meta 		= {
 * 		"title"  = "Post Tags"
 * })

 * @Bridge\Annotation\ApiModel(
 * url_base		= "tags", 
 * controller 	= "Bridge\App\Service\TagController",
 * operations 	= {
 * 		"collection"  = "GET",
 *   	"item" 		  = "GET",
 *   	"update" 	  = "PUT",
 *   	"create" 	  = "CREATE",
 *   	"delete" 	  = "DELETE"
 * })
 */
class PostTag extends Taxonomy {




}