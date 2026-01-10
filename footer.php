<footer class="site-footer">
    <div class="container">
        
        <?php if( have_rows('socials_list', 'option') ): ?>
            <div class="footer-socials">
                <?php while( have_rows('socials_list', 'option') ): the_row(); 
                    $icon = get_sub_field('icon');
                    $link = get_sub_field('link');
                ?>
                    <a href="<?php echo esc_url($link); ?>" target="_blank" rel="noopener" class="social-item">
                        <?php echo wp_get_attachment_image( $icon, 'thumbnail', false, array('class' => 'social-icon') ); ?>
                    </a>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

        <div class="footer-bottom">
            
            <div class="footer-left">
                <?php 
                $privacy = get_field('footer_privacy_link', 'option');
                if( $privacy ): ?>
                    <a href="<?php echo esc_url($privacy); ?>" class="footer-link">Terms & Privacy</a>
                <?php else: ?>
                    <span class="footer-link">Terms & Privacy</span>
                <?php endif; ?>
            </div>

            <div class="footer-right">
                <?php 
                $icon_id = get_field('footer_icon', 'option');
                if( $icon_id ) {
                    echo wp_get_attachment_image( $icon_id, 'thumbnail', false, array('class' => 'footer-logo-icon') );
                }
                ?>
                <span class="copyright-text">
                    &copy; <?php echo date('Y'); ?> All Rights Reserved | 
                    <span class="author-name"><?php echo esc_html( get_field('footer_author', 'option') ); ?></span>
                </span>
            </div>

        </div>
    </div>
</footer>

<div id="lightbox" class="lightbox">
    <div class="lightbox-overlay"></div>
    
    <button class="lightbox-close" aria-label="Close">&times;</button>
    <button class="lightbox-prev" aria-label="Previous">&#10094;</button>
    
    <div class="lightbox-container">
        <img id="lightbox-img" src="" alt="Full view">
        <div class="lightbox-loader"></div>
    </div>
    
    <button class="lightbox-next" aria-label="Next">&#10095;</button>
</div>

<?php wp_footer(); ?>
</body>
</html>