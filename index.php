<?php get_header() ?>
<!-- slider Area Start-->
<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" style="background-image: url('<?php echo get_template_directory_uri() ?>/assets/img/breadcumb.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2><?php single_post_title(); ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->

<!--================Blog Area =================-->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    <?php
                    $loop = new WP_Query([
                        'post_type' => 'post',
                    ]);
                    while ($loop->have_posts()) : $loop->the_post();
                    ?>
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="<?php the_post_thumbnail_url(); ?>" alt="">
                                <div class="blog_item_date">
                                    <h3><?php the_time('j') ?></h3>
                                    <p><?php the_time('M') ?></p>
                                </div>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="<?php the_permalink(); ?>">
                                    <h2><?php the_title(); ?></h2>
                                </a>
                                <?php the_excerpt(); ?>
                                <ul class="blog-info-link">
                                    <li><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><i class="fa fa-user"></i> <?php the_author(); ?></a></li>
                                    <li><i class="fa fa-comments"></i>
                                        <?php $comments_count = get_comments_number(); ?>
                                        <?php echo $comments_count;
                                        if ($comments_count > 1) : esc_html_e(' Comments', 'buson');
                                        else : esc_html_e(' Comment', 'buson');
                                        endif; ?>
                                    </li>
                                </ul>
                            </div>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata(); ?>

                    <nav class="blog-pagination justify-content-center d-flex">
                        <?php the_posts_pagination(
                            [
                                'screen_reader_text' => ' ',
                                'prev_text'          => '<span class="fa fa-angle-left"></span>',
                                'next_text'          => '<span class="fa fa-angle-right"></span>',
                                'class'              => 'pagination',
                            ]
                        );
                        ?>
                    </nav>
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
<!--================Blog Area =================-->

<?php get_footer() ?>