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
 * template="blocks/posts/standard.twig",
 * templates={
 * 		"blocks/posts/list.twig" = "List"
 * },
 * meta= {
 * 		"label" = "Posts",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
class Posts extends Block {

	public function configure() {

		$this->add_option([
			'id' => 'post_type',
			'name' => 'Post Type',
			'type' => 'text',
			'default' => 'post'
		]);

		$this->add_option([
			'id' => 'posts_per_page',
			'name' => 'Per Page',
			'type' => 'text',
			'default' => 12
		]);

	}

	/**
	 * Expose controller to API Resource
	 * @Bridge\Annotation\ApiMethod(
	 * name 	= "block_api",
	 * path 	= "blocks/posts", 
	 * methods 	= "GET",
	 * params 	= {
	 * })
	 */
	static public function api_response($request) {
		return [];
	}

	/**
	 * @Bridge\Annotation\ApiMethod(
	 * name 	= "block_api",
	 * path 	= "blocks/posts/data", 
	 * methods 	= "GET",
	 * params 	= {
	 * })
	 */
	static public function api_response_data($request) {

	}
	

	public function data($args = [], $context = []) {
	
		$context['posts'] = \Bridge\Query::model('post')->query('all', array($args))->results();
		
		return $context;
	}
}