<?php
	$social_share = get_theme_mod( 'wp_magazine_social_share' );
?>
<script type="text/javascript">
	var fb = '<?php esc_html__( "Facebook", "wp-magazine" ); ?>';
	var twitter = '<?php esc_html__( "Twitter", "wp-magazine" ); ?>';
	var pinterest = '<?php esc_html__( "Pinterest", "wp-magazine" ); ?>';
	var linkedin = '<?php esc_html__( "Linkedin", "wp-magazine" ); ?>';
</script>

<?php if( $social_share ) : ?>

	<div class="social-box">

		<?php if( in_array( 'facebook', $social_share ) ) { ?>
			<a class="facebook-icon" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>" onclick="return ! window.open( this.href, fb, 'width=500, height=500' )">
			    <i class="fa fa-facebook-f"></i>
			</a>
		<?php } ?>

		<?php if( in_array( 'twitter', $social_share ) ) { ?>
			<a class="twitter-icon" href="https://twitter.com/intent/tweet?text=<?php echo $title; ?>&amp;url=<?php echo $url; ?>&amp;via=<?php echo esc_html( $twitter_id ); ?>" onclick="return ! window.open( this.href, twitter, 'width=500, height=500' )">
			   <i class="fa fa-twitter"></i>
			</a>
		<?php } ?>

		<?php if( in_array( 'pinterest', $social_share ) ) { ?>
			<a class="pinterest-icon" href="http://pinterest.com/pin/create/button/?url=<?php echo $url; ?>&amp;media=<?php echo $media;   ?>&amp;description=<?php echo esc_html( $title ); ?>" onclick="return ! window.open( this.href, pinterest, 'width=500, height=500' )">
			    <i class="fa fa-pinterest"></i>
			</a>
		<?php } ?>

		<?php if( in_array( 'linkedin', $social_share ) ) { ?>
			<a class="linkedin-icon" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url; ?>&title=<?php echo esc_html( $title ); ?>" onclick="return ! window.open( this.href, linkedin, 'width=500, height=500' )">
			    <i class="fa fa-linkedin"></i>
			</a>
		<?php } ?>

		<?php if( in_array( 'email', $social_share ) ) { ?>
			<a class="mail-icon" href="mailto:?subject=<?php echo esc_attr( $title ); ?>&body=<?php echo $title . " " . $url; ?>" target="_blank">
			    <i class="fa fa-envelope"></i>
			</a>
		<?php } ?>


	</div>

<?php endif;