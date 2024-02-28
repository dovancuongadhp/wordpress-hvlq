<?php
function wp_magazine_dynamic_css() {
	wp_enqueue_style( 'wp-magazine-style', get_stylesheet_uri(), array() );
        wp_enqueue_style( 'wp-magazine-layout', get_template_directory_uri() . '/css/layout.min.css' );

        $dynamic_css = "";


        $font_color = esc_attr( get_theme_mod( 'font_color', '#333' ) );
        $primary_color = esc_attr( get_theme_mod( 'primary_color', '#29a2cb' ) );
        $secondary_color = esc_attr( get_theme_mod( 'secondary_color', '#50596c' ) );
        $dark_color = esc_attr( get_theme_mod( 'dark_color', '#333' ) );
        $white_color = esc_attr( get_theme_mod( 'white_color', '#fff' ) );

        $site_title_color = esc_attr( get_theme_mod( 'site_title_color_option', '#fff' ) );
        $site_tagline_color = esc_attr( get_theme_mod( 'site_tagline_color', '#fff' ) );
        $header_bg_color = esc_attr( get_theme_mod( 'header_background_color', '#03002d' ) );
        $header_bg_color_opacity = floatval( get_theme_mod( 'header_background_color_opacity', 0.8 ) );

        $container_width = absint( get_theme_mod( 'container_width', 1200 ) );
        $image_border = absint( get_theme_mod( 'image_border', 5 ) );

        $category_news_title_color = esc_attr( get_theme_mod( 'category_news_title_colors', '#999' ) ); // Category News Title Color
        $featured_news_title_color = esc_attr( get_theme_mod( 'featured_news_title_colors', '#fff' ) ); //Featured News Title Color

        $news_carousel_bg_color = esc_attr( get_theme_mod( 'news_carousel_bg_color', '#ecfbff' ) );
        $cta_bg_color = esc_attr( get_theme_mod( 'cta_background_color', '#e3f3f0' ) );
        $pages_bg_color = esc_attr( get_theme_mod( 'pages_bg_color', '#ecfbff' ) );

        //News Heading Title
        $category_news_title['font_family'] = esc_attr( get_theme_mod( 'category_news_title_font_family', 'Playfair Display' ) );
        $category_news_title['font_size'] = esc_attr( get_theme_mod( 'category_news_title_font_size', '14px' ) );
        $category_news_title['line_height'] = esc_attr( get_theme_mod( 'category_news_title_line_height', '13px' ) );
        $category_news_title['font_weight'] = absint( get_theme_mod( 'category_news_title_font_weight', 500 ) );

        $featured_news_title['font_family'] = esc_attr( get_theme_mod( 'featured_news_title_font_family', 'Playfair Display' ) );
        $featured_news_title['font_size'] = esc_attr( get_theme_mod( 'featured_news_title_font_size', '14px' ) );
        $featured_news_title['line_height'] = esc_attr( get_theme_mod( 'featured_news_title_line_height', '13px' ) );
        $featured_news_title['font_weight'] = absint( get_theme_mod( 'featured_news_title_font_weight', 500 ) );
        
        $blog_news_title['color'] = esc_attr( get_theme_mod( 'blog_colors', '#1e73be' ) );
        $blog_news_title['font_family'] = esc_attr( get_theme_mod( 'blog_news_title_font_family', 'Playfair Display' ) );
        $blog_news_title['font_size'] = esc_attr( get_theme_mod( 'blog_news_title_font_size', '18px' ) );
        $blog_news_title['line_height'] = esc_attr( get_theme_mod( 'blog_news_title_line_height', '22px' ) );
        $blog_news_title['font_weight'] = absint( get_theme_mod( 'blog_news_title_font_weight', 400 ) );

        $slider_news_title['color'] = esc_attr( get_theme_mod( 'slider_colors', '#1e73be' ) );
        $slider_news_title['font_family'] = esc_attr( get_theme_mod( 'slider_news_title_font_family', 'Playfair Display' ) );
        $slider_news_title['font_size'] = esc_attr( get_theme_mod( 'slider_news_title_font_size', '14px' ) );
        $slider_news_title['line_height'] = esc_attr( get_theme_mod( 'slider_news_title_line_height', '13px' ) );
        $slider_news_title['font_weight'] = absint( get_theme_mod( 'slider_news_title_font_weight', 500 ) );

        $headline_news_title['color'] = esc_attr( get_theme_mod( 'headline_colors', '#1e73be' ) );
        $headline_news_title['font_family'] = esc_attr( get_theme_mod( 'headline_news_title_font_family', 'Playfair Display' ) );
        $headline_news_title['font_size'] = esc_attr( get_theme_mod( 'headline_news_title_font_size', '14px' ) );
        $headline_news_title['line_height'] = esc_attr( get_theme_mod( 'headline_news_title_line_height', '16px' ) );
        $headline_news_title['font_weight'] = absint( get_theme_mod( 'headline_news_title_font_weight', 500 ) );
        $headline_news_title['bg_color'] = esc_attr( $secondary_color );



        $menu['color'] = esc_attr( get_theme_mod( 'menu_font_color', '#fff' ) );
        $menu['background_color'] = esc_attr( get_theme_mod( 'menu_background_color', '#3c25ea' ) );
        $menu['font_family'] = esc_attr( get_theme_mod( 'menu_font_family', 'Source Sans Pro' ) );
        $menu['font_size'] = esc_attr( get_theme_mod( 'menu_font_size', '15px' ) );
        $menu['font_weight'] = absint( get_theme_mod( 'menu_font_weight', 500 ) );
        $menu['text_transform'] = esc_attr( get_theme_mod( 'menu_font_text_transform', 'none' ) );


        $heading_title_color = esc_attr( get_theme_mod( 'heading_title_color', '#2173ce' ) );
        $heading_link_color = esc_attr( get_theme_mod( 'heading_link_color', '#ce106d' ) );
        $top_bar_bg_color = esc_attr( get_theme_mod( 'top_bar_background_color', '#353844' ) );
        $background_color = esc_attr( get_theme_mod( 'body_background_color', '#fff' ) );
        $footer_background_color = esc_attr( get_theme_mod( 'footer_background_color', '#ececec' ) );

        $font_family = esc_attr( get_theme_mod( 'font_family', 'Source Sans Pro' ) );
        $font_size = esc_attr( get_theme_mod( 'font_size', '15px' ) );
        $font_weight = absint( get_theme_mod( 'wp_magazine_font_weight', 400 ) );
        $line_height = esc_attr( get_theme_mod( 'line_height', '22px' ) );

        $detail_post_page_font_color = esc_attr( get_theme_mod( 'detail_post_page_font_color', '#333' ) );
        $detail_post_page_font_family = esc_attr( get_theme_mod( 'detail_post_page_font_family', 'Source Sans Pro' ) );
        $detail_post_page_font_size = esc_attr( get_theme_mod( 'detail_post_page_font_size', '15px' ) );
        $detail_post_page_font_weight = absint( get_theme_mod( 'detail_post_page_font_weight', 400 ) );
        $detail_post_page_line_height = esc_attr( get_theme_mod( 'detail_post_page_line_height', '18px' ) );

       
        $site_identity_font_family = esc_attr( get_theme_mod( 'site_identity_font_family', 'Muli' ) );
        $logo_font_size = absint( get_theme_mod( 'wp_magazine_logo_size', 50 ) );
        $logo_size = absint( $logo_font_size * 2 );
        $header_image_height = absint( get_theme_mod( 'header_image_height', 30 ) );

        $categories = get_categories( array(
                'hide_empty' => false
        ) );

        $heading = array();
        $defaults = wp_magazine_default_fonts_attributes();

        for( $i = 1; $i <= 6 ; $i++ ) {

        	$heading[$i]['font_size'] = absint( get_theme_mod( 'wp_magazine_heading_' . $i . '_size', absint( $defaults[$i]['font_size'] ) ) );
                $heading[$i]['font_family'] = esc_attr( get_theme_mod( 'wp_magazine_heading_' . $i . '_font_family', $defaults[$i]['font_family'] ) );
                $heading[$i]['font_weight'] = absint( get_theme_mod( 'heading_' . $i . '_font_weight', absint( $defaults[$i]['font_weight'] ) ) );
                $heading[$i]['font_color'] = esc_attr( get_theme_mod( 'heading_' . $i . '_font_color', '#333' ) );

                $dynamic_css .= ".detail-content h".$i."{ font:{$heading[$i]['font_weight']} {$heading[$i]['font_size']}px/1em {$heading[$i]['font_family']}; }";
                $dynamic_css .= "h".$i."{ color:{$heading[$i]['font_color']}; }";
        }


        if( $categories ) {
        
                foreach ( $categories as $value ) {
                        $color = esc_attr( get_theme_mod( $value->slug . '_color', '#333' ) );
                        $dynamic_css .= ".featured-layout span.category.{$value->slug} a{ background-color: {$color}; }";
                        $dynamic_css .= ".category-layout span.category.{$value->slug} a{ color: {$color}; }";
                }
        }


        $dynamic_css .= "



                :root {
                        --primary-color: $primary_color;
                        --secondary-color: $secondary_color;
                        --dark-color: $dark_color;
                        --white-color: $white_color;
                }


                body{ font: $font_weight $font_size/$line_height $font_family; color: $font_color; }
                body{ background-color: $background_color; }

                article{ font: $detail_post_page_font_weight $detail_post_page_font_size/$detail_post_page_line_height $detail_post_page_font_family; color: $detail_post_page_font_color; }

                div.container{ max-width: {$container_width}" . "px; }

                .featured-layout .news-snippet{border-radius: {$image_border}" . "px;min-height:250px;}
                .news-snippet .featured-image img,.headline-wrapper .owl-carousel .owl-item img,.news-carousel-wrapper .owl-carousel .owl-item img,.news-snippet img,.category-blog-view-1 .category-blog-items:first-child,.banner-news-list img,.slider-banner-3 .banner-news-caption, .slider-banner-1 .banner-news-caption{border-radius: {$image_border}" . "px;}



                header .logo img{ height: {$logo_size}"."px; }
                .site-title a{ font-size: {$logo_font_size}"."px; font-family: {$site_identity_font_family}; color: $site_title_color;}
                header .logo .site-description{color: {$site_tagline_color};}
                .date-time{color: {$site_tagline_color};}

                .main-navigation{text-transform: {$menu['text_transform']};}


                section.top-bar{padding: {$header_image_height}" . "px 0;}

                section.top-bar:before {background: {$header_bg_color}; opacity: {$header_bg_color_opacity};}


                .category-news-title{ font-size: {$category_news_title['font_size']}; font-family: {$category_news_title['font_family']}; line-height: {$category_news_title['line_height']}; font-weight: {$category_news_title['font_weight']};}
                .category-news-title a{color: {$category_news_title_color};}

                .featured-news-title{ font-size: {$featured_news_title['font_size']}; font-family: {$featured_news_title['font_family']}; line-height: {$featured_news_title['line_height']}; font-weight: {$featured_news_title['font_weight']};}
                .featured-news-title a{color: {$featured_news_title_color};}


                .news-carousel-wrapper{ background: {$news_carousel_bg_color}; }

                .home-pages{ background: {$pages_bg_color}; }

                .cta-block-wrapper{ background: {$cta_bg_color}; }

                .blog-news-title{ font-size: {$blog_news_title['font_size']}; font-family: {$blog_news_title['font_family']}; line-height: {$blog_news_title['line_height']}; font-weight: {$blog_news_title['font_weight']};}
                .blog-news-title a{color: {$blog_news_title['color']};}

                .slider-news-title{ font-size: {$slider_news_title['font_size']}; font-family: {$slider_news_title['font_family']}; line-height: {$slider_news_title['line_height']}; font-weight: {$slider_news_title['font_weight']};}
                .slider-news-title a{color: {$slider_news_title['color']};}

                .headline-news-title{ font-size: {$headline_news_title['font_size']}; font-family: {$headline_news_title['font_family']}; line-height: {$headline_news_title['line_height']}; font-weight: {$headline_news_title['font_weight']};}
                .headline-news-title a{color: {$headline_news_title['color']};}
                .headline-ticker-wrapper .headline-heading{background-color: {$headline_news_title['bg_color']};}


                
               



                #primary-menu li a {color: {$menu['color']};}
                header .main-nav{background-color: {$menu['background_color']};}
                .main-navigation ul ul.sub-menu{background-color: {$menu['background_color']};}
                .main-navigation .nav-menu{background-color: {$menu['background_color']};}
                #primary-menu li a{ font-size: {$menu['font_size']}; font-family: {$menu['font_family']}; font-weight: {$menu['font_weight']};}
                footer.main{background-color: {$footer_background_color};}


                header .top-info.pri-bg-color{background-color: {$top_bar_bg_color};}

                


                

               
        ";
        wp_add_inline_style( 'wp-magazine-style', $dynamic_css );
        wp_add_inline_style( 'wp-magazine-layout', $dynamic_css );
}
add_action( 'wp_enqueue_scripts', 'wp_magazine_dynamic_css' );
?>