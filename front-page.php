<?php
/**
 * Template Name: Front Page
 */

get_header(); 
?>

<main class="site-main">
    
    <section class="portfolio-grid">
        <div class="container-fluid">
            
            <div class="chaotic-grid">
                
                <?php if( have_rows('portfolio_gallery') ): ?>
                    
                    <?php 
                    $counter = 0; // Счетчик для классов, если нужно, но мы юзаем nth-child
                    while( have_rows('portfolio_gallery') ): the_row(); 
                        $image_id = get_sub_field('image'); 
                        ?>
                        
                        <div class="grid-item">
                            <div class="grid-item__inner">
                                <?php echo wp_get_attachment_image( $image_id, 'full', false, ['class' => 'grid-img'] ); ?>
                            </div>
                        </div>

                    <?php endwhile; ?>

                <?php endif; ?>

            </div>

        </div>
    </section>

    <section class="services-section">
        <div class="container">
            
            <?php if( $sec_title = get_field('services_section_title') ): ?>
                <h2 class="section-title"><?php echo esc_html($sec_title); ?></h2>
            <?php endif; ?>

            <div class="services-grid">
                <?php if( have_rows('services_list') ): ?>
                    <?php while( have_rows('services_list') ): the_row(); 
                        $type = get_sub_field('media_type');
                        $title = get_sub_field('title');
                        $desc = get_sub_field('description');
                        $btn = get_sub_field('btn_label');
                        $slug = get_sub_field('slug');
                        // Ссылка на будущую страницу контактов с параметром
                        $link = home_url('/contact/?service_id=' . $slug); 
                    ?>
                    
                    <div class="service-item">
                        
                        <div class="service-media">
                            <a href="<?php echo esc_url($link); ?>" class="media-link">
                                <?php if( $type == 'video' && $vid_url = get_sub_field('video') ): ?>
                                    <video autoplay loop muted playsinline>
                                        <source src="<?php echo esc_url($vid_url); ?>" type="video/mp4">
                                    </video>
                                <?php elseif( $img_id = get_sub_field('image') ): ?>
                                    <?php echo wp_get_attachment_image( $img_id, 'large' ); ?>
                                <?php endif; ?>
                            </a>
                        </div>

                        <div class="service-content">
                            <h3 class="service-title"><?php echo esc_html($title); ?></h3>
                            <div class="service-desc"><?php echo wp_kses_post($desc); ?></div>
                            <a href="<?php echo esc_url($link); ?>" class="service-btn">
                                <?php echo esc_html($btn); ?>
                            </a>
                        </div>

                    </div>

                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

        </div>
    </section>

    <?php if( $quote = get_field('home_quote_text') ): ?>
    <section class="quote-section">
        <div class="container">
            <div class="quote-content">
                <?php echo $quote; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <section class="expertise-section">
        <div class="container">
            
            <div class="expertise-header">
                <?php if( $tag = get_field('exp_tagline') ): ?>
                    <span class="expertise-tagline"><?php echo esc_html($tag); ?></span>
                <?php endif; ?>

                <h2 class="expertise-main-title">
                    <span class="title-top"><?php echo esc_html(get_field('exp_title_top')); ?></span>
                    <span class="title-bottom"><?php echo esc_html(get_field('exp_title_bottom')); ?></span>
                </h2>
            </div>

            <div class="expertise-grid">
                <?php if( have_rows('exp_list') ): ?>
                    <?php while( have_rows('exp_list') ): the_row(); ?>
                        <div class="expertise-item">
                            <h3 class="exp-item-title"><?php echo esc_html(get_sub_field('title')); ?></h3>
                            <div class="exp-item-desc">
                                <?php echo wp_kses_post(get_sub_field('description')); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

        </div>
    </section>

    <?php if( $quote2 = get_field('home_quote_text_2') ): ?>
    <section class="quote-section">
        <div class="container">
            <div class="quote-content">
                <?php echo $quote2; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <section class="about-section">
        <div class="container">
            <div class="about-grid">
                
                <div class="about-content">
                    <?php if( $tag = get_field('about_tagline') ): ?>
                        <span class="about-tagline"><?php echo esc_html($tag); ?></span>
                    <?php endif; ?>

                    <h2 class="about-name">
                        <?php echo get_field('about_name'); ?>
                    </h2>

                    <?php if( $sub = get_field('about_subheading') ): ?>
                        <h3 class="about-subheading"><?php echo esc_html($sub); ?></h3>
                    <?php endif; ?>

                    <div class="about-bio">
                        <?php echo wp_kses_post(get_field('about_bio')); ?>
                    </div>
                </div>

                <div class="about-image-wrapper">
                    <?php 
                    $about_img = get_field('about_image');
                    if( $about_img ) {
                        echo wp_get_attachment_image( $about_img, 'large', false, array('class' => 'about-img') );
                    }
                    ?>
                </div>

            </div>
        </div>
    </section>

    <section class="clients-section">
        <div class="container">
            
            <?php if( $tag = get_field('clients_tagline') ): ?>
                <div class="clients-header">
                    <span class="clients-tagline"><?php echo esc_html($tag); ?></span>
                </div>
            <?php endif; ?>

            <div class="clients-grid">
                <?php if( have_rows('clients_list') ): ?>
                    <?php while( have_rows('clients_list') ): the_row(); 
                        $logo = get_sub_field('logo');
                        $link = get_sub_field('link');
                    ?>
                        <div class="client-item">
                            <?php if( $link ): ?>
                                <a href="<?php echo esc_url($link); ?>" target="_blank" rel="noopener" class="client-link">
                                    <?php echo wp_get_attachment_image( $logo, 'medium', false, array('class' => 'client-logo') ); ?>
                                </a>
                            <?php else: ?>
                                <div class="client-logo-wrapper">
                                    <?php echo wp_get_attachment_image( $logo, 'medium', false, array('class' => 'client-logo') ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

        </div>
    </section>

</main>

<?php get_footer(); ?>