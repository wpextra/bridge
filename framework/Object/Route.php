<?php

namespace Bridge\Object;


if (!defined('ABSPATH'))
	exit;


class Route extends BaseObject {

	public $id;
	public $path;
	public $controller;
	public $middleware;
	public $methods;
	public $args = [];
	public $callback;


}


