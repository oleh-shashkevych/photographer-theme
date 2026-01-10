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

acf_add_local_field_group(array(
    'key' => 'group_home_quote',
    'title' => 'Home Page Quote',
    'fields' => array(
        array(
            'key' => 'field_home_quote_text',
            'label' => 'Quote Text',
            'name' => 'home_quote_text',
            'type' => 'textarea',
            'instructions' => 'Enter the text for the black strip section.',
            'default_value' => 'Exceeding your satisfaction is my measure of success. I work with you to ensure that my visual creations speak your language, in every medium.',
            'rows' => 3,
            'new_lines' => 'br', // Автоматически переносит строки
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

acf_add_local_field_group(array(
    'key' => 'group_home_expertise',
    'title' => 'Home Page Expertise',
    'fields' => array(
        // Мелкий надзаголовок (/Expertise)
        array(
            'key' => 'field_exp_tagline',
            'label' => 'Tagline',
            'name' => 'exp_tagline',
            'type' => 'text',
            'default_value' => '/Expertise',
        ),
        // Первая строка заголовка (обычная)
        array(
            'key' => 'field_exp_title_top',
            'label' => 'Title Top Line',
            'name' => 'exp_title_top',
            'type' => 'text',
            'default_value' => 'The Best Creations Tell',
        ),
        // Вторая строка (ОГРОМНАЯ)
        array(
            'key' => 'field_exp_title_bottom',
            'label' => 'Title Bottom Line (Big)',
            'name' => 'exp_title_bottom',
            'type' => 'text',
            'default_value' => 'Your Story',
        ),
        // Список (4 колонки)
        array(
            'key' => 'field_exp_list',
            'label' => 'Expertise List',
            'name' => 'exp_list',
            'type' => 'repeater',
            'layout' => 'row',
            'button_label' => 'Add Item',
            'sub_fields' => array(
                array(
                    'key' => 'field_exp_item_title',
                    'label' => 'Item Title',
                    'name' => 'title',
                    'type' => 'text',
                    'default_value' => '01/ Branding & Marketing',
                ),
                array(
                    'key' => 'field_exp_item_desc',
                    'label' => 'Description',
                    'name' => 'description',
                    'type' => 'textarea',
                    'rows' => 3,
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

acf_add_local_field_group(array(
    'key' => 'group_home_quote_2',
    'title' => 'Home Page Quote 2',
    'fields' => array(
        array(
            'key' => 'field_home_quote_text_2',
            'label' => 'Quote Text',
            'name' => 'home_quote_text_2',
            'type' => 'textarea',
            'instructions' => 'Second black strip section text.',
            'default_value' => 'Collaboration is key to your success, and mine. I work with you at every stage of the process, so that I can craft your story together.',
            'rows' => 3,
            'new_lines' => 'br',
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

acf_add_local_field_group(array(
    'key' => 'group_home_about',
    'title' => 'Home Page About',
    'fields' => array(
        // Мелкий надзаголовок (/ABOUT)
        array(
            'key' => 'field_about_tagline',
            'label' => 'Tagline',
            'name' => 'about_tagline',
            'type' => 'text',
            'default_value' => '/ABOUT',
        ),
        // Имя (CHRIS COLLADO)
        array(
            'key' => 'field_about_name',
            'label' => 'Name (Big Title)',
            'name' => 'about_name',
            'type' => 'textarea', // Textarea, чтобы можно было переносить строки
            'default_value' => "CHRIS\nCOLLADO", // По дефолту с переносом
            'rows' => 2,
            'new_lines' => 'br', // Авто-перенос строк в HTML
        ),
        // Подзаголовок (Photographer & Film maker...)
        array(
            'key' => 'field_about_subheading',
            'label' => 'Subheading',
            'name' => 'about_subheading',
            'type' => 'text',
            'default_value' => 'PHOTOGRAPHER & FILM MAKER IN NY & NJ',
        ),
        // Текст биографии
        array(
            'key' => 'field_about_bio',
            'label' => 'Biography Text',
            'name' => 'about_bio',
            'type' => 'textarea',
            'rows' => 5,
        ),
        // Фото справа
        array(
            'key' => 'field_about_image',
            'label' => 'Portrait Image',
            'name' => 'about_image',
            'type' => 'image',
            'return_format' => 'id',
            'preview_size' => 'medium',
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

acf_add_local_field_group(array(
    'key' => 'group_home_clients',
    'title' => 'Home Page Clients',
    'fields' => array(
        // Надзаголовок (/ Clients)
        array(
            'key' => 'field_clients_tagline',
            'label' => 'Tagline',
            'name' => 'clients_tagline',
            'type' => 'text',
            'default_value' => '/ Clients',
        ),
        // Репитер с логотипами
        array(
            'key' => 'field_clients_list',
            'label' => 'Clients List',
            'name' => 'clients_list',
            'type' => 'repeater',
            'layout' => 'block', 
            'button_label' => 'Add Client',
            'sub_fields' => array(
                array(
                    'key' => 'field_client_logo',
                    'label' => 'Logo Image',
                    'name' => 'logo',
                    'type' => 'image',
                    'return_format' => 'id',
                    'preview_size' => 'medium',
                    'instructions' => 'Recommended: White PNG logo with transparent background.',
                ),
                array(
                    'key' => 'field_client_link',
                    'label' => 'Website Link (Optional)',
                    'name' => 'link',
                    'type' => 'url',
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