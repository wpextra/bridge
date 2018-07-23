<?php

namespace Bridge\Storage;


if (!defined('ABSPATH'))
	exit;
use Bridge\Helper\Reader;
class Metadata {


	public $schemas = [];
	public $routes = [];
	public $route_apis = [];
	public $middlewares = [];

	public function add_model($object) {
		$reader = new Reader();
		$annotation = $reader->getClass(get_class($object));
		if($annotation) {
			$raw_properties = $reader->properties(get_class($object));
			$properties = [];
			foreach ($raw_properties as $property => $propertyInfo) {
				$properties[$property] = array_merge($propertyInfo, [

				]);
			}

			$schema = [];
			$schema['id'] = $annotation->name;
			$schema['virtual'] = $annotation->virtual;
			$schema['virtual_type'] = $annotation->virtualType;
			$schema['repository'] = $annotation->repository;
			$schema['persistent'] = $annotation->persistent;
			$schema['class'] = get_class($object);
			$schema['properties'] = $properties;
			$schema['meta'] = $annotation->meta;
			$this->schemas[] = $schema;
		}
	}
	public function add_schema($object) {
		$reader = new Reader();
		$annotation = $reader->getClass(get_class($object));
		if($annotation) {
			$raw_properties = $reader->properties(get_class($object));
			$properties = [];
			foreach ($raw_properties as $property => $propertyInfo) {
				$properties[$property] = array_merge($propertyInfo, [

				]);
			}

			$schema = [];
			$schema['id'] = $annotation->name;
			$schema['virtual'] = $annotation->virtual;
			$schema['virtual_type'] = $annotation->virtualType;
			$schema['repository'] = $annotation->repository;
			$schema['persistent'] = $annotation->persistent;
			$schema['class'] = get_class($object);
			$schema['properties'] = $properties;
			$schema['meta'] = $annotation->meta;
			$this->schemas[] = $schema;
		}
	}
	public function add_route($object) {
		$reader = new Reader();
		$annotation = $reader->route(get_class($object));
		if($annotation) {
			$route = [];
			$route['id'] = $annotation->name;
			$route['path'] = $annotation->path;
			$route['middleware'] = $annotation->middleware;
			$route['controller'] = get_class($object);
			$route['args'] = $annotation->args;
			$this->routes[] = $route;
		}
	}
	public function add_route_api($object) {
		$reader = new Reader();
		$annotation = $reader->route(get_class($object));
		if($annotation) {
			$route = [];
			$route['id'] = $annotation->name;
			$route['path'] = $annotation->path;
			$route['middleware'] = $annotation->middleware;
			$route['controller'] = get_class($object);
			$route['args'] = $annotation->args;
			$this->route_apis[] = $route;
		}
	}

	public function add_middleware($object) {
		$reader = new Reader();
		$annotation = $reader->middleware(get_class($object));
		if($annotation) {
			$middleware = [];
			$middleware['id'] = $annotation->name;
			$middleware['class'] = get_class($object);
			$this->middlewares[] = $middleware;
		}
	}
	

	private static $instance;
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	public function __clone() {
		_doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', 'bridge'), '1.6');
	}
	public function __wakeup() {
		_doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', 'bridge'), '1.6');
	}
}