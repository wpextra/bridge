<?php

namespace Bridge\Object;


if (!defined('ABSPATH'))
	exit;

final class Menu  extends  BaseCollection {

	public $pagination;
	public $itemClass;
	public $per_page;

	public function __construct($collections = [], $query = null, $itemClass = 'Bridge\Object\MenuItem') {
		$this->itemClass = $itemClass;
		parent::__construct($this->items($collections));
	}

}