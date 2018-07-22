<?php

namespace Bridge\Repository;


if (!defined('ABSPATH'))
	exit;

use Bridge\Object\Post;
use Bridge\Object\PostCollection;

class PostRepository extends Repository { 


	public function all($args = []) {
		
		if(!is_array($args)) {
			$args = [];
		}
		$args = array_replace_recursive([
			'posts_per_page' => 10,
			'post_type' => 'any'
		], $args);
		
		$query = self::buildQuery($args);
		if (!empty($query->posts) ) {
			return new PostCollection($query->posts, $query, $this->model_class);
		}
	}

	public function get($args = []) {
		if(!is_array($args)) {
			$args = [];
		}
		$args = array_replace_recursive([
			'posts_per_page' => 10,
			'post_type' => 'any'
		], $args);
		
		$query = self::buildQuery($args);
		if (!empty($query->posts) ) {
			return new PostCollection($query->posts, $query, $this->model_class);
		}
	}

	public function find($name) {
		$args = [];
		$args['post_type'] = 'any';
		if(is_numeric($name)) {
			$args['p'] = $name;
		}
		
		$query = self::buildQuery($args);
		if(count($query->posts) > 0) {
			return new $this->model_class($query->posts[0]);
		}
	}


	public function getByUser($user, $args = []) {
		return ["item" => 'test'];
	}

	static public function buildQuery($args = []) {
		return new \WP_Query($args);
	}
}

