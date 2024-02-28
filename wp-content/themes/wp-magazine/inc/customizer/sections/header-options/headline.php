<?php
/**
 * Headline Settings
 *
 * @package WP Magazine
 */

add_action( 'customize_register', 'wp_magazine_theme_headline_section' );

function wp_magazine_theme_headline_section( $wp_customize ) {

    $wp_customize->add_section( 'wp_magazine_theme_headline_section', array(
        'title'          => esc_html__( 'Headline Options', 'wp-magazine' ),
        'panel'          => 'wp_magazine_header_panel',
        'capability'     => 'edit_theme_options',
    ) );


    $wp_customize->add_setting( 'theme_headline_display_option', array(
        'sanitize_callback'     =>  'wp_magazine_sanitize_checkbox',
        'default'               =>  false
    ) );
            
    $wp_customize->add_control( new Wp_Magazine_Toggle_Control( $wp_customize, 'theme_headline_display_option', array(
        'label' => esc_html__( 'Hide / Show Headline','wp-magazine' ),
        'section' => 'wp_magazine_theme_headline_section',
        'settings' => 'theme_headline_display_option',
        'type'=> 'toggle',
    ) ) );

    $wp_customize->selective_refresh->add_partial( 'theme_headline_display_option', array(
        'selector' => '.headline-ticker-wrapper .headline-wrapper',
    ) );


    $wp_customize->add_setting( 'headline_show_on_pages_option', array(
        'default' => 'show_on_all',
        'sanitize_callback' => 'wp_magazine_sanitize_select'
    ) );
     
    $wp_customize->add_control( 'headline_show_on_pages_option', array(
        'label' => esc_html__( 'Select to show on home or all pages.', 'wp-magazine' ),
        'section' => 'wp_magazine_theme_headline_section',
        'settings' => 'headline_show_on_pages_option',
        "active_callback" => function ($control) {
            return $control->manager->get_setting( "theme_headline_display_option" )->value();
        },
        'type' => 'radio',
        'choices' => array(
            'show_on_home' => esc_html__( 'Show only on Homepage', 'wp-magazine' ),
            'show_on_all' => esc_html__( 'Show on all pages', 'wp-magazine' ),
        )
    ) );


    $wp_customize->add_setting( 'headline_title', array(
        'sanitize_callback'     =>  'sanitize_text_field',
        'default'               =>  ''
    ) );

    $wp_customize->add_control( 'headline_title', array(
        'label' => esc_html__( 'Title', 'wp-magazine' ),
        'section' => 'wp_magazine_theme_headline_section',
        'settings' => 'headline_title',
        'type'=> 'text',
    ) );


    $wp_customize->add_setting( 'theme_headline_category', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'wp_magazine_sanitize_category',
        'default'     => '',
    ) );

    $wp_customize->add_control( new Wp_Magazine_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'theme_headline_category', array(
        'label' => esc_html__( 'Choose Category', 'wp-magazine' ),
        'section' => 'wp_magazine_theme_headline_section',
        'settings' => 'theme_headline_category',
        'type'=> 'dropdown-taxonomies',
        'taxonomy'  =>  'category'
    ) ) );

    $wp_customize->add_setting( 'number_of_headline_posts', array(
        'sanitize_callback'     =>  'sanitize_text_field',
        'default'               =>  4
    ) );

    $wp_customize->add_control( 'number_of_headline_posts', array(
        'label' => esc_html__( 'Number of posts', 'wp-magazine' ),
        'section' => 'wp_magazine_theme_headline_section',
        'settings' => 'number_of_headline_posts',
        'type'=> 'text',
        'description'   =>  'put -1 for unlimited'
    ) );

    
    $wp_customize->add_setting( 'wp_magazine_headline_layouts', array(  
        'sanitize_callback' => 'wp_magazine_sanitize_choices',
        'default'     => 'one',
    ) );

    $wp_customize->add_control( new Wp_Magazine_Radio_Image_Control( $wp_customize, 'wp_magazine_headline_layouts', array(
        'label' => esc_html__( 'Headline Layout','wp-magazine' ),
        'section' => 'wp_magazine_theme_headline_section',
        'settings' => 'wp_magazine_headline_layouts',
        'type'=> 'radio-image',
        'choices'     => array(
            'one'   => esc_url( get_template_directory_uri() . '/images/homepage/headline-layouts/headline-layout-one.jpg' ),
            'two'   => esc_url( get_template_directory_uri() . '/images/homepage/headline-layouts/headline-layout-two.jpg' ),
        ),
    ) ) );

}