<?php if( get_theme_mod( 'homepage_blog_display_option', $default = true ) ) : ?>

    <?php
        $default_posts_per_page = get_option( 'posts_per_page' );
        $number_of_posts = get_theme_mod( 'homepage_blog_section_number_of_posts', $default_posts_per_page );
    ?>

    <div class="home-blog-area spacer">
        <div class="container">
            <div class="row">
                <?php if( $sidebar_position == 'sidebar-left' && is_active_sidebar( 'sidebar-left' ) ) : ?>
                    <div class="col-sm-3 stickybar"><?php dynamic_sidebar( 'sidebar-left' ); ?></div>
                <?php endif; ?>
                <div  id="main-content" class="<?php echo esc_attr( $width_class ); ?>">

                    <?php
                        global $paged;
                        
                        $archive_cat = get_theme_mod( 'homepage_blog_section_category' );
                        $title = get_theme_mod( 'homepage_blog_section_title' );
                        $args = array(
                            'post_type' => 'post',
                            'cat'       => absint( $archive_cat ),
                            'posts_per_page' => $number_of_posts,
                            'paged' => get_query_var( 'page' ) ? get_query_var('page') : 1
                        );
                        $wp_query = new WP_Query( $args );
                    
                        $view = get_theme_mod( 'blog_post_view', 'grid-view' );
                        $content_column_class = 'col-sm-12';    

                        if( $view == 'full-width' ) {
                            $content_column_class = 'col-sm-12';
                        }
                    
                        if ( $wp_query->have_posts() ) { ?>

                            <div class="home-archive inside-page post-list">                                      
                                    
                                <?php if( $title ) : ?>
                                    <div class="section-heading"><?php echo esc_html( $title ); ?></div>
                                <?php endif; ?>
                                <div class="<?php echo esc_attr( $view ); ?> blog-list-block">                                         
                                  
                                    <?php /* Start the Loop */ ?>
                                    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
                                        <?php
                                            get_template_part( 'template-parts/content' );
                                        ?>
                                    <?php endwhile; ?>
                                  
                                    <?php wp_reset_postdata(); ?>
                                </div>                             
                                
                            </div>                        
                        
                        <?php }
                    ?>
                            
                </div>
                
                <?php if( $sidebar_position == 'sidebar-right' ) : ?>
                    <div class="col-sm-3 stickybar"><?php get_sidebar(); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php endif;