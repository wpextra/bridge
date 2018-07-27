<?php
namespace Bridge\App\Service;

/**
 * REST POST CONTROLLER : Default controller for post api request
 * 
 * @package Bridge
 * @version 0.1
 * @since 0.79
 * 
 * @author contact@olla.tech
 * 
 * */

if ( !defined('ABSPATH') ) {
	exit();
};


class PostController {
	
	public static function collection($request) {
		$args = $request->get_params();
		$subquery = [];
		$repo = \Bridge\Query::model('post')->get($args)->results();
		return [
			'data' => $repo,
			'pagination' => $repo->pagination
		];
	}
	static public  function item($request) {
		$args = $request->get_params();
		$subquery = [];
		$repo = \Bridge\Query::model('post')->find($args)->results();
		return [
			'data' => $repo
		];
	}
	static public  function create($request) {
		
	}
	static public  function update($request) {
		
	}
	static public  function delete($request) {
		
	}
}
