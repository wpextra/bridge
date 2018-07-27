<?php
namespace Bridge\App\Model;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Database\Model\Model;

/**
 * @Bridge\Annotation\Model(
 * name="option", 
 * virtual=true, 
 * virtualType="option",
 * repository = "Bridge\App\Repository\OptionRepository",
 * persistent = "Bridge\App\Persistent\OptionPersistent"
 * )
 */
class Option extends Model {

	public $option_id;

	public $option_name;

	public $option_value;

	public $autoload;


}