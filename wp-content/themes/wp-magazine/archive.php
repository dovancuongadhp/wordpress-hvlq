<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wp Magazine
 */

get_header(); ?>
<?php
    global $wp_query;
    $max_pages = $wp_query->max_num_pages;
?>

<?php $sidebar_position = get_theme_mod( 'blog_post_layout', 'sidebar-right' ); ?>
<?php  $view = get_theme_mod( 'blog_post_view', 'grid-view' ); ?>
<?php
  $width_class = 'col-sm-9';
  if( $sidebar_position == 'no-sidebar' ) {
    $width_class = 'col-sm-12';
  }
?>
<div class="post-list content-area">
  <div class="container">
  	
    <div class="row">
      <?php if( $sidebar_position == 'sidebar-left' && is_active_sidebar( 'sidebar-left' ) ) : ?>
        <div class="col-sm-3 stickybar"><?php dynamic_sidebar( 'sidebar-left' ); ?></div>
      <?php endif; ?>      
      <div id="main-content" class="<?php echo esc_attr( $width_class ); ?>">

        <?php
      if( have_posts() ) :
            the_archive_title( '<h1 class="category-title">', '</h1>' );
            the_archive_description( '<p class="taxonomy-description">', '</p>' );
        endif;
    ?>
        <div class="<?php echo esc_attr( $view ); ?> blog-list-block">
          <?php if ( have_posts() ) : ?>
               
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'template-parts/content' ); ?>
                <?php endwhile; ?> 

        <?php else : ?>
            <?php get_template_part( 'template-parts/content', 'none' ); ?>
          <?php endif; ?>
        </div>
        <?php                                    
          if (  $wp_query->max_num_pages > 1 ) {
            if( get_theme_mod( 'pagination_type', 'ajax-loadmore' ) == 'ajax-loadmore' ) { ?>
              <button class="loadmore"><?php esc_html_e( 'More posts', 'wp-magazine' ); ?></button>
            <?php }
            if( get_theme_mod( 'pagination_type', 'ajax-loadmore' ) == 'number-pagination' ) {
              the_posts_pagination();
            }
          }
        ?>
      </div>  
     
      <?php if( $sidebar_position == 'sidebar-right' ) : ?>
        <div class="col-sm-3 stickybar"><?php get_sidebar(); ?></div>
      <?php endif; ?>     

    </div>
  </div>
</div>
<?php get_footer(); ?>
