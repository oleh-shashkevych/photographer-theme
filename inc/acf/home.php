<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_home_portfolio',
	'title' => 'Home Page Portfolio',
	'fields' => array(
		array(
			'key' => 'field_portfolio_gallery',
			'label' => 'Portfolio Gallery',
			'name' => 'portfolio_gallery',
			'type' => 'repeater',
			'instructions' => 'Add images to the homepage grid.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'block', // Или 'table', 'row'
			'button_label' => 'Add Image',
			'sub_fields' => array(
				array(
					'key' => 'field_portfolio_image',
					'label' => 'Image',
					'name' => 'image',
					'type' => 'image',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'id', // Важно! Возвращаем ID для лучшей производительности
					'preview_size' => 'medium',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_type',
				'operator' => '==',
				'value' => 'front_page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array(
		0 => 'the_content', // Скрываем стандартный редактор, он нам не нужен
	),
	'active' => true,
	'description' => '',
));

endif;