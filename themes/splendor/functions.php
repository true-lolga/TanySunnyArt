<?php
/**
 * Splendor functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Splendor
 */

if ( ! function_exists( 'splendor_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function splendor_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Splendor, use a find and replace
	 * to change 'splendor' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'splendor', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'splendor' ),
		'social'  => esc_html__( 'Social Media Menu', 'splendor' )
	) );
	
	/*
	 * Style the TinyMCE editor
	 */
	add_editor_style( array( 'css/editor-style.css', splendor_fonts_url(), splendor_get_color_scheme_stylesheet() ) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	/**
	 * Set up needed image sizes
	 */
	add_image_size( 'splendor-site-logo', 128, 128 );
	add_image_size( 'splendor-featured-image', 1200, 400, true );
	
	/**
	 * Enable support for Jetpack's site logo feature
	 */
	$args = array( 'size' => 'splendor-site-logo' );
	add_theme_support( 'site-logo', $args );
}
endif; // splendor_setup
add_action( 'after_setup_theme', 'splendor_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function splendor_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'splendor_content_width', 1120 );
}
add_action( 'after_setup_theme', 'splendor_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function splendor_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'splendor' ),
		'id'            => 'left-sidebar',
		'description'   => esc_html__( 'This sidebar appears on the left side of the widget area.', 'splendor' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'splendor' ),
		'id'            => 'right-sidebar',
		'description'   => esc_html__( 'This sidebar appears on the right side of the widget area.', 'splendor' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'splendor_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function splendor_scripts() {
	wp_enqueue_style( 'splendor-genericons', get_template_directory_uri() . '/inc/genericons/genericons/genericons.css' );
	wp_enqueue_style( 'splendor-color-scheme', splendor_get_color_scheme_stylesheet() );
	wp_enqueue_style( 'splendor-google-fonts', splendor_fonts_url() );
	wp_enqueue_style( 'splendor-style', get_stylesheet_uri(), array( 'splendor-google-fonts', 'splendor-color-scheme', 'splendor-genericons' ) );

	wp_enqueue_script( 'splendor-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20120206', true );

	wp_enqueue_script( 'splendor-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'splendor_scripts' );

/**
 * Allow user to dequeue Google fonts if they do not support the user's language
 */
function splendor_fonts_url() {
	$fonts = array();
	$fonts_url = '';
	
	/* translators: If there are characters in your language that are not supported by Niconne, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Niconne font: on or off', 'splendor' ) ) {
		$fonts[] = 'Niconne:400,400italic,700,700italic';
	}
	
	/* translators: If there are characters in your language that are not supported by Belleza, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Belleza font: on or off', 'splendor' ) ) {
		$fonts[] = 'Belleza:400,400italic,700,700italic';
	}
	
	/* translators: If there are characters in your language that are not supported by Cabin, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Cabin font: on or off', 'splendor' ) ) {
		$fonts[] = 'Cabin: 400,400italic,700,700italic';
	}
	
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
		), '//fonts.googleapis.com/css' );
		
		return $fonts_url;
	}
}

/**
 * Get the user-chosen stylesheet
 */
function splendor_get_color_scheme_stylesheet() {
	$splendor_color = get_theme_mod( 'color_scheme', 'lapis-lazuli' );
	
	$stylesheet_url = get_template_directory_uri() . '/css/colors/' . $splendor_color . '.css';
	return $stylesheet_url;
}

/**
 * Set up color scheme selector in the customizer
 */
function splendor_theme_customizer( $wp_customize ) {
	$wp_customize->add_section( 'color_scheme', array(
		'title'       => esc_html__( 'Color Scheme', 'splendor' ),
		'description' => esc_html__( 'Select the desired color scheme.', 'splendor' ),
		'priority'    => 35
	) );
	
	$wp_customize->add_setting( 'color_scheme', array(
		'default'           => 'lapis-lazuli',
		'capability'        => 'edit_theme_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'splendor_verify_color_scheme'
	) );
	
	$wp_customize->add_control( 'color_scheme', array(
		'section'    => 'color_scheme',
		'settings'   => 'color_scheme',
		'type'       => 'radio',
		'choices'    => array(
			'lapis-lazuli' => esc_html_x( 'Lapis Lazuli (default)', 'the precious gem', 'splendor' ),
			'hematite'     => esc_html_x( 'Hematite', 'the precious gem', 'splendor' ),
			'rose-gold'    => esc_html_x( 'Rose Gold', 'the precious gem', 'splendor' ),
			'emerald'      => esc_html_x( 'Emerald', 'the precious gem', 'splendor' ),
			'amethyst'     => esc_html_x( 'Amethyst', 'the precious gem', 'splendor' )
		)
	) );
}
add_action( 'customize_register', 'splendor_theme_customizer' );

/**
 * Validating function for the color scheme selector
 */
function splendor_verify_color_scheme( $value ) {
	if ( in_array( $value, array( 'lapis-lazuli', 'hematite', 'rose-gold', 'emerald', 'amethyst' ) ) ) {
		return $value;
	} else {
		return 'lapis-lazuli';
	}
}

/**
 * We're using excerpts, so let's make the link more interesting
 */
function splendor_read_more( $more ) {
	return sprintf( '<a class="more-link" href="%1$s" rel="bookmark">%2$s</a>',
		esc_url( get_permalink() ),
		esc_html__( 'Read More &raquo;', 'splendor' )
	);
}
add_filter( 'excerpt_more', 'splendor_read_more' );

/**
 * Get the featured image URL for a single post. We use this function for single post navigation and also for the header image.
 */
function splendor_get_single_post_image( $single ) {
	$post_image_url = '';

	if ( has_post_format( 'gallery' ) ) {
		$args = array(
			'post_parent'    => $single->ID,
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'orderby'        => 'rand',
			'posts_per_page' => 1
		);
		$attachments = get_children( $args );
		
		if ( $attachments ) {
			foreach ( $attachments as $attachment ) {
				$post_image_url = wp_get_attachment_url( $attachment->ID );
			}
		}
	} elseif ( has_post_thumbnail( $single->ID ) ) {
		$post_image_url = wp_get_attachment_url( get_post_thumbnail_id( $single->ID ) );
	}
	
	return $post_image_url;
}

/**
 * Return the appropriate header image depending on what type of page we're viewing
 */
function splendor_set_background_image() {
	global $post;
	global $posts;
	$background_image_url = '';
	
	if ( is_home() || is_archive() || ( is_search() && $posts ) ) {
		if ( has_post_thumbnail( $posts[0]->ID ) ) {
			$background_image_url = wp_get_attachment_url( get_post_thumbnail_id( $posts[0]->ID ) );
		}
	} 
	
	if ( is_single() && ! post_password_required() ) {
		$background_image_url = splendor_get_single_post_image( $post );
	}
	
	if ( empty( $background_image_url ) ) {
		$background_image_url = get_template_directory_uri() . '/inc/road.jpg';
	}

	$custom_css = sprintf( '.title-box-container { background-image: url(%s);', $background_image_url ); 
	wp_add_inline_style( 'splendor-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'splendor_set_background_image', 15 );

/**
 * Set the background for the single post navigation elements
 */
function splendor_set_post_nav_image() {
	global $post;
	$custom_css = '';
	
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( get_post()->parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( $previous && ! post_password_required( $previous ) && splendor_get_single_post_image( $previous ) ) {
			$custom_css .= '.post-navigation .nav-previous { background-image: url(%s); } .post-navigation .nav-previous a { color: inherit; }';
			$custom_css = sprintf( $custom_css,
				esc_url( splendor_get_single_post_image( $previous ) )
			);
		}
		
		if ( $next && ! post_password_required( $next ) && splendor_get_single_post_image( $next ) ) {
			$custom_css .= '.post-navigation .nav-next { background-image: url(%s) } .post-navigation .nav-next a { color: inherit; }';
			$custom_css = sprintf( $custom_css,
				esc_url( splendor_get_single_post_image( $next ) )
			);
		}

		wp_add_inline_style( 'splendor-style', $custom_css );
		wp_reset_postdata();
	}
}
add_action( 'wp_enqueue_scripts', 'splendor_set_post_nav_image' );

/**
 * Remove <p> tags from get_the_archive_description
 */
function splendor_custom_archive_description( $description ) {
	$remove = array( '<p>', '</p>' );
	$description = str_replace( $remove, '', $description );

	return $description;
}
add_filter( 'get_the_archive_description', 'splendor_custom_archive_description' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
