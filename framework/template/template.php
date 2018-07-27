<?php
namespace Bridge\Template;


if (!defined('ABSPATH'))
	exit;

use Bridge\Template\Twig\Twig_Function;

final class Template {


	public function __construct() {
		$this->includes();
		$this->register();
	}

	public function includes() {
		require_once dirname( __FILE__ ) . '/context/site.php';
		require_once dirname( __FILE__ ) . '/context/user.php';
		require_once dirname( __FILE__ ) . '/context/auth.php';
	}


	public function register() {
		$twig = \Bridge\Template\Twig_Extension::instance();
		$twig->add_global('user', new \Bridge\Template\Context\User());
		$twig->add_global('site', new \Bridge\Template\Context\Site());
		$twig->add_global('auth', new \Bridge\Template\Context\Auth());
	}
}


