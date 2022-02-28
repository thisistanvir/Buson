<?php

/**
 * Template Name: Contact Template
 */
get_header();

$map_latitude = get_field('map_latitude', 'option');
$map_longitude = get_field('map_longitude', 'option');
$info_title = get_field('info_title', 'option');
$contact_infos = get_field('contact_info', 'option');
?>

<!-- Breadcrumb Area -->
<?php get_template_part('parts/content', 'breadcrumb'); ?>
<!-- Breadcrumb Area-->

<!-- ================ contact section start ================= -->
<section class="contact-section">
    <div class="container">
        <div class="d-none d-sm-block mb-5 pb-4">
            <div id="map" style="height: 480px; position: relative; overflow: hidden;">
                <iframe width="100%" height="100%" src="https://maps.google.com/maps?q=<?php echo esc_attr($map_latitude); ?>,<?php echo esc_attr($map_longitude); ?>&hl=es;z=14&amp;output=embed"></iframe>
            </div>

        </div>


        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Get in Touch</h2>
            </div>
            <div class="col-lg-8">
                <div class="form-contact contact_form">
                    <?php echo do_shortcode('[contact-form-7 id="111" title="Buson Contact"]') ?>
                </div>
            </div>
            <div class="col-lg-3 offset-lg-1">
                <?php if (!empty($contact_infos)) :
                    foreach ($contact_infos as $info) :
                ?>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="<?php echo esc_attr($info['info_icon']); ?>"></i></span>
                            <div class="media-body">
                                <h3><?php echo esc_html__($info['info_title']); ?></h3>
                                <p><?php echo esc_html__($info['info_description']); ?></p>
                            </div>
                        </div>
                <?php endforeach;
                endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->

<!-- Request Back Start -->
<?php
$cta_title = get_field('cta_title', 'option');
$cta_description = get_field('cta_description', 'option');
?>
<div class="request-back-area section-padding30">
    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-xl-4 col-lg-5 col-md-5">
                <div class="request-content">
                    <h3><?php echo $cta_title ?></h3>
                    <?php echo $cta_description; ?>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-7">
                <!-- Contact form Start -->
                <div class="form-wrapper">
                    <div id="contact-form">
                        <?php echo do_shortcode('[contact-form-7 id="112" title="Request for Call"]') ?>
                    </div>
                </div>
            </div> <!-- Contact form End -->
        </div>
    </div>
</div>
<!-- Request Back End -->

<?php get_footer(); ?>