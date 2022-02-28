<?php
/**
 * This template for Single Cases
 */
get_header();
?>

<!-- Breadcrumb Area -->
<?php get_template_part( 'parts/content', 'breadcrumb' );?>
<!-- Breadcrumb Area-->

        <!-- Services Details Start -->
        <div class="services-details section-padding2">
            <div class="container">
                <div class="row">
                    <div class="offset-xl-12">
                        <div class="s-details-caption">
                            <?php the_content();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Services Details End -->
   <?php get_footer();?>