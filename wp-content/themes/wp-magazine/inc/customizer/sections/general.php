<?php

// Website overall Padding
add_action( 'customize_register', 'wp_magazine_general_section_option' );
function wp_magazine_general_section_option( $wp_customize )
{
    $wp_customize->add_section( 'wp_magazine_general_section', array(
        'title'    => esc_html__( 'General Settings', 'wp-magazine' ),
        'priority' => 2,
    ) );
    $wp_customize->add_setting( 'container_width', array(
        'default'           => 1200,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new Wp_Magazine_Slider_Control( $wp_customize, 'container_width', array(
        'section'  => 'wp_magazine_general_section',
        'settings' => 'container_width',
        'label'    => esc_html__( 'Container Width', 'wp-magazine' ),
        'choices'  => array(
        'min'  => 1000,
        'max'  => 2000,
        'step' => 1,
    ),
    ) ) );
    $wp_customize->add_setting( 'image_border', array(
        'default'           => 5,
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( new Wp_Magazine_Slider_Control( $wp_customize, 'image_border', array(
        'section'  => 'wp_magazine_general_section',
        'settings' => 'image_border',
        'label'    => esc_html__( 'Image Border', 'wp-magazine' ),
        'choices'  => array(
        'min'  => 0,
        'max'  => 15,
        'step' => 1,
    ),
    ) ) );
    $wp_customize->add_setting( 'pagination_type', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'wp_magazine_sanitize_choices',
        'default'           => 'ajax-loadmore',
    ) );
    $wp_customize->add_control( new Wp_Magazine_Radio_Buttonset_Control( $wp_customize, 'pagination_type', array(
        'label'    => esc_html__( 'Pagination Type :', 'wp-magazine' ),
        'section'  => 'wp_magazine_general_section',
        'settings' => 'pagination_type',
        'type'     => 'radio-buttonset',
        'choices'  => array(
        'ajax-loadmore'     => esc_html__( 'Ajax Loadmore', 'wp-magazine' ),
        'number-pagination' => esc_html__( 'Number Pagination', 'wp-magazine' ),
    ),
    ) ) );
    $wp_customize->add_setting( 'section_heading_title_styles', array(
        'default'           => '1',
        'sanitize_callback' => 'wp_magazine_sanitize_select',
    ) );
    $wp_customize->add_control( 'section_heading_title_styles', array(
        'settings' => 'section_heading_title_styles',
        'label'    => esc_html__( 'Section Heading Type:', 'wp-magazine' ),
        'section'  => 'wp_magazine_general_section',
        'type'     => 'select',
        'choices'  => array(
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
    ),
    ) );
    $wp_customize->add_setting( 'readmore_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => esc_html__( 'Read More', 'wp-magazine' ),
    ) );
    $wp_customize->add_control( 'readmore_text', array(
        'label'    => esc_html__( 'Read More Text', 'wp-magazine' ),
        'section'  => 'wp_magazine_general_section',
        'settings' => 'readmore_text',
        'type'     => 'text',
    ) );
    $wp_customize->add_setting( 'wp_magazine_copyright_text_edit_notice', array(
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( new Wp_Magazine_Custom_Text( $wp_customize, 'wp_magazine_copyright_text_edit_notice', array(
        'settings' => 'wp_magazine_copyright_text_edit_notice',
        'label'    => '<h1>' . esc_html__( "Copyright edit option is available in Pro version.", 'wp-magazine' ) . '</h1>',
        'section'  => 'wp_magazine_general_section',
        'type'     => 'customtext',
    ) ) );
    $wp_customize->selective_refresh->add_partial( 'copyright_text', array(
        'selector' => '.copyright',
    ) );
}
