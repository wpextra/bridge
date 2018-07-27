<?php
namespace Bridge\App\Controller\apis;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Http\Controller\Controller;

/**
 * Expose controller to API Resource
 * @Bridge\Annotation\Api(
 * name="metadata", 
 * path="metadata", 
 * middleware="admin"
 * )
 */
class MetadataController extends Controller {



}