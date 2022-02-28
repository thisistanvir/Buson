<!-- Breadcrumb Area -->
<div class="slider-area ">
   <div class="single-slider slider-height2 d-flex align-items-center" style="<?php if ( has_post_thumbnail() ): ?>background-image: url('<?php the_post_thumbnail_url()?>');<?php else: ?>background-image: url('<?php echo get_template_directory_uri() ?>/assets/img/breadcumb.jpg');<?php endif;?>">
      <div class="container">
         <div class="row">
            <div class="col-xl-12">
               <div class="hero-cap text-center">
                  <h2><?php the_title();?></h2>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Breadcrumb Area-->