<?php

namespace Bridge\Repository;


if (!defined('ABSPATH'))
	exit;

use Bridge\Container;


class ServiceRepository extends Repository { 

	public function find($name) {
		if(isset($name)) {
			return Container::get($name);
		}
	}
	public function getByElement($element, $args = []) {
		if(isset($element->service)) {
			return Container::get($element->service);
		}
	}

}
