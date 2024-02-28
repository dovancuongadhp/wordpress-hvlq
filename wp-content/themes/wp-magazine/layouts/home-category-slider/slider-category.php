<?php
  $owl_slider_id = "";

  if( $layout == 7 )
    $owl_slider_id = "-two";

  $layout = absint( $layout - 4 );
?>

<div class="category-post <?php echo esc_attr( $category->slug ); ?>">
  <div class="slider-banner slider-banner-<?php echo esc_attr( $layout ); ?>">
    <?php if( $title ) { ?>
                <div class="section-heading"><?php echo esc_html( $title ); ?></div>
              <?php } ?>
    <div id="owl-slider" class="owl-carousel owl-slider<?php echo esc_attr( $owl_slider_id ); ?> category-layout"> 
      <?php while ( $query->have_posts() ) : $query->the_post(); ?>
          <div class="item">
            <div class="banner-news-list">
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
                <div class="banner-news-image">
                <?php if( ! empty( $image ) ) : ?>
                  <a href="<?php the_permalink(); ?>" rel="bookmark" class="category-image">              
                    <img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="img-responsive">
                  </a>
                <?php endif; ?>
                </div>
                <div class="banner-news-caption">
                  <?php
                    if( in_array( 'categories', $post_details ) ) :
                      $categories = get_the_category();
                      $separator = ' ';
                      $output = '';
                      if ( ! empty( $categories ) ) :
                        foreach ( $categories as $cat ) {
                          $output .= '<span class="category ' . $cat->slug . '"><a class="news-category" href="'. esc_url( get_category_link( $cat->term_id ) ) . '">' . esc_html( $cat->name ) . '</a></span>' . $separator;
                        }
                        echo trim( $output, $separator );
                      endif;
                    endif
                  ?>
                  <h3 class="category-news-title"><a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>"><?php the_title(); ?></a></h3>
                  <?php if( in_array( 'date', $post_details ) ) : ?>
                    <div class="info">
                      <i class="fa fa-clock-o" aria-hidden="true"></i>
                      <?php echo get_the_date(); ?>
                    </div>
                  <?php endif; ?>
                  
                    <div class="summary"> 
                      <?php echo wp_magazine_excerpt( 25 ); ?>
                    </div>
                    
                  <?php if( in_array( 'readmore', $post_details ) ) : ?>
                    <a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>" class="readmore">
                      <?php echo esc_html( get_theme_mod( 'readmore_text', __( 'Read More', 'wp-magazine' ) ) ); ?>
                    </a>
                  <?php endif; ?>
                </div> 
            </div>
          </div>
      <?php endwhile; wp_reset_postdata(); ?>
    </div> 
  </div>
</div>