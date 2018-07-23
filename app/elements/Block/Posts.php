<?php
namespace Bridge\App\Element\Block;

if (!defined('ABSPATH')) {
	exit;
}

use Bridge\Template\Element\Block;

/**
 * @Bridge\Annotation\Element(
 * name="posts", 
 * type="block",
 * template="blocks/posts/standard.html.twig",
 * templates={
 * 		
 * },
 * api_routes= {
 * 		"html" = "api_response",
 *   	"data" = "api_response_data"
 * },
 * meta= {
 * 		"label" = "Posts",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
class Posts extends Block {

	static public function api_response($request) {
		return [];
	}
	static public function api_response_data($request) {

	}
	
	public function data($args = [], $context = []) {
		
		$context['posts'] = \Bridge\Query::model('post')->query('all', $args)->results();
		
		return $context;
	}

	

}