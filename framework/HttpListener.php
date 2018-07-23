<?php

namespace Bridge;


if (!defined('ABSPATH'))
	exit;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Bridge\Router\RouteCollection;

class HttpListener {

	protected $routes;
	protected $context;
	protected $request;
	protected $route;
	protected $urlpath;

	public function __construct($request = null) {
		$this->routes = RouteCollection::routes();

		if($request instanceof Request) {
			$this->request = $this->getByRequest($request);
		}  else {
			$this->request = Request::createFromGlobals();
		}
		$context = new RequestContext();
		$this->context = $context->fromRequest($this->request);
		$this->urlpath = $this->request->getPathInfo();
		$this->init();
	}

	public function init() {
		if(null !== $route = $this->route($this->urlpath)) {
			$this->route = $route;
		}
		if(null !== $route = $this->route($this->urlpath.'/')) {
			$this->route = $route;
		}
	}

	public function hasRoute() {
		if($this->route) {
			return true;
		}
	}

	public function byName($name) {
		if(null !== $route = RouteCollection::routes()->get($name)) {
			if($route) {
				$this->route = $route->getDefaults();
			}
		}
	}

	public function route($url) {
		$matcher = new UrlMatcher($this->routes, $this->context);
		try {
			$parameters = $matcher->match($url);
			if(isset($parameters)) {
				return $parameters;
			}
		} catch ( \Exception $e) { 

		}
	}

	public function render() {

		if(isset($this->route['middleware'])) {
			$middleware = $this->route['middleware'];
			$data = Metadata::type('middleware')->query('find', $middleware)->results();
			if(isset($data['class'])) {
				$middleware = new $data['class']();
				if(is_callable(array($middleware, 'authorize'))) {
					$authorize = call_user_func_array(array($middleware, 'authorize'), array());
					if(!$authorize) {
						throw new \Exception("You don't have permission to access this page", 1);
					}
				}
			}
		}
		
		$controller =  new $this->route['controller']();
		if(is_callable(array($controller, 'enqueue_scripts'))) {
			call_user_func_array(array($controller, 'enqueue_scripts'), array());
		}
		echo call_user_func_array(array($controller, 'response'), array($this->request));
	}
}