<?php
/**
 * Blog List Settings
 *
 * @package WP Magazine
 */


add_action( 'customize_register', 'wp_magazine_customize_blog_list_option' );

function wp_magazine_customize_blog_list_option( $wp_customize ) {

    $wp_customize->add_section( 'wp_magazine_blog_list_section', array(
        'title'          => esc_html__( 'Blog Options', 'wp-magazine' ),
        'priority' => 6
    ) );

    $wp_customize->add_setting( 'homepage_blog_post_title_text', array(
        'sanitize_callback' =>  'wp_kses_post',        
    ) );

    $wp_customize->add_control( new Wp_Magazine_Custom_Text( $wp_customize, 'homepage_blog_post_title_text', array(
        'label' =>  '<div class="customizer-custom-label">' . esc_html__( "Home Blog Section Options:", 'wp-magazine' ) . '</div>',
        'section'   =>  'wp_magazine_blog_list_section',
        'Settings'  =>  'homepage_blog_post_title_text'
    ) ) );

    $wp_customize->selective_refresh->add_partial( 'homepage_blog_post_title_text', array(
        'selector' => '.home-blog-area #main-content',
    ) );

    $wp_customize->add_setting( 'homepage_blog_display_option', array(
      'sanitize_callback'     =>  'wp_magazine_sanitize_checkbox',
      'default'               =>  true
    ) );

    $wp_customize->add_control( new Wp_Magazine_Toggle_Control( $wp_customize, 'homepage_blog_display_option', array(
      'label' => esc_html__( 'Hide / Show','wp-magazine' ),
      'section' => 'wp_magazine_blog_list_section',
      'settings' => 'homepage_blog_display_option',
      'type'=> 'toggle',
    ) ) );

    $wp_customize->add_setting( 'homepage_blog_section_title', array(
        'sanitize_callback'     =>  'sanitize_text_field',
        'default'               =>  ''
    ) );

    $wp_customize->add_control( 'homepage_blog_section_title', array(
        'label' => esc_html__( 'Title', 'wp-magazine' ),
        'section' => 'wp_magazine_blog_list_section',
        'settings' => 'homepage_blog_section_title',
        'type'=> 'text',
    ) );

    $wp_customize->add_setting( 'homepage_blog_section_category', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'wp_magazine_sanitize_category',
    ) );

    $wp_customize->add_control( new Wp_Magazine_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'homepage_blog_section_category', array(
        'label' => esc_html__( 'Choose Category', 'wp-magazine' ),
        'section' => 'wp_magazine_blog_list_section',
        'settings' => 'homepage_blog_section_category',
        'type' => 'dropdown-taxonomies',
    ) ) );

    $wp_customize->add_setting( 'homepage_blog_section_number_of_posts', array(
        'sanitize_callback'     =>  'sanitize_text_field',
        'default'               =>  get_option( 'posts_per_page' )
    ) );

    $wp_customize->add_control( 'homepage_blog_section_number_of_posts', array(
        'label' => esc_html__( 'Numbere of Posts', 'wp-magazine' ),
        'section' => 'wp_magazine_blog_list_section',
        'settings' => 'homepage_blog_section_number_of_posts',
        'type'=> 'text',        
        'description'   =>  'put -1 for unlimited'
    ) );

    $wp_customize->add_setting( 'blog_post_list_options_title_text', array(
        'sanitize_callback' =>  'wp_kses_post',        
    ) );

    $wp_customize->add_control( new Wp_Magazine_Custom_Text( $wp_customize, 'blog_post_list_options_title_text', array(
        'label' =>  '<div class="customizer-custom-label">' . esc_html__( "Blog List Options:", 'wp-magazine' ) . '</div>',
        'section'   =>  'wp_magazine_blog_list_section',
        'Settings'  =>  'blog_post_list_options_title_text'
    ) ) );

    $wp_customize->add_setting( 'blog_post_layout', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'wp_magazine_sanitize_choices',
        'default'     => 'sidebar-right',
    ) );

    $wp_customize->add_control( new Wp_Magazine_Radio_Buttonset_Control( $wp_customize, 'blog_post_layout', array(
        'label' => esc_html__( 'Layouts :', 'wp-magazine' ),
        'section' => 'wp_magazine_blog_list_section',
        'settings' => 'blog_post_layout',
        'type'=> 'radio-buttonset',
        'choices'     => array(
            'sidebar-left' => esc_html__( 'Sidebar at left', 'wp-magazine' ),
            'no-sidebar'    =>  esc_html__( 'No sidebar', 'wp-magazine' ),
            'sidebar-right' => esc_html__( 'Sidebar at right', 'wp-magazine' ),            
        ),
    ) ) );


    $wp_customize->add_setting( 'blog_post_view', array(
        'transport'  => 'postMessage',        
        'sanitize_callback' => 'wp_magazine_sanitize_choices',
        'default'     => 'grid-view',
    ) );

    $wp_customize->add_control( new Wp_Magazine_Radio_Buttonset_Control( $wp_customize, 'blog_post_view', array(
        'label' => esc_html__( 'Post View :', 'wp-magazine' ),
        'section' => 'wp_magazine_blog_list_section',
        'settings' => 'blog_post_view',
        'type'=> 'radio-buttonset',
        'choices'     => array(
            'grid-view' => esc_html__( 'Grid View', 'wp-magazine' ),
            'list-view' => esc_html__( 'List View', 'wp-magazine' ),
            'full-width-view' => esc_html__( 'Fullwidth View', 'wp-magazine' ),
            'grid-view three' => esc_html__( '3 Column Grid', 'wp-magazine' ),
        ),
    ) ) );


    $wp_customize->add_setting( 'blog_post_show_hide_details', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'wp_magazine_sanitize_array',
        'default'     => array( 'date', 'categories', 'tags' ),
    ) );

    $wp_customize->add_control( new Wp_Magazine_Multi_Check_Control( $wp_customize, 'blog_post_show_hide_details', array(
        'label' => esc_html__( 'Hide / Show Details', 'wp-magazine' ),
        'section' => 'wp_magazine_blog_list_section',
        'settings' => 'blog_post_show_hide_details',
        'type'=> 'multi-check',
        'choices'     => array(
            'author' => esc_html__( 'Show post author', 'wp-magazine' ),
            'date' => esc_html__( 'Show post date', 'wp-magazine' ),     
            'categories' => esc_html__( 'Show Categories', 'wp-magazine' ),
            'tags' => esc_html__( 'Show Tags', 'wp-magazine' ),
            'number_of_comments' => esc_html__( 'Show number of comments', 'wp-magazine' ),
        ),
    ) ) );


    $wp_customize->add_setting( 'post_details_title_text', array(
        'sanitize_callback' =>  'wp_kses_post',        
    ) );

    $wp_customize->add_control( new Wp_Magazine_Custom_Text( $wp_customize, 'post_details_title_text', array(
        'label' =>  '<div class="customizer-custom-label">' . esc_html__( "Detail Page Options:", 'wp-magazine' ) . '</div>',
        'section'   =>  'wp_magazine_blog_list_section',
        'Settings'  =>  'post_details_title_text'
    ) ) );


    $wp_customize->add_setting( 'detail_post_show_hide_details', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'wp_magazine_sanitize_array',
        'default'     => array( 'image', 'date', 'categories', 'tags' ),
    ) );

    $wp_customize->add_control( new Wp_Magazine_Multi_Check_Control( $wp_customize, 'detail_post_show_hide_details', array(
        'label' => esc_html__( 'Hide / Show Details', 'wp-magazine' ),
        'section' => 'wp_magazine_blog_list_section',
        'settings' => 'detail_post_show_hide_details',
        'type'=> 'multi-check',
        'choices'     => array(
            'image' => esc_html__( 'Show Featured Image', 'wp-magazine' ),
            'author' => esc_html__( 'Show post author', 'wp-magazine' ),
            'date' => esc_html__( 'Show post date', 'wp-magazine' ),     
            'categories' => esc_html__( 'Show Categories', 'wp-magazine' ),
            'tags' => esc_html__( 'Show Tags', 'wp-magazine' ),
            'number_of_comments' => esc_html__( 'Show number of comments', 'wp-magazine' ),
        ),
    ) ) );


    $wp_customize->add_setting( 'show_hide_author_block_details', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'wp_magazine_sanitize_array',
        'default'     => array( 'author' ),
    ) );

    $wp_customize->add_control( new Wp_Magazine_Multi_Check_Control( $wp_customize, 'show_hide_author_block_details', array(
        'label' => esc_html__( 'Author Block', 'wp-magazine' ),
        'section' => 'wp_magazine_blog_list_section',
        'settings' => 'show_hide_author_block_details',
        'type'=> 'multi-check',
        'choices'     => array(
            'author' => esc_html__( 'Show author block', 'wp-magazine' ),
        ),
    ) ) );

    $wp_customize->add_setting( 'show_hide_related_posts', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'wp_magazine_sanitize_array',
        'default'     => array( 'show' ),
    ) );

    $wp_customize->add_control( new Wp_Magazine_Multi_Check_Control( $wp_customize, 'show_hide_related_posts', array(
        'label' => esc_html__( 'Related Articles', 'wp-magazine' ),
        'section' => 'wp_magazine_blog_list_section',
        'settings' => 'show_hide_related_posts',
        'type'=> 'multi-check',
        'choices'     => array(
            'show' => esc_html__( 'Show Related Articles', 'wp-magazine' ),
        ),
    ) ) );

    $wp_customize->add_setting( 'related_posts_title', array(
        'sanitize_callback'     =>  'sanitize_text_field',
        'default'               =>  ''
    ) );

    $wp_customize->add_control( 'related_posts_title', array(
        'label' => esc_html__( 'Related Articles Title', 'wp-magazine' ),
        'section' => 'wp_magazine_blog_list_section',
        'settings' => 'related_posts_title',
        'type'=> 'text',
    ) );
}