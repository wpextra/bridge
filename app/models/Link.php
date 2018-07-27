<?php
namespace Bridge\App\Model;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Database\Model\Model;
/**
 * @Bridge\Annotation\Model(
 * name="link", 
 * virtual=true, 
 * virtualType="link",
 * repository = "Bridge\App\Repository\LinkRepository",
 * persistent = "Bridge\App\Persistent\LinkPersistent"
 * )
 */
class Link extends Model {

	public $link_id;

	public $link_url;

	public $link_name;

	public $link_image;

	public $link_target;

	public $link_description;

	public $link_visible;

	public $link_owner;

	public $link_rating;

	public $link_updated;

	public $link_rel;

	public $link_notes;

	public $link_rss;

}