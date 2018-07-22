<?php

namespace Bridge\Object;


if (!defined('ABSPATH'))
	exit;

final class PostCollection  extends  BaseCollection {

	public $pagination;
	public $itemClass;

	public $filters;

	public function __construct($collections = [], $query = null, $itemClass = 'Bridge\Object\Post') {
		$this->pagination = self::pagination($query);
		$this->itemClass = $itemClass;
		parent::__construct($this->items($collections), $itemClass);
	}

	

	static public function pagination($query) {
		return new PostPagination($query);
	}
}