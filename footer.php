</main>
<footer>
    <!-- Footer Start-->
    <?php
    $footer_logo = get_field('footer_logo', 'option');
    $footer_description = get_field('footer_description', 'option');
    $footer_socials = get_field('footer_socials', 'option');
    $address_title = get_field('footer_address', 'option')['address_title'];
    $address_infos = get_field('footer_address', 'option')['address_infos'];
    $copyright_text = get_field('copyright_text', 'option');
    ?>
    <div class="footer-area footer-padding">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <div class="single-footer-caption mb-30">
                            <!-- logo -->
                            <div class="footer-logo">
                                <a href="<?php echo site_url(); ?>">
                                    <?php if (!empty($footer_logo)) : ?>
                                        <img src="<?php echo $footer_logo['url'] ?>" alt="<?php echo $footer_logo['title'] ?>">
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/logo2_footer.png" alt="">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <?php echo $footer_description; ?>
                                </div>
                            </div>
                            <!-- social -->
                            <?php if (!empty($footer_socials)) : ?>
                                <div class="footer-social">
                                    <?php foreach ($footer_socials as $footer_social) : ?>
                                        <a href="<?php echo $footer_social['footer_social_url'] ?>"><i class="<?php echo $footer_social['footer_social_icon'] ?>"></i></a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <?php if (is_active_sidebar('footer_1_w')) :; ?>
                            <?php dynamic_sidebar('footer_1_w'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-7">
                    <div class="single-footer-caption mb-50">
                        <?php if (is_active_sidebar('footer_2_w')) :; ?>
                            <?php dynamic_sidebar('footer_2_w'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4><?php echo $address_title ?></h4>
                            <?php if (!empty($address_infos)) : ?>
                                <ul>
                                    <?php foreach ($address_infos as $info) : ?>
                                        <li><a href="<?php echo $info['info_url'] ?>"><?php echo $info['info_title'] ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom aera -->
    <div class="footer-bottom-area footer-bg">
        <div class="container">
            <div class="footer-border">
                <div class="row d-flex align-items-center">
                    <div class="col-xl-12 ">
                        <div class="footer-copy-right text-center">
                            <?php echo $copyright_text; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>

<!-- JS here -->


<?php wp_footer(); ?>
</body>

</html>