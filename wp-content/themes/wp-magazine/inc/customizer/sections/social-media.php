<?php
/**
 * Social Media Sections
 *
 * @package Wp Magazine
 */
add_action( 'customize_register', 'wp_magazine_social_media_sections' );

function wp_magazine_social_media_sections( $wp_customize ) {

	$wp_customize->add_section( 'wp_magazine_social_media_sections', array(
	    'title'          => esc_html__( 'Social Media', 'wp-magazine' ),
	    'priority'       => 5,
	) );

	$wp_customize->add_setting( new Wp_Magazine_Repeater_Setting( $wp_customize, 'wp_magazine_social_media', array(
        'default'     => '',
		'sanitize_callback' => array( 'Wp_Magazine_Repeater_Setting', 'sanitize_repeater_setting' ),
    ) ) );
    
    $wp_customize->add_control( new Wp_Magazine_Control_Repeater( $wp_customize, 'wp_magazine_social_media', array(
		'section' => 'wp_magazine_social_media_sections',
		'settings'    => 'wp_magazine_social_media',
		'label'	  => esc_html__( 'Social Links', 'wp-magazine' ),
		'fields' => array(
			'social_media_title' => array(
				'type'        => 'select',
				'label'       => esc_html__( 'Social Media Title', 'wp-magazine' ),
				'choices'	=> array(
					'Select'	=> '',
					'Facebook'	=> esc_html__( 'Facebook', 'wp-magazine' ),
					'Linkedin'	=> esc_html__( 'Linkedin', 'wp-magazine' ),
					'Instagram'	=> esc_html__( 'Instagram', 'wp-magazine' ),
					'Twitter'	=> esc_html__( 'Twitter', 'wp-magazine' ),
					'Pinterest'	=> esc_html__( 'Pinterest', 'wp-magazine' ),
					'Youtube-Play'	=> esc_html__( 'Youtube', 'wp-magazine' ),
				)
			),
			'social_media_link' => array(
				'type'      => 'url',
				'label'     => esc_html__( 'Social Media Links', 'wp-magazine' ),
		        'default'   => '',
			),			
		),
        'row_label' => array(
			'type'  => 'field',
			'value' => esc_html__('Social Media', 'wp-magazine' ),
			'field' => 'social_media_title',
		),                        
	) ) );

	$wp_customize->selective_refresh->add_partial( 'wp_magazine_social_media', array(
		'selector' => '.social-icons',
	) );


	$wp_customize->add_setting( 'wp_magazine_social_share', array(
        'sanitize_callback' => 'wp_magazine_sanitize_array',
        'default'     => ''
    ) );

    $wp_customize->add_control( new Wp_Magazine_Multi_Check_Control( $wp_customize, 'wp_magazine_social_share', array(
        'label' => esc_html__( 'Social Shares', 'wp-magazine' ),
        'section' => 'wp_magazine_social_media_sections',
        'settings' => 'wp_magazine_social_share',
        'type'=> 'multi-check',
        'choices'     => array(
            'facebook' => esc_html__( 'Facebook', 'wp-magazine' ),
            'twitter' => esc_html__( 'Twitter', 'wp-magazine' ),     
            'pinterest' => esc_html__( 'Pinterest', 'wp-magazine' ),
            'linkedin' => esc_html__( 'LinkedIn', 'wp-magazine' ),
            'email' => esc_html__( 'Email', 'wp-magazine' ),
        ),
    ) ) );

    $wp_customize->add_setting( 'twitter_id', array(
        'sanitize_callback' =>  'wp_kses_post',
    ) );

    $wp_customize->add_control( 'twitter_id', array(
        'label' =>  esc_html__( 'Twitter ID:', 'wp-magazine' ),
        'section'   =>  'wp_magazine_social_media_sections',
        'Settings'  =>  'twitter_id',
        'type'=> 'text',
    ) );
	
}