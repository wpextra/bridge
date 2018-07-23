<?php

namespace Bridge\Object;


if (!defined('ABSPATH'))
	exit;

final class CommentCollection  extends  BaseCollection {

	public $items;

	public $pagination;
	public $itemClass;

	public $args = [];

	public function __construct($collections = [], $query = null, $itemClass = 'Bridge\Object\Comment') {
		$this->itemClass = $itemClass;
		parent::__construct($this->items($collections));
	}



}