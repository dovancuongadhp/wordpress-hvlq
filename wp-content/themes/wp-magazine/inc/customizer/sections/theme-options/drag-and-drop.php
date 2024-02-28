<?php
/**
 * Drag & Drop Sections
 *
 * @package WP Magazine
 */
add_action( 'customize_register', 'wp_magazine_drag_and_drop_sections' );

function wp_magazine_drag_and_drop_sections( $wp_customize ) {

	$wp_customize->add_section( 'wp_magazine_sort_homepage_sections', array(
	    'title'          => esc_html__( 'Drag & Drop', 'wp-magazine' ),
	    'description'    => esc_html__( 'Drag & Drop', 'wp-magazine' ),
	    'panel'          => 'wp_magazine_theme_options_panel',
	) );

	
	$default = array( 'featured-news', 'category-news', 'pages', 'cta', 'blog-posts', 'news-carousel' );

	$choices = array(
		'featured-news' => esc_html__( 'Featured News', 'wp-magazine' ),
		'category-news' => esc_html__( 'Category News', 'wp-magazine' ),
		'pages' => esc_html__( 'Pages', 'wp-magazine' ),
		'cta' => esc_html__( 'Call to Action', 'wp-magazine' ),
		'blog-posts' => esc_html__( 'Blog Posts', 'wp-magazine' ),
		'news-carousel' => esc_html__( 'News Slider', 'wp-magazine' ),
	);
	

	$wp_customize->add_setting( 'wp_magazine_sort_homepage', array(
        'capability'  => 'edit_theme_options',
        'sanitize_callback'	=> 'wp_magazine_sanitize_array',
        'default'     => $default
    ) );

    $wp_customize->add_control( new Wp_Magazine_Control_Sortable( $wp_customize, 'wp_magazine_sort_homepage', array(
        'label' => esc_html__( 'Drag and Drop Sections to rearrange.', 'wp-magazine' ),
        'section' => 'wp_magazine_sort_homepage_sections',
        'settings' => 'wp_magazine_sort_homepage',
        'type'=> 'wp-magazine-sortable',
        'choices'     => $choices
    ) ) );

}