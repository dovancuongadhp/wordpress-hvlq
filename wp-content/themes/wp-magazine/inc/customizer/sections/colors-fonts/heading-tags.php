<?php

/**
 * Heading Tags Settings
 *
 * @package WP Magazine
 */

add_action( 'customize_register', 'wp_magazine_customize_register_heading_tags_colors_fonts' );
function wp_magazine_customize_register_heading_tags_colors_fonts( $wp_customize ) {

    $wp_customize->add_section( 'wp_magazine_heading_tags_section', array(
        'title'          => esc_html__( 'Heading Tags', 'wp-magazine' ),
        'panel'          => 'wp_magazine_colors_fonts_panel',
    ) );
}

add_action( 'customize_register', 'wp_magazine_heading_tags_fonts_colors' );
function wp_magazine_heading_tags_fonts_colors( $wp_customize ) {

    $defaults = wp_magazine_default_fonts_attributes();


    for( $i = 1; $i <= 6 ; $i++ ) {


        $wp_customize->add_setting( 'h'.$i.'_fonts_colors_label', array(
            'sanitize_callback' => 'wp_kses_post',
        ) );

        $wp_customize->add_control( new Wp_Magazine_Custom_Text( $wp_customize, 'h'.$i.'_fonts_colors_label', array(
            'settings'    => 'h'.$i.'_fonts_colors_label',
            'label'       =>  '<div class="customizer-custom-label">' . esc_html__( "H", 'wp-magazine' ) . $i . '</div>',
            'section'     => 'wp_magazine_heading_tags_section',
            'type'        => 'customtext',
        ) ) );

        $wp_customize->add_setting( 'wp_magazine_heading_' . $i . '_size', array(
            'default'           => $defaults[$i]['font_size'],
            'sanitize_callback' => 'absint',
            'transport' => 'postMessage',
        ) );

        $wp_customize->add_control( new Wp_Magazine_Slider_Control( $wp_customize, 'wp_magazine_heading_' . $i . '_size', array(
            'section'   => 'wp_magazine_heading_tags_section',
            'label' => esc_html__( 'H', 'wp-magazine' ) . $i . esc_html__(' Font Size', 'wp-magazine' ),
            'choices' => array(
                'min' => 10,
                'max' => 50,
                'step'  =>  1
            ),
        ) ) );




        $wp_customize->add_setting( 'wp_magazine_heading_' . $i . '_font_family', array(
            'transport' => 'postMessage',
            'default'     => $defaults[$i]['font_family'],
            'sanitize_callback' => 'wp_magazine_sanitize_google_fonts',
        ) );

        $wp_customize->add_control( 'wp_magazine_heading_' . $i . '_font_family', array(
            'settings'    => 'wp_magazine_heading_' . $i . '_font_family',
            'label'       =>  esc_html__( 'H', 'wp-magazine' ) . $i . esc_html__(' Font Family', 'wp-magazine' ),
            'section'     => 'wp_magazine_heading_tags_section',
            'type'        => 'select',
            'choices'     => wp_magazine_google_fonts(),
        ) );



        $wp_customize->add_setting( 'heading_' . $i . '_font_weight', array(
            'default'           => $defaults[$i]['font_weight'],
            'sanitize_callback' => 'absint',
            'transport' => 'postMessage',
        ) );

        $wp_customize->add_control( new Wp_Magazine_Slider_Control( $wp_customize, 'heading_' . $i . '_font_weight', array(
            'section' => 'wp_magazine_heading_tags_section',
            'settings' => 'heading_' . $i . '_font_weight',
            'label'   => esc_html__( 'H', 'wp-magazine' ) . $i . esc_html__(' Font Weight', 'wp-magazine' ),
            'choices'     => array(
                'min'  => 100,
                'max'  => 900,
                'step' => 100,
            ),
        ) ) );



        $wp_customize->add_setting( 'heading_' . $i . '_font_color', array(
            'transport'   => 'postMessage',
            'default'     => '#333',
            'sanitize_callback' => 'wp_magazine_sanitize_hex_color'
        ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'heading_' . $i . '_font_color', array(
            'label'      => esc_html__( 'H', 'wp-magazine' ) . $i . esc_html__(' Font Color', 'wp-magazine' ),
            'section'    => 'wp_magazine_heading_tags_section',
            'settings'   => 'heading_' . $i . '_font_color',
        ) ) );

    }

    
}