<?php

/**
 * Menu Fonts Settings
 *
 * @package WP Magazine
 */

add_action( 'customize_register', 'wp_magazine_customize_register_menu_fonts' );
function wp_magazine_customize_register_menu_fonts( $wp_customize ) {

    $wp_customize->add_section( 'wp_magazine_menu_fonts_section', array(
        'title'          => esc_html__( 'Menu Fonts', 'wp-magazine' ),
        'panel'          => 'wp_magazine_colors_fonts_panel',
    ) );
}


add_action( 'customize_register', 'wp_magazine_customize_menu_fonts_colors' );
function wp_magazine_customize_menu_fonts_colors( $wp_customize ) {


    $wp_customize->add_setting( 'top_bar_background_color', array(
        'transport'   => 'postMessage',
        'default'     => '#353844',
        'sanitize_callback' => 'wp_magazine_sanitize_hex_color'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_background_color', array(
        'label'      => esc_html__( 'Top Bar Background Color', 'wp-magazine' ),
        'section'    => 'wp_magazine_menu_fonts_section',
        'settings'   => 'top_bar_background_color',
    ) ) );

    $wp_customize->add_setting( 'menu_font_color', array(
        'default'     => '#fff',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'wp_magazine_sanitize_hex_color'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_font_color', array(
        'label'      => esc_html__( 'Menu Color', 'wp-magazine' ),
        'section'    => 'wp_magazine_menu_fonts_section',
        'settings'   => 'menu_font_color',
    ) ) );

    $wp_customize->add_setting( 'menu_background_color', array(
        'default'     => '#3c25ea',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'wp_magazine_sanitize_hex_color'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_background_color', array(
        'label'      => esc_html__( 'Menu Background Color', 'wp-magazine' ),
        'section'    => 'wp_magazine_menu_fonts_section',
        'settings'   => 'menu_background_color',
    ) ) );

    $wp_customize->add_setting( 'menu_font_family', array(
        'default'     => 'Source Sans Pro',
        'sanitize_callback' => 'wp_magazine_sanitize_google_fonts',
    ) );

    $wp_customize->add_control( 'menu_font_family', array(
        'settings'    => 'menu_font_family',
        'label'       =>  esc_html__( 'Menu Font Family', 'wp-magazine' ),
        'section'     => 'wp_magazine_menu_fonts_section',
        'type'        => 'select',
        'choices'     => wp_magazine_google_fonts(),
    ) );

    $wp_customize->add_setting( 'menu_font_size', array(
      'default'     => '15px',
      'sanitize_callback' => 'wp_magazine_sanitize_select',
    ) );
    
    $wp_customize->add_control( 'menu_font_size', array(
        'settings'    => 'menu_font_size',
        'label'       =>  esc_html__( 'Menu Font Size', 'wp-magazine' ),
        'section'     => 'wp_magazine_menu_fonts_section',
        'type'        => 'select',
        'choices'     =>  wp_magazine_define_font_sizes()
      ) );

    $wp_customize->add_setting( 'menu_font_weight', array(
        'default'           => 500,
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( new Wp_Magazine_Slider_Control( $wp_customize, 'menu_font_weight', array(
        'section' => 'wp_magazine_menu_fonts_section',
        'settings' => 'menu_font_weight',
        'label'   => esc_html__( 'Menu Font Weight', 'wp-magazine' ),
        'choices'     => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
    ) ) );

    $wp_customize->add_setting( 'menu_font_text_transform', array(
        'transport'   => 'postMessage',       
        'sanitize_callback' => 'wp_magazine_sanitize_choices',
        'default'     => 'none',
    ) );

    $wp_customize->add_control( new Wp_Magazine_Radio_Buttonset_Control( $wp_customize, 'menu_font_text_transform', array(
        'label' => esc_html__( 'Text Transform :', 'wp-magazine' ),
        'section' => 'wp_magazine_menu_fonts_section',
        'settings' => 'menu_font_text_transform',
        'type'=> 'radio-buttonset',
        'choices'     => array(
            'none' => esc_html__( 'Default', 'wp-magazine' ),
            'capitalize'    =>  esc_html__( 'First character Capital', 'wp-magazine' ),
            'uppercase' => esc_html__( 'All Captial', 'wp-magazine' ),
            'lowercase' => esc_html__( 'All Lower', 'wp-magazine' ),
        ),
    ) ) );

}