<?php

/**
 * CTA Settings
 *
 * @package WP Magazine
 */
add_action( 'customize_register', 'wp_magazine_customize_cta_section' );
function wp_magazine_customize_cta_section( $wp_customize )
{
    $wp_customize->add_section( 'wp_magazine_cta_sections', array(
        'title' => esc_html__( 'Call To Action', 'wp-magazine' ),
        'panel' => 'wp_magazine_theme_options_panel',
    ) );
    $wp_customize->add_setting( 'cta_display_option', array(
        'sanitize_callback' => 'wp_magazine_sanitize_checkbox',
        'default'           => false,
    ) );
    $wp_customize->add_control( new Wp_Magazine_Toggle_Control( $wp_customize, 'cta_display_option', array(
        'label'    => esc_html__( 'Hide / Show', 'wp-magazine' ),
        'section'  => 'wp_magazine_cta_sections',
        'settings' => 'cta_display_option',
        'type'     => 'toggle',
    ) ) );
    $wp_customize->selective_refresh->add_partial( 'cta_display_option', array(
        'selector' => '.cta-block-wrapper',
    ) );
    $wp_customize->add_setting( 'cta_sub_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
    ) );
    $wp_customize->add_control( 'cta_sub_title', array(
        'label'    => esc_html__( 'CTA Sub Heading', 'wp-magazine' ),
        'section'  => 'wp_magazine_cta_sections',
        'settings' => 'cta_sub_title',
        'type'     => 'text',
    ) );
    $wp_customize->add_setting( 'cta_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
    ) );
    $wp_customize->add_control( 'cta_title', array(
        'label'    => esc_html__( 'CTA Heading', 'wp-magazine' ),
        'section'  => 'wp_magazine_cta_sections',
        'settings' => 'cta_title',
        'type'     => 'text',
    ) );
    $wp_customize->add_setting( 'cta_image', array(
        'sanitize_callback' => 'wp_magazine_sanitize_image',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'cta_image', array(
        'label'    => esc_html__( 'CTA Image', 'wp-magazine' ),
        'section'  => 'wp_magazine_cta_sections',
        'settings' => 'cta_image',
    ) ) );
    $wp_customize->add_setting( 'cta_text', array(
        'sanitize_callback' => 'wp_kses_post',
        'default'           => '',
    ) );
    $wp_customize->add_control( 'cta_text', array(
        'label'    => esc_html__( 'CTA Text', 'wp-magazine' ),
        'section'  => 'wp_magazine_cta_sections',
        'settings' => 'cta_text',
        'type'     => 'textarea',
    ) );
    $wp_customize->add_setting( 'cta_button_label', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
    ) );
    $wp_customize->add_control( 'cta_button_label', array(
        'label'    => esc_html__( 'CTA Button Label', 'wp-magazine' ),
        'section'  => 'wp_magazine_cta_sections',
        'settings' => 'cta_button_label',
        'type'     => 'text',
    ) );
    $wp_customize->add_setting( 'cta_link', array(
        'sanitize_callback' => 'esc_url_raw',
        'default'           => '',
    ) );
    $wp_customize->add_control( 'cta_link', array(
        'label'    => esc_html__( 'CTA Link', 'wp-magazine' ),
        'section'  => 'wp_magazine_cta_sections',
        'settings' => 'cta_link',
        'type'     => 'text',
    ) );
    $wp_customize->add_setting( 'cta_background_color', array(
        'default'           => '#e3f3f0',
        'sanitize_callback' => 'wp_magazine_sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cta_background_color', array(
        'label'    => esc_html__( 'Background Color', 'wp-magazine' ),
        'section'  => 'wp_magazine_cta_sections',
        'settings' => 'cta_background_color',
    ) ) );
    $wp_customize->add_setting( 'wp_magazine_cta_layouts', array(
        'sanitize_callback' => 'wp_magazine_sanitize_choices',
        'default'           => 1,
    ) );
    $wp_customize->add_control( new Wp_Magazine_Radio_Image_Control( $wp_customize, 'wp_magazine_cta_layouts', array(
        'label'    => esc_html__( 'CTA Layouts', 'wp-magazine' ),
        'section'  => 'wp_magazine_cta_sections',
        'settings' => 'wp_magazine_cta_layouts',
        'type'     => 'radio-image',
        'choices'  => wp_magazine_get_cta_layout_array(),
    ) ) );
    $wp_customize->add_setting( 'wp_magazine_cta_more_layouts_notice', array(
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( new Wp_Magazine_Custom_Text( $wp_customize, 'wp_magazine_cta_more_layouts_notice', array(
        'settings' => 'wp_magazine_cta_more_layouts_notice',
        'label'    => '<h1>' . esc_html__( "Upgrade to Pro for more layout options", 'wp-magazine' ) . '</h1>',
        'section'  => 'wp_magazine_cta_sections',
        'type'     => 'customtext',
    ) ) );
}

function wp_magazine_get_cta_layout_array()
{
    $cta_layout = array(
        '1' => esc_url( get_template_directory_uri() . '/images/homepage/cta-layouts/cta-layout-one.jpg' ),
    );
    return $cta_layout;
}
