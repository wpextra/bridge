<?php
namespace Bridge\App\Model;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Database\Model\Model;
/**
 * @Bridge\Annotation\Model(
 * name="term_meta", 
 * virtual=true, 
 * virtualType="term_meta",
 * repository = "Bridge\App\Repository\TermMetaRepository",
 * persistent = "Bridge\App\Persistent\TermMetaPersistent",
 * meta = {
 * 		"label" = "Comments",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
class TermMeta extends Model {

	

}