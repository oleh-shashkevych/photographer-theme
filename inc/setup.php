<?php
function my_theme_setup() {
    // Переводы темы (для .mo/.po файлов, если понадобятся стандартные)
    load_theme_textdomain( 'photographer', get_template_directory() . '/languages' );

    // Теги title
    add_theme_support( 'title-tag' );

    // Миниатюры
    add_theme_support( 'post-thumbnails' );

    // HTML5
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
    ) );

    // Регистрация меню
    register_nav_menus( array(
        'header_menu' => __( 'Header Menu', 'photographer' ),
        'footer_menu' => __( 'Footer Menu', 'photographer' ),
    ) );
}
add_action( 'after_setup_theme', 'my_theme_setup' );