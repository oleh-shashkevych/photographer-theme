<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_portfolio_page',
    'title' => 'Portfolio Page Settings',
    'fields' => array(
        // --- HERO SECTION ---
        array(
            'key' => 'field_port_tab_hero',
            'label' => 'Hero Section',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_port_hero_title',
            'label' => 'Hero Title',
            'name' => 'port_hero_title',
            'type' => 'textarea',
            'rows' => 2,
            'default_value' => 'Visual stories that\nmove the world.',
            'new_lines' => 'br',
        ),
        array(
            'key' => 'field_port_hero_desc',
            'label' => 'Hero Description',
            'name' => 'port_hero_desc',
            'type' => 'textarea',
            'rows' => 3,
        ),
        array(
            'key' => 'field_port_hero_btn',
            'label' => 'CTA Button Label',
            'name' => 'port_hero_btn',
            'type' => 'text',
            'default_value' => 'Start a Project',
        ),
        array(
            'key' => 'field_port_hero_btn_link',
            'label' => 'CTA Button Link',
            'name' => 'port_hero_btn_link',
            'type' => 'url',
            'instructions' => 'Enter full URL (e.g., https://...) or relative path (e.g., /contact/)',
            'default_value' => '/contact/', 
        ),
        
        // --- GRID SECTION ---
        array(
            'key' => 'field_port_tab_grid',
            'label' => 'Portfolio Grid',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_port_page_gallery',
            'label' => 'Gallery Images',
            'name' => 'port_page_gallery',
            'type' => 'repeater',
            'button_label' => 'Add Image',
            'layout' => 'block',
            'sub_fields' => array(
                array(
                    'key' => 'field_port_img',
                    'label' => 'Image',
                    'name' => 'image',
                    'type' => 'image',
                    'return_format' => 'id',
                    'preview_size' => 'medium',
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template', // Показываем только если выбран шаблон
                'operator' => '==',
                'value' => 'page-portfolio.php',
            ),
        ),
    ),
));

endif;