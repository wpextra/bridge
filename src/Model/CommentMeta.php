<?php
namespace Bridge\Model;

if (!defined('ABSPATH')) {
	exit;
}
/**
 * @Bridge\Annotation\Model(
 * name="comment_meta", 
 * virtual=true, 
 * virtualType="comment_meta",
 * repository = "Bridge\Repository\CommentMetaRepository",
 * persistent = "Bridge\Persistent\CommentMetaPersistent",
 * meta = {
 * 		"label" = "Comments",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
class CommentMeta extends Model {

	

}