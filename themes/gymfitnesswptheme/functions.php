<?php

// Link queries
require get_template_directory() . '/inc/queries.php';

// Creates the menus
function gymfitness_menus() {

    $args = array(
        'main-menu' => 'Main Menu'
    );

    register_nav_menus($args);
}

add_action('init', 'gymfitness_menus');

// Enqueue Scripts and Styles

function gymfitness_scripts() {

    // Normalize CSS
    wp_enqueue_style('normalizecss', get_template_directory_uri() . '/css/normalize.css', array(), 'v8.0.1');

    // Google Font
    wp_enqueue_style('googlefont', 'https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:wght@400;700;900&family=Staatliches&display=swap', array(), '1.0.0');

    // Responsive Nav CSS
    wp_enqueue_style('responsivenavcss', get_template_directory_uri() . '/css/responsive-nav.css', array(), '1.0.0');

    // Lightbox CSS
    wp_enqueue_style('lightboxcss', get_template_directory_uri() . '/css/lightbox.min.css', array(), '2.11.3');

    if(is_front_page()):
        wp_enqueue_style('bxslidercss', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css', array(), '4.2.12');
    endif;

    // Theme Style
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalizecss', 'googlefont', 'responsivenavcss', 'lightboxcss'), '1.0.0', 'all');

    wp_enqueue_script('jquery');

    // Responsive Nav
    wp_enqueue_script('responsivenavjs', get_template_directory_uri() . '/js/responsive-nav.min.js', array(), '1.0.0', true);

    // Responsive Nav
    wp_enqueue_script('lightboxjs', get_template_directory_uri() . '/js/lightbox.min.js', array('jquery'), '2.11.3', true);

    if(is_front_page()):
        wp_enqueue_script('bxsliderjs', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js', array('jquery'), '4.2.12', true);
    endif;

    // Theme Script
    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('responsivenavjs', 'lightboxjs'), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'gymfitness_scripts');

// Enable Images

function gymfitness_setup() {

    // Add feature image

    add_image_size('square', 350, 350, true);
    add_image_size('portrait', 350, 724, true);
    add_image_size('box', 400, 375, true);
    add_image_size('mediumSize', 700, 400, true);
    add_image_size('blog', 966, 644, true);

    add_theme_support('post-thumbnails');

    //Seo title
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'gymfitness_setup');

//Enable Widget Zone
function gymfitness_widgets() {
    $args = array(
        'name' => 'Sidebar',
        'id' => 'sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-primary">',
        'after_title' => '</h3>'

    );
    register_sidebar($args);
}

add_action('widgets_init', 'gymfitness_widgets');


// Displays the hero image on the background of the front-page

function gymfitness_hero_image() {
    $front_page_id = get_option('page_on_front');
    $image_id = get_field('hero_image', $front_page_id);
    $image = $image_id['url'];
    

    // Register false stylesheet
    wp_register_style('custom', false);
    wp_enqueue_style('custom');

    $featured_image = "
        body.home .site-header {
            background-image: linear-gradient(rgba(0,0,0, 0.75), rgba(0,0,0, 0.75)), url($image);
            
        }
    ";

    wp_add_inline_style('custom', $featured_image);
}

add_action('init', 'gymfitness_hero_image');
