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

</main>

<?php get_footer(); ?>