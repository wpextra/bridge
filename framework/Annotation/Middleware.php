<?php

namespace Bridge\Annotation;


if (!defined('ABSPATH'))
	exit;

/**
 *@Annotation
 *@Target({"CLASS"})
 */
class Middleware {
	
	/**
     * @var string
     */
	public $name; 
 
  
}
