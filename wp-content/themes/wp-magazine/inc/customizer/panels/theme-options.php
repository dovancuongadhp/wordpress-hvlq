<?php
/**
 * Homepage Settings
 *
 * @package WP Magazine
 */

add_action( 'customize_register', 'wp_magazine_customize_register_theme_options_panel' );

function wp_magazine_customize_register_theme_options_panel( $wp_customize ) {
	$wp_customize->add_panel( 'wp_magazine_theme_options_panel', array(
	    'title'       => esc_html__( 'Theme Options', 'wp-magazine' ),
	    'priority' => 5
	) );
}