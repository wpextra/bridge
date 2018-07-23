<?php

namespace Bridge;
 

if (!defined('ABSPATH'))
	exit;

class Query {

	static public function model($name) {
		$metadata = Metadata::type('schema')->find($name)->results();
		if($metadata) {
			return new \Bridge\Service\QueryGateway($metadata);
		} else {
			throw new \Exception('model '. $name . ' not found');
		}
	}
	
}