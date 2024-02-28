<?php
/**
 * Background Settings
 *
 * @package WP Magazine
 */


add_action( 'customize_register', 'wp_magazine_change_background_panel' );

function wp_magazine_change_background_panel( $wp_customize)  {
    $wp_customize->get_section( 'background_image' )->priority = 20;
}