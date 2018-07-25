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
 * persistent = "Bridge\App\Persistent\PostMetaPersistent",
 * meta = {
 * 		"label" = "Comments",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
class PostMeta extends Model {

	

}