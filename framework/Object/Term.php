<?php

namespace Bridge\Object;


if (!defined('ABSPATH'))
	exit;


class Term extends BaseObject {

	public $id;
	public $name;
	public $slug;
	public $taxonomy;
	public $parent;

	public $count;

	/**
     * @Bridge\Annotation\Service(name ="term", method = "getByParent")
     */
	public $childrens;
	
	/**
     * @Bridge\Annotation\Service(name ="post", method = "getByTerm")
     */
	public $posts = [];


	protected $mappings = [
		'id'	=> 'term_id'
	];

}


