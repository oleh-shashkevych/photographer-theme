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

acf_add_local_field_group(array(
    'key' => 'group_home_services',
    'title' => 'Home Page Services',
    'fields' => array(
        // Заголовок секции (опционально)
        array(
            'key' => 'field_services_section_title',
            'label' => 'Section Title',
            'name' => 'services_section_title',
            'type' => 'text',
        ),
        // Репитер услуг
        array(
            'key' => 'field_services_list',
            'label' => 'Services List',
            'name' => 'services_list',
            'type' => 'repeater',
            'layout' => 'block',
            'button_label' => 'Add Service',
            'sub_fields' => array(
                // Выбор типа медиа
                array(
                    'key' => 'field_service_media_type',
                    'label' => 'Media Type',
                    'name' => 'media_type',
                    'type' => 'select',
                    'choices' => array(
                        'image' => 'Image',
                        'video' => 'Video',
                    ),
                    'default_value' => 'image',
                ),
                // Картинка
                array(
                    'key' => 'field_service_image',
                    'label' => 'Image',
                    'name' => 'image',
                    'type' => 'image',
                    'return_format' => 'id',
                    'preview_size' => 'medium',
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_service_media_type',
                                'operator' => '==',
                                'value' => 'image',
                            ),
                        ),
                    ),
                ),
                // Видео (загрузка файла)
                array(
                    'key' => 'field_service_video',
                    'label' => 'Video File (MP4)',
                    'name' => 'video',
                    'type' => 'file',
                    'return_format' => 'url',
                    'mime_types' => 'mp4',
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_service_media_type',
                                'operator' => '==',
                                'value' => 'video',
                            ),
                        ),
                    ),
                ),
                // Текстовый контент
                array(
                    'key' => 'field_service_title',
                    'label' => 'Title',
                    'name' => 'title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_service_desc',
                    'label' => 'Description',
                    'name' => 'description',
                    'type' => 'textarea',
                    'rows' => 3,
                ),
                // Кнопка и Слаг для формы
                array(
                    'key' => 'field_service_btn_label',
                    'label' => 'Button Label',
                    'name' => 'btn_label',
                    'type' => 'text',
                    'default_value' => 'Explore Further →',
                ),
                array(
                    'key' => 'field_service_slug',
                    'label' => 'Service Slug (for Contact Form)',
                    'name' => 'slug',
                    'type' => 'text',
                    'instructions' => 'Example: wedding, portrait, video. This will be passed to the contact form.',
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
));

endif;