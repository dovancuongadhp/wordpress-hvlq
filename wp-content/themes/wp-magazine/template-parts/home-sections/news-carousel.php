<?php

if( get_theme_mod( 'theme_news_carousel_display_option', true ) ) : ?>

	<div class="news-carousel-wrapper">

		<?php
			$category_id = get_theme_mod( 'theme_news_carousel_category' );
			$title = get_theme_mod( 'news_carousel_title' );
			$posts_per_page = get_theme_mod( 'number_of_news_carousel_posts', 5 );
			$layout = get_theme_mod( 'wp_magazine_news_carousel_layouts', 'one' );	

			$args = array(
				'cat' => absint( $category_id ),
				'posts_per_page' => $posts_per_page,
				'ignore_sticky_posts' => 1
			);
			$query = new WP_Query( $args );

			if( $query->have_posts() && $posts_per_page ) { ?>
				<div>
					<?php
						set_query_var( 'query', $query );
						set_query_var( 'title', $title );

						if( $layout == 'one' ) {
							get_template_part( 'layouts/news-carousel/layout', 'one' );
						}
						if( $layout == 'two' ) {
							get_template_part( 'layouts/news-carousel/layout', 'two' );
						}
						if( $layout == 'three' ) {
							get_template_part( 'layouts/news-carousel/layout', 'three' );
						}
						if( $layout == 'four' ) {
							get_template_part( 'layouts/news-carousel/layout', 'four' );
						}
					?>
				</div>
			<?php } wp_reset_postdata();
		?>
	</div>


<?php endif;