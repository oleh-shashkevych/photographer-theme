<?php
/**
 * Template Name: Text Page (Legal/Info)
 */

get_header(); 
?>

<main class="site-main">

    <section class="text-page-section">
        <div class="container">
            <div class="text-page-wrapper">
                
                <h1 class="page-main-title"><?php the_title(); ?></h1>

                <div class="text-content-area">
                    <?php 
                    if ( have_posts() ) : 
                        while ( have_posts() ) : the_post();
                            the_content();
                        endwhile;
                    endif;
                    ?>
                </div>

            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>