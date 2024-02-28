<?php
/**
 * Category Display Settings
 *
 * @package WP Magazine
 */


add_action( 'customize_register', 'wp_magazine_customize_register_category_display' );

function wp_magazine_customize_register_category_display( $wp_customize ) {
	$wp_customize->add_section( 'wp_magazine_category_display_sections', array(
	    'title'          => esc_html__( 'Category Display Section', 'wp-magazine' ),
	    'description'    => esc_html__( 'Category Display Section :', 'wp-magazine' ),
	    'panel'          => 'wp_magazine_theme_options_panel',
	) );

    $wp_customize->add_setting( 'category_display_option', array(
      'sanitize_callback'     =>  'wp_magazine_sanitize_checkbox',
      'default'               =>  true
    ) );

    $wp_customize->add_control( new Wp_Magazine_Toggle_Control( $wp_customize, 'category_display_option', array(
      'label' => esc_html__( 'Hide / Show','wp-magazine' ),
      'section' => 'wp_magazine_category_display_sections',
      'settings' => 'category_display_option',
      'type'=> 'toggle',
    ) ) );

    $wp_customize->selective_refresh->add_partial( 'category_display_option', array(
        'selector' => '.category-post',
    ) );


    $wp_customize->add_setting( new Wp_Magazine_Repeater_Setting( $wp_customize, 'category_display_block', array(
    'sanitize_callback' => array( 'Wp_Magazine_Repeater_Setting', 'sanitize_repeater_setting' ),
    ) ) );

    $wp_customize->add_control( new Wp_Magazine_Control_Repeater( $wp_customize, 'category_display_block', array(
      'label' => esc_html__( 'Categories :','wp-magazine' ),
      'section' => 'wp_magazine_category_display_sections',
      'settings' => 'category_display_block',
      'type'=> 'repeater',
      'row_label' => array(
        'type'  => 'field',
        'value' => esc_attr__( 'Category', 'wp-magazine' ),
        'field' => 'category_block_title',
      ),
      'fields' => array(
        'category_block_title' => array(
          'type'        => 'text',
          'label'       => esc_attr__( 'Title', 'wp-magazine' ),
          'description' => esc_attr__( 'This will be the label.', 'wp-magazine' ),
          'default'     => '',
        ),
        'category' => array(
          'type'        => 'select',
          'label'       => esc_attr__( 'Category', 'wp-magazine' ),
          'choices'     => wp_magazine_get_dropdown_categories(),
          'default' => 1
        ),
        'number_of_posts' => array(
          'type'        => 'text',
          'label'       => esc_attr__( 'Number of posts', 'wp-magazine' ),
          'description' =>  esc_attr__( 'Put -1 for unlimited', 'wp-magazine' )
        ),

        'layout' => array(
          'type'      => 'select',
          'default'   =>  '1',
          'label'     => esc_attr__( 'Layouts', 'wp-magazine' ),
          'choices'   => array(
              '1' => 'Layout 1',
              '2' => 'Layout 2',
              '3' => 'Layout 3',
              '4' => 'Layout 4',
              '5' => 'Layout 5',
              '6' => 'Layout 6',
              '7' => 'Layout 7',
          )
        ),
             
      )

    ) ) );

    $wp_customize->add_setting( 'category_display_show_hide_details', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'wp_magazine_sanitize_array',
        'default'     => array( 'date', 'categories', 'tags' ),
    ) );

    $wp_customize->add_control( new Wp_Magazine_Multi_Check_Control( $wp_customize, 'category_display_show_hide_details', array(
        'label' => esc_html__( 'Hide / Show :', 'wp-magazine' ),
        'section' => 'wp_magazine_category_display_sections',
        'settings' => 'category_display_show_hide_details',
        'type'=> 'multi-check',
        'choices'     => array(
            'sidebar' => esc_html__( 'Show Sidebar', 'wp-magazine' ),
            'author' => esc_html__( 'Show post author', 'wp-magazine' ),
            'date' => esc_html__( 'Show post date', 'wp-magazine' ),     
            'categories' => esc_html__( 'Show Categories', 'wp-magazine' ),
            'tags' => esc_html__( 'Show Tags', 'wp-magazine' ),
            'number_of_comments' => esc_html__( 'Show number of comments', 'wp-magazine' ),
            'read-more'   =>  esc_html__( 'Show Read More', 'wp-magazine' ),
        ),
    ) ) );
    

}