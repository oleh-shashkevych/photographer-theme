<?php
/**
 * Template Name: Contact Page
 */

get_header();

?>

<main class="site-main">

    <section class="contact-section">
        <div class="container">
            
            <div class="contact-wrapper">
                
                <div class="contact-visual">
                    <div class="contact-image-shape">
                        <div class="shape-overlay"></div> <?php
$img_id = get_field('contact_image');
if ($img_id) {
    echo wp_get_attachment_image($img_id, 'large', false, ['class' => 'c-img']);
}
?>
                    </div>
                </div>

                <div class="contact-info">
                    
                    <h1 class="contact-title"><?php echo get_field('contact_title'); ?></h1>
                    
                    <?php if ($desc = get_field('contact_desc')): ?>
                        <div class="contact-desc"><?php echo wp_kses_post($desc); ?></div>
                    <?php
endif; ?>

                    <div class="contact-form-area">
                        <?php
$shortcode = get_field('contact_shortcode');
if ($shortcode) {
    echo do_shortcode($shortcode);
}
?>
                    </div>

                </div>

            </div>

        </div>
    </section>

</main>

<?php get_footer(); ?>