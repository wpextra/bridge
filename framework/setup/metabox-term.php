<?php

namespace Bridge\Setup;


if (!defined('ABSPATH'))
	exit;

class MetaboxTerm {

	
	public function __construct() {
		add_action('admin_init', function() {
			$models = \Bridge\Model::all();
			if($models) {
				foreach ($models as $key => $model) {
					if(is_array($model)) {
						$model = (object)$model;
					}
					if($model->virtual && $model->virtualType === 'taxonomy') {
						if(isset($model->fields) && count($model) > 0)  {
							add_action( $model->id.'_edit_form_fields', array(&$this, 'view'));
							add_action( $model->id.'_add_form_fields', array(&$this, 'view'));
							add_action( 'edited_'.$model->id, array(&$this, 'on_save'));
							add_action( 'create_'.$model->id, array(&$this, 'on_save'));
						}
					}
				}
			}
		});
	}


	public function build_form($taxonomy, $term_id = null) {
		$model = \Bridge\Model::find($taxonomy);
		if($model) {
			$options = $model['fields'];
			$form =  new \Bridge\Form();
			$fields = [];
			foreach ($options as $key => $option) {
				$fields[] = array_merge($option, [
					'value' => $term_id ? get_term_meta($term_id, $option['name'], true) : null
				]);
			}
			?>
			<div class="extra-field ux-wrapper">
				<div class="card admin_form">
					<div class="card-body">
						<?php echo $form->options($fields); ?>
					</div>
				</div>
			</div>
			<?php
		}

	}

	
	public function view($term) {
		$term_id = null;
		if(is_string($term)) {
			$taxonomy =  $term;
		} else {
			$taxonomy = $term->taxonomy;
			$term_id = $term->term_id;
		}
		$this->build_form($taxonomy, $term_id);
	}

	public function on_save($term_id) {
		$term = get_term($term_id);
		$model = \Bridge\Model::find($term->taxonomy);
		if($model) {
			foreach ($model['fields'] as $key => $field) {
				$this->save_meta($term_id, $field['name']);
			}
		}
	}

	private function save_meta($term_id, $key) {
		$old = get_term_meta($term_id, $key, true );
		$new = $_POST[$key];
		if ( $new && $new !== $old ) {
			update_term_meta( $term_id, $key, $new );
		} elseif ( '' === $new && $old ) {
			delete_term_meta( $term_id, $key, $old );
		} 
	}
}
