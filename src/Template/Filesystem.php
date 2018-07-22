<?php

namespace Bridge\Template;

if ( !defined( 'ABSPATH' ) ) exit;


class Filesystem {
	
	protected $_collection;
	protected $paths = [];

	public function __construct() {
		$extension = \Bridge\Template\Twig_Extension::instance();
		$paths = $extension->dirs;
		ksort($paths);
		foreach ($paths as $path => $priority) {
			$this->paths[] = $path;
		}
	}


	public function loader() {
		$open_basedir = ini_get('open_basedir');
		$paths = $this->paths;
		foreach ($paths as $key => $path) {
			if (!file_exists($path)) {
				unset($paths[$key]);
			} 
		}
		$rootPath = '/';
		if ($open_basedir) {
			$rootPath = null;
		}
		return new \Twig_Loader_Filesystem($paths, $rootPath);
	}
}
