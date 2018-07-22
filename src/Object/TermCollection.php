<?php

namespace Bridge\Object;


if (!defined('ABSPATH'))
	exit;

final class TermCollection  extends  BaseCollection {

	public $pagination;
	public $itemClass;

	public $per_page;

	public function __construct($collections = [], $query = null, $itemClass = 'Bridge\Object\Term') {
		$this->itemClass = $itemClass;
		parent::__construct($this->items($collections), $itemClass);
	}

}