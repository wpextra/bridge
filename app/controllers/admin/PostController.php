<?php
namespace Bridge\App\Controller\Admin;

if (!defined('ABSPATH')) {
	exit;
}
use Bridge\Http\Controller\Controller;

/**
 * @Bridge\Annotation\Route(
 * name="admin_posts", 
 * path="admin/content/{post_type}", 
 * middleware="admin"
 * )
 */
class PostController extends Controller {

	public function response($request) {
		$data = [];
		
		$params = $request->query->all();
		$templates = [];
		if(null !== $post_type = $request->get('post_type')) {
			$templates[] = 'admin/posttype_'.$post_type.'.twig';
			$args = array_merge([
				'posts_per_page' => 10,
				'post_type' => $post_type
			], $params);
			$data['posts'] = \Bridge\Query::model($post_type)->get(array($args))->with(['thumbnail', 'excerpt'])->results();
		}
		$templates[] = 'admin/posts.twig';
		echo $this->view($templates, $data);
	}

	public function enqueue_scripts() {
		add_action('wp_enqueue_scripts', function() {
			wp_enqueue_style( 'datatable' );
			wp_enqueue_script( 'datatable_bootstrap' );
		});
		
	}

}