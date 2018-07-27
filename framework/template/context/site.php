<?php
namespace Bridge\Template\Context;


if (!defined('ABSPATH'))
	exit;

final class Site {


	public $admin_email;

	public $blogname;

	public $charset;

	public $description;

	public $id;

	public $language;

	public $multisite;

	public $name;

	public $pingback_url;

	public $siteurl;


	public $title;

	public $url;

	public $home_url;

	public $site_url;

	public $rdf;

	public $rss;

	public $rss2;

	public $atom;



	public function __construct( $site_name_or_id = null ) {

		if ( is_multisite() ) {
			$blog_id = self::switch_to_blog($site_name_or_id);
			$this->init();
			$this->init_as_multisite($blog_id);
			restore_current_blog();
		} else {
			$this->init();
			$this->init_as_singlesite();
		}
	}

	/**
	 * Switches to the blog requested in the request
	 * @param string|integer|null $site_name_or_id
	 * @return integer with the ID of the new blog
	 */
	protected static function switch_to_blog( $site_name_or_id ) {
		if ( $site_name_or_id === null ) {
			$site_name_or_id = get_current_blog_id();
		}
		$info = get_blog_details($site_name_or_id);
		switch_to_blog($info->blog_id);
		return $info->blog_id;
	}

	/**
	 * @internal
	 * @param integer $site_id
	 */
	protected function init_as_multisite( $site_id ) {
		$info = get_blog_details($site_id);
		$this->import($info);
		$this->ID = $info->blog_id;
		$this->id = $this->ID;
		$this->name = $this->blogname;
		$this->title = $this->blogname;
		$theme_slug = get_blog_option($info->blog_id, 'stylesheet');
		$this->description = get_blog_option($info->blog_id, 'blogdescription');
		$this->admin_email = get_blog_option($info->blog_id, 'admin_email');
		$this->multisite = true;
	}

	/**
	 * Executed for single-blog sites
	 * @internal
	 */
	protected function init_as_singlesite() {
		$this->admin_email = get_bloginfo('admin_email');
		$this->name = get_bloginfo('name');
		$this->title = $this->name;
		$this->description = get_bloginfo('description');
		$this->multisite = false;
	}


	protected function init() {
		$this->url = home_url();
		$this->home_url = $this->url;
		$this->site_url = site_url();
		$this->language = get_bloginfo('language');
		$this->charset = get_bloginfo('charset');
		$this->pingback =  get_bloginfo('pingback_url');
	}


	/**
	 * Returns the language attributes that you're looking for
	 * @return string
	 */
	public function language_attributes() {
		return get_language_attributes();
	}

	/**
	 *
	 *
	 * @param string  $field
	 * @return mixed
	 */
	public function __get( $field ) {
		if ( !isset($this->$field) ) {
			if ( is_multisite() ) {
				$this->$field = get_blog_option($this->ID, $field);
			} else {
				$this->$field = get_option($field);
			}
		}
		return $this->$field;
	}

	public function icon() {
		if ( is_multisite() ) {
			return $this->icon_multisite($this->ID);
		}
		$iid = get_option('site_icon');
		if ( $iid ) {
			return $iid;
		}
	}

	protected function icon_multisite( $site_id ) {
		$image = null;
		$blog_id = self::switch_to_blog($site_id);
		$iid = get_blog_option($blog_id, 'site_icon');
	
		restore_current_blog();
		return $iid;
	}


	public function link() {
		return $this->url;
	}


	/**
	 * @ignore
	 */
	public function meta( $field ) {
		return $this->__get($field);
	}

	
}

