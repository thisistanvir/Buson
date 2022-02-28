<?php

/**
 * Template Name: About Template
 */

get_header(); ?>

<!-- Breadcrumb Area -->
<?php get_template_part('parts/content', 'breadcrumb'); ?>
<!-- Breadcrumb Area-->

<!-- We Trusted Start-->
<?php get_template_part('parts/content', 'about'); ?>
<!-- We Trusted End-->

<!-- Testimonial Start -->
<?php get_template_part('parts/content', 'testimonial'); ?>
<!-- Testimonial End -->

<!-- Recent Area Start -->
<?php get_template_part('parts/content', 'blog'); ?>
<!-- Recent Area End-->

<?php
get_footer();
?>