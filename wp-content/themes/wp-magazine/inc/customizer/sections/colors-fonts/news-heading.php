<?php

/**
 * News Heading Settings
 *
 * @package WP Magazine
 */

add_action( 'customize_register', 'wp_magazine_customize_register_news_heading_colors_fonts' );
function wp_magazine_customize_register_news_heading_colors_fonts( $wp_customize ) {

    $wp_customize->add_section( 'wp_magazine_news_heading_section', array(
        'title'          => esc_html__( 'News Heading', 'wp-magazine' ),
        'panel'          => 'wp_magazine_colors_fonts_panel',
    ) );
}

add_action( 'customize_register', 'wp_magazine_customize_news_header_fonts_colors' );
function wp_magazine_customize_news_header_fonts_colors( $wp_customize ) {


    //Headline
    $wp_customize->add_setting( 'headline_news_title_fonts_colors_label', array(
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( new Wp_Magazine_Custom_Text( $wp_customize, 'headline_news_title_fonts_colors_label', array(
        'settings'    => 'headline_news_title_fonts_colors_label',
        'label'       =>  '<div class="customizer-custom-label">' . esc_html__( "Headline News Title", 'wp-magazine' ) . '</div>',
        'section'     => 'wp_magazine_news_heading_section',
        'type'        => 'customtext',
    ) ) );

    $wp_customize->add_setting( 'headline_colors', array(
        'default'     => '#1e73be',
        'sanitize_callback' => 'wp_magazine_sanitize_hex_color'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'headline_colors', array(
        'label'      => esc_html__( 'Color', 'wp-magazine' ),
        'section'    => 'wp_magazine_news_heading_section',
        'settings'   => 'headline_colors',
    ) ) );

    $wp_customize->add_setting( 'headline_news_title_font_family', array(        
        'default'     => 'Playfair Display',
        'sanitize_callback' => 'wp_magazine_sanitize_google_fonts',
    ) );

    $wp_customize->add_control( 'headline_news_title_font_family', array(
        'settings'    => 'headline_news_title_font_family',
        'label'       =>  esc_html__( 'Font Family', 'wp-magazine' ),
        'section'     => 'wp_magazine_news_heading_section',
        'type'        => 'select',
        'choices'     => wp_magazine_google_fonts(),
    ) );

    $wp_customize->add_setting( 'headline_news_title_font_size', array(      
      'default'     => '14px',
      'sanitize_callback' => 'wp_magazine_sanitize_select',
    ) );
    
    $wp_customize->add_control( 'headline_news_title_font_size', array(
        'settings'    => 'headline_news_title_font_size',
        'label'       =>  esc_html__( 'Font Size', 'wp-magazine' ),
        'section'     => 'wp_magazine_news_heading_section',
        'type'        => 'select',
        'default'     => '14px',
        'choices'     => wp_magazine_define_font_sizes()
      ) );

    $wp_customize->add_setting( 'headline_news_title_line_height', array(      
      'default'     => '16px',
      'sanitize_callback' => 'wp_magazine_sanitize_select',
    ) );
    
    $wp_customize->add_control( 'headline_news_title_line_height', array(
        'settings'    => 'headline_news_title_line_height',
        'label'       =>  esc_html__( 'Line Height', 'wp-magazine' ),
        'section'     => 'wp_magazine_news_heading_section',
        'type'        => 'select',
        'default'     => '13px',
        'choices'     =>  wp_magazine_define_line_height()
      ) );


    $wp_customize->add_setting( 'headline_news_title_font_weight', array(
        'default'           => 500,
        'sanitize_callback' => 'absint',
        
    ) );

    $wp_customize->add_control( new Wp_Magazine_Slider_Control( $wp_customize, 'headline_news_title_font_weight', array(
        'section' => 'wp_magazine_news_heading_section',
        'settings' => 'headline_news_title_font_weight',
        'label'   => esc_html__( 'Font Weight', 'wp-magazine' ),
        'choices'     => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
    ) ) );





    // Featured
    $wp_customize->add_setting( 'featured_news_title_fonts_colors_label', array(
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( new Wp_Magazine_Custom_Text( $wp_customize, 'featured_news_title_fonts_colors_label', array(
        'settings'    => 'featured_news_title_fonts_colors_label',
        'label'       =>  '<div class="customizer-custom-label">' . esc_html__( "Featured News Title", 'wp-magazine' ) . '</div>',
        'section'     => 'wp_magazine_news_heading_section',
        'type'        => 'customtext',
    ) ) );

    $wp_customize->add_setting( 'featured_news_title_colors', array(
        'default'     => '#fff',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'wp_magazine_sanitize_hex_color'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'featured_news_title_colors', array(
        'label'      => esc_html__( 'Color', 'wp-magazine' ),
        'section'    => 'wp_magazine_news_heading_section',
        'settings'   => 'featured_news_title_colors',
    ) ) );

    $wp_customize->add_setting( 'featured_news_title_font_family', array(
        
        'default'     => 'Playfair Display',
        'sanitize_callback' => 'wp_magazine_sanitize_google_fonts',
    ) );

    $wp_customize->add_control( 'featured_news_title_font_family', array(
        'settings'    => 'featured_news_title_font_family',
        'label'       =>  esc_html__( 'Font Family', 'wp-magazine' ),
        'section'     => 'wp_magazine_news_heading_section',
        'type'        => 'select',
        'choices'     => wp_magazine_google_fonts(),
    ) );

    $wp_customize->add_setting( 'featured_news_title_font_size', array(
      
      'default'     => '14px',
      'sanitize_callback' => 'wp_magazine_sanitize_select',
    ) );
    
    $wp_customize->add_control( 'featured_news_title_font_size', array(
        'settings'    => 'featured_news_title_font_size',
        'label'       =>  esc_html__( 'Font Size', 'wp-magazine' ),
        'section'     => 'wp_magazine_news_heading_section',
        'type'        => 'select',
        'default'     => '13px',
        'choices'     =>  wp_magazine_define_font_sizes()
      ) );

    $wp_customize->add_setting( 'featured_news_title_line_height', array(
      
      'default'     => '14px',
      'sanitize_callback' => 'wp_magazine_sanitize_select',
    ) );
    
    $wp_customize->add_control( 'featured_news_title_line_height', array(
        'settings'    => 'featured_news_title_line_height',
        'label'       =>  esc_html__( 'Line Height', 'wp-magazine' ),
        'section'     => 'wp_magazine_news_heading_section',
        'type'        => 'select',
        'default'     => '13px',
        'choices'     =>  wp_magazine_define_line_height()
      ) );


    $wp_customize->add_setting( 'featured_news_title_font_weight', array(
        'default'           => 500,
        'sanitize_callback' => 'absint',
        
    ) );

    $wp_customize->add_control( new Wp_Magazine_Slider_Control( $wp_customize, 'featured_news_title_font_weight', array(
        'section' => 'wp_magazine_news_heading_section',
        'settings' => 'featured_news_title_font_weight',
        'label'   => esc_html__( 'Font Weight', 'wp-magazine' ),
        'choices'     => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
    ) ) );



    // Category
    $wp_customize->add_setting( 'category_news_title_fonts_colors_label', array(
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( new Wp_Magazine_Custom_Text( $wp_customize, 'category_news_title_fonts_colors_label', array(
        'settings'    => 'category_news_title_fonts_colors_label',
        'label'       =>  '<div class="customizer-custom-label">' . esc_html__( "Category News Title", 'wp-magazine' ) . '</div>',
        'section'     => 'wp_magazine_news_heading_section',
        'type'        => 'customtext',
    ) ) );

    $wp_customize->add_setting( 'category_news_title_colors', array(
        'default'     => '#999',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'wp_magazine_sanitize_hex_color'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'category_news_title_colors', array(
        'label'      => esc_html__( 'Color', 'wp-magazine' ),
        'section'    => 'wp_magazine_news_heading_section',
        'settings'   => 'category_news_title_colors',
    ) ) );

    $wp_customize->add_setting( 'category_news_title_font_family', array(
        
        'default'     => 'Playfair Display',
        'sanitize_callback' => 'wp_magazine_sanitize_google_fonts',
    ) );

    $wp_customize->add_control( 'category_news_title_font_family', array(
        'settings'    => 'category_news_title_font_family',
        'label'       =>  esc_html__( 'Font Family', 'wp-magazine' ),
        'section'     => 'wp_magazine_news_heading_section',
        'type'        => 'select',
        'choices'     => wp_magazine_google_fonts(),
    ) );

    $wp_customize->add_setting( 'category_news_title_font_size', array(
      
      'default'     => '14px',
      'sanitize_callback' => 'wp_magazine_sanitize_select',
    ) );
    
    $wp_customize->add_control( 'category_news_title_font_size', array(
        'settings'    => 'category_news_title_font_size',
        'label'       =>  esc_html__( 'Font Size', 'wp-magazine' ),
        'section'     => 'wp_magazine_news_heading_section',
        'type'        => 'select',
        'default'     => '13px',
        'choices'     =>  wp_magazine_define_font_sizes()
      ) );

    $wp_customize->add_setting( 'category_news_title_line_height', array(
      
      'default'     => '13px',
      'sanitize_callback' => 'wp_magazine_sanitize_select',
    ) );
    
    $wp_customize->add_control( 'category_news_title_line_height', array(
        'settings'    => 'category_news_title_line_height',
        'label'       =>  esc_html__( 'Line Height', 'wp-magazine' ),
        'section'     => 'wp_magazine_news_heading_section',
        'type'        => 'select',
        'default'     => '13px',
        'choices'     =>  wp_magazine_define_line_height()
      ) );


    $wp_customize->add_setting( 'category_news_title_font_weight', array(
        'default'           => 500,
        'sanitize_callback' => 'absint',
        
    ) );

    $wp_customize->add_control( new Wp_Magazine_Slider_Control( $wp_customize, 'category_news_title_font_weight', array(
        'section' => 'wp_magazine_news_heading_section',
        'settings' => 'category_news_title_font_weight',
        'label'   => esc_html__( 'Font Weight', 'wp-magazine' ),
        'choices'     => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
    ) ) );








    $wp_customize->add_setting( 'blog_news_title_fonts_colors_label', array(
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( new Wp_Magazine_Custom_Text( $wp_customize, 'blog_news_title_fonts_colors_label', array(
        'settings'    => 'blog_news_title_fonts_colors_label',
        'label'       =>  '<div class="customizer-custom-label">' . esc_html__( "Blog News Title", 'wp-magazine' ) . '</div>',
        'section'     => 'wp_magazine_news_heading_section',
        'type'        => 'customtext',
    ) ) );

    $wp_customize->add_setting( 'blog_colors', array(
        'default'     => '#1e73be',
        'sanitize_callback' => 'wp_magazine_sanitize_hex_color'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_colors', array(
        'label'      => esc_html__( 'Color', 'wp-magazine' ),
        'section'    => 'wp_magazine_news_heading_section',
        'settings'   => 'blog_colors',
    ) ) );

    $wp_customize->add_setting( 'blog_news_title_font_family', array(        
        'default'     => 'Playfair Display',
        'sanitize_callback' => 'wp_magazine_sanitize_google_fonts',
    ) );

    $wp_customize->add_control( 'blog_news_title_font_family', array(
        'settings'    => 'blog_news_title_font_family',
        'label'       =>  esc_html__( 'Font Family', 'wp-magazine' ),
        'section'     => 'wp_magazine_news_heading_section',
        'type'        => 'select',
        'choices'     => wp_magazine_google_fonts(),
    ) );

    $wp_customize->add_setting( 'blog_news_title_font_size', array(      
      'default'     => '18px',
      'sanitize_callback' => 'wp_magazine_sanitize_select',
    ) );
    
    $wp_customize->add_control( 'blog_news_title_font_size', array(
        'settings'    => 'blog_news_title_font_size',
        'label'       =>  esc_html__( 'Font Size', 'wp-magazine' ),
        'section'     => 'wp_magazine_news_heading_section',
        'type'        => 'select',
        'default'     => '18px',
        'choices'     =>  wp_magazine_define_font_sizes()
      ) );

    $wp_customize->add_setting( 'blog_news_title_line_height', array(      
      'default'     => '22px',
      'sanitize_callback' => 'wp_magazine_sanitize_select',
    ) );
    
    $wp_customize->add_control( 'blog_news_title_line_height', array(
        'settings'    => 'blog_news_title_line_height',
        'label'       =>  esc_html__( 'Line Height', 'wp-magazine' ),
        'section'     => 'wp_magazine_news_heading_section',
        'type'        => 'select',
        'default'     => '22px',
        'choices'     =>  wp_magazine_define_line_height()
      ) );


    $wp_customize->add_setting( 'blog_news_title_font_weight', array(
        'default'           => 400,
        'sanitize_callback' => 'absint',
        
    ) );

    $wp_customize->add_control( new Wp_Magazine_Slider_Control( $wp_customize, 'blog_news_title_font_weight', array(
        'section' => 'wp_magazine_news_heading_section',
        'settings' => 'blog_news_title_font_weight',
        'label'   => esc_html__( 'Font Weight', 'wp-magazine' ),
        'choices'     => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
    ) ) );


    //Slider News TItle
    $wp_customize->add_setting( 'slider_news_title_fonts_colors_label', array(
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( new Wp_Magazine_Custom_Text( $wp_customize, 'slider_news_title_fonts_colors_label', array(
        'settings'    => 'slider_news_title_fonts_colors_label',
        'label'       =>  '<div class="customizer-custom-label">' . esc_html__( "Slider News Title", 'wp-magazine' ) . '</div>',
        'section'     => 'wp_magazine_news_heading_section',
        'type'        => 'customtext',
    ) ) );

    $wp_customize->add_setting( 'slider_colors', array(
        'default'     => '#1e73be',
        'sanitize_callback' => 'wp_magazine_sanitize_hex_color'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'slider_colors', array(
        'label'      => esc_html__( 'Color', 'wp-magazine' ),
        'section'    => 'wp_magazine_news_heading_section',
        'settings'   => 'slider_colors',
    ) ) );

    $wp_customize->add_setting( 'slider_news_title_font_family', array(
        
        'default'     => 'Playfair Display',
        'sanitize_callback' => 'wp_magazine_sanitize_google_fonts',
    ) );

    $wp_customize->add_control( 'slider_news_title_font_family', array(
        'settings'    => 'slider_news_title_font_family',
        'label'       =>  esc_html__( 'Font Family', 'wp-magazine' ),
        'section'     => 'wp_magazine_news_heading_section',
        'type'        => 'select',
        'choices'     => wp_magazine_google_fonts(),
    ) );

    $wp_customize->add_setting( 'slider_news_title_font_size', array(
      
      'default'     => '14px',
      'sanitize_callback' => 'wp_magazine_sanitize_select',
    ) );
    
    $wp_customize->add_control( 'slider_news_title_font_size', array(
        'settings'    => 'slider_news_title_font_size',
        'label'       =>  esc_html__( 'Font Size', 'wp-magazine' ),
        'section'     => 'wp_magazine_news_heading_section',
        'type'        => 'select',
        'default'     => '13px',
        'choices'     =>  wp_magazine_define_font_sizes()
      ) );

    $wp_customize->add_setting( 'slider_news_title_line_height', array(
      
      'default'     => '14px',
      'sanitize_callback' => 'wp_magazine_sanitize_select',
    ) );
    
    $wp_customize->add_control( 'slider_news_title_line_height', array(
        'settings'    => 'slider_news_title_line_height',
        'label'       =>  esc_html__( 'Line Height', 'wp-magazine' ),
        'section'     => 'wp_magazine_news_heading_section',
        'type'        => 'select',
        'default'     => '13px',
        'choices'     =>  wp_magazine_define_line_height()
      ) );


    $wp_customize->add_setting( 'slider_news_title_font_weight', array(
        'default'           => 500,
        'sanitize_callback' => 'absint',
        
    ) );

    $wp_customize->add_control( new Wp_Magazine_Slider_Control( $wp_customize, 'slider_news_title_font_weight', array(
        'section' => 'wp_magazine_news_heading_section',
        'settings' => 'slider_news_title_font_weight',
        'label'   => esc_html__( 'Font Weight', 'wp-magazine' ),
        'choices'     => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
    ) ) );

    


    

    
}