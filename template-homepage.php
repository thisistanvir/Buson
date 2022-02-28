<?php

/**
 * Template Name: Home Template
 */
get_header();?>

<!-- slider Area Start-->
<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="slider-active">
        <?php
$args = array(
    'post_type'      => 'slider',
    'posts_per_page' => -1,
    'order'          => 'DESC',
);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ): $loop->the_post();
    ?>
					            <div class="single-slider slider-height d-flex align-items-center" style="background-image:url('<?php the_post_thumbnail_url();?>')">
					                <div class="container">
					                    <div class="row">
					                        <div class="col-xl-10 mx-auto">
					                            <div class="hero__caption">
					                                <?php if ( !empty( get_field( 'subtitle' ) ) ): ?>
					                                    <p><?php the_field( 'subtitle' );?></p>
					                                <?php endif;?>
                                <h1><?php the_title();?></h1>
                                <!-- Hero-btn -->
                                <?php if ( !empty( get_field( 'button_text' ) ) ): ?>
                                    <div class="hero__btn">
                                        <a href="<?php the_field( 'button_url' );?>" class="btn hero-btn"><?php the_field( 'button_text' );?></a>
                                    </div>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
endwhile;
wp_reset_postdata();
?>
    </div>
</div>
<!-- slider Area End-->

<!-- We Trusted Start-->
<?php get_template_part( 'parts/content', 'about' );?>
<!-- We Trusted End-->

<!-- services Area Start-->
<!-- services Area Start-->
<div class="services-area section-padding2">
   <div class="container">
      <!-- section tittle -->
      <div class="row">
         <div class="col-lg-12">
            <div class="section-tittle text-center">
               <h2><?php the_field( 'services_title', 'option' );?></h2>
            </div>
         </div>
      </div>
      <?php get_template_part( 'parts/content', 'services' );?>
   </div>
</div>
<!-- services Area End-->

<!-- Request Back Start -->
<?php
$cta_title = get_field( 'cta_title', 'option' );
$cta_description = get_field( 'cta_description', 'option' );
$cta_button_text = get_field( 'cta_button_text', 'option' );
$cta_button_url = get_field( 'cta_button_url', 'option' );
?>
<div class="request-back-area section-padding30">
    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-xl-8 mx-auto text-center">
                <div class="request-content">
                    <h3><?php echo $cta_title ?></h3>
                    <?php echo $cta_description; ?>
                    <?php if ( !empty( $cta_button_text ) ): ?>
                    <a href="<?php echo $cta_button_url ?>" class="btn trusted-btn"><?php echo $cta_button_text ?></a>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Request Back End -->

<!-- Completed Cases Start -->
<?php
$cases_title = get_field( 'cases_title', 'option' );
$cases_description = get_field( 'cases_description', 'option' );
$cases_button_text = get_field( 'cases_button_text', 'option' );
$cases_button_url = get_field( 'cases_button_url', 'option' );
?>
<div class="completed-cases section-padding3">
    <div class="container">
        <div class="row">
            <!-- slider Heading -->
            <div class="col-xl-4 col-lg-4 col-md-8">
                <div class="single-cases-info mb-30">
                    <h3><?php echo $cases_title; ?></h3>
                    <?php echo $cases_description; ?>
                    <?php if ( !empty( $cases_button_text ) ): ?>
                    <a href="<?php echo $cases_button_url; ?>" class="border-btn border-btn2"><?php echo $cases_button_text; ?></a>
                    <?php endif;?>
                </div>
            </div>
            <!-- OwL -->
            <div class="col-xl-8 col-lg-8 col-md-col-md-7">
                <div class=" completed-active owl-carousel">
                    <?php
$loop = new WP_Query( [
    'post_type'     => 'cases',
    'post_per_page' => -1,
    'order'         => 'DESC',
] );
while ( $loop->have_posts() ): $loop->the_post();
    ?>
					                        <div class="single-cases-img">
					                            <img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title();?>">
					                            <!-- img hover caption -->
					                            <div class="single-cases-cap">
					                                <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
					                                <?php the_excerpt();?>
					                                <span><?php the_field( 'case_category' );?></span>
					                            </div>
					                        </div>
					                    <?php endwhile;
wp_reset_postdata();?>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Completed Cases end -->

<!-- Team-profile Start -->
<div class="team-profile team-padding">
    <div class="container">
        <!-- section tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center">
                    <h2><?php the_field( 'teams_title', 'option' )?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
$loop = new WP_Query( [
    'post_type'     => 'teams',
    'post_per_page' => 4,
    'order'         => 'DESC',
] );
while ( $loop->have_posts() ): $loop->the_post();
    ?>
					                <div class="col-xl-3 col-lg-3 col-md-4">
					                    <div class="single-profile mb-30">
					                        <!-- Front -->
					                        <div class="single-profile-front">
					                            <div class="profile-img">
					                                <img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title();?>">
					                            </div>
					                            <div class="profile-caption">
					                                <h4><?php the_title();?> <span><?php the_field( 'designation' );?></span></h4>
					                            </div>
					                        </div>
					                    </div>
					                </div>
					            <?php endwhile;
wp_reset_postdata();?>
        </div>
    </div>
</div>
<!-- Team-profile End-->

<!-- Testimonial Start -->
<?php get_template_part( 'parts/content', 'testimonial' );?>
<!-- Testimonial End -->

<!-- Recent Area Start -->
<?php get_template_part( 'parts/content', 'blog' );?>
<!-- Recent Area End-->


<?php get_footer();?>