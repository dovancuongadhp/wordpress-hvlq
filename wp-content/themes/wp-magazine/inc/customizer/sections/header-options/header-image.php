<?php
/**
 * Header Image Settings
 *
 * @package WP Magazine
 */


add_action( 'customize_register', 'wp_magazine_change_header_image_panel' );

function wp_magazine_change_header_image_panel( $wp_customize)  {
    $wp_customize->get_section( 'header_image' )->priority = 2;
    $wp_customize->get_section( 'header_image' )->panel = 'wp_magazine_header_panel';

}

add_action( 'customize_register', 'wp_magazine_customize_header_background_color' );
function wp_magazine_customize_header_background_color( $wp_customize ) {

    $wp_customize->add_setting( 'header_background_color', array(
        'default'     => '#03002d',
        'sanitize_callback' => 'wp_magazine_sanitize_hex_color'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
        'label'      => esc_html__( 'Header Background Color', 'wp-magazine' ),
        'section'    => 'header_image',
        'settings'   => 'header_background_color',
    ) ) );

    $wp_customize->add_setting( 'header_background_color_opacity', array(
        'default'           => 0.8,
        'sanitize_callback' => 'wp_magazine_sanitize_number_range'
    ) );

    $wp_customize->add_control( new Wp_Magazine_Slider_Control( $wp_customize, 'header_background_color_opacity', array(
        'section' => 'header_image',
        'settings' => 'header_background_color_opacity',
        'label'   => esc_html__( 'Background Color Opacity', 'wp-magazine' ),
        'choices'     => array(
            'min'   => 0,
            'max'   => 1,
            'step'  => 0.1,
        )
    ) ) );

}