<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_theme_footer',
    'title' => 'Footer Settings',
    'fields' => array(
        // Ссылка на Terms & Privacy
        array(
            'key' => 'field_footer_privacy_link',
            'label' => 'Terms & Privacy Link',
            'name' => 'footer_privacy_link',
            'type' => 'url',
        ),
        // Иконка перед копирайтом
        array(
            'key' => 'field_footer_icon',
            'label' => 'Footer Copyright Icon',
            'name' => 'footer_icon',
            'type' => 'image',
            'return_format' => 'id', // Важно: возвращаем ID
            'preview_size' => 'thumbnail',
            'wrapper' => array('width' => '50'),
        ),
        // Текст автора
        array(
            'key' => 'field_footer_author',
            'label' => 'Copyright Author Name',
            'name' => 'footer_author',
            'type' => 'text',
            'default_value' => 'CHRIS COLLADO',
            'wrapper' => array('width' => '50'),
        ),
        // Соцсети (Репитер)
        array(
            'key' => 'field_socials_list',
            'label' => 'Social Networks',
            'name' => 'socials_list',
            'type' => 'repeater',
            'button_label' => 'Add Social Network',
            'sub_fields' => array(
                array(
                    'key' => 'field_social_icon',
                    'label' => 'Icon (SVG/PNG)',
                    'name' => 'icon',
                    'type' => 'image',
                    'return_format' => 'id',
                    'preview_size' => 'thumbnail',
                ),
                array(
                    'key' => 'field_social_link',
                    'label' => 'Link',
                    'name' => 'link',
                    'type' => 'url',
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'theme-general-settings',
            ),
        ),
    ),
));

endif;