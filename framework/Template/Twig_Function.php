<?php

namespace Bridge\Template;

if ( !defined( 'ABSPATH' ) ) exit;



if ( version_compare(\Twig_Environment::VERSION, '2.4.0', '>=') ) {
	class_alias('\Twig\TwigFunction', '\Bridge\Template\Twig_Function');
} elseif ( version_compare(\Twig_Environment::VERSION, '2.0.0', '>=') ) {

	class Twig_Function extends \Twig_Function { 

	}

} else {

	final class Twig_Function extends \Twig_SimpleFunction { 

	}
}