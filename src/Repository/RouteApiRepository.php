<?php

namespace Bridge\Repository;


if (!defined('ABSPATH'))
	exit;
use Bridge\Storage\Metadata as Storage;
use Bridge\Object\Route;
use Bridge\Object\RouteCollection;

class RouteApiRepository extends Repository { 
	
	public function collections() {
		return Storage::instance()->route_apis;
	}

	public function all($args = []) {
		if (!empty($this->collections()) ) {
			return new RouteCollection($this->collections());
		}
	}

	public function find($name) {
		if ( null !== $item = $this->data_find($name) ) {
			return new Route($item);
		}
	}
}

