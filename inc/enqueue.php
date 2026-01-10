<?php
function my_theme_scripts() {
    // Стили
    wp_enqueue_style( 'my-theme-reset', THEME_URI . '/assets/css/reset.css', array(), THEME_VERSION );
    wp_enqueue_style( 'my-theme-main', THEME_URI . '/assets/css/main.css', array('my-theme-reset'), THEME_VERSION );

    // Скрипты
    wp_enqueue_script( 'my-theme-js', THEME_URI . '/assets/js/main.js', array('jquery'), THEME_VERSION, true );

    // Передача переменных в JS (например, для AJAX)
    wp_localize_script( 'my-theme-js', 'themeData', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
    ));
}
add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );