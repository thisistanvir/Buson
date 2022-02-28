<?php

/**
 * Template Name: Services Template
 */

get_header();
?>
<!-- Breadcrumb Area -->
<?php get_template_part( 'parts/content', 'breadcrumb' );?>
<!-- Breadcrumb Area-->
<div class="services-area section-padding2">
    <div class="container">
        <?php get_template_part( 'parts/content', 'services' );?>
    </div>
</div>
<!-- services Area End-->

<!-- Recent Area Start -->
<?php get_template_part( 'parts/content', 'blog' );?>
<!-- Recent Area End-->

<?php get_footer();?>