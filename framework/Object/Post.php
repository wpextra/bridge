<?php

namespace Bridge\Object;


if (!defined('ABSPATH'))
	exit;


class Post extends BaseObject {

	public $id;

	public $title;

	public $thumbnail;

	public $excerpt;

	public $content;

	public $url;


	public $comments = [];
	public $childrens = [];


	public function doExcerpt($args = []) {
		$config = array_merge($this->config, $args);
		$charlength = isset($config['length']) ? $config['length'] : 200;
		$excerpt = $this->item->post_content;
		$charlength++;
		if ( mb_strlen( $excerpt ) > $charlength ) {
			$subex = mb_substr( $excerpt, 0, $charlength - 5 );
			$exwords = explode( ' ', $subex );
			$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
			if ( $excut < 0 ) {
				return mb_substr( $subex, 0, $excut );
			} else {
				return $subex;
			}
			return '[...]';
		} else {
			return $excerpt;
		}
	}

	public function doContent($args = []) {
		$config = array_merge($this->config, $args);
		return apply_filters( 'the_content', $this->item->post_content );
	}

	public function doThumbnail($args = []) {
		$config = array_merge($this->config, $args);
		return get_the_post_thumbnail_url($this->item);
	}
	public function doUrl($args = []) {
		$config = array_merge($this->config, $args);
		return get_the_permalink($this->item);
	}

	public function doTemplate($args = []) {
		$config = array_merge($this->config, $args);
		return get_post_meta($this->id, '_template', true);
	}

}


