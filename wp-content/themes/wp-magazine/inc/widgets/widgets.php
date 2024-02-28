<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */


function wp_magazine_widgets_init() {
		
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar Right', 'wp-magazine' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="section-heading">',
		'after_title'   => '</div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar Left', 'wp-magazine' ),
		'id'            => 'sidebar-left',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="section-heading">',
		'after_title'   => '</div>',
	) );


	register_sidebar( array(
		'name'          => esc_html__( 'Category Sidebar', 'wp-magazine' ),
		'id'            => 'category-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="section-heading">',
		'after_title'   => '</div>',
	) );

	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'wp-magazine' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="section-heading">',
		'after_title'   => '</div>',
	) );


	if ( class_exists( 'WooCommerce' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'WooCommerce Sidebar', 'wp-magazine' ),
			'id'            => 'woocommerce_sidebar',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<div class="section-heading">',
			'after_title'   => '</div>',
		) );
	}
	
}
add_action( 'widgets_init', 'wp_magazine_widgets_init' );