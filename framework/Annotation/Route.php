<?php

namespace Bridge\Annotation;


if (!defined('ABSPATH'))
	exit;

/**
 *@Annotation
 *@Target({"CLASS"})
 */
class Route {
	
	/**
     * @var string
     */
	public $name; 
 
    /**
     * @var string
     */
    public $path;

    /**
     * @var string
     */
    public $controller;

    /**
     * @var string
     */
    public $middleware;

    /**
     * @var array
     */
    public $args;
}
