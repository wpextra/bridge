<?php
namespace Bridge\Model;

if (!defined('ABSPATH')) {
	exit;
}
/**
 * @Bridge\Annotation\Model(
 * name="term_taxonomy", 
 * virtual=true, 
 * virtualType="term_taxonomy",
 * repository = "Bridge\Repository\TermTaxonomyRepository",
 * persistent = "Bridge\Persistent\TermTaxonomyPersistent",
 * meta = {
 * 		"label" = "Comments",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
class TermTaxonomy extends Model {

	

}