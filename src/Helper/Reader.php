<?php

namespace Bridge\Helper;


if (!defined('ABSPATH'))
	exit;

use Doctrine\Common\Annotations\FileCacheReader;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;

class Reader {

	protected $reader;
	protected $propertyInfo;

	public function __construct() {
		$this->reader = new FileCacheReader(
			new AnnotationReader(),
			WPE_PATH."/var/cache/annotation",
			$debug = true
		);

		$phpDocExtractor = new PhpDocExtractor();
		$reflectionExtractor = new ReflectionExtractor();

		$listExtractors = array($reflectionExtractor);

		$typeExtractors = array($phpDocExtractor, $reflectionExtractor);
		$descriptionExtractors = array($phpDocExtractor);
		$accessExtractors = array($reflectionExtractor);
		$this->propertyInfo = new PropertyInfoExtractor(
			$listExtractors,
			$typeExtractors,
			$descriptionExtractors,
			$accessExtractors
		);
	}

	public function classAnnotation($object) {
		$reflection = new \ReflectionClass($object);
		return $this->reader->getClassAnnotations($reflection);
	}
	public function getClassAnnotation($object, $annotation) {
		$reflection = new \ReflectionClass($object);
		return $this->reader->getClassAnnotation($reflection, $annotation);
	}

	public function propertyAnnotation($object, $property, $annotation) {
		$reflectionProperty = new \ReflectionProperty($object, $property);
		return $this->reader->getPropertyAnnotation($reflectionProperty, $annotation);
	}

	public function property($object, $property) {
		$reflectionProperty = new \ReflectionProperty(get_class($object), $property);
		return $this->reader->getPropertyAnnotations($reflectionProperty);
	}

	public function getClass($object) {
		return $this->getClassAnnotation($object, 'Bridge\Annotation\Model');
	}

	public function model($object) {
		return $this->getClassAnnotation($object, 'Bridge\Annotation\Model');
	}

	public function element($object) {
		return $this->getClassAnnotation($object, 'Bridge\Annotation\Element');
	}

	public function route($object) {
		return $this->getClassAnnotation($object, 'Bridge\Annotation\Route');
	}

	public function middleware($object) {
		return $this->getClassAnnotation($object, 'Bridge\Annotation\Middleware');
	}

	public function properties($object) {
		
		$properties = $this->propertyInfo->getProperties($object);

		$array = [];
		if($properties && is_array($properties)) {
			foreach ($properties as $key => $property) {

				$pt = $this->propertyAnnotation($object, $property, 'Bridge\Annotation\Property');

				$data = [];
				$data['name'] = $property;
				$type = $this->propertyInfo->getTypes($object, $property);
				if (isset($type[0])) {
					$data['data_type'] = $type[0]->getBuiltinType();
				} else {
					$data['data_type'] = 'string';
				}
				$data['name'] =  $property;
				$data['readable'] = $this->propertyInfo->isReadable($object, $property);
				$data['writable'] = $this->propertyInfo->isWritable($object, $property);

				if($pt) {
					$data['relation'] =  $pt->relation;
					$data['relation_target'] = $pt->relation_target;
					$data['service'] =  $pt->service;
					$data['query'] =  $pt->query;
					$data['save'] = $pt->save;
					$data['delete'] =  $pt->delete;
					$data['update'] = $pt->update;
				}

				$array[$property] = $data;
			}
		}
		return $array;
	}
}



