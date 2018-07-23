<?php

namespace Bridge\Object;


if (!defined('ABSPATH'))
	exit;


class Element extends BaseObject {

	public $id;
	public $name;
	public $title;
	public $description;
	public $icon;
	public $service;
	public $templates;
	public $options = [];
	/**
     * @Bridge\Annotation\Service(name ="service", method = "getByElement")
     */
	public $callable;
	protected $mappings = [
		'name' => 'id'
	];

	public function doService($args = []) {
		$config = array_merge($this->config, $args);
		if(isset($this->item['service']['name'])) {
			return $this->item['service']['name'];
		}
	}
}


