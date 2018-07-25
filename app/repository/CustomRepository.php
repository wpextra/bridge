<?php

namespace Bridge\App\Repository;


if (!defined('ABSPATH'))
	exit;

use Bridge\Object\Post;
use Bridge\Object\PostCollection;
use Bridge\Database\Repository\Repository;

class CustomRepository extends Repository { 
	
	protected $table;

	public function setTable($table) {
		$this->table = $table;
	}

	public function all($args = []) {

		global $wpdb;
		return $wpdb->get_results( 
			"
			SELECT id 
			FROM $wpdb->prefix$this->table"
		);
	}

	public function get($args = []) {

	}

	public function find($name) {

	}

	static public function buildQuery($args = []) {
		return new \WP_Query($args);
	}
}

