<?php

/**
 * Header Advertisement Settings
 *
 * @package WP Magazine
 */
add_action( 'customize_register', 'wp_magazine_customize_register_header_ad' );
function wp_magazine_customize_register_header_ad( $wp_customize )
{
    $wp_customize->add_section( 'wp_magazine_header_ad_sections', array(
        'title'    => esc_html__( 'Advertisement', 'wp-magazine' ),
        'priority' => 5,
    ) );
    $wp_customize->add_setting( 'header_image_ad_display_option', array(
        'sanitize_callback' => 'wp_magazine_sanitize_checkbox',
        'default'           => false,
    ) );
    $wp_customize->add_control( new Wp_Magazine_Toggle_Control( $wp_customize, 'header_image_ad_display_option', array(
        'label'    => esc_html__( 'Enable Image Ad', 'wp-magazine' ),
        'section'  => 'wp_magazine_header_ad_sections',
        'settings' => 'header_image_ad_display_option',
        'type'     => 'toggle',
    ) ) );
    $wp_customize->selective_refresh->add_partial( 'header_image_ad_display_option', array(
        'selector' => '.advertisement',
    ) );
    $wp_customize->add_setting( 'header_ad_image', array(
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'header_ad_image', array(
        'label'           => esc_html__( 'Upload ad Advertisement', 'wp-magazine' ),
        'description'     => esc_html__( 'Recommended size 729px * 90px.', 'wp-magazine' ),
        'section'         => 'wp_magazine_header_ad_sections',
        'settings'        => 'header_ad_image',
        'flex_width'      => true,
        'flex_height'     => true,
        'width'           => 729,
        'height'          => 90,
        'active_callback' => function ( $control ) {
        return $control->manager->get_setting( "header_image_ad_display_option" )->value();
    },
    ) ) );
    $wp_customize->add_setting( 'ad_link', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'ad_link', array(
        'type'            => 'text',
        'section'         => 'wp_magazine_header_ad_sections',
        'Settings'        => 'ad_link',
        'label'           => esc_html__( 'Advertisement Link :', 'wp-magazine' ),
        'description'     => esc_html__( 'Image Advertisement Link goes here.', 'wp-magazine' ),
        'active_callback' => function ( $control ) {
        return $control->manager->get_setting( "header_image_ad_display_option" )->value();
    },
    ) );
    $wp_customize->add_setting( 'header_ad_script_pro_notice', array(
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( new Wp_Magazine_Custom_Text( $wp_customize, 'header_ad_script_pro_notice', array(
        'settings' => 'header_ad_script_pro_notice',
        'label'    => '<h1>' . esc_html__( "Upgrade to Pro to insert Google Ads.", 'wp-magazine' ) . '</h1>',
        'section'  => 'wp_magazine_header_ad_sections',
        'type'     => 'customtext',
    ) ) );
}
