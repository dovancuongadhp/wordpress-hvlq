<?php
/**
 * The template for displaying all single posts.
 *
 * @package Wp Magazine
 */

get_header(); ?>

<div id="content" class="inside-page content-area">
  <div class="container">
    <div class="row"> 

      <div class="col-sm-9" id="main-content">


        <section class="page-section">
          <div class="detail-content">

            <?php while ( have_posts() ) : the_post(); ?>                    
              <?php get_template_part( 'template-parts/content', 'single' ); ?>
            <?php endwhile; // End of the loop. ?>            

            <?php comments_template(); ?>

            <?php get_template_part( 'template-parts/content', 'related-post', array( 'id' => $post->ID ) ); ?>

          </div><!-- /.end of deatil-content -->
        </section> <!-- /.end of section -->


      </div>

      <div class="col-sm-3 stickybar"><?php get_sidebar(); ?></div>

    </div>
  </div>
</div>

<?php get_footer();