<?php
/**
 * Template Name: No Featured Image
 * Template Post Type: post
 *
 * @package Wp Magazine
 */
get_header(); ?>
<div class="inside-page">
	<div class="container">
		<section class="page-section">		          
		      <div class="detail-content">	

	              <?php while ( have_posts() ) : the_post(); ?>
	                  <?php get_template_part( 'template-parts/content', 'single', array( 'display_featured_image' => false ) ); ?>
	              <?php endwhile; // End of the loop. ?>

	              <?php comments_template(); ?>

	              <?php get_template_part( 'template-parts/content', 'related-post', array( 'id' => $post->ID ) ); ?>

	          </div> <!-- /.end of detail-content -->		  
		</section><!-- /.end of section -->
	</div>
</div>
<?php get_footer();