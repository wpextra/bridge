<?php

namespace Bridge\Module\Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

class Widget extends \Elementor\Widget_Base {

	static public $control_type = [
		'text' => \Elementor\Controls_Manager::TEXT,
		'select' => \Elementor\Controls_Manager::SELECT,
		'textarea' => \Elementor\Controls_Manager::TEXTAREA,
		'wysiwyg' => \Elementor\Controls_Manager::WYSIWYG
	];

	public $name;
	public $title;
	public $icon;
	public $options = [];
	public $categories = [];


	public function get_name() {
		return 'wpe_'.$this->name;
	}

	public function get_title() {
		return $this->title;
	}


	public function get_icon() {
		return $this->icon;
	}
	public function get_categories() {
		return ['wpe-blocks'];
	}

	public function add_option($option) {
		$id = $option['id'];
		$args = $option;
		if(isset(self::$control_type[$option['type']])) {
			$args  = array_merge($option, [
				'type' => self::$control_type[$option['type']],
				'label' => $option['name']
			]);
			$this->add_control(
				$id,$args
			);
		}
	}

	public function _register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		foreach ($this->options as $key => $option) {
			$this->add_option($option);
		}
		$this->end_controls_section();
	}

	public function render() {
		$args = $this->get_settings_for_display();
		$data = $this->get_raw_data();

		$type = str_replace("wpe_","", $data['widgetType']);
		if($type) {
			$block = \Bridge\Element::type('block')->query('find', $type, ['callable'])->results();
			if($block && null !== $callable = $block->callable) {
				echo $callable->response($args);
			}

		}
	}

    /**
     * @return mixed
     */
    public function getName()
    {
    	return $this->name;
    }

    /**
     * @param mixed $name
     *
     * @return self
     */
    public function setName($name)
    {
    	$this->name = $name;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
    	return $this->title;
    }

    /**
     * @param mixed $title
     *
     * @return self
     */
    public function setTitle($title)
    {
    	$this->title = $title;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getIcon()
    {
    	return $this->icon;
    }

    /**
     * @param mixed $icon
     *
     * @return self
     */
    public function setIcon($icon)
    {
    	$this->icon = $icon;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getCategories()
    {
    	return $this->categories;
    }

    /**
     * @param mixed $categories
     *
     * @return self
     */
    public function setCategories($categories)
    {
    	$this->categories = $categories;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getControlType()
    {
    	return $this->control_type;
    }

    /**
     * @param mixed $control_type
     *
     * @return self
     */
    public function setControlType($control_type)
    {
    	$this->control_type = $control_type;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getOptions()
    {
    	return $this->options;
    }

    /**
     * @param mixed $options
     *
     * @return self
     */
    public function setOptions($options)
    {
    	$this->options = $options;

    	return $this;
    }
}