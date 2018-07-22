<?php
namespace Bridge\Model;

if (!defined('ABSPATH')) {
	exit;
}
/**
 * @Bridge\Annotation\Model(
 * name="post_meta", 
 * virtual=true, 
 * virtualType="post_meta",
 * repository = "Bridge\Repository\PostMetaRepository",
 * persistent = "Bridge\Persistent\PostMetaPersistent",
 * meta = {
 * 		"label" = "Comments",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
class PostMeta extends Model {

	

}