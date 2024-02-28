<?php
/**
 * Site Identity Settings
 *
 * @package WP Magazine
 */


add_action( 'customize_register', 'wp_magazine_change_site_identity_panel' );

function wp_magazine_change_site_identity_panel( $wp_customize)  {
    $wp_customize->get_section( 'title_tagline' )->priority = 2;

    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}



add_action( 'customize_register', 'wp_magazine_site_identity_settings' );

function wp_magazine_site_identity_settings( $wp_customize ) {

    $wp_customize->add_setting( 'site_title_color_option', array(
        'capability'  => 'edit_theme_options',
        'default'     => '#000',
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_magazine_sanitize_hex_color'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_title_color_option', array(
        'label'      => esc_html__( 'Site Title Color', 'wp-magazine' ),
        'section'    => 'title_tagline',
        'settings'   => 'site_title_color_option',
    ) ) );


    // Heading Background Color
    // Heading Background Image
    // Theme Header Layour Option
    // enable sticky
    // Hide/Show Header Search

	$wp_customize->add_setting( 'wp_magazine_logo_size', array(
        'default'           => 30,
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new Wp_Magazine_Slider_Control( $wp_customize, 'wp_magazine_logo_size', array(
        'section' => 'title_tagline',
        'settings' => 'wp_magazine_logo_size',
        'label'   => esc_html__( 'Logo Size', 'wp-magazine' ),
        'choices'     => array(
            'min'   => 15,
            'max'   => 60,
            'step'  => 1,
        )
    ) ) );

    $wp_customize->add_setting( 'site_identity_font_family', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_magazine_sanitize_google_fonts',
        'default'     => 'Poppins',
    ) );

    $wp_customize->add_control( 'site_identity_font_family', array(
        'settings'    => 'site_identity_font_family',
        'label'       =>  esc_html__( 'Site Identity Font Family', 'wp-magazine' ),
        'section'     => 'title_tagline',
        'type'        => 'select',
        'choices'     => wp_magazine_google_fonts(),
    ) );
    

    $wp_customize->add_setting( 'header_image_height', array(
        'default'           => 30,
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new Wp_Magazine_Slider_Control( $wp_customize, 'header_image_height', array(
        'section' => 'title_tagline',
        'settings' => 'header_image_height',
        'label'   => esc_html__( 'Header Image Height', 'wp-magazine' ),
        'choices'     => array(
            'min'   => 15,
            'max'   => 200,
            'step'  => 1,
        )
    ) ) );
    
}