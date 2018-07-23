<?php

namespace Bridge\App\Element\Block;


if (!defined('ABSPATH'))
	exit;


use Bridge\Template\Element\Block;
/**
 * @Bridge\Annotation\Element(
 * name="post", 
 * type="block",
 * template="blocks/post/standard.html.twig",
 * templates={
 * 		
 * }, 
 * meta= {
 * 		"label" = "Post",
 *   	"description" = "",
 *    	"icon"	= "fa fa-home"
 * })
 */
final class Post extends Block {
	public function data($args = [], $context = []) {
		$context['post'] = \Bridge\Query::model('post')->query('find', $args)->results();
		return $context;
	}
}


