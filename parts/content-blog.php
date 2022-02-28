<!-- Recent Area Start -->
<div class="recent-area section-paddingt">
   <div class="container">
      <!-- section tittle -->
      <div class="row">
         <div class="col-lg-12">
            <div class="section-tittle text-center">
               <h2><?php the_field('recent_news_title', 'option') ?></h2>
            </div>
         </div>
      </div>
      <div class="row">
         <?php
         $loop = new WP_Query([
            'post_type'      => 'post',
            'posts_per_page' => 3,
            'order'          => 'DESC',
         ]);
         while ($loop->have_posts()) : $loop->the_post();
         ?>
            <div class="col-xl-4 col-lg-4 col-md-6">
               <div class="single-recent-cap mb-30">
                  <div class="recent-img">
                     <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                  </div>
                  <div class="recent-cap">
                     <span><?php the_category(', '); ?></span>
                     <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                     <p><?php the_time('F j, Y'); ?></p>
                  </div>
               </div>
            </div>
         <?php
         endwhile;
         wp_reset_postdata();
         ?>
      </div>
   </div>
</div>
<!-- Recent Area End-->