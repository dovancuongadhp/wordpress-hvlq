<?php

/**
 * Body Fonts Settings
 *
 * @package WP Magazine
 */

add_action( 'customize_register', 'wp_magazine_customize_register_body_fonts' );
function wp_magazine_customize_register_body_fonts( $wp_customize ) {

    $wp_customize->add_section( 'wp_magazine_body_fonts_section', array(
        'title'          => esc_html__( 'Main Body', 'wp-magazine' ),
        'panel'          => 'wp_magazine_colors_fonts_panel',
    ) );
}


add_action( 'customize_register', 'wp_magazine_customize_body_fonts_colors' );
function wp_magazine_customize_body_fonts_colors( $wp_customize ) {

    $wp_customize->add_setting( 'font_color', array(
        'transport'   => 'postMessage',
        'default'     => '#333',
        'sanitize_callback' => 'wp_magazine_sanitize_hex_color'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'font_color', array(
        'label'      => esc_html__( 'Font Color', 'wp-magazine' ),
        'section'    => 'wp_magazine_body_fonts_section',
        'settings'   => 'font_color',
    ) ) );

    $wp_customize->add_setting( 'primary_color', array(
        'default'     => '#29a2cb',
        'sanitize_callback' => 'wp_magazine_sanitize_hex_color'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
        'label'      => esc_html__( 'Primary Color', 'wp-magazine' ),
        'section'    => 'wp_magazine_body_fonts_section',
        'settings'   => 'primary_color',
    ) ) );

    $wp_customize->add_setting( 'secondary_color', array(
        'default'     => '#50596c',
        'sanitize_callback' => 'wp_magazine_sanitize_hex_color'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_color', array(
        'label'      => esc_html__( 'Secondary Color', 'wp-magazine' ),
        'section'    => 'wp_magazine_body_fonts_section',
        'settings'   => 'secondary_color',
    ) ) );


    $wp_customize->add_setting( 'dark_color', array(
        'default'     => '#333',
        'sanitize_callback' => 'wp_magazine_sanitize_hex_color'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dark_color', array(
        'label'      => esc_html__( 'Dark Color', 'wp-magazine' ),
        'section'    => 'wp_magazine_body_fonts_section',
        'settings'   => 'dark_color',
    ) ) );

    $wp_customize->add_setting( 'white_color', array(
        'default'     => '#fff',
        'sanitize_callback' => 'wp_magazine_sanitize_hex_color'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'white_color', array(
        'label'      => esc_html__( 'White Color', 'wp-magazine' ),
        'section'    => 'wp_magazine_body_fonts_section',
        'settings'   => 'white_color',
    ) ) );

    $wp_customize->add_setting( 'body_background_color', array(
        'transport'   => 'postMessage',
        'default'     => '#fff',
        'sanitize_callback' => 'wp_magazine_sanitize_hex_color'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_background_color', array(
        'label'      => esc_html__( 'Background Color', 'wp-magazine' ),
        'section'    => 'wp_magazine_body_fonts_section',
        'settings'   => 'body_background_color',
    ) ) );


    $wp_customize->add_setting( 'footer_background_color', array(
        'transport'   => 'postMessage',
        'default'     => '#ececec',
        'sanitize_callback' => 'wp_magazine_sanitize_hex_color'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_background_color', array(
        'label'      => esc_html__( 'Footer Background Color', 'wp-magazine' ),
        'section'    => 'wp_magazine_body_fonts_section',
        'settings'   => 'footer_background_color',
    ) ) );


            
    $wp_customize->add_setting( 'font_family', array(
        'transport' => 'postMessage',
        'default'     => 'Source Sans Pro',
        'sanitize_callback' => 'wp_magazine_sanitize_google_fonts',
    ) );

    $wp_customize->add_control( 'font_family', array(
        'settings'    => 'font_family',
        'label'       =>  esc_html__( 'Font Family', 'wp-magazine' ),
        'section'     => 'wp_magazine_body_fonts_section',
        'type'        => 'select',
        'choices'     => wp_magazine_google_fonts(),
    ) );

    $wp_customize->add_setting( 'font_size', array(
      'transport' => 'postMessage',
      'default'     => '15px',
      'sanitize_callback' => 'wp_magazine_sanitize_select',
    ) );
    
    $wp_customize->add_control( 'font_size', array(
        'settings'    => 'font_size',
        'label'       =>  esc_html__( 'Font Size', 'wp-magazine' ),
        'section'     => 'wp_magazine_body_fonts_section',
        'type'        => 'select',
        'default'     => '15px',
        'choices'     =>  wp_magazine_define_font_sizes()
      ) );

    // line height amit
    $wp_customize->add_setting( 'line_height', array(
      'default'     => '22px',
      'transport' => 'postMessage',
      'sanitize_callback' => 'wp_magazine_sanitize_select',
    ) );
    
    $wp_customize->add_control( 'line_height', array(
        'settings'    => 'line_height',
        'label'       =>  esc_html__( 'Line Height', 'wp-magazine' ),
        'section'     => 'wp_magazine_body_fonts_section',
        'type'        => 'select',
        'default'     => '22px',
        'choices'     =>  wp_magazine_define_line_height()
      ) );

    $wp_customize->add_setting( 'wp_magazine_font_weight', array(
        'default'           => 400,
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new Wp_Magazine_Slider_Control( $wp_customize, 'wp_magazine_font_weight', array(
        'section' => 'wp_magazine_body_fonts_section',
        'settings' => 'wp_magazine_font_weight',
        'label'   => esc_html__( 'Font Weight', 'wp-magazine' ),
        'choices'     => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
    ) ) );


    $wp_customize->add_setting( 'detail_post_page_fonts_colors_label', array(
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( new Wp_Magazine_Custom_Text( $wp_customize, 'detail_post_page_fonts_colors_label', array(
        'settings'    => 'detail_post_page_fonts_colors_label',
        'label'       =>  '<div class="customizer-custom-label">' . esc_html__( "Detail Post/Page", 'wp-magazine' ) . '</div>',
        'section'     => 'wp_magazine_body_fonts_section',
        'type'        => 'customtext',
    ) ) );

    $wp_customize->add_setting( 'detail_post_page_font_size', array(
      'default'     => '15px',
      'sanitize_callback' => 'wp_magazine_sanitize_select',
    ) );
    
    $wp_customize->add_control( 'detail_post_page_font_size', array(
        'settings'    => 'detail_post_page_font_size',
        'label'       =>  esc_html__( 'Font Size', 'wp-magazine' ),
        'section'     => 'wp_magazine_body_fonts_section',
        'type'        => 'select',
        'default'     => '15px',
        'choices'     =>  wp_magazine_define_font_sizes()
      ) );

            
    $wp_customize->add_setting( 'detail_post_page_font_family', array(
        'default'     => 'Source Sans Pro',
        'sanitize_callback' => 'wp_magazine_sanitize_google_fonts',
    ) );

    $wp_customize->add_control( 'detail_post_page_font_family', array(
        'settings'    => 'detail_post_page_font_family',
        'label'       =>  esc_html__( 'Font Family', 'wp-magazine' ),
        'section'     => 'wp_magazine_body_fonts_section',
        'type'        => 'select',
        'choices'     => wp_magazine_google_fonts(),
    ) );

    

    $wp_customize->add_setting( 'detail_post_page_line_height', array(
      'default'     => '18px',
      'sanitize_callback' => 'wp_magazine_sanitize_select',
    ) );
    
    $wp_customize->add_control( 'detail_post_page_line_height', array(
        'settings'    => 'detail_post_page_line_height',
        'label'       =>  esc_html__( 'Line Height', 'wp-magazine' ),
        'section'     => 'wp_magazine_body_fonts_section',
        'type'        => 'select',
        'choices'     =>  wp_magazine_define_line_height()
      ) );

    $wp_customize->add_setting( 'detail_post_page_font_weight', array(
        'default'           => 400,
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( new Wp_Magazine_Slider_Control( $wp_customize, 'detail_post_page_font_weight', array(
        'section' => 'wp_magazine_body_fonts_section',
        'settings' => 'detail_post_page_font_weight',
        'label'   => esc_html__( 'Font Weight', 'wp-magazine' ),
        'choices'     => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
    ) ) );

    


    

    

   

}