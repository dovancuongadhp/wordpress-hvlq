<?php // Template Name: Home ?>

<?php

get_header();

$sidebar_position = get_theme_mod( 'blog_post_layout', 'sidebar-right' );
$width_class = 'col-sm-9';

if( $sidebar_position == 'no-sidebar' ) {
	$width_class = 'col-sm-12';
}



$default = array( 'featured-news', 'category-news', 'pages', 'cta', 'blog-posts', 'news-carousel' );

$sections = get_theme_mod( 'wp_magazine_sort_homepage', $default );

?>

<div id="content" class="layout-<?php echo esc_attr( get_theme_mod( 'section_heading_title_styles', '1' ) ); ?>">
	<?php
	if ( ! empty( $sections ) && is_array( $sections ) ) :

		foreach ( $sections as $section ) {

			set_query_var( 'sidebar_position', $sidebar_position );
	        set_query_var( 'width_class', $width_class );

			get_template_part( 'template-parts/home-sections/' . $section, $section );
		
		}

	endif;
	?>
</div>

<?php get_footer();