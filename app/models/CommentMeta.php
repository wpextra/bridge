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
 * virtualType="comment_meta",
 * repository = "Bridge\App\Repository\CommentMetaRepository",
 * persistent = "Bridge\App\Persistent\CommentMetaPersistent",
 * meta = {
 * 		"label" = "Comments",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
class CommentMeta extends Model {

	

}