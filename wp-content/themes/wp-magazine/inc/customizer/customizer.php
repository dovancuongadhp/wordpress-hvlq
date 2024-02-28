<?php

/**
 * Wp Magazine Pro Theme Customizer
 *
 * @package WP Magazine
 */
$panels = array( 'header-options', 'colors-fonts', 'theme-options' );
add_action( 'customize_register', 'wp_magazine_change_homepage_settings_options' );
function wp_magazine_change_homepage_settings_options( $wp_customize )
{
    $wp_customize->get_section( 'title_tagline' )->priority = 12;
    $wp_customize->get_section( 'static_front_page' )->priority = 13;
}

$header_sections = array(
    'header-image',
    'theme-header',
    'headline',
    'site-identity'
);
$colors_fonts = array(
    'body-fonts',
    'menu-fonts',
    'news-heading',
    'heading-tags',
    'colors-category'
);
$theme_sections = array(
    'featured',
    'category-news',
    'pages',
    'cta',
    'news-carousel',
    'drag-and-drop'
);
$ad_section = array( 'header-ad' );
require get_template_directory() . '/inc/customizer/sections/upgrade-to-pro.php';
require get_template_directory() . '/inc/customizer/sections/general.php';
require get_template_directory() . '/inc/customizer/sections/advertisement.php';
require get_template_directory() . '/inc/customizer/sections/social-media.php';
if ( !empty($panels) ) {
    foreach ( $panels as $panel ) {
        require get_template_directory() . '/inc/customizer/panels/' . $panel . '.php';
    }
}
if ( !empty($header_sections) ) {
    foreach ( $header_sections as $section ) {
        require get_template_directory() . '/inc/customizer/sections/header-options/' . $section . '.php';
    }
}
if ( !empty($colors_fonts) ) {
    foreach ( $colors_fonts as $section ) {
        require get_template_directory() . '/inc/customizer/sections/colors-fonts/' . $section . '.php';
    }
}
if ( !empty($theme_sections) ) {
    foreach ( $theme_sections as $section ) {
        require get_template_directory() . '/inc/customizer/sections/theme-options/' . $section . '.php';
    }
}
require get_template_directory() . '/inc/customizer/sections/blog-posts.php';
require get_template_directory() . '/inc/customizer/sections/background.php';
/**
 * Enqueue the customizer stylesheet.
 */
function wp_magazine_customizer_stylesheet()
{
    wp_register_style(
        'wp-magazine-customizer-css',
        get_template_directory_uri() . '/css/customizer.css',
        NULL,
        '1.1.0',
        'all'
    );
    wp_enqueue_style( 'wp-magazine-customizer-css' );
}

add_action( 'customize_controls_print_styles', 'wp_magazine_customizer_stylesheet' );
/**
 * Enqueue the customizer javascript.
 */
function wp_magazine_customize_preview_js()
{
    wp_enqueue_script(
        'wp-magazine-customizer-preview',
        get_template_directory_uri() . '/js/customizer.js',
        array( 'jquery' ),
        '1.0.0',
        true
    );
}

add_action( 'customize_preview_init', 'wp_magazine_customize_preview_js' );
/**
 * Sanitization Functions
*/
require get_template_directory() . '/inc/customizer/sanitization-functions.php';