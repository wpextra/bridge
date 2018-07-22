<?php

namespace Bridge\Repository;


if (!defined('ABSPATH'))
	exit;


abstract class Repository implements RepositoryInterface {

	protected $model;
	protected $model_class;

	public function __construct($model_class = null) {
		if($model_class) {
			$this->model_class = $model_class;
			$this->model = new $model_class();
		}
	}

	public function get($args = []) {
		return [];
	}
	
	public function all($args = []) {
		
	}
	public function find($name) {
		return [];
	}
}

