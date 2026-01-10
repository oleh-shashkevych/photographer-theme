<?php
/**
 * The header for our theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
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
                <?php if ( has_custom_logo() ) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo__text">
                        <?php bloginfo( 'name' ); ?>
                    </a>
                <?php endif; ?>
            </div>

            <div class="site-header__actions">
    
                <nav class="main-navigation">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'header_menu',
                        'menu_id'        => 'primary-menu',
                        'container'      => false,
                        'menu_class'     => 'nav-list',
                    ) );
                    ?>
                </nav>

                <?php if ( function_exists('pll_the_languages') ) : ?>
                <div class="lang-dropdown">
                    <button class="lang-current">
                        <?php echo pll_current_language('slug'); // Текущий язык (EN) ?>
                        <span class="chevron">▾</span>
                    </button>
                    <ul class="lang-list-dropdown">
                        <?php 
                        // Выводим список всех языков
                        pll_the_languages( array(
                            'display_names_as' => 'slug',
                            'show_flags' => 0,
                            'show_names' => 1,
                        )); 
                        ?>
                    </ul>
                </div>
                <?php endif; ?>

                <button class="burger-btn" aria-label="Toggle menu">
                    <span></span>
                    <span></span>
                </button>

            </div>
        </div>
    </div>
</header>