<?php

namespace Bridge\Object;


if (!defined('ABSPATH'))
	exit;

final class SchemaCollection  extends  BaseCollection {

	public $pagination;
	public $itemClass;

	public $per_page;

	public function __construct($collections = [], $query = null, $itemClass = 'Bridge\Object\Schema') {
		$this->itemClass = $itemClass;
		parent::__construct($this->items($collections), $itemClass);
	}

}