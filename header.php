<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<?php wp_head(); ?>

<body <?php body_class(); ?>>

    <!-- Preloader Start -->
    <?php
    $preloader_image = get_field('preloader_image', 'option');
    ?>
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <?php if (!empty($preloader_image)) : ?>
                        <img src="<?php echo $preloader_image['url'] ?>" alt="<?php echo $preloader_image['title'] ?>">
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/logo.png" alt="">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->

    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header ">
                <div class="header-top top-bg d-none d-lg-block">
                    <div class="container">
                        <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left">
                                    <ul>
                                        <?php if (!empty(get_field('header_address', 'option'))) : ?>
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i><?php the_field('header_address', 'option'); ?>
                                            </li>
                                        <?php endif;
                                        if (!empty(get_field('header_email', 'option'))) : ?>
                                            <li><i class="fas fa-envelope"></i><?php the_field('header_email', 'option'); ?></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="header-info-right">
                                    <ul class="header-social">
                                        <?php
                                        $socials = get_field('header_socials', 'option');
                                        foreach ($socials as $social) :
                                        ?>
                                            <li><a href="<?php echo $social['social_link'] ?>"><i class="<?php echo $social['social_icon']['value']; ?>"></i></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom  header-sticky">
                    <div class="container">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-1 col-md-1">
                                <div class="logo">
                                    <a href="<?php echo esc_url(site_url()); ?>">
                                        <?php
                                        if (has_custom_logo()) :
                                            the_custom_logo();
                                        else : ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/logo.png" alt="<?php bloginfo('name'); ?>">
                                        <?php endif; ?>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10 col-md-10">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <?php
                                        wp_nav_menu(array(
                                            'theme_location' => 'main-menu',
                                            'menu_class'     => 'menu-class',
                                            'menu_id'        => 'navigation',
                                        ));
                                        ?>
                                    </nav>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>

    <main>