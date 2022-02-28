<?php
get_header();
?>


<!-- Breadcrumb Area -->
<?php get_template_part('parts/content', 'breadcrumb'); ?>
<!-- Breadcrumb Area-->

<section class="section-padding">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <?php the_content(); ?>
         </div>
      </div>
   </div>
</section>

<?php
get_footer();
?>