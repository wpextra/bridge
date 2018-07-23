<?php

namespace Bridge\Repository;


if (!defined('ABSPATH'))
	exit;
use Bridge\Storage\Metadata as Storage;
use Bridge\Object\Schema;
use Bridge\Object\SchemaCollection;

class SchemaRepository extends ElementRepository { 

	public function collections() {
		return Storage::instance()->schemas;
	}

	public function all($args = []) {
		if (!empty($this->collections()) ) {
			return new SchemaCollection($this->collections());
		}
	}

	public function find($name) {
	
		if ( null !== $item = $this->data_find($name) ) {
			return new Schema($item);
		}
	}
	
}

