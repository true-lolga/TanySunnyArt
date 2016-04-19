<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Splendor
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
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'splendor' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="topbar">
			<div class="logo-container">
				<?php
				if ( function_exists( 'jetpack_the_site_logo' ) && jetpack_has_site_logo() ) {
					jetpack_the_site_logo();
				} elseif ( is_email( get_option( 'admin_email' ) ) ) {
					$email = get_option( 'admin_email' );
					
					$default = get_option( 'avatar_default', 'mystery' );
					if ( 'mystery' == $default ) {
						$default = 'mm';
					} elseif ( 'gravatar_default' == $default ) {
						$default = '';
					}
					
					$protocol = ( is_ssl() ) ? 'https://secure.' : 'http://';
					
					$url = sprintf( '%1$sgravatar.com/avatar/%2$s/', $protocol, md5( $email ) );
					$url = add_query_arg( array(
						's' => 80,
						'd' => urlencode( $default ),
					), $url );
					?>
					
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo-link" rel="home" itemprop="url">
						<img src="<?php echo esc_url_raw( $url ); ?>" class="site-logo" alt="<?php esc_html_e( 'Site logo', 'splendor' ); ?>" data-size="site-logo" itemprop="logo" />
					</a>
				<?php } ?>
			</div>
			
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'splendor' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
		</div><!-- .topbar -->
		
		<div class="title-box-container">
			<div class="hgroup-overlay title-box">
				<?php splendor_page_title(); ?>
			</div><!-- .title-box -->
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">