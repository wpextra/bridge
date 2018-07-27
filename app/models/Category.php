<?php
namespace Bridge\App\Model;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Database\Model\Taxonomy;

/**
 * @Bridge\Annotation\Model(
 * name="category", 
 * virtual=true, 
 * virtualType="taxonomy",
 * repository = "Bridge\App\Repository\TermRepository",
 * persistent = "Bridge\App\Persistent\TermPersistent",
 * meta 		= {
 * 		"title"  = "Categories"
 * })
 * @Bridge\Annotation\ApiModel(
 * url_base		= "categories", 
 * controller 	= "Bridge\App\Service\TermController",
 * operations 	= {
 * 		"collection"  = "GET",
 *   	"item" 		  = "GET",
 *   	"update" 	  = "PUT",
 *   	"create" 	  = "CREATE",
 *   	"delete" 	  = "DELETE"
 * })
 */
class Category extends Taxonomy {





}