<?php

namespace Bridge\Annotation;


if (!defined('ABSPATH'))
	exit;

/**
 * @Annotation
 * @Target({"METHOD", "PROPERTY"})
 */
final class Property {

	/**
     * @var string
     */
    public $name;

    /**
     * possible value: 'taxonomy, post_type, meta, one to many'
     * @var string
     */
    public $relation;

    /**
     * @var string
     */
    public $model;


    /**
     * @var string
     */
    public $query;

    /**
     * @var string
     */
    public $save;

    /**
     * @var string
     */
    public $delete;

    /**
     * @var string
     */
    public $update;

  
    public $relation_target;
    public $service;
}
