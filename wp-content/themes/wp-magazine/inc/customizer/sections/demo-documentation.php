<?php

/**
 * Wp Magazine Pro Theme Info
 *
 * @package WP Magazine
 */
function wp_magazine_customizer_theme_info( $wp_customize )
{
    $description = esc_html__( 'Do more with WP Magazine WordPress Theme.', 'wp-magazine' );
    $wp_customize->add_section( 'theme_info', array(
        'title'    => esc_html__( 'Demo and Documentation', 'wp-magazine' ),
        'priority' => 1,
    ) );
    $wp_customize->add_setting( 'setup_instruction', array(
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( new Wp_Magazine_Custom_Text( $wp_customize, 'setup_instruction', array(
        'settings'    => 'setup_instruction',
        'section'     => 'theme_info',
        'description' => $description,
    ) ) );
    $wp_customize->add_setting( 'theme_info_theme', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $theme_info = '';
    $theme_info .= '<span class="sticky_info_row wp-clearfix"><label class="row-element">' . esc_html__( 'Theme Details', 'wp-magazine' ) . ': </label><a class="button alignright" href="' . esc_url( 'https://wpmagplus.com/free-wp-magazine-theme/' ) . '" target="_blank">' . esc_html__( 'Click Here', 'wp-magazine' ) . '</a></span><hr>';
    $theme_info .= '<span class="sticky_info_row wp-clearfix"><label class="row-element">' . esc_html__( 'How to use', 'wp-magazine' ) . ': </label><a class="button alignright" href="' . esc_url( 'https://wpmagplus.com/docs' ) . '" target="_blank">' . esc_html__( 'Click Here', 'wp-magazine' ) . '</a></span><hr>';
    $theme_info .= '<span class="sticky_info_row wp-clearfix"><label class="row-element">' . esc_html__( 'View Demo', 'wp-magazine' ) . ': </label><a class="button alignright" href="' . esc_url( 'https://wpmagplus.com/starter-demos/' ) . '" target="_blank">' . esc_html__( 'Click Here', 'wp-magazine' ) . '</a></span><hr>';
    $theme_info .= '<span class="sticky_info_row wp-clearfix"><label class="row-element">' . esc_html__( 'Support Forum', 'wp-magazine' ) . ': </label><a class="button alignright" href="' . esc_url( 'https://wordpress.org/support/theme/wp-magazine' ) . '" target="_blank">' . esc_html__( 'Click Here', 'wp-magazine' ) . '</a></span><hr>';
    $theme_info .= '<div class="premium-info"><h2>' . esc_html__( 'Premium Version', 'wp-magazine' ) . ': </h2>
	<p>If you are looking for more features layouts, slider layout options, CTA layouts, Start Demos, whitelabeling, premium support and more, then you can check the pro version of the theme.</p>
<ul>
<li><span class="dashicons dashicons-yes"></span> 6 Free Starter Demo</li>
<li><span class="dashicons dashicons-yes"></span> 30 Premium Starter Demo</li>
<li><span class="dashicons dashicons-yes"></span> One Click Demo Import</li>
<li><span class="dashicons dashicons-yes"></span> All Google Fonts</li>
<li><span class="dashicons dashicons-yes"></span> Multiple Color Options</li>
<li><span class="dashicons dashicons-yes"></span> Edit Footer Copyright Info</li>
<li><span class="dashicons dashicons-yes"></span> Multiple Header Layouts</li>
<li><span class="dashicons dashicons-yes"></span> Multiple Featured News Layouts</li>
<li><span class="dashicons dashicons-yes"></span> Multiple Slider News Layouts</li>
<li><span class="dashicons dashicons-yes"></span> Multiple CTA Section Layouts</li>
<li><span class="dashicons dashicons-yes"></span> Google Ads Placement</li>
<li><span class="dashicons dashicons-yes"></span> Premium Support</li>
<ul>
<hr>

	<a class="button button-primary" href="' . esc_url( 'https://wpmagplus.com/wp-magazine-plus/' ) . '" target="_blank">' . esc_html__( 'Upgrade to Pro', 'wp-magazine' ) . '</a></div>';
    $theme_info .= '<a target="_blank" class="button button-primary button-large" href="' . esc_url( "https://wpmagplus.com/wp-magazine-plus/" ) . '">' . esc_html__( 'Explore Premium Features', 'wp-magazine' ) . '</a>';
    $wp_customize->add_control( new Wp_Magazine_Custom_Text( $wp_customize, 'theme_info_theme', array(
        'section' => 'theme_info',
        'label'   => $theme_info,
    ) ) );
}

add_action( 'customize_register', 'wp_magazine_customizer_theme_info' );