<?php

namespace Bridge\App\Repository;


if (!defined('ABSPATH'))
	exit;

use Bridge\Object\Term;
use Bridge\Object\TermCollection;
use Bridge\Database\Repository\Repository;

class TermRepository extends Repository { 
	
	public function all($args = []) {

		if(!is_array($args)) {
			$args = [];
		}
		$args = array_replace_recursive([
			'taxonomy' => 'category'
		], $args);
		
		$query = self::buildQuery($args);
		if (!empty($query->terms) ) {
			return new TermCollection($query->terms, $query);
		}
	}

	public function get($args = []) {
		$query = self::buildQuery($args);
		if ( ! empty( $query->terms ) ) {
			return new TermCollection($query->terms);
		}
	}

	public function find($name) {
		$args = [];
		if(is_numeric($name)) {
			$args['term_id'] = $name;
		}
		
		$query = self::buildQuery($args);
		if(count($query->terms) > 0) {
			return new Term($query->terms[0]);
		}
	}


	static public function buildQuery($args = []) {
		return new \WP_Term_Query($args);
	}
	
}

