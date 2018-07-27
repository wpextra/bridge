<?php
namespace Bridge\Template\Context;


if (!defined('ABSPATH'))
	exit;

final class User {

	 /**
     * @var integer
     */
	 public $ID;
    /**
     * @var string
     */
    public $user_login;

    /**
     * @var string
     */
    public $user_nicename;
    /**
     * @var string
     */
    public $user_email;
    /**
     * @var string
     */
    public $user_url;

    /**
     * @var string
     */
    public $user_status;
    /**
     * @var string
     */
    public $display_name;

    public $username;

    public $email;

    public $avatar;

    public $count_notification = 0;

    public $count_message = 0;

    public $role;

    public $is_logged;

    public $is_admin;

    public $is_developer;

    public $is_editor;

    public $logout_url;

    public $profile_url;

    public $notification_url;

    public $console_url;

    public $account_url;

    public $admin_url;

    public $backend_url;


    public function __construct() {
    	$this->_init();
    	add_action('plugins_loaded', function() {
    		$user = wp_get_current_user();
    		if ($user->exists()) {
    			$this->_user_info($user);
    		} else {
    			$this->_default();
    		}
    	});
    }

    public function avatar($size = 32, $default = null, $alt = null, $args = [
    	'class' => 'img-xs rounded-circle']) {
    	$id_or_email = $this->user_email;
    	return get_avatar( $id_or_email, $size, $default, $alt, $args );
    }

    private function _init() {
    	$this->logout_url = home_url('/auth/signout');
    	$this->profile_url = home_url('/account/profile');
    	$this->notification_url = home_url('/account/notification');
    	$this->console_url = home_url('/console');
    	$this->account_url = home_url('/account');
    	$this->admin_url = home_url('/admin');
    	$this->backend_url = home_url('/wp-admin');
    }

    private function _user_info($user) {
    	$properties = get_object_vars($this);
    	$data = $user->data;
    	$this->import($data);
    	$this->is_logged = true;
    }


    private function _default() {
    	$this->id = null;

    	$this->username = "Guest";

    	$this->email = null;

    	$this->avatar = "none";

    	$this->count_notification = 0;

    	$this->count_message = 0;

    	$this->role = "guest";

    	$this->is_logged = false;

    	$this->is_admin = false;

    	$this->is_developer = false;

    	$this->is_editor = false;

    }

    private function import( $info, $force = false ) {
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

