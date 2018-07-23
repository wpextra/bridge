<?php
namespace Bridge\Router;


if (!defined('ABSPATH'))
	exit;

use Bridge\Metadata;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection as BaseRouteCollection;

class RouteCollection {
	
	protected $routes;
	public function __construct() {
		$this->routes = self::routes();
	}


	static public function routes() {
		$collection = new BaseRouteCollection();
		$routes = Metadata::type('route')->query('all')->results();
		foreach ($routes as $key => $route) {
			$collection->add($route->id, new Route($route->path, [
				'controller' => $route->controller,
				'middleware' => $route->middleware,
				'callback'	 => $route->callback
			]));
		}
		return $collection;
	}


	public function get($name) {
		$route = $this->routes()->get($name);
		if($route) {
			return $route->getDefaults();
		}
	}
}