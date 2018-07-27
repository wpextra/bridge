<?php
namespace Bridge\Template\Context;


if (!defined('ABSPATH'))
	exit;

final class Auth {

	public $signin_uri;
	public $singup_uri;
	public $signout_uri;
	public $reset_uri;
	public $forgot_uri;
	public $google_auth_uri;
	public $fb_auth_uri;
	public $twitter_auth_uri;
	public $github_auth_uri;
	public $linkedin_auth_uri;

	public function __construct() {
		$this->_init();
	}

	public function _init() {
		$this->signin_uri = home_url('/auth/signin');
		$this->singup_uri = home_url('/auth/signup');
		$this->signout_uri = home_url('/auth/signout');
		$this->reset_uri = home_url('/auth/reset_password');
		$this->forgot_uri = home_url('/auth/forgot_password');
		$this->google_auth_uri = home_url('/auth/logout');
		$this->fb_auth_uri = home_url('/auth/logout');
		$this->twitter_auth_uri = home_url('/auth/logout');
		$this->github_auth_uri = home_url('/auth/logout');
		$this->linkedin_auth_uri = home_url('/auth/logout');
	}
	
	


}

