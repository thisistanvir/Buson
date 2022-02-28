<!-- services Area Start-->
<div class="row">
	<?php
	$args = array(
		'post_type'      => 'services',
		'posts_per_page' => 6,
		'order'          => 'DESC',
	);
	$service = new WP_Query($args);
	while ($service->have_posts()) : $service->the_post();
	?>
		<div class="col-xl-4 col-lg-4 col-md-6">
			<div class="single-services text-center">
				<div class="services-icon">
					<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
				</div>
				<div class="services-caption">
					<h4><?php the_title(); ?></h4>
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	<?php
	endwhile;
	wp_reset_postdata();
	?>
</div>
<!-- services Area End-->