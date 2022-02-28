<?php get_header();
global $post;
?>

<!-- Breadcrumb Area -->
<?php get_template_part('parts/content', 'breadcrumb'); ?>
<!-- Breadcrumb Area-->

<!--================Blog Area =================-->
<section class="blog_area single-post-area section-padding">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 posts-list">
            <div class="single-post">
               <div class="feature-img">
                  <img class="img-fluid" src="<?php the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php the_title(); ?>">
               </div>
               <div class="blog_details">
                  <?php the_content(); ?>
               </div>
            </div>
            <div class="navigation-top">
               <div class="d-sm-flex justify-content-between text-center">
                  <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span><?php echo esc_html__('Lily and 4 people like this', 'buson') ?></p>
                  <div class="col-sm-4 text-center my-2 my-sm-0">
                     <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                  </div>
                  <ul class="social-icons">
                     <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                     <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                     <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                     <li><a href="#"><i class="fab fa-behance"></i></a></li>
                  </ul>
               </div>
               <div class="navigation-area">
                  <div class="row">
                     <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                        <?php $prevPost = get_previous_post(true);
                        if ($prevPost) : ?>
                           <div class="thumb">
                              <?php $thumb = get_the_post_thumbnail($prevPost->ID, array(100, 100)); ?>
                              <?php previous_post_link('%link', "$thumb ", TRUE); ?>
                              </a>
                           </div>
                           <div class="detials">
                              <p><?php esc_html_e('Prev Post', 'buson'); ?></p>
                              <?php previous_post_link('%link', "<h4>%title</h4>", TRUE); ?>
                           </div>
                        <?php endif; ?>
                     </div>
                     <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                        <?php $nextPost = get_next_post(true);
                        if ($nextPost) : ?>
                           <div class="detials">
                              <p><?php esc_html_e('Next Post', 'buson'); ?></p>
                              <?php next_post_link('%link', "<h4>%title</h4>", TRUE); ?>
                           </div>
                           <div class="thumb">
                              <?php $thumb = get_the_post_thumbnail($nextPost->ID, array(100, 100)); ?>
                              <?php next_post_link('%link', "$thumb ", TRUE); ?>
                              </a>
                           </div>
                        <?php endif; ?>
                     </div>
                  </div>
               </div>
            </div>
            <div class="blog-author">
               <?php
               $author_id = $post->post_author;
               $author_name = get_the_author_meta('display_name', $author_id);
               $author_description = get_the_author_meta('description', $author_id);
               $author_url = get_author_posts_url($author_id);
               $author_image = get_avatar_url($author_id);
               ?>
               <div class="media align-items-center">
                  <img src="<?php echo $author_image; ?>" alt="<?php echo $author_name; ?>">
                  <div class="media-body">
                     <a href="<?php echo $author_url; ?>">
                        <h4><?php echo $author_name; ?></h4>
                     </a>
                     <p><?php echo $author_description; ?></p>
                  </div>
               </div>
            </div>
            <div class="comments-area">
               <?php $comments_count = get_comments_number(); ?>
               <h4>
                  <?php echo $comments_count;
                  if ($comments_count > 1) : esc_html_e(' Comments', 'buson');
                  else : esc_html_e(' Comment', 'buson');
                  endif; ?>
               </h4>
               <?php
               if ((is_single() || is_page()) && (comments_open() || get_comments_number()) && !post_password_required()) {
                  comments_template();
               }
               ?>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="blog_right_sidebar">
               <?php
               if (is_active_sidebar('main_sidebar')) :
                  dynamic_sidebar('main_sidebar');
               endif;
               ?>
            </div>
         </div>
      </div>
   </div>
</section>
<!--================ Blog Area end =================-->

<?php get_footer(); ?>