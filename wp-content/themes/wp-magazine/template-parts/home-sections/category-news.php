<?php
  $category_display = get_theme_mod( 'category_display_option', true );
  $category_repeater = get_theme_mod( 'category_display_block', 0 );  
  $post_details = get_theme_mod( 'category_display_show_hide_details', array( 'date', 'categories', 'tags' ) );

  $col_class = 'col-sm-12';
  if( in_array( 'sidebar', $post_details ) ) {
    $col_class = 'col-sm-9';
  }

?>

<?php if( $category_display && ! empty( $category_repeater )  ) : ?>

  <div class="home-category-area spacer">
    <div class="container">
      <div class="row">
        <div  id="main-content" class="<?php echo esc_attr( $col_class ); ?>">

          <?php $counter = 1; ?>

          <?php foreach( $category_repeater as $cats ) {

            $category_slug = $cats[ 'category' ];
            $cat_obj = get_category_by_slug( $category_slug );
            $category_id = $cat_obj->term_id;
            $number_of_posts = $cats[ 'number_of_posts' ];
            $title = $cats[ 'category_block_title' ];
            $layout = $cats[ 'layout' ];
            $category = get_category( $category_id );

            $args = array(
              'cat' => absint( $category_id ),
              'ignore_sticky_posts' => 1,
              'posts_per_page' => absint( $number_of_posts )
            );

            $query = new WP_Query( $args );
            
            if ( $query->have_posts() ) :

              set_query_var( 'query', $query );
              set_query_var( 'post_details', $post_details );
              set_query_var( 'title', $title );
              set_query_var( 'category', $category );
              set_query_var( 'layout', $layout );

              if( $layout > 4 ) :
                get_template_part( 'layouts/home-category-slider/slider', 'category' );
              else :
                get_template_part( 'template-parts/content-home', 'category' );
              endif;

            endif; 

            $counter++; } wp_reset_postdata();
          ?>

        </div>


        <?php if( in_array( 'sidebar', $post_details ) ) { ?>
          <div class="col-sm-3 stickybar"><?php dynamic_sidebar( 'category-sidebar' ); ?></div>
        <?php } ?>

      </div>
    </div>
  </div>



<?php endif;