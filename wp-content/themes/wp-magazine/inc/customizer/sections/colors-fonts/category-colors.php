<?php

/**
 * Category Colors Settings
 *
 * @package WP Magazine
 */

add_action( 'customize_register', 'wp_magazine_customize_register_category_colors' );
function wp_magazine_customize_register_category_colors( $wp_customize ) {

    $wp_customize->add_section( 'wp_magazine_category_colors_section', array(
        'title'          => esc_html__( 'Category Colors', 'wp-magazine' ),
        'panel'          => 'wp_magazine_colors_fonts_panel',
    ) );
}

add_action( 'customize_register', 'wp_magazine_category_colors' );
function wp_magazine_category_colors( $wp_customize ) {

    $categories = get_categories( array(
        'hide_empty' => false
    ) );

    foreach( $categories as $category ) {

        $wp_customize->add_setting( $category->slug . '_color', array(
            'sanitize_callback' => 'wp_magazine_sanitize_hex_color',
            'default'     => '#333',
        ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $category->slug . '_color', array(
            'section'   => 'wp_magazine_category_colors_section',
            'label' => $category->name . " " . esc_html__( "Color :", 'wp-magazine' ),
        ) ) );
    }

}