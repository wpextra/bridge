<?php

namespace Bridge\Setup;


if (!defined('ABSPATH'))
	exit;

class MetaboxPost {

	protected $_repo;
	protected $_service;
	

	public function __construct() {
		add_action('add_meta_boxes', array(&$this, '_register_metabox'));
		add_action('save_post', array(&$this, '_on_save'));
	}


	public function _register_metabox() {
		$post_type = get_post_type();
		$model = \Bridge\Model::find($post_type);
		if($model) {
			add_meta_box($model['id'].'_main_metabox', 
				'Metadata', 
				array(&$this, 'view'), 
				$model['id'],
				'normal',
				'high',
				$model['fields']
			);
		}
		
	}

	public function view($post, $metabox) {
		global $post;  
		$options = $metabox['args'];
		$form =  new \Bridge\Form();
		$fields = [];
		foreach ($options as $key => $option) {
			$fields[] = array_merge($option, [
				'value' => get_post_meta($post->ID, $option['name'], true)
			]);
		}
		
		?>
		<div class="ux-wrapper ux-metabox">
			<input type="hidden" name="_main_metabox_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">
			<div class="ux-metabox-option">
				<?php echo $form->options($fields); ?>
			</div>
		</div>
		<?php
	}

	public function _on_save($post_id) {
		if(!isset($_POST['_main_metabox_box_nonce'])) {
			return $post_id; 
		}
		if (!wp_verify_nonce($_POST['_main_metabox_box_nonce'], basename(__FILE__) ) ) {
			return $post_id; 
		} 
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}
		$post_type = get_post_type();
		$model = \Bridge\Model::find($post_type);
		if($model) {
			foreach ($model['fields'] as $key => $field) {
				$this->save_meta($post_id, $field['name']);
			}
		}
	}

	private function save_meta($post_id, $key) {
		$old = get_post_meta($post_id, $key, true );
		$new = $_POST[$key];
		if ( $new && $new !== $old ) {
			update_post_meta( $post_id, $key, $new );
		} elseif ( '' === $new && $old ) {
			delete_post_meta( $post_id, $key, $old );
		} 
	}
}
