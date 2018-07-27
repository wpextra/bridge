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
 * repository = "Bridge\App\Repository\TermTaxonomyRepository",
 * persistent = "Bridge\App\Persistent\TermTaxonomyPersistent"
 * )
 */
class TermTaxonomy extends Model {

	

}