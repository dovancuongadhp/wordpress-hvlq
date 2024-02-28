<?php
/**
 * Header Settings
 *
 * @package WP Magazine
 */

add_action( 'customize_register', 'wp_magazine_customize_register_header_panel' );

function wp_magazine_customize_register_header_panel( $wp_customize ) {
	$wp_customize->add_panel( 'wp_magazine_header_panel', array(
	    'priority'    => 3,
	    'title'       => esc_html__( 'Header and Site Identity', 'wp-magazine' ),
	) );
}