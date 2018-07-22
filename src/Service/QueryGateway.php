<?php

namespace Bridge\Service;


if (!defined('ABSPATH'))
	exit;


class QueryGateway {

	protected $metadata;
	protected $model;
	protected $repository;
	protected $result = [];

	public function __construct($metadata) {
		$this->metadata = $metadata;
		if(isset($metadata->class)) {
			$this->model = new $metadata->class;
		}
		if(isset($metadata->repository)) {
			$class =  $metadata->repository;
			$this->repository = new $class($metadata->class);
		}
	}

	public function query($method, $args = [], $schema = []) {
		$final_args = [];
		if(is_array($args)) {
			$multi =  false;
			if(count($args) == 1) {
				if(isset($args[0])) {
					$final_args = $args;
				} else {
					$final_args = array($args);
				}
			} else if (count($args) > 1) {
				$subargs = [];
				foreach ($args as $key => $arg) {
					$subargs[] = $arg;
				}
				$final_args = $subargs;
			} else {
				$final_args = array($args);
			}
		} else {
			$final_args = array($args);
		}
		if(is_callable(array($this->repository, $method))) {
			$result = call_user_func_array(array($this->repository, $method), $final_args);
			if($result) {
				$this->result = $this->mapper($result, $schema);
			}
		} else {
			throw new \Exception('This method doesnt exist');
		}
		return $this;
	}

	public function get($args = [], $schema = []) {
		return $this->query('get', $args, $schema);
	}
	public function find($args = [], $schema = []) {
		return $this->query('find', $args, $schema);
	}
	public function find_by($args = [], $schema = []) {
		return $this->query('findBy', $args, $schema);
	}

	public function has($method = null) {
		if(is_callable(array($this->metadata, $method))) {
			return true;
		}
		return false;
	}

	public function mapper($data, $schema) {
			
		if($data instanceof \ArrayObject) {
			$items = [];
			foreach ($data as $key => $item) {
				$items[$key] = $this->import($item, $schema);
			}
			$data->exchangeArray($items);
		} else {
			$data = $this->import($data, $schema);
		}
		return $data;
	}

	public function import($data, $schema = []) {

		$scappers = [];
		foreach ($schema as $key => $k) {
			$args = [];
			$map = $k;
			if(is_array($k)) {
				$map = $key;
				$args = $k;
			}
			$scappers[$map] = $args;
		}

		if(isset($this->metadata->properties)) {
			foreach ($this->metadata->properties as $key => $property) {
				$map = $property['name'];
				$args = isset($scappers[$map]) ? $scappers[$map] : [];

				$item = isset($data->$map) ? $data->$map : null;


				$method = 'do'.join('', array_map('ucfirst', explode('_', $map)));
				if(is_callable(array($data, $method))) {
					$item = call_user_func_array(array($data, $method), array($data, $args));
				}

				if(isset($scappers[$map]) && (null == $item || empty($item))) {
					if(isset($property['relation']) && isset($property['relation_target']) && isset($property['query']) ) {
						$model = $property['relation_target'];
						$method = $property['query'];
						$gateway = \Bridge\Query::model($model);
						if($gateway) {
							$sub_args = [];
							$sub_args[] = $data;
							$sub_args[] = $args;
							$sub_schema = [];
							if(is_callable(array($gateway, 'query'))) {
								$function = call_user_func_array(array($gateway, 'query'), array($method, $sub_args, $sub_schema));
								$item = $function->results();
							}
						}
					}
				}
				$data->$map = $item;
			}
		}
		return $data;
	}

	public function annotation($object, $property) {
		$reader = new Reader();
		$result = $reader->property($object, $property);
		if($result) {
			return $result[0];
		}
		return;
	}


	private function is_collection($data) {
		if(is_array($data) || $data instanceof \ArrayObject) {
			return true;
		}
		return false;
	}

	function arrayToObject( $array ) {
		if ( !is_array( $array ) && !is_object( $array ) ) {
			return $array;
		}
		$obj = new stdClass();
		if( ( is_array( $array ) || is_object( $array ) ) && count( $array ) > 0 ) {
			foreach( $array as $k=>$v ) {
				$obj->$k = arrayToObject( $v );
			}
			return $obj;
		} else {
			return false;
		}
	}
	public function result() {
		return $this->result;
	}

	public function results() {
		return $this->result;
	}

	public function resultArray() {
		return json_decode(json_encode($this->result));
	}
}