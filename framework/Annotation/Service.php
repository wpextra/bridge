<?php

namespace Bridge\Annotation;


if (!defined('ABSPATH'))
	exit;

/**
 *@Annotation
 */
class Service {

	/**
     * @var string
     */
	public $name;

	/**
     * @var string
     */
    public $method;

    /**
     * @var string
     */
    public $schema;

}


