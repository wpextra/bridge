<?php

namespace Bridge\Object;


if (!defined('ABSPATH'))
	exit;


class User extends BaseObject {

	public $id;
	public $username;
	public $email;
	public $first_name;
	public $last_name;

	/**
     * @Bridge\Annotation\Service(name ="post", method = "getByUser")
     */
	public $posts = [];
	public $comments = [];

	protected $mappings = [
		'id'	=> 'ID',
		'username' => 'user_login',
		'email' => 'user_email'
	];

	public function __construct($item) {
		$this->_extractor($item);
	}
}


