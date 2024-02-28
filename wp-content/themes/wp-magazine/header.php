<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <header>
 *
 * @package Wp Magazine
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="<?php echo esc_url( 'http://gmpg.org/xfn/11' ); ?>">
	<?php if( is_singular() && pings_open( get_queried_object() ) ) { ?>
		<link rel="pingback" href="<?php esc_url( bloginfo( 'pingback_url' ) ); ?>">
	<?php } ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-magazine' ); ?></a>

<?php $menu_sticky = get_theme_mod( 'wp_magazine_header_sticky_menu_option', true ); ?>


<?php
	set_query_var( 'menu_sticky', $menu_sticky );

	$layout = get_theme_mod( 'wp_magazine_header_layouts', 'two' );
    if( $layout == 'one' ) {
		get_template_part( 'layouts/header/header-layout', 'one' );
	}
	if( $layout == 'two' ) {
		get_template_part( 'layouts/header/header-layout', 'two' );
	}
	if( $layout == 'three' ) {
		get_template_part( 'layouts/header/header-layout', 'three' );
	}
	if( $layout == 'four' ) {
		get_template_part( 'layouts/header/header-layout', 'four' );
	}

	get_template_part( 'template-parts/home-sections/headline', '' );
	
?>


<?php if ( class_exists( 'Breadcrumb_Trail' ) && ! is_home() && ! is_front_page() ) : ?>               
	<div class="breadcrumbs">
		<div class="container"><?php breadcrumb_trail(); ?></div>
	</div>
<?php endif; ?>

<div id="heading">
  <div id="scroll_container">
    <div id="horizontal_scroll"></div>
  </div>
</div>