<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package Your_Theme
 */
?>

    </div><!-- #content -->

    <footer class="site-footer text-white py-5 mt-auto">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="row text-center w-100 h-100 align-items-center">
                <div class="col-xl-3 col-12 order-xl-1 order-2 mb-4">
                    <?php
                    $facebook  = get_theme_mod('alterra_facebook_link');
                    $instagram = get_theme_mod('alterra_instagram_link');
                    $youtube   = get_theme_mod('alterra_youtube_link');
                    $email     = get_theme_mod('alterra_email_link');
                    $support   = get_theme_mod('alterra_support_link');
                    ?>

                    <ul class="list-inline mb-0 pb-0">
                        <?php if ( $youtube ) : ?>
                        <li class="list-inline-item">
                            <a href="<?php echo esc_url( $youtube ); ?>" target="_blank">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if ( $facebook ) : ?>
                        <li class="list-inline-item">
                            <a href="<?php echo esc_url( $facebook ); ?>" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if ( $instagram ) : ?>
                        <li class="list-inline-item">
                            <a href="<?php echo esc_url( $instagram ); ?>" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if ( $email ) : ?>
                        <li class="list-inline-item">
                            <a href="mailto:<?php echo antispambot( $email ); ?>">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>

                </div>

                <div class="col-xl-6 col-12 order-xl-2 order-1 mb-4">
                    <a href="<?php echo get_site_url(); ?>" class="footer-logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/alterra-logo-white.png" class="py-3" alt="">
                    </a>
                    <br>
                    <div class="mb-1 footer-text">&copy;<?php echo date('Y'); ?> Puente Holdings, LLC. All rights reserved.</div>
                    <div class="small footer-text-small">*Individual results may vary. Not a medical provider.</div>
                </div>

                <div class="col-xl-3 col-12 text-left text-start order-xl-3 order-3 mb-4">
                    <a target="_blank" href="<?php echo $support; ?>" class="btn text-white" style="background-color: #0D0D0D;">Join our support community  <i class="fas fa-arrow-right btn-arrow"></i></a>
                    
                </div>
            </div>
            
        </div>
    </footer>
    <div class="privacy-terms text-white text-center">
        <ul>
            <li>
                <a href="<?php echo get_site_url(); ?>/privacy-policy" class="text-white d-block">Privacy Policy</a>
            </li>
            <li class="">
                <a href="<?php echo get_site_url(); ?>/terms-and-conditions" class="text-white d-block">Terms and Conditions</a>
            </li>
        </ul>
    </div>

    <?php wp_footer(); ?>
</body>
</html>
