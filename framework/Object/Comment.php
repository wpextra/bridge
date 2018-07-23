<?php

namespace Bridge\Object;


if (!defined('ABSPATH'))
	exit;


class Comment extends BaseObject {

	public $id;
	public $post_id;
	public $author_id;
	public $author_name;
	public $author_email;
	public $date;
	public $content;
	public $replies;
	public $user_id;
	protected $mappings = [
		'id'	=> 'comment_ID'
	];

}


