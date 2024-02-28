<?php

/**
 * News Carousel Settings
 *
 * @package WP Magazine
 */
add_action( 'customize_register', 'wp_magazine_theme_news_carousel_section' );
function wp_magazine_theme_news_carousel_section( $wp_customize )
{
    $wp_customize->add_section( 'wp_magazine_theme_news_carousel_section', array(
        'title'      => esc_html__( 'News Slider', 'wp-magazine' ),
        'panel'      => 'wp_magazine_theme_options_panel',
        'capability' => 'edit_theme_options',
    ) );
    $wp_customize->add_setting( 'theme_news_carousel_display_option', array(
        'sanitize_callback' => 'wp_magazine_sanitize_checkbox',
        'default'           => true,
    ) );
    $wp_customize->add_control( new Wp_Magazine_Toggle_Control( $wp_customize, 'theme_news_carousel_display_option', array(
        'label'    => esc_html__( 'Hide / Show News Slider', 'wp-magazine' ),
        'section'  => 'wp_magazine_theme_news_carousel_section',
        'settings' => 'theme_news_carousel_display_option',
        'type'     => 'toggle',
    ) ) );
    $wp_customize->selective_refresh->add_partial( 'theme_news_carousel_display_option', array(
        'selector' => '.news-carousel-wrapper .news-carousel-inside',
    ) );
    $wp_customize->add_setting( 'news_carousel_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
    ) );
    $wp_customize->add_control( 'news_carousel_title', array(
        'label'    => esc_html__( 'Title', 'wp-magazine' ),
        'section'  => 'wp_magazine_theme_news_carousel_section',
        'settings' => 'news_carousel_title',
        'type'     => 'text',
    ) );
    $wp_customize->add_setting( 'theme_news_carousel_category', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'wp_magazine_sanitize_category',
        'default'           => '',
    ) );
    $wp_customize->add_control( new Wp_Magazine_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'theme_news_carousel_category', array(
        'label'    => esc_html__( 'Choose Category', 'wp-magazine' ),
        'section'  => 'wp_magazine_theme_news_carousel_section',
        'settings' => 'theme_news_carousel_category',
        'type'     => 'dropdown-taxonomies',
        'taxonomy' => 'category',
    ) ) );
    $wp_customize->add_setting( 'number_of_news_carousel_posts', array(
        'sanitize_callback' => 'wp_magazine_sanitize_select',
        'default'           => '5',
    ) );
    $wp_customize->add_control( new Wp_Magazine_Select_Control( $wp_customize, 'number_of_news_carousel_posts', array(
        'label'    => esc_html__( 'Number of posts', 'wp-magazine' ),
        'section'  => 'wp_magazine_theme_news_carousel_section',
        'settings' => 'number_of_news_carousel_posts',
        'type'     => 'select',
        'choices'  => array(
        '3'  => '3',
        '4'  => '4',
        '5'  => '5',
        '6'  => '6',
        '7'  => '7',
        '8'  => '8',
        '9'  => '9',
        '10' => '10',
        '11' => '11',
        '12' => '12',
    ),
    ) ) );
    $wp_customize->add_setting( 'news_carousel_bg_color', array(
        'default'           => '#ecfbff',
        'sanitize_callback' => 'wp_magazine_sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'news_carousel_bg_color', array(
        'label'    => esc_html__( 'Background Color', 'wp-magazine' ),
        'section'  => 'wp_magazine_theme_news_carousel_section',
        'settings' => 'news_carousel_bg_color',
    ) ) );
    $wp_customize->add_setting( 'wp_magazine_news_carousel_layouts', array(
        'sanitize_callback' => 'wp_magazine_sanitize_choices',
        'default'           => 'one',
    ) );
    $wp_customize->add_control( new Wp_Magazine_Radio_Image_Control( $wp_customize, 'wp_magazine_news_carousel_layouts', array(
        'label'    => esc_html__( 'News Slider Layout', 'wp-magazine' ),
        'section'  => 'wp_magazine_theme_news_carousel_section',
        'settings' => 'wp_magazine_news_carousel_layouts',
        'type'     => 'radio-image',
        'choices'  => wp_magazine_get_news_slider_layout_array(),
    ) ) );
    $wp_customize->add_setting( 'wp_magazine_news_carousel_pro_notice', array(
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( new Wp_Magazine_Custom_Text( $wp_customize, 'wp_magazine_news_carousel_pro_notice', array(
        'settings' => 'wp_magazine_news_carousel_pro_notice',
        'label'    => '<h1>' . esc_html__( "Upgrade to Pro for more layouts.", 'wp-magazine' ) . '</h1>',
        'section'  => 'wp_magazine_theme_news_carousel_section',
        'type'     => 'customtext',
    ) ) );
}

function wp_magazine_get_news_slider_layout_array()
{
    $featured_layout = array(
        'one' => esc_url( get_template_directory_uri() . '/images/homepage/news-carousel-layouts/layout-one.jpg' ),
        'two' => esc_url( get_template_directory_uri() . '/images/homepage/news-carousel-layouts/layout-two.jpg' ),
    );
    return $featured_layout;
}
