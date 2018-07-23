<?php

namespace Bridge\Service;


if (!defined('ABSPATH'))
	exit;


class ElementGateway {

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
			$this->result  = call_user_func_array(array($this->repository, $method), $final_args);
		}
		return $this;
	}

	public function results() {
		return $this->result;
	}

	public function resultArray() {
		return json_decode(json_encode($this->result));
	}
}