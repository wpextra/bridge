<?php

namespace Bridge\Template;

if ( !defined( 'ABSPATH' ) ) exit;

class Environment {

	protected $filesystem;
	protected $extension;

	public function __construct() {
		$this->filesystem = new Filesystem();
	}


	public function twig() {
		$params = array('debug' => true, 'autoescape' => false);
		$twig = new \Twig_Environment($this->filesystem->loader(), $params);

		$extension = \Bridge\Template\Twig_Extension::instance();

		foreach ($extension->filters as $name => $callable) {
			$twig->addFilter(new \Twig_SimpleFilter($name, $callable));
		}

		foreach ($extension->escapers as $name => $callable) {
			$twig->getExtension('Twig_Extension_Core')->setEscaper($name, $callable);
		}

		foreach ($extension->functions as $name => $callable) {
			$twig->addFunction(new Twig_Function($name, $callable));
		}

		foreach ($extension->globals as $name => $callable) {
			$twig->addGlobal($name,  $callable);
		}
		return $twig;
	}

	public function render($file, $data) {
		return $this->twig()->render($file, $data);
	}
}
