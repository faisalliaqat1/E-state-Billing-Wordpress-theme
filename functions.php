<?php
/**
 * E-State Billing functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package E-State_Billing
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function e_state_billing_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on E-State Billing, use a find and replace
		* to change 'e-state-billing' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'e-state-billing', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'e-state-billing' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'e_state_billing_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'e_state_billing_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function e_state_billing_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'e_state_billing_content_width', 640 );
}
add_action( 'after_setup_theme', 'e_state_billing_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function e_state_billing_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'e-state-billing' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'e-state-billing' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'e_state_billing_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function e_state_billing_scripts() {
	wp_enqueue_style( 'e-state-billing-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'e-state-billing-style', 'rtl', 'replace' );

	wp_enqueue_script( 'e-state-billing-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'e_state_billing_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Theme Setting',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => true
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Home',
        'menu_title'    => 'Home',
        'parent_slug'   => 'theme-general-settings',
    ));
	acf_add_options_sub_page(array(
        'page_title'    => 'Global Section',
        'menu_title'    => 'Global',
        'parent_slug'   => 'theme-general-settings',
    ));
	acf_add_options_sub_page(array(
        'page_title'    => 'Career',
        'menu_title'    => 'Career',
        'parent_slug'   => 'theme-general-settings',
    ));
	acf_add_options_sub_page(array(
        'page_title'    => 'Footer',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));
}

//add favicon
//
function add_favicon_to_wp_head() {
    $favicon_url = get_site_url() . '/wp-content/uploads/2024/04/favicon-estate.png'; // Change this to the URL of your favicon file
    echo '<link rel="shortcut icon" href="' . esc_url($favicon_url) . '" type="image/x-icon" />';
}
add_action('wp_head', 'add_favicon_to_wp_head');

function update_style_css_version( $stylesheet_uri, $stylesheet_dir_uri ) {
    $style_css_path = get_theme_file_path( 'style.css' );
    $style_css_url = get_theme_file_uri( 'style.css' );
    $file_mod_time = filemtime( $style_css_path );
    $version = $file_mod_time;

    return add_query_arg( 'ver', $version, $stylesheet_uri );
}
add_filter( 'stylesheet_uri', 'update_style_css_version', 10, 2 );

