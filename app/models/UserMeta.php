<?php
namespace Bridge\App\Model;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Database\Model\Model;
/**
 * @Bridge\Annotation\Model(
 * name="user_meta", 
 * virtual=true, 
 * virtualType="user_meta",
 * repository = "Bridge\App\Repository\UserMetaRepository",
 * persistent = "Bridge\App\Persistent\UserMetaPersistent")
 */
class UserMeta extends Model {

	public $umeta_id;

	public $user_id;

	public $meta_key;

	public $meta_value;

}