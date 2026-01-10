<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

define( 'THEME_VERSION', '1.0.0' );
define( 'THEME_DIR', get_template_directory() );
define( 'THEME_URI', get_template_directory_uri() );

// Подключение инклудов
require_once THEME_DIR . '/inc/setup.php';
require_once THEME_DIR . '/inc/enqueue.php';
require_once THEME_DIR . '/inc/polylang.php';

// Подключение ACF полей (проверяем, активен ли плагин, чтобы не ронять сайт)
if ( function_exists('acf_add_local_field_group') ) {
    require_once THEME_DIR . '/inc/acf/loader.php';
}