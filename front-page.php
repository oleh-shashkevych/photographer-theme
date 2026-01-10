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

</main>

<?php get_footer(); ?>