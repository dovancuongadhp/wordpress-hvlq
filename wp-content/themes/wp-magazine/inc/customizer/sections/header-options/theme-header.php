<?php
/**
 * Header Layout Settings
 *
 * @package WP Magazine
 */

add_action( 'customize_register', 'wp_magazine_theme_header_layout_section' );

function wp_magazine_theme_header_layout_section( $wp_customize ) {

    $wp_customize->add_section( 'wp_magazine_theme_header_layout_section', array(
        'title'          => esc_html__( 'Theme Header Options', 'wp-magazine' ),
        'panel'          => 'wp_magazine_header_panel',
        'priority'       => 3,
        'capability'     => 'edit_theme_options',
    ) );


    $wp_customize->add_setting( 'wp_magazine_header_sticky_menu_option', array(
      'sanitize_callback'     =>  'wp_magazine_sanitize_checkbox',
      'default'               =>  true
    ) );

    $wp_customize->add_control( new Wp_Magazine_Toggle_Control( $wp_customize, 'wp_magazine_header_sticky_menu_option', array(
      'label' => esc_html__( 'Enable Sticky Menu?','wp-magazine' ),
      'section' => 'wp_magazine_theme_header_layout_section',
      'settings' => 'wp_magazine_header_sticky_menu_option',
      'type'=> 'toggle',
    ) ) );

    $wp_customize->add_setting( 'header_search_display_option', array(
        'sanitize_callback'     =>  'wp_magazine_sanitize_checkbox',
        'default'               =>  true
    ) );
            
    $wp_customize->add_control( new Wp_Magazine_Toggle_Control( $wp_customize, 'header_search_display_option', array(
        'label' => esc_html__( 'Hide / Show Header Search','wp-magazine' ),
        'section' => 'wp_magazine_theme_header_layout_section',
        'settings' => 'header_search_display_option',
        'type'=> 'toggle',
    ) ) );

    $wp_customize->add_setting( 'header_date_display_option', array(
        'sanitize_callback'     =>  'wp_magazine_sanitize_checkbox',
        'default'               =>  true
    ) );
            
    $wp_customize->add_control( new Wp_Magazine_Toggle_Control( $wp_customize, 'header_date_display_option', array(
        'label' => esc_html__( 'Hide / Show Date','wp-magazine' ),
        'section' => 'wp_magazine_theme_header_layout_section',
        'settings' => 'header_date_display_option',
        'type'=> 'toggle',
    ) ) );

    
    $wp_customize->add_setting( 'wp_magazine_header_layouts', array(  
        'sanitize_callback' => 'wp_magazine_sanitize_choices',
        'default'     => 'two',
    ) );

    $wp_customize->add_control( new Wp_Magazine_Radio_Image_Control( $wp_customize, 'wp_magazine_header_layouts', array(
        'label' => esc_html__( 'Header Layout','wp-magazine' ),
        'section' => 'wp_magazine_theme_header_layout_section',
        'settings' => 'wp_magazine_header_layouts',
        'type'=> 'radio-image',
        'choices'     => array(
            'one'   => esc_url( get_template_directory_uri() . '/images/homepage/header-layouts/header-layout-one.jpg' ),
            'two'   => esc_url( get_template_directory_uri() . '/images/homepage/header-layouts/header-layout-two.jpg' ),
            'three'   => esc_url( get_template_directory_uri() . '/images/homepage/header-layouts/header-layout-three.jpg' ),
            'four'   => esc_url( get_template_directory_uri() . '/images/homepage/header-layouts/header-layout-four.jpg' ),
        ),
    ) ) );

}