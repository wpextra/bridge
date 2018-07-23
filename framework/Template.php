<?php

namespace Bridge;

if ( !defined( 'ABSPATH' ) ) exit;
use Bridge\Template\Filesystem;
use Bridge\Template\Environment;


class Template {

	protected $environment;
	protected $fileTemplate;


	public function __construct() {
		$this->environment = new Environment();
		$this->fileTemplate = new Filesystem();
	}

	public function fileTemplate() {
		return $this->fileTemplate->loader();
	}

	public function environment() {
		return $this->environment;
	}


	public function sort_exists( $templates ) {
		if ( !is_array($templates) ) {
			$templates = (array) $templates;
		}
		foreach ( $templates as $template ) {
			if ( $this->fileTemplate()->exists($template) ) {
				return $template;
			}
		}
		return false;
	}

	public function render( $templates, $data = []) {
		return $this->environment()->render($this->sort_exists($templates), $data);
	}
}
