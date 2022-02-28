<?php

if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

if (!function_exists('buson_setup')) :
    function buson_setup() {
        // Load textdomain
        load_theme_textdomain('buson', get_template_directory_uri() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        // Theme Title
        add_theme_support('title-tag');

        // Theme thumbnail
        add_theme_support('post-thumbnails');

        // start: Theme Menu
        register_nav_menus(array(
            'main-menu' => esc_html__('Primary Menu', 'buson'),
        )); // end: theme menu

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        );

        // start: Custom Logo
        add_theme_support(
            'custom-logo',
            [
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
            ]
        ); // end: custom logo
    }
endif;
add_action('after_setup_theme', 'buson_setup');

// start: Buson Assets
function buson_assets() {
    // Call Css File
    wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.1.3', 'all');
    wp_enqueue_style('owl_carousel', get_stylesheet_directory_uri() . '/assets/css/owl.carousel.min.css', array(), '2.2.1', 'all');
    wp_enqueue_style('slicknav', get_stylesheet_directory_uri() . '/assets/css/slicknav.css', array(), '1.0.10', 'all');
    wp_enqueue_style('fontawesome', get_stylesheet_directory_uri() . '/assets/css/fontawesome-all.min.css', array(), '5.0.6', 'all');
    wp_enqueue_style('slick', get_stylesheet_directory_uri() . '/assets/css/slick.css', array(), '1.0.1', 'all');
    wp_enqueue_style('custom', get_stylesheet_directory_uri() . '/assets/css/custom.css', array(), _S_VERSION, 'all');

    // Style Css
    wp_enqueue_style('buson_style', get_stylesheet_uri());

    // Call Js File
    wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.6.1', true);
    wp_enqueue_script('slicknav', get_template_directory_uri() . '/assets/js/jquery.slicknav.min.js', array('jquery'), '1.0.10', true);
    wp_enqueue_script('owl_carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '2.2.1', true);
    wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.0.1', true);
    wp_enqueue_script('sticky', get_template_directory_uri() . '/assets/js/jquery.sticky.js', array('jquery'), '1.0.4', true);
    wp_enqueue_script('buson_main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'buson_assets'); // end: Buson Assets

/**
 * Register Custom Post Type
 */
function buson_custom_post() {
    // Register Custom Post for Slider
    register_post_type(
        'slider',
        array(
            'labels'    => array(
                'name'          => __('Sliders', 'buson'),
                'singular_name' => __('Slide', 'buson'),
            ),
            'supports'  => array('title', 'thumbnail'),
            'public'    => false,
            'show_ui'   => true,
            'menu_icon' => 'dashicons-slides',
        )
    );
    // Register Custom Post for services
    register_post_type(
        'services',
        array(
            'labels'    => array(
                'name'          => __('Services', 'buson'),
                'singular_name' => __('Service', 'buson'),
            ),
            'supports'  => array('title', 'editor', 'thumbnail'),
            'public'    => false,
            'show_ui'   => true,
            'menu_icon' => 'dashicons-align-wide',
        )
    );
    // Register Custom Post for cases
    register_post_type(
        'cases',
        array(
            'labels'       => array(
                'name'          => __('Cases', 'buson'),
                'singular_name' => __('Case', 'buson'),
            ),
            'supports'     => array('title', 'editor', 'excerpt', 'thumbnail'),
            'public'       => true,
            'show_ui'      => true,
            'show_in_rest' => true,
            'menu_icon'    => 'dashicons-images-alt2',
        )
    );
    // Register Custom Post for team
    register_post_type(
        'teams',
        array(
            'labels'    => array(
                'name'          => __('Teams', 'buson'),
                'singular_name' => __('Team', 'buson'),
            ),
            'supports'  => array('title', 'thumbnail'),
            'public'    => false,
            'show_ui'   => true,
            'menu_icon' => 'dashicons-groups',
        )
    );
    // Register Custom Post for testimonial
    register_post_type(
        'testimonials',
        array(
            'labels'    => array(
                'name'          => __('Testimonials', 'buson'),
                'singular_name' => __('Testimonial', 'buson'),
            ),
            'supports'  => array('title', 'editor', 'thumbnail'),
            'public'    => false,
            'show_ui'   => true,
            'menu_icon' => 'dashicons-testimonial',
        )
    );
}
add_action('init', 'buson_custom_post');
// end: buson custom post

// start: Buson Widget Register
function buson_widgets() {
    register_sidebar(
        array(
            'name'          => esc_html__('Main Sidebar', 'buson'),
            'id'            => 'main_sidebar',
            'description'   => esc_html__('Add Main Sidebar Widgets Here.', 'buson'),
            'before_widget' => '<aside id="%1$s" class="single_sidebar_widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget_title">',
            'after_title'   => '</h4>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__('Footer Widget One', 'buson'),
            'id'            => 'footer_1_w',
            'description'   => esc_html__('Add Footer One Widgets Here.', 'buson'),
            'before_widget' => '<div id="%1$s" class="footer-tittle %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__('Footer Widget Two', 'buson'),
            'id'            => 'footer_2_w',
            'description'   => esc_html__('Add Footer Two Widgets Here.', 'buson'),
            'before_widget' => '<div id="%1$s" class="footer-tittle %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        )
    );
}
add_action('widgets_init', 'buson_widgets');
// end: Buson Widget Register

// start: theme options
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => __('Theme Options', 'buson'),
        'menu_title' => __('Theme Options', 'buson'),
        'menu_slug'  => 'theme-options',
        'capability' => 'edit_posts',
        'redirect'   => false,
    ));

    acf_add_options_sub_page(array(
        'page_title'  => __('Theme Header Settings', 'buson'),
        'menu_title'  => __('Header', 'buson'),
        'parent_slug' => 'theme-options',
    ));
    acf_add_options_sub_page(array(
        'page_title'  => __('Theme Preloader Settings', 'buson'),
        'menu_title'  => __('Preloader', 'buson'),
        'parent_slug' => 'theme-options',
    ));

    acf_add_options_sub_page(array(
        'page_title'  => __('Theme About Settings', 'buson'),
        'menu_title'  => __('About', 'buson'),
        'parent_slug' => 'theme-options',
    ));

    acf_add_options_sub_page(array(
        'page_title'  => __('Theme Services Settings', 'buson'),
        'menu_title'  => __('Services Title', 'buson'),
        'parent_slug' => 'theme-options',
    ));

    acf_add_options_sub_page(array(
        'page_title'  => __('Theme CTA Settings', 'buson'),
        'menu_title'  => __('Call to Action', 'buson'),
        'parent_slug' => 'theme-options',
    ));

    acf_add_options_sub_page(array(
        'page_title'  => __('Theme Cases Settings', 'buson'),
        'menu_title'  => __('Home Cases', 'buson'),
        'parent_slug' => 'theme-options',
    ));

    acf_add_options_sub_page(array(
        'page_title'  => __('Theme Teams Settings', 'buson'),
        'menu_title'  => __('Teams Title', 'buson'),
        'parent_slug' => 'theme-options',
    ));

    acf_add_options_sub_page(array(
        'page_title'  => __('Theme Recent News Settings', 'buson'),
        'menu_title'  => __('Recent News Title', 'buson'),
        'parent_slug' => 'theme-options',
    ));
    acf_add_options_sub_page(array(
        'page_title'  => __('Contact Page Settings', 'buson'),
        'menu_title'  => __('Contact Page', 'buson'),
        'parent_slug' => 'theme-options',
    ));

    acf_add_options_sub_page(array(
        'page_title'  => __('Theme Footer Settings', 'buson'),
        'menu_title'  => __('Footer', 'buson'),
        'parent_slug' => 'theme-options',
    ));
} // end: theme option

/**
 * Better Comments
 */
require_once get_template_directory() . '/parts/better-comments.php';

/**
 * Custom Widgets
 */
require_once get_template_directory() . '/inc/widgets/widgets.php';
