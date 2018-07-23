<?php

namespace Bridge\Service;


if (!defined('ABSPATH'))
	exit;


class PersistGateway {

	protected $metadata;
	protected $model;
	protected $persist;
	protected $result = [];

	public function __construct($metadata) {
		$this->metadata = $metadata;
		if(isset($metadata->class)) {
			$this->model = new $metadata->class;
		}
		if(isset($metadata->persist)) {
			$class =  $metadata->persist;
			$this->persist = new $class($metadata->class);
		}
	}

	public function persist($method, $args = [], $data = []) {
		if(is_callable(array($this->persist, $method))) {
			return call_user_func_array(array($this->persist, $method), array($args,  $data));
		} else {
			throw new \Exception('This method doesnt exist');
		}
	}

	public function create($args = [], $data = []) {
		return $this->query('create', $args, $data);
	}
	public function update($args = [], $data = []) {
		return $this->query('update', $args, $data);
	}
	public function delete($args = [], $data = []) {
		return $this->query('delete', $args, $data);
	}
}