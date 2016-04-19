<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Splendor
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="content-wrapper flexed">
			<?php if ( has_nav_menu( 'social' ) ) : ?>
				<nav class="social-media left">
					<?php wp_nav_menu( array( 'theme_location' => 'social', 'menu_id' => 'social-menu', 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>' ) ); ?>
				</nav>
			<?php endif; ?>
			
			<div class="site-info right">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'splendor' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'splendor' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( esc_html__( 'Theme: %1$s by %2$s', 'splendor' ), 'Splendor', '<a href="http://stephencottontail.wordpress.com/" rel="designer">Stephen Dickinson</a>' ); ?>
			</div><!-- .site-info -->
		</div><!-- .content-wrapper -->
	</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
