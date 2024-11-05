<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>



<div class="container-fluid">
    <div class="row">
        <div class="col-12 spacer"></div>
    </div>
</div>

<div id="wrapper-footer">
    <div class="<?php echo esc_attr( $container ); ?>">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1 pt-5 pb-5">
                <footer class="site-footer" id="colophon">
                    <div class="d-flex justify-content-between align-items-center py-3">
                        <!-- Logo on the left -->
                        <div class="footer-logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <img src="<?php echo get_theme_file_uri('img/wi-logo.png'); ?>" alt="<?php bloginfo('name'); ?>" style="max-width: 150px;">
                            </a>
                        </div>

                      

                        <!-- Social media links on the right -->
                        <div class="footer-socials">
                            <a href="https://x.com" target="_blank" rel="noopener noreferrer" class="me-3">
                                <img src="<?php echo get_theme_file_uri('img/linkedin.svg'); ?>" alt="Twitter" style="width: 24px;">
                            </a>
                            <a href="https://instagram.com" target="_blank" rel="noopener noreferrer">
                                <img src="<?php echo get_theme_file_uri('img/ig.svg'); ?>" alt="Instagram" style="width: 24px;">
                            </a>
                        </div>
                    </div>
                </footer>
            </div><!-- col end -->
        </div><!-- row end -->
    </div><!-- container end -->
</div><!-- wrapper end -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Copyright notice -->
            <div class="text-center">
                <p class="mb-0">&copy; <?php echo date("Y"); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
            </div>
        </div>
    </div>
</div>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>
</html>
