<?php
namespace Bridge\Model;

if (!defined('ABSPATH')) {
	exit;
}
/**
 * @Bridge\Annotation\Model(
 * name="term_meta", 
 * virtual=true, 
 * virtualType="term_meta",
 * repository = "Bridge\Repository\TermMetaRepository",
 * persistent = "Bridge\Persistent\TermMetaPersistent",
 * meta = {
 * 		"label" = "Comments",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
class TermMeta extends Model {

	

}