<?php

namespace Bridge\Builder;
 

if (!defined('ABSPATH'))
	exit;


class Cache {

	static public function get($uniqkey) {
		return false;
	}

	static public function has() {
		return false;
	}

	static public function add($uniqkey, $data, $expire = 4600 ) {
		return false;
	}

	static public function delete($uniqkey) {
		return false;
	}
	
	static public function flush() {
		return false;
	}
}