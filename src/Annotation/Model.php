<?php

namespace Bridge\Annotation;


if (!defined('ABSPATH'))
	exit;

/**
 *@Annotation
 *@Target({"CLASS"})
 */
class Model {
	
	/**
     * @var string
     */
	public $name; 

	/**
     * @var bool
     */
    public $virtual;

    /**
     * @var string
     */
    public $virtualType;

    /**
     * @var array
     */
    public $meta;

    /**
     * @var string
     */
    public $repository;

    /**
     * @var string
     */
    public $persistent;
}
