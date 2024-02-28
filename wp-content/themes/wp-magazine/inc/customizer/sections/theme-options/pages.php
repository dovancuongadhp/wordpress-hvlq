<?php
/**
 * Pages Settings
 *
 * @package WP Magazine
 */
add_action( 'customize_register', 'wp_magazine_customize_register_pages_section' );

function wp_magazine_customize_register_pages_section( $wp_customize ) {

  $wp_customize->add_section( 'wp_magazine_pages_sections', array(
    'title'          => esc_html__( 'Pages Section', 'wp-magazine' ),
    'description'    => esc_html__( 'Pages section :', 'wp-magazine' ),
    'panel'          => 'wp_magazine_theme_options_panel',
  ) );

  $wp_customize->add_setting( 'pages_display_option', array(
      'sanitize_callback'     =>  'wp_magazine_sanitize_checkbox',
      'default'               =>  true
  ) );

  $wp_customize->add_control( new Wp_Magazine_Toggle_Control( $wp_customize, 'pages_display_option', array(
      'label' => esc_html__( 'Hide / Show','wp-magazine' ),
      'section' => 'wp_magazine_pages_sections',
      'settings' => 'pages_display_option',
      'type'=> 'toggle',
  ) ) );

  $wp_customize->selective_refresh->add_partial( 'pages_display_option', array(
    'selector' => '.home-pages .container',
  ) );

  $wp_customize->add_setting( new Wp_Magazine_Repeater_Setting( $wp_customize, 'pages', array(
    'default' => '',
    'sanitize_callback' => array( 'Wp_Magazine_Repeater_Setting', 'sanitize_repeater_setting' ),
  ) ) );

  $page_query = get_pages();
  $pages = array();
  $pages[ '' ] = esc_attr__( "-- Select --", 'wp-magazine' );
  foreach ( $page_query as $page ) {
    $pages[ $page->post_name ] = $page->post_title;
  }
  
    
  $wp_customize->add_control( new Wp_Magazine_Control_Repeater( $wp_customize, 'pages', array(
    'section' => 'wp_magazine_pages_sections',
    'settings'    => 'pages',
    'label'   => esc_html__( 'Pages :', 'wp-magazine' ),
    'row_label' => array(
      'type' => 'text',
      'value' => esc_html__( 'Page', 'wp-magazine' ),
    ),
    'button_label' => esc_attr__( 'New Page', 'wp-magazine' ),
    'fields' => array(
      'page' => array(
        'type'        => 'select',
        'default'     => '',
        'label'       => esc_html__( 'Select a page', 'wp-magazine' ),
        'choices' => $pages
      )
    )                   
  ) ) );


  $wp_customize->add_setting( 'pages_bg_color', array(
      'default'     => '#ecfbff',
      'sanitize_callback' => 'wp_magazine_sanitize_hex_color'
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pages_bg_color', array(
      'label'      => esc_html__( 'Background Color', 'wp-magazine' ),
      'section'    => 'wp_magazine_pages_sections',
      'settings'   => 'pages_bg_color',
  ) ) );

}