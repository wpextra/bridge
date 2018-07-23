<?php
namespace Bridge\Model;

if (!defined('ABSPATH')) {
	exit;
}
/**
 * @Bridge\Annotation\Model(
 * name="term", 
 * virtual=true, 
 * virtualType="term",
 * repository = "Bridge\Repository\TermRepository",
 * persistent = "Bridge\Persistent\TermPersistent",
 * meta = {
 * 		"label" = "Comments",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
class Term extends Model {
	public $term_id;
	public $name;
	
	public $slug;

	public $term_group;
	

}