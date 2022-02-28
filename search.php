<?php

/**
 * The template for displaying search results pages
 */

get_header();
?>

<main id="primary" class="site-main">


	<!-- Breadcrumb Area -->
	<div class="slider-area ">
		<div class="single-slider slider-height2 d-flex align-items-center" style="<?php if (has_post_thumbnail()) : ?>background-image: url('<?php the_post_thumbnail_url() ?>');<?php else : ?>background-image: url('<?php echo get_template_directory_uri() ?>/assets/img/breadcumb.jpg');<?php endif; ?>">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						<div class="hero-cap text-center">
							<h2>
								<?php
								/* translators: %s: search query. */
								printf(esc_html__('Search Results for: %s', 'buson'), '<span>' . get_search_query() . '</span>');
								?>
							</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcrumb Area-->
	<?php if (have_posts()) : ?>
		<!--================ Search Result =================-->
		<?php get_template_part('parts/content', 'search'); ?>
		<!--================Search Result =================-->
	<?php

	else :

		get_template_part('parts/content', 'none');

	endif;
	?>

</main><!-- #main -->

<?php
get_footer();
