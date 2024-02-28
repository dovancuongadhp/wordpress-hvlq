<?php

/**
 * Featured Settings
 *
 * @package WP Magazine
 */
add_action( 'customize_register', 'wp_magazine_customize_register_featured_lifestyle' );
function wp_magazine_customize_register_featured_lifestyle( $wp_customize )
{
    $wp_customize->add_section( 'wp_magazine_featured_lifestyle_sections', array(
        'title'       => esc_html__( 'Featured Section', 'wp-magazine' ),
        'description' => esc_html__( 'Featured Section :', 'wp-magazine' ),
        'panel'       => 'wp_magazine_theme_options_panel',
    ) );
    $wp_customize->add_setting( 'featured_lifestyle_display_option', array(
        'sanitize_callback' => 'wp_magazine_sanitize_checkbox',
        'default'           => true,
    ) );
    $wp_customize->add_control( new Wp_Magazine_Toggle_Control( $wp_customize, 'featured_lifestyle_display_option', array(
        'label'    => esc_html__( 'Hide / Show', 'wp-magazine' ),
        'section'  => 'wp_magazine_featured_lifestyle_sections',
        'settings' => 'featured_lifestyle_display_option',
        'type'     => 'toggle',
    ) ) );
    $wp_customize->selective_refresh->add_partial( 'featured_lifestyle_display_option', array(
        'selector' => '.featured-blog .container',
    ) );
    $wp_customize->add_setting( 'featured_lifestyle_category', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'wp_magazine_sanitize_category',
        'default'           => '',
    ) );
    $wp_customize->add_control( new Wp_Magazine_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'featured_lifestyle_category', array(
        'label'    => esc_html__( 'Choose Category', 'wp-magazine' ),
        'section'  => 'wp_magazine_featured_lifestyle_sections',
        'settings' => 'featured_lifestyle_category',
        'type'     => 'dropdown-taxonomies',
        'taxonomy' => 'category',
    ) ) );
    $wp_customize->add_setting( 'featured_lifestyle_section_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
    ) );
    $wp_customize->add_control( 'featured_lifestyle_section_title', array(
        'label'    => esc_html__( 'Title', 'wp-magazine' ),
        'section'  => 'wp_magazine_featured_lifestyle_sections',
        'settings' => 'featured_lifestyle_section_title',
        'type'     => 'text',
    ) );
    $wp_customize->add_setting( 'featured_fullwidth_option', array(
        'sanitize_callback' => 'wp_magazine_sanitize_checkbox',
        'default'           => false,
    ) );
    $wp_customize->add_control( new Wp_Magazine_Toggle_Control( $wp_customize, 'featured_fullwidth_option', array(
        'label'    => esc_html__( 'Fullwidth Display?', 'wp-magazine' ),
        'section'  => 'wp_magazine_featured_lifestyle_sections',
        'settings' => 'featured_fullwidth_option',
        'type'     => 'toggle',
    ) ) );
    $wp_customize->add_setting( 'number_of_featured_posts', array(
        'sanitize_callback' => 'wp_magazine_sanitize_select',
        'default'           => '5',
    ) );
    $wp_customize->add_control( new Wp_Magazine_Select_Control( $wp_customize, 'number_of_featured_posts', array(
        'label'    => esc_html__( 'Number of posts', 'wp-magazine' ),
        'section'  => 'wp_magazine_featured_lifestyle_sections',
        'settings' => 'number_of_featured_posts',
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
    ),
    ) ) );
    $wp_customize->add_setting( 'wp_magazine_featured_layouts', array(
        'sanitize_callback' => 'wp_magazine_sanitize_choices',
        'default'           => '1',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new Wp_Magazine_Radio_Image_Control( $wp_customize, 'wp_magazine_featured_layouts', array(
        'label'    => esc_html__( 'Featured Layout', 'wp-magazine' ),
        'section'  => 'wp_magazine_featured_lifestyle_sections',
        'settings' => 'wp_magazine_featured_layouts',
        'type'     => 'radio-image',
        'choices'  => wp_magazine_get_featured_layout_array(),
    ) ) );
    $wp_customize->add_setting( 'wp_magazine_featured_layouts_pro_notice', array(
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( new Wp_Magazine_Custom_Text( $wp_customize, 'wp_magazine_featured_layouts_pro_notice', array(
        'settings' => 'wp_magazine_featured_layouts_pro_notice',
        'label'    => '<h1>' . esc_html__( "Upgrade to Pro for more layouts", 'wp-magazine' ) . '</h1>',
        'section'  => 'wp_magazine_featured_lifestyle_sections',
        'type'     => 'customtext',
    ) ) );
    $wp_customize->add_setting( 'featured_lifestyle_show_hide_details', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'wp_magazine_sanitize_array',
        'default'           => array(
        'date',
        'categories',
        'tags',
        'description',
        'read-more'
    ),
    ) );
    $wp_customize->add_control( new Wp_Magazine_Multi_Check_Control( $wp_customize, 'featured_lifestyle_show_hide_details', array(
        'label'    => esc_html__( 'Hide / Show Details', 'wp-magazine' ),
        'section'  => 'wp_magazine_featured_lifestyle_sections',
        'settings' => 'featured_lifestyle_show_hide_details',
        'type'     => 'multi-check',
        'choices'  => array(
        'author'             => esc_html__( 'Show post author', 'wp-magazine' ),
        'date'               => esc_html__( 'Show post date', 'wp-magazine' ),
        'categories'         => esc_html__( 'Show Categories', 'wp-magazine' ),
        'tags'               => esc_html__( 'Show Tags', 'wp-magazine' ),
        'number_of_comments' => esc_html__( 'Show number of comments', 'wp-magazine' ),
        'description'        => esc_html__( 'Show description', 'wp-magazine' ),
        'read-more'          => esc_html__( 'Show Read More', 'wp-magazine' ),
    ),
    ) ) );
}

function wp_magazine_get_featured_layout_array()
{
    $featured_layout = array(
        '1' => esc_url( get_template_directory_uri() . '/images/homepage/featured-layouts/featured-layout-one.jpg' ),
        '2' => esc_url( get_template_directory_uri() . '/images/homepage/featured-layouts/featured-layout-two.jpg' ),
        '3' => esc_url( get_template_directory_uri() . '/images/homepage/featured-layouts/featured-layout-three.jpg' ),
        '4' => esc_url( get_template_directory_uri() . '/images/homepage/featured-layouts/featured-layout-four.jpg' ),
    );
    return $featured_layout;
}
