<?php
/**
 * The header for our theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container">
        <div class="site-header__inner">
            
            <div class="site-logo">
                <?php if (has_custom_logo()): ?>
                    <?php the_custom_logo(); ?>
                <?php
else: ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo__text">
                        <?php bloginfo('name'); ?>
                    </a>
                <?php
endif; ?>
            </div>

            <div class="site-header__actions">
    
                <nav class="main-navigation">
                    <?php
wp_nav_menu(array(
    'theme_location' => 'header_menu',
    'menu_id' => 'primary-menu',
    'container' => false,
    'menu_class' => 'nav-list',
));
?>
                </nav>

                <?php if (function_exists('pll_the_languages')): ?>
                <div class="lang-dropdown">
                    <button class="lang-current">
                        <?php echo pll_current_language('slug'); // Текущий язык (EN) ?>
                        <span class="chevron">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M6 9L12 15L18 9" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                        </span>
                    </button>
                    <ul class="lang-list-dropdown">
                        <?php
    // Выводим список всех языков
    pll_the_languages(array(
        'display_names_as' => 'slug',
        'show_flags' => 0,
        'show_names' => 1,
    ));
?>
                    </ul>
                </div>
                <?php
endif; ?>

                <button class="burger-btn" aria-label="Toggle menu">
                    <span></span>
                    <span></span>
                </button>

            </div>
        </div>
    </div>
</header>

<div class="site-preloader">
    <div class="preloader-focus">
        <span class="focus-bracket left"></span>
        <span class="focus-dot"></span>
        <span class="focus-bracket right"></span>
    </div>
</div>