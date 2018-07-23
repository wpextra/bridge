<?php

namespace Bridge\Service;


if (!defined('ABSPATH'))
	exit;


class PersistentGateway {

	protected $repository;
	protected $result;

	public function __construct($repository) {
		$this->repository = $repository;
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
			$this->result = $this->mapper($result, $schema);
		}
		return $this;
	}
	public function table($table) {
		if(is_callable(array($this->repository, 'setTable'))) {
			$this->repository->setTable($table);
		}
		return $this;
	}


	public function get() {
		return $this->result;
	}

	public function getArray() {
		return json_decode(json_encode($this->result));
	}

	public function has($method = null) {

		if(is_callable(array($this->repository, $method))) {
			return true;
		}
		return false;
	}

	public function persist($method, $args = []) {

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

	public function import($data, $schema) {
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

		if(is_callable(array($data, 'properties'))) {

			foreach ($data->properties() as $key => $k) {
				$map = $k;

				if(isset($data->$map) && !is_array($data->$map)) {
					continue;
				}

				$args = isset($scappers[$map]) ? $scappers[$map] : [];
				$item = $data->$map;
				$method = 'do'.join('', array_map('ucfirst', explode('_', $map)));

				if(is_callable(array($data, $method))) {
					$item = call_user_func_array(array($data, $method), array($args));
				}


				if(isset($scappers[$map])) {
					$define = $this->annotation($data, $map);
					if($define && isset($define->name)) {
						$gateway = RepoService::get($define->name);
						if($gateway && $gateway->has($define->method)) {
							$sub_args = [];
							$sub_args[] = $data;
							$sub_args[] = $args;
							$sub_schema = [];
							if(is_callable(array($gateway, 'query'))) {
								$function = call_user_func_array(array($gateway, 'query'), array($define->method, $sub_args, $sub_schema));
								$item = $function->get();
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
}