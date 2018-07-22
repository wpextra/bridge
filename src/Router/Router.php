<?php

namespace Bridge\Router;


if (!defined('ABSPATH'))
	exit;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Bridge\Router\RouteCollection;


class Router {

	protected $collection;
	
	protected $route;
	protected $request;

	public function __construct($request = null) {
		$this->collection = new RouteCollection();
		if($request instanceof Request) {
			$this->route = $this->getByRequest($request);
		}  else if (null !== $request && is_string($request)) {
			$this->route = $this->getByName($request);
		} else {
			$this->request = Request::createFromGlobals();
			$this->route = $this->getByRequest($this->request);
		}
	}

	public function hasRoute() {
		if($this->route) {
			return true;
		}
	}


	public function render() {
	
		$controller =  new $this->route['controller']();
		if(is_callable(array($controller, 'enqueue_scripts'))) {
			call_user_func_array(array($controller, 'enqueue_scripts'), array());
		}
		echo call_user_func_array(array($controller, 'response'), array($this->request));
	}

	public function getByName($name) {
		return $this->collection->get($name);
	}

	public function getByRequest(Request $request) {
		$context = new RequestContext();
		$context->fromRequest($request);
		$matcher = new UrlMatcher($this->collection->routes(), $context);
		$route = null;
		try {
			$parameters = $matcher->match($request->getPathInfo());
			if(isset($parameters['controller'])) {
				$route = $parameters;
			}
		} catch ( \Exception $e) { }
		try {
			$parameters = $matcher->match($request->getPathInfo().'/');
			if(isset($parameters['controller'])) {
				$route = $parameters;
			}
		} catch ( \Exception $e) { }
		return $route;
	}
}