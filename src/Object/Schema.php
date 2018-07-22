<?php

namespace Bridge\Object;


if (!defined('ABSPATH'))
	exit;


class Schema extends BaseObject {
	public $id;
	public $virtual;
	public $virtual_type;
	public $repository;
	public $persistent;
	public $class;
	public $properties;
	public $meta;
}


