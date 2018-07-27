<?php
namespace Bridge\App\Model;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Database\Model\Model;

/**
 * @Bridge\Annotation\Model(
 * name="term_relationship", 
 * virtual=true, 
 * repository = "Bridge\App\Repository\TermRelationshipRepository",
 * persistent = "Bridge\App\Persistent\TermRelationshipPersistent"
 * )
 */
class TermRelationship extends Model {

	public $object_id;

	public $term_taxonomy_id;

	public $term_order;

}