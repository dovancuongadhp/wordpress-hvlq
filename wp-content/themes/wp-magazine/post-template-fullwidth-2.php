<?php
/**
 * Template Name: Fullwidth 2
 * Template Post Type: post
 * The template used for displaying fullwidth page content in fullwidth.php
 *
 * @package Wp Magazine
 */
get_header(); ?>
<div class="inside-page full-width-2">
	<section class="page-section">		          
		<div class="detail-content">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php $post_details = get_theme_mod( 'detail_post_show_hide_details', array( 'image', 'date', 'categories', 'tags' ) ); ?>
				<div class="single-post">
					<div class="post-content">
						<div class="image-title-overlay">
							<div class="post-title-overlay">
								<div class="container">
									<div class="post-title-wrapper">
										<h1 class="page-title"><?php the_title(); ?></h1>
										<!-- info -->
										<?php if( is_array( $post_details ) && ! empty( $post_details ) ) : ?>
											<div class="info-social-wrap">
												<ul class="list-inline">
													<?php if( in_array( 'author', $post_details ) ) { ?>
														<li>
															<a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
																<?php $avatar = get_avatar( get_the_author_meta( 'ID' ), $size = 60 ); ?>
																<?php if( $avatar ) : ?>
																	<div class="author-image"> 
																		<?php echo $avatar; ?>
																	</div>
																<?php endif; ?>
																<?php echo esc_html( get_the_author() ); ?>
															</a>
														</li>
													<?php } ?>

													<?php if( in_array( 'date', $post_details ) ) { ?>
														<?php $archive_year  = get_the_time('Y'); $archive_month = get_the_time('m'); $archive_day = get_the_time('d'); ?>
														<li><i class="fa fa-clock-o"></i> <a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ); ?>"><?php echo get_the_date(); ?></a></li>
													<?php } ?>

													<?php if( in_array( 'categories', $post_details ) ) { ?>
														<li>
															<?php $categories = get_the_category();
															if( ! empty( $categories ) ) :
															foreach ( $categories as $cat ) { ?>
																<span class="category"><a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"><?php echo esc_html( $cat->name ); ?></a></span>
															<?php }
															endif; ?>
														</li>
													<?php } ?>

													<?php if( in_array( 'tags', $post_details ) ) { ?>
														<?php $tags = get_the_tags();
														if( ! empty( $tags ) ) :
															foreach ( $tags as $tag ) { ?>
																<li><a href="<?php echo esc_url( get_category_link( $tag->term_id ) ); ?>"><?php echo esc_html( $tag->name ); ?></a></li>
															<?php }
														endif; ?>
													<?php } ?>


													<?php if( in_array( 'number_of_comments', $post_details ) ) { ?>
														<li><i class="fa fa-comments-o"></i> <?php comments_popup_link( __( 'zero comment', 'wp-magazine' ), __( 'one comment', 'wp-magazine' ), __( '% comments', 'wp-magazine' ) ); ?></li>
													<?php } ?>

												</ul>
												<?php wp_magazine_share_buttons(); ?>
											</div>
										<?php endif; ?>
									<!-- info -->
									</div>
								</div>

							</div>
						</div>

						<?php if( is_array( $post_details ) && ! empty( $post_details ) ) { ?>

							<?php if ( in_array( 'image', $post_details ) && has_post_thumbnail() ) { ?>
								<figure class="feature-image">
									<?php the_post_thumbnail( 'full' ); ?>
								</figure>      
							<?php }
						} ?>

						<div class="container">
							<article>
								<?php the_content(); ?>
								<?php
									wp_link_pages( array(
										'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-magazine' ),
										'after'  => '</div>',
									) );
								?>     
							</article>
						</div>

					</div>

					<div class="container">
						<?php $author_block = get_theme_mod( 'show_hide_author_block_details', 'author' ); ?>

						<?php if( is_array( $author_block ) && in_array( 'author', $author_block ) ) : ?>
							<div class="author-post clearfix">
								<?php $avatar = get_avatar( get_the_author_meta( 'ID' ), $size = 75 ); ?>
								<?php if( $avatar ) : ?>
									<div class="author-image"> 
										<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo $avatar; ?></a>
									</div>
								<?php endif; ?>
								<div class="author-details">
									<h4><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></h4>
									<p><?php echo esc_html( get_the_author_meta('description') ); ?></p>
								</div>
							</div>
						<?php endif; ?>

					</div>
				</div>


			<?php endwhile; // End of the loop. ?>
			<div class="container">
				<?php comments_template(); ?>

				<?php get_template_part( 'template-parts/content', 'related-post', array( 'id' => $post->ID ) ); ?>
				
			</div>
		</div> <!-- /.end of detail-content -->		  
	</section><!-- /.end of section -->
</div>


<?php get_footer();