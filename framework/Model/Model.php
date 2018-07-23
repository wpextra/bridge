<?php
namespace Bridge\Model;

if (!defined('ABSPATH')) {
	exit;
} 

class Model {

	protected $mappings = [];
	protected $config = [];

	public function __construct($item = null) {
		$this->_extractor($item);
	}
	
	public function properties() {
		$class = new \ReflectionClass(get_class($this));
		$properties = $class->getProperties();
		$array = [];
		foreach ($properties as $key => $property) {
			$name = $property->getName();
			if($property->isPrivate() || $property->isProtected()) {
				continue;
			}
			$property->setAccessible(true);
			$array[$property->getName()] = $property->getName();
			$property->setAccessible(false);
		}
		return $array;
	}

	public function _extractor($item) {
		if(is_object($item) || is_array($item)) {
			$array = [];
			foreach ($this->properties() as $key => $property) {
				$array[$property] = $this->value($item, $property);
			}


			foreach ($this->mappings as $map => $alias) {
				if(!isset($array[$map])) {
					if(null !== $value = $this->value($item, $alias)) {
						$array[$map] = $value;
					}
				}
			}
			$this->import($array);
		}
		
	}


	public function value($item, $property) {
		if(is_array($item)) {
			if(isset($item[$property])) {
				return  $item[$property];
			}
		} else {
			if(isset($item->$property)) {
				return  $item->$property;
			}
		}
	}

	

	public function import( $info, $force = false ) {
		if ( is_object($info) ) {
			$info = get_object_vars($info);
		}
		if ( is_array($info) ) {
			foreach ( $info as $key => $value ) {
				if ( $key === '' || ord($key[0]) === 0 ) {
					continue;
				}

				$this->$key = $value;
				if ( !empty($key) && $force ) {
					$this->$key = $value;
				} else if ( !empty($key) && !method_exists($this, $key) ) {
					$this->$key = $value;
				}
				
			}
		}
	}
}