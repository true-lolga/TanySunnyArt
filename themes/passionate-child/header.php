<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Passionate
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	
		
	<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>

			<div class="dt-header-image">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img src="<?php esc_url( header_image()); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="header image" />
				</a>
			</div><!-- .dt-header-image -->

		<?php endif; ?> 


		<nav class="<?php if ( get_theme_mod( 'passionate_sticky_menu', 0 ) == 1 ) { ?> transition35 dt-sticky<?php } ?>">
			<div class="dt-main-menu-wrap">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">
						<ul class="header">
						<li class="namelogo">
						<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php
								$description = get_bloginfo( 'description', 'display' );
								if ( $description || is_customize_preview() ) : ?>
									<p class="site-description"><?php echo $description; ?></p>
								<?php endif; ?>
						</li>
						<li class="namemenu">
							<div class="dt-main-menu">
								<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
							</div><!-- .dt-main-menu -->

							<div class="dt-nav-md-trigger">
								<?php _e( 'Menu', 'passionate' ); ?> <i class="fa fa-bars"></i>
							</div><!-- .dt-nav-md-trigger -->

							<div class="dt-nav-md">
								<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
							</div><!-- .dt-nav-md .transition35 -->
						</li>
						</ul>
						</div><!-- .col-lg-12 .col-md-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</div><!-- .dt-main-menu-wrap -->
		</nav><!-- .dt-sticky -->

		

