<?php
/**
 * Wp Magazine Pro Theme Info
 *
 * @package WP Magazine
 */

function wp_magazine_customizer_upgrade_to_pro( $wp_customize ) {

	$wp_customize->add_section( new Wp_Magazine_Customize_Section_Pro_Control( $wp_customize, 'upgrade-to-pro',	array(
			'title'    => esc_html__( 'WP Magazine Plus', 'wp-magazine' ),
			'type'	=> 'upgrade-to-pro',
			'pro_text' => esc_html__( 'Upgrade to Pro', 'wp-magazine' ),
			'pro_url'  => esc_url( 'https://wpmagplus.com/wp-magazine-plus/' ),
			'priority' => 1
		) )	);

	
}
add_action( 'customize_register', 'wp_magazine_customizer_upgrade_to_pro' );