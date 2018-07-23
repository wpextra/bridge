<?php

namespace Bridge\Annotation;


if (!defined('ABSPATH'))
	exit;

/**
 *@Annotation
 *@Target({"CLASS"})
 */
class Element {
	
	/**
     * @var string
     */
	public $name; 
 

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $template;

    /**
     * @var array
     */
    public $meta;

    /**
     * @var array
     */
    public $templates;

    /**
     * @var array
     */
    public $apis;

}
