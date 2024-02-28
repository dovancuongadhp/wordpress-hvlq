<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Wp Magazine
 */
?>


	<footer class="main">
		<div class="container">
			<?php 
dynamic_sidebar( 'footer-1' );
?>
		</div>
	</footer>
		<div class="copyright text-center">
			<?php 
?>
			    	
			    	<?php 
esc_html_e( "Powered by", 'wp-magazine' );
?> <a href="<?php 
echo  esc_url( 'http://wordpress.org/' ) ;
?>"><?php 
esc_html_e( "WordPress", 'wp-magazine' );
?></a> | <a href="<?php 
echo  esc_url( 'https://wpmagplus.com/' ) ;
?>" target="_blank"  rel="nofollow"><?php 
esc_html_e( 'HVLQ', 'wp-magazine' );
?></a>
			  	<?php 
?>
		</div>
		<div class="scroll-top-wrapper"> <span class="scroll-top-inner"><i class="fa fa-2x fa-angle-up"></i></span></div>
		<?php 
if ( has_action( 'wp-magazine-layouts/layouts' ) ) {
    do_action( 'wp-magazine-layouts/layouts' );
}
?>
		

		<?php 
?>

		<?php 
wp_footer();
?>
	</body>
</html>