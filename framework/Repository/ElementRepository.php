<?php

namespace Bridge\Repository;


if (!defined('ABSPATH'))
	exit;


use Bridge\Storage\Element as Storage;

class ElementRepository extends Repository { 
	protected $collections = [];

	public function collections() {
		return[];
	}


	public function data_all() {
		return $this->collections();
	}
	
	public function data_find($name) {
		$result = $this->data_search($this->collections(), 'id', $name);
		if($result && count($result)> 0) {
			return $result[0];
		}
	}

	public function data_search($array, $key, $value) 
	{ 
		$results = array(); 
		if (is_array($array)) 
		{ 
			if (isset($array[$key]) && $array[$key] == $value) 
				$results[] = $array; 
			foreach ($array as $subarray) 
				$results = array_merge($results, $this->data_search($subarray, $key, $value)); 
		} 
		return $results;
	} 
}

