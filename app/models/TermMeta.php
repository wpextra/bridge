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
 * repository = "Bridge\App\Repository\TermMetaRepository",
 * persistent = "Bridge\App\Persistent\TermMetaPersistent"
 * )
 */

class TermMeta extends Model {

	public $meta_id;

	public $term_id;

	public $meta_key;

	public $meta_value;

}