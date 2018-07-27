<?php
namespace Bridge\Setup;

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

use Bridge\HttpListener;

class Listener {
	
	protected $request;

	public function __construct() {
		add_action('do_parse_request', array(&$this, 'request_listener'), 1, 3 );
		add_action('admin_menu', array(&$this, 'admin_register'));
		add_action('admin_init', array(&$this, 'redirect_to_dashboard'), 9999);
		add_filter('login_redirect', array(&$this, 'login_redirect'), 10, 3);
		add_filter('init', array(&$this, 'auth_redirect'));
		add_action('wp_logout', array(&$this, 'logout_redirect'));
	}
	public function auth_redirect() {
		global $pagenow;
		$permitted = false;
		if(isset($_GET['action']) && $_GET['action'] == 'logout') {
			$permitted =  true;
		}
		if( 'wp-login.php' == $pagenow && !$permitted) {
			wp_redirect( home_url('/auth/signin') );
			exit(); 
		}

	}
	public function logout_redirect(){
		wp_redirect( home_url('/auth/signin') );
		exit();
	}
	public function login_redirect( $redirect_to, $request, $user ) {
		$redirect_to = home_url().'/hello'; 
		return $redirect_to;
	}

	public function redirect_to_dashboard() {
		add_action('load-index.php', function() {
			$dashboard_theme = get_option('dashboard_theme');
			if($dashboard_theme !== 'wordpress') {
				$screen = get_current_screen();
				if( $screen->base == 'dashboard' ) {
					wp_redirect( admin_url( 'admin.php?page=admin') );
				}
			}
		});
	}

	public function request_listener($continue, \WP $wp, $extra_query_vars) {
		try {
			$http =  new HttpListener();
			if($http->hasRoute()) {
				$http->render();
				exit();
			}
		} catch( \Exception $e) {

		}

		return $continue;
	}

	public function admin_register() {

		$menus =  \Bridge\Menu::all();
		foreach ($menus as $key => $menu) {
			if(isset($menu['segment']) && $menu['segment'] === 'admin') {
				add_menu_page($menu['title'], $menu['title'], 'read', $menu['id'], array(&$this,'admin_listner')); 
				$submenus = \Bridge\Menu::load($menu['id']);
				foreach ($submenus as $key => $submenu) {
					add_submenu_page(
						$menu['id'], 
						$submenu->title, $submenu->title, 'read', $submenu->route, array(&$this,'admin_listner'),
						0
					);
					if($submenu->childrens) {
						foreach ($submenu->childrens as $key => $subsubmenu) {
							add_submenu_page(
								$submenu->id, 
								$subsubmenu->title, $subsubmenu->title, 'read', $subsubmenu->route, array(&$this,'admin_listner'),
								0
							);
						}
					}
				}
			}
		}
	}

	public function admin_listner() {
		$name = isset($_GET['page']) ? $_GET['page'] : null;
		$http =  new HttpListener();

		$http->byName($name);
		if($http->hasRoute()) {
			$http->render();
		} else {
			echo "No route for this page....<a href='#'>learn more</a>";
		}
	}
}