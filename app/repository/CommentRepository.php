<?php

namespace Bridge\App\Repository;


if (!defined('ABSPATH'))
	exit;

use Bridge\Object\Comment;
use Bridge\Object\CommentCollection;
use Bridge\Database\Repository\Repository;

class CommentRepository extends Repository { 

	public function all($per_page = 10 ) {
		$query = self::buildQuery($args);
		if ( ! empty( $query->get_results() ) ) {
			return new UserCollection($user_query->get_results());
		}
	}

	public function get($args = []) {
		$query = self::buildQuery($args);
		if ( ! empty( $query->get_results() ) ) {
			return new UserCollection($user_query->get_results());
		}
	}

	public function find($name) {
		if(is_numeric($name)) {

		}
		$args = [
		];
		$query = self::buildQuery($args);
		if ( ! empty( $query->get_results() ) ) {
			return new User($user_query->get_results());
		}
	}

	public function getByPost($post, $args = ['per_page' => 10]) {

		$query = self::buildQuery(array_merge([
			'post_id' => $post->id
		], $args));

		if (!empty($query->comments) ) {
			return new CommentCollection($query->comments, $this->model_class);
		}
	}

	static public function buildQuery($args = []) {
		$bridge_query  = new \WP_Comment_Query();
		$bridge_query->query($args);
		return $bridge_query;
	}
	
}

