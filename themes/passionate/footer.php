<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Passionate
 */

?>

	<footer class="dt-footer">
		<?php if ( is_active_sidebar( 'dt-footer1' ) || is_active_sidebar( 'dt-footer2' ) || is_active_sidebar( 'dt-footer3' ) || is_active_sidebar( 'dt-footer4' ) ) : ?>
		<div class="container">
			<div class="row">
				<div class="dt-footer-cont">

					<?php if( is_active_sidebar( 'dt-footer1' ) ) : ?>

						<div class="col-lg-3 col-md-3 col-sm-6 dt-sidebar">
							<?php dynamic_sidebar( 'dt-footer1' ); ?>
						</div><!-- .col-lg-3 -->

					<?php endif; ?>

					<?php if( is_active_sidebar( 'dt-footer2' ) ) : ?>

						<div class="col-lg-3 col-md-3 col-sm-6 dt-sidebar">
							<?php dynamic_sidebar( 'dt-footer2' ); ?>
						</div><!-- .col-lg-3 -->

					<?php endif; ?>

					<?php if( is_active_sidebar( 'dt-footer3' ) ) : ?>

						<div class="col-lg-3 col-md-3 col-sm-6 dt-sidebar">
							<?php dynamic_sidebar( 'dt-footer3' ); ?>
						</div><!-- .col-lg-3 -->

					<?php endif; ?>

					<?php if( is_active_sidebar( 'dt-footer4' ) ) : ?>

					<div class="col-lg-3 col-md-3 col-sm-6 dt-sidebar">
						<?php dynamic_sidebar( 'dt-footer4' ); ?>
					</div><!-- .col-lg-3 -->

					<?php endif; ?>

					<div class="clearfix"></div>

				</div><!-- .dt-sidebar -->
			</div><!-- .row -->
		</div><!-- .container -->
		<?php endif; ?>

		<div class="dt-footer-bar">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<div class="dt-copyright">
							<?php _e( 'Copyright &copy;', 'passionate' ); ?> <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a><?php _e( '. All rights reserved.', 'passionate' )?>
						</div><!-- .dt-copyright -->
					</div><!-- .col-lg-6 .col-md-6 -->

					<div class="col-lg-6 col-md-6">
						<div class="dt-footer-designer">
							<?php printf( esc_html__( 'Powered %1$s by %2$s', 'passionate' ), '', '<a href="https://wordpress.org/" target="_blank">WordPress</a>' ); ?>
							<span class="sep"> &amp; </span>
							<?php _e( 'Designed by', 'passionate' ); ?> <a href="<?php echo esc_url( 'http://daisythemes.com/'); ?>" target="_blank" rel="designer"><?php _e( 'Daisy Themes', 'passionate' )?></a>
						</div><!-- .dt-footer-designer -->
					</div><!-- .col-lg-6 .col-md-6 -->
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .dt-footer-bar -->
	</footer><!-- .dt-footer -->
</div><!-- .dt-body-wrap -->

<a id="back-to-top" class="transition35"><i class="fa fa-angle-up"></i></a><!-- #back-to-top -->

<?php wp_footer(); ?>

</body>
</html>
