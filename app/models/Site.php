<?php
namespace Bridge\App\Model;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Database\Model\Model;

/**
 * @Bridge\Annotation\Model(
 * name="site", 
 * virtual=true, 
 * virtualType="site",
 * repository = "Bridge\App\Repository\SiteRepository",
 * persistent = "Bridge\App\Persistent\SitePersistent"
 * )
 */
class Site extends Model {

	

}