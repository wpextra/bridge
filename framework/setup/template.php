<?php

namespace Bridge\Setup;


if (!defined('ABSPATH'))
	exit;
use Bridge\Template\Twig\Twig_Function;
final class Template {


	public function __construct() {
		$this->register();
	}
	public function register() {

	
		$twig = \Bridge\Template\Twig_Extension::instance();
 
		$twig->add_filter('get_class', 'get_class');
		$twig->add_filter('get_type', 'get_type');
		$twig->add_filter('print_r', function( $arr ) {
			return print_r($arr, true);
		});
		$twig->add_filter('stripshortcodes', 'strip_shortcodes');
		$twig->add_filter('array', array(&$this, 'to_array'));
		$twig->add_filter('excerpt', 'wp_trim_words');
		$twig->add_filter('function', array(&$this, 'exec_function'));
		$twig->add_filter('pretags', array(&$this, 'twig_pretags'));
		$twig->add_filter('sanitize', 'sanitize_title');
		$twig->add_filter('shortcodes', 'do_shortcode');
		$twig->add_filter('time_ago', array(&$this, 'time_ago'));
		$twig->add_filter('wpautop', 'wpautop');
		$twig->add_filter('list', array(&$this, 'add_list_separators'));
		$twig->add_filter('date', array(&$this, 'intl_date'));
		$twig->add_filter('apply_filters', function() {
			$args = func_get_args();
			$tag = current(array_splice($args, 1, 1));
			return apply_filters_ref_array($tag, $args);
		} );

		$twig->add_escaper('esc_url', function( \Twig_Environment $env, $string ) {
			return esc_url($string);
		});
		$twig->add_escaper('wp_kses_post', function( \Twig_Environment $env, $string ) {
			return wp_kses_post($string);
		});
		$twig->add_escaper('esc_html', function( \Twig_Environment $env, $string ) {
			return esc_html($string);
		});
		$twig->add_escaper('esc_js', function( \Twig_Environment $env, $string ) {
			return esc_js($string);
		});



		$twig->add_function('action', function( $context ) {
			$args = func_get_args();
			array_shift($args);
			$args[] = $context;
			call_user_func_array('do_action', $args);
		}, array('needs_context' => true));

		$twig->add_function('function', array(&$this, 'exec_function'));
		$twig->add_function('fn', array(&$this, 'exec_function'));
		$twig->add_function('print_r', 'print_r');
		$twig->add_function('shortcode', 'do_shortcode');
		
		$twig->add_function('wp_menu', array(&$this, 'wp_menu'));
		$twig->add_function('bloginfo', function( $show = '', $filter = 'raw' ) {
			return get_bloginfo($show, $filter);
		} );
		$twig->add_function('__', function( $text, $domain = 'default' ) {
			return __($text, $domain);
		} );
		$twig->add_function('translate', function( $text, $domain = 'default' ) {
			return translate($text, $domain);
		} );
		$twig->add_function('_e', function( $text, $domain = 'default' ) {
			return _e($text, $domain);
		} );
		$twig->add_function('_n', function( $single, $plural, $number, $domain = 'default' ) {
			return _n($single, $plural, $number, $domain);
		} );
		$twig->add_function('_x', function( $text, $context, $domain = 'default' ) {
			return _x($text, $context, $domain);
		} );
		$twig->add_function('_ex', function( $text, $context, $domain = 'default' ) {
			return _ex($text, $context, $domain);
		} );
		$twig->add_function('_nx', function( $single, $plural, $number, $context, $domain = 'default' ) {
			return _nx($single, $plural, $number, $context, $domain);
		} );
		$twig->add_function('_n_noop', function( $singular, $plural, $domain = 'default' ) {
			return _n_noop($singular, $plural, $domain);
		} );
		$twig->add_function('_nx_noop', function( $singular, $plural, $context, $domain = 'default' ) {
			return _nx_noop($singular, $plural, $context, $domain);
		} );
		$twig->add_function('translate_nooped_plural', function( $nooped_plural, $count, $domain = 'default' ) {
			return translate_nooped_plural($nooped_plural, $count, $domain);
		});

		
		$twig->add_function('header', function( $name = null, $args = [] ) {
			$header_name = \Bridge\Config::component('header_template');
			if($header_name) {
				if(null !== $header = \Bridge\Header::get($header_name)) {
					if($header) {
						echo $header->callable->response($args);
					}
				}
			}
		});


		$twig->add_function('footer', function( $name = null, $args = []  ) {
			$header_name = \Bridge\Config::component('footer_template');
			if($header_name) {
				if(null !== $footer = \Bridge\Footer::get($header_name)) {
					if($footer) {
						echo $footer->callable->response( $args);
					}
				}
			}
		});


		$twig->add_function('element', function( $block_name = null, $args = []  ) {
			if($block_name) {
				if(null !== $block = \Bridge\Block::get($block_name)) {
					if($block) {
						echo $block->callable->response( $args);
					}
				}
			}
		});

		$twig->add_function('bridge_menu', function( $menu_name = null, $args = []  ) {
			if($menu_name) {
				if(null !== $block = \Bridge\Block::get('bridge_menu')) {
					if($block & null !== $callable = $block->callable) {
						echo $block->callable->response( ['name' => $menu_name]);
					}
				}
			}
		});


		$twig->add_function('menu', function( $menu_name = null, $args = []  ) {
			if($menu_name) {
				if(null !== $block = \Bridge\Block::get('menu_bridge')) {
					if($block) { 
						$args = array_merge([
							'menu_id' => $menu_name
						], $args);
						echo $block->callable->response($args);
					}
				}
			}
		});


		$twig->add_function('widget', function( $widget_name = null ) {
			if ( is_active_sidebar($widget_name) ) :
				ob_start(); 
				?>
				<div id="secondary" class="widget-area" role="complementary">
					<?php dynamic_sidebar($widget_name); ?>
				</div>
				<?php 
				return ob_get_clean();
			endif;
		});
	}

	
	/**
	 *
	 *
	 * @param mixed   $arr
	 * @return array
	 */
	public function to_array( $arr ) {
		if ( is_array($arr) ) {
			return $arr;
		}
		$arr = array($arr);
		return $arr;
	}

	/**
	 *
	 *
	 * @param string  $function_name
	 * @return mixed
	 */
	public function exec_function( $function_name ) {
		$args = func_get_args();
		array_shift($args);
		if ( is_string($function_name) ) {
			$function_name = trim($function_name);
		}
		return call_user_func_array($function_name, ($args));
	}

	/**
	 *
	 *
	 * @param string  $content
	 * @return string
	 */
	public function twig_pretags( $content ) {
		return preg_replace_callback('|<pre.*>(.*)</pre|isU', array(&$this, 'convert_pre_entities'), $content);
	}

	/**
	 *
	 *
	 * @param array   $matches
	 * @return string
	 */
	public function convert_pre_entities( $matches ) {
		return str_replace($matches[1], htmlentities($matches[1]), $matches[0]);
	}

	/**
	 *
	 *
	 * @param string  $date
	 * @param string  $format (optional)
	 * @return string
	 */
	public function intl_date( $date, $format = null ) {
		if ( $format === null ) {
			$format = get_option('date_format');
		}

		if ( $date instanceof \DateTime ) {
			$timestamp = $date->getTimestamp() + $date->getOffset();
		} else if ( is_numeric($date) && (strtotime($date) === false || strlen($date) !== 8) ) {
			$timestamp = intval($date);
		} else {
			$timestamp = strtotime($date);
		}

		return date_i18n($format, $timestamp);
	}

	/**
	 * @param int|string $from
	 * @param int|string $to
	 * @param string $format_past
	 * @param string $format_future
	 * @return string
	 */
	public static function time_ago( $from, $to = null, $format_past = '%s ago', $format_future = '%s from now' ) {
		$to = $to === null ? time() : $to;
		$to = is_int($to) ? $to : strtotime($to);
		$from = is_int($from) ? $from : strtotime($from);

		if ( $from < $to ) {
			return sprintf($format_past, human_time_diff($from, $to));
		} else {
			return sprintf($format_future, human_time_diff($to, $from));
		}
	}

	/**
	 * @param array $arr
	 * @param string $first_delimiter
	 * @param string $second_delimiter
	 * @return string
	 */
	public function add_list_separators( $arr, $first_delimiter = ',', $second_delimiter = 'and' ) {
		$length = count($arr);
		$list = '';
		foreach ( $arr as $index => $item ) {
			if ( $index < $length - 2 ) {
				$delimiter = $first_delimiter.' ';
			} elseif ( $index == $length - 2 ) {
				$delimiter = ' '.$second_delimiter.' ';
			} else {
				$delimiter = '';
			}
			$list = $list.$item.$delimiter;
		}
		return $list;
	}
	
}


