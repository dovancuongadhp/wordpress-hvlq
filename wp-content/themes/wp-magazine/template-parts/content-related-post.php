<?php
	$related = get_posts( array(
		'category__in' => wp_get_post_categories($args['id']),
		'numberposts' => 3,
		'post__not_in' => array($args['id'])
	) );
?>

<?php if( get_theme_mod( 'show_hide_related_posts', array( 'show' ) ) &&  $related ) { ?>

	<h2><?php echo esc_html( get_theme_mod( 'related_posts_title' ) ); ?></h2>

	<div class="row"> 
		<?php foreach( $related as $post ) { ?>

			<div class="col-sm-4">

				<?php setup_postdata($post); ?>

				<?php get_template_part( 'template-parts/content' ); ?>
			</div>       

		<?php } ?>
	</div>

<?php } wp_reset_postdata();