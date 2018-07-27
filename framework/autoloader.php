<?php
namespace Bridge;

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}


class Autoloader {

	private static $namespace = 'Bridge';
	private static $namespaces = ['Bridge', 'ORMB'];
	private static $classes_map = [];
	private static $classes_aliases = [];

	public static function instance() {
		spl_autoload_register( [ __CLASS__, 'autoload' ] );
	}

	public static function get_classes_aliases() {
		return self::$classes_aliases;
	}

	private static function load_class( $relative_class_name ) {
		if ( isset( self::$classes_map[ $relative_class_name ] ) ) {
			$filename = BRIDGE_PATH . '/' . self::$classes_map[ $relative_class_name ];
		} else {
			$filename = strtolower(
				preg_replace(
					[ '/([a-z])([A-Z])/', '/_/', '/\\\/' ],
					[ '$1-$2', '-', DIRECTORY_SEPARATOR ],
					$relative_class_name
				)
			);
			$filename = BRIDGE_PATH . $filename . '.php';
		}
		if ( is_readable( $filename ) ) {
			require $filename;
		}
	}


	private static function autoload( $class ) {
		$namespace = self::$namespace;
		
		if ( 0 !== strpos( $class, $namespace . '\\' ) ) {
			return;
		}
		if(!in_array($namespace, self::$namespaces)) {
			return;
		}
		$relative_class_name = preg_replace( '/^' . $namespace . '\\\/', '', $class );
		$has_class_alias = isset( self::$classes_aliases[ $relative_class_name ] );
		if ( $has_class_alias ) {
			$relative_class_name = self::$classes_aliases[ $relative_class_name ];
		}
		$final_class_name = $namespace . '\\' . $relative_class_name;
		if ( ! class_exists( $final_class_name ) ) {
			self::load_class( $relative_class_name );
		}
		if ( $has_class_alias ) {
			class_alias( $final_class_name, $class );
		}
	}
}
