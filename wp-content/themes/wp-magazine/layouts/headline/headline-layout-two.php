<div class="headline-ticker-2">
	<div class="container">
		<div class="headline-ticker-wrapper">
			<?php if( $title ) : ?><div class="headline-heading"><?php echo esc_html( $title ); ?></div><?php endif; ?>
			<div class="headline-wrapper">
			<div id="owl-heading-2" class="owl-carousel" >
			<?php while( $query->have_posts() ) : $query->the_post(); ?> 
				<div class="item">
					
					<div class="headline-content">
						<small><?php echo get_the_date(); ?></small> 
						<h4 class="headline-news-title"><a href="<?php the_permalink(); ?>" class="heading-title"><?php the_title(); ?></a></h4>
					</div>
				</div>
			<?php endwhile; wp_reset_postdata(); ?>
				
			</div>
			</div>
		</div>
	</div>
</div>