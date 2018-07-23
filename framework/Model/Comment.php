<?php
namespace Bridge\Model;

if (!defined('ABSPATH')) {
	exit;
}
/**
 * @Bridge\Annotation\Model(
 * name="comment", 
 * virtual=true, 
 * virtualType="comment",
 * repository = "Bridge\Repository\CommentRepository",
 * persistent = "Bridge\Persistent\CommentPersistent",
 * meta = {
 * 		"label" = "Comments",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
class Comment extends Model {

	

}