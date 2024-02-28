<?php if( get_theme_mod( 'pages_display_option', true ) ) : ?>

  <?php $pages = get_theme_mod( 'pages' ); ?>
  <?php if( is_array( $pages ) && ! empty( $pages ) ) : ?>
  <div class="home-pages">
    <div class="container">
    <div class="row">      

        <?php foreach( $pages as $page ) : ?>

          <?php
            if( $page[ 'page' ] == '' ) {
              continue;
            }
          ?>

          <?php
            $page_slug = $page[ 'page' ];
            $page_id = get_page_by_path( $page_slug );
            $post = get_post( $page_id );
            setup_postdata( $post );
          ?>
          <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'medium' ); ?>

          <div class="col-sm-4">
            <div class="home-pages-block">
            <a href="<?php the_permalink(); ?>">
              <?php if( ! empty( $image ) ) : ?> <img src="<?php echo esc_url( $image[0] ); ?>"> <?php endif; ?>
            </a>
            <div class="page-home-summary">
                <h5 class="category"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
            </div>
            </div>
          </div>
          <?php wp_reset_postdata(); ?>

      <?php endforeach; ?>

      </div>
    </div>
  </div>
   <?php endif; ?>
<?php endif;