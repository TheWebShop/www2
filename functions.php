<?php
/**
 * www2 functions and definitions
 *
 * @package www2
 * @since www2 1.0
 */
$theme_options = get_option('www2_theme_options' );

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since www2 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'www2_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since www2 1.0
 */
function www2_setup() {
	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

	/**
	 * Customizer additions
	 */
	require( get_template_directory() . '/inc/customizer.php' );

	// add the Customize link to the admin menu
	function www2_admin() {
		add_theme_page( 'Customize', 'Customize', 'edit_theme_options', 'customize.php' );
	}
	add_action ('admin_menu', 'www2_admin');

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on www2, use a find and replace
	 * to change www2 to the name of your theme in all the template files
	 */
	load_theme_textdomain( www2, get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'top' => __( 'Top Menu', www2 ),
		'primary' => __( 'Primary Menu', www2 ),
		'sitemap' => __( 'Site Map', www2 ),
		'footer' => __( 'Footer Menu', www2 ),
		'subfooter' => __( 'Sub Footer', www2 )
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // www2_setup
add_action( 'after_setup_theme', 'www2_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since www2 1.0
 */
function www2_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', www2 ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1><div class="widget-content milli">',
	) );
}
add_action( 'widgets_init', 'www2_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function www2_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'screen', get_stylesheet_uri() );

	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'www2_scripts' );
