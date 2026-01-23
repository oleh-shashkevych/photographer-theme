<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_contact_page',
    'title' => 'Contact Page Settings',
    'fields' => array(
        // Заголовок
        array(
            'key' => 'field_contact_title',
            'label' => 'Title',
            'name' => 'contact_title',
            'type' => 'text',
            'default_value' => "Let's Connect!",
        ),
        // Описание
        array(
            'key' => 'field_contact_desc',
            'label' => 'Description',
            'name' => 'contact_desc',
            'type' => 'textarea',
            'rows' => 3,
            'default_value' => 'Interested in working together? Fill out some info and I will be in touch shortly!',
        ),
        // Картинка (Стрелка)
        array(
            'key' => 'field_contact_image',
            'label' => 'Side Image',
            'name' => 'contact_image',
            'type' => 'image',
            'return_format' => 'id',
            'preview_size' => 'medium',
        ),
        // Шорткод формы
        array(
            'key' => 'field_contact_shortcode',
            'label' => 'CF7 Shortcode',
            'name' => 'contact_shortcode',
            'type' => 'text',
            'instructions' => 'Paste the Contact Form 7 shortcode here (e.g. [contact-form-7 id="123"...])',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'page-contact.php',
            ),
        ),
    ),
));

endif;