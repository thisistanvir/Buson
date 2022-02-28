<?php
/**
 * Template Name: Cases Template
 */
get_header();
?>

<!-- Breadcrumb Area -->
<?php get_template_part( 'parts/content', 'breadcrumb' );?>
<!-- Breadcrumb Area-->

        <!-- Completed Cases Start -->
        <div class="completed-cases section-padding3">
            <div class="container">
                <div class="row">
                <?php
$loop = new WP_Query( [
    'post_type'     => 'cases',
    'post_per_page' => -1,
    'order'         => 'DESC',
] );
while ( $loop->have_posts() ): $loop->the_post();
    ?>
		                    <div class="col-xl-4 col-lg-4 col-md-6">
		                        <div class="single-cases-img  size mb-30">
	                            <img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title();?>">
		                            <!-- img hover caption -->
		                           <div class="single-cases-cap single-cases-cap2">
	                               <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
	                               <?php the_excerpt();?>
		                           </div>
		                        </div>
		                    </div>
		                    <?php endwhile;
wp_reset_postdata();?>
                </div>
            </div>
        </div>
        <!-- Completed Cases end -->

    <?php get_footer()?>