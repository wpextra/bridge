<?php
namespace Bridge\App\Model;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Database\Model\Model;
/**
 * @Bridge\Annotation\Model(
 * name="term_taxonomy", 
 * virtual=true, 
 * virtualType="term_taxonomy",
 * repository = "Bridge\App\Repository\TermTaxonomyRepository",
 * persistent = "Bridge\App\Persistent\TermTaxonomyPersistent",
 * meta = {
 * 		"label" = "Comments",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
class TermTaxonomy extends Model {

	

}