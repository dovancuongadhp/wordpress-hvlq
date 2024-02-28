<div class="headline-ticker">
<?php
	if( get_theme_mod( 'theme_headline_display_option', false ) ) {
			
		$homepage_id = get_option( 'page_on_front' );
		global $wp_query;
		$page_id = $wp_query->post->ID;
		$show_on_pages = get_theme_mod( 'headline_show_on_pages_option', 'show_on_all' );

		if( $show_on_pages == 'show_on_home' ) {

			if( $homepage_id == $page_id ) {
				wp_magazine_get_headline();
			}
			
		}
		else {
			wp_magazine_get_headline();
			
		}
	}
?>
</div>