<?php

namespace Bridge;


if (!defined('ABSPATH'))
	exit;

final class Bridge {


	private static $instance;
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
			self::$instance->start();
		}
		return self::$instance;
	}
	public function __clone() {
		_doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', 'bridge'), '1.6');
	}
	public function __wakeup() {
		_doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', 'bridge'), '1.6');
	}


	public function start() {
		//run app
		$container = \Bridge\Container::instance();



		$metadata = \Bridge\Metadata::instance();
		$metadata->add('schema', new \Bridge\Repository\SchemaRepository());
		$metadata->add('route', new \Bridge\Repository\RouteRepository());
		$metadata->add('route_api', new \Bridge\Repository\RouteApiRepository());
		$metadata->add('middleware', new \Bridge\Repository\MiddlewareRepository());


		$element = \Bridge\Element::instance();
		$element->add('header', new \Bridge\Repository\HeaderRepository());
		$element->add('block', new \Bridge\Repository\BlockRepository());
		$element->add('footer', new \Bridge\Repository\FooterRepository());
		$element->add('popup', new \Bridge\Repository\PopupRepository());
		$element->add('widget', new \Bridge\Repository\WidgetRepository());
		$element->add('menu', new \Bridge\Repository\MenuRepository());



		$repository = \Bridge\Repository::instance();
		$repository->add('custom', new \Bridge\Repository\CustomRepository());
		$repository->add('comment_meta', new \Bridge\Repository\CommentMetaRepository());
		$repository->add('comment', new \Bridge\Repository\CommentRepository());
		$repository->add('link', new \Bridge\Repository\LinkRepository());
		$repository->add('option', new \Bridge\Repository\OptionRepository());
		$repository->add('post_meta', new \Bridge\Repository\PostMetaRepository());
		$repository->add('post', new \Bridge\Repository\PostRepository());
		$repository->add('term_meta', new \Bridge\Repository\TermMetaRepository());
		$repository->add('term', new \Bridge\Repository\TermRepository());
		$repository->add('term_taxonomy', new \Bridge\Repository\TermTaxonomyRepository());
		$repository->add('user_meta', new \Bridge\Repository\CustomRepository());
		$repository->add('user', new \Bridge\Repository\UserRepository());

		$persistent = \Bridge\Persistent::instance();
		$persistent->add('custom', new \Bridge\Persistent\CustomPersistent());
		$persistent->add('comment_meta', new \Bridge\Persistent\CommentMetaPersistent());
		$persistent->add('comment', new \Bridge\Persistent\CommentPersistent());
		$persistent->add('link', new \Bridge\Persistent\LinkPersistent());
		$persistent->add('option', new \Bridge\Persistent\OptionPersistent());
		$persistent->add('post_meta', new \Bridge\Persistent\PostMetaPersistent());
		$persistent->add('post', new \Bridge\Persistent\PostPersistent());
		$persistent->add('term_meta', new \Bridge\Persistent\TermMetaPersistent());
		$persistent->add('term', new \Bridge\Persistent\TermPersistent());
		$persistent->add('term_taxonomy', new \Bridge\Persistent\TermTaxonomyPersistent());
		$persistent->add('user_meta', new \Bridge\Persistent\CustomPersistent());
		$persistent->add('user', new \Bridge\Persistent\UserPersistent());

		$control = \Bridge\Control::instance();
		$control->add('input', \Bridge\Control\Input::class);
		$control->add('text', \Bridge\Control\Text::class);
		$control->add('textarea', \Bridge\Control\Textarea::class);
		$control->add('select', \Bridge\Control\Select::class);
		$control->add('checkbox', \Bridge\Control\Checkbox::class);


		$element = \Bridge\Storage\Element::instance();

		$metadata = \Bridge\Storage\Metadata::instance();
		$metadata->add_schema('comment_meta', new \Bridge\Model\CommentMeta());
		$metadata->add_schema('comment', new \Bridge\Model\Comment());
		$metadata->add_schema('link', new \Bridge\Model\Link());
		$metadata->add_schema('option', new \Bridge\Model\Option());
		$metadata->add_schema('post_meta', new \Bridge\Model\PostMeta());
		$metadata->add_schema('post', new \Bridge\Model\Post());
		$metadata->add_schema('term_meta', new \Bridge\Model\TermMeta());
		$metadata->add_schema('term', new \Bridge\Model\Term());
		$metadata->add_schema('term_taxonomy', new \Bridge\Model\TermTaxonomy());
		$metadata->add_schema('user_meta', new \Bridge\Model\UserMeta());
		$metadata->add_schema('user_meta', new \Bridge\Model\User());

		$twig = \Bridge\Template\Twig_Extension::instance();
		$twig->add_global('form', new \Bridge\Form());
	}
}


