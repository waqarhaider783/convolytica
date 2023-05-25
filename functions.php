<?php

/**
 * Convolytica Community Insight functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Convolytica_Community_Insight
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('convolytica_community_insight_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function convolytica_community_insight_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Convolytica Community Insight, use a find and replace
		 * to change 'convolytica-community-insight' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('convolytica-community-insight', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Primary', 'convolytica-community-insight'),
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
				'convolytica_community_insight_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

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
endif;
add_action('after_setup_theme', 'convolytica_community_insight_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function convolytica_community_insight_content_width()
{
	$GLOBALS['content_width'] = apply_filters('convolytica_community_insight_content_width', 640);
}
add_action('after_setup_theme', 'convolytica_community_insight_content_width', 0);

/**
 * Menu Register
 */
function register_my_menus()
{
	register_nav_menus(
		array(
			'header-menu' => __('Header Menu'),
			'footer-menu' => __('Footer Menu')
		)
	);
}
add_action('init', 'register_my_menus');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function convolytica_community_insight_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'convolytica-community-insight'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'convolytica-community-insight'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'convolytica_community_insight_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function convolytica_community_insight_scripts()
{
	// wp_enqueue_style('convolytica-community-insight-style', get_stylesheet_uri() . '/style.css', array(), _S_VERSION);
	// wp_style_add_data('convolytica-community-insight-style', 'rtl', 'replace');
	if (is_page_template('index.php')) {
		wp_enqueue_style('convolytica-community-insight', get_template_directory_uri() . '/build/css/home.css', array());
	} elseif (is_page_template('features.php')) {
		wp_enqueue_style('convolytica-community-insight', get_template_directory_uri() . '/build/css/features.css', array());
	} elseif (is_page_template('for-brands.php')) {
		wp_enqueue_style('convolytica-community-insight', get_template_directory_uri() . '/build/css/for-brands.css', array());
	} elseif (is_page_template('about.php')) {
		wp_enqueue_style('convolytica-community-insight', get_template_directory_uri() . '/build/css/about.css', array());
	} elseif (is_page_template('speech-to-text.php')) {
		wp_enqueue_style('convolytica-community-insight', get_template_directory_uri() . '/build/css/speech-to-text.css', array());
	} elseif (is_page_template('blog.php')) {
		wp_enqueue_style('convolytica-community-insight', get_template_directory_uri() . '/build/css/blog.css', array());
	} elseif (is_page_template('reach-out.php')) {
		wp_enqueue_style('convolytica-community-insight', get_template_directory_uri() . '/build/css/for-brands.css', array());
	} elseif (is_page_template('download-report.php')) {
		wp_enqueue_style('convolytica-community-insight', get_template_directory_uri() . '/build/css/for-brands.css', array());
	} else {
		wp_enqueue_style('convolytica-community-insight-blog-detail', get_template_directory_uri() . '/build/css/blog-detail.css', array(), _S_VERSION);
	}
	wp_enqueue_style('convolytica-community-insight-swiper', get_template_directory_uri() . '/build/css/swiper.css', array(), _S_VERSION);
	wp_enqueue_style('convolytica-community-insight-main', get_template_directory_uri() . '/build/css/main.css', array(), _S_VERSION);
	wp_enqueue_style('convolytica-community-insight-icons', get_template_directory_uri() . '/build/css/icons.css', array(), _S_VERSION);
	wp_enqueue_style('convolytica-community-insight-fonts', get_template_directory_uri() . '/build/css/fonts.css', array(), _S_VERSION);
	wp_enqueue_script('convolytica-community-insight-src-js-jquery-36.0.min', get_template_directory_uri() . '/src/js/jquery-3.6.0.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('convolytica-community-insight-src-js-swiper.min', get_template_directory_uri() . '/build/js/swiper.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('convolytica-community-insight-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script('convolytica-community-insight-src-js-all', get_template_directory_uri() . '/build/js/all.js', array(), _S_VERSION, true);
	wp_enqueue_script('convolytica-community-insight-src-js-slick.js', get_template_directory_uri() . '/build/js/slick.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'convolytica_community_insight_scripts');

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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init()
{

	// Check function exists.
	if (function_exists('acf_add_options_sub_page')) {

		// Add parent.
		$parent = acf_add_options_page(array(
			'page_title'  => __('Home Page Settings'),
			'menu_title'  => __('Home Settings'),
			'redirect'    => false,

		));

		// Add sub page.
		$child = acf_add_options_sub_page(array(
			'page_title'  => __('Footer Settings'),
			'menu_title'  => __('Footer'),
			'parent_slug' => $parent['menu_slug'],
		));
		$child = acf_add_options_sub_page(array(
			'page_title'  => __('Feature Section'),
			'menu_title'  => __('Feature'),
			'parent_slug' => $parent['menu_slug'],
		));
		$child = acf_add_options_sub_page(array(
			'page_title'  => __('Brands Section'),
			'menu_title'  => __('Brands Slider'),
			'parent_slug' => $parent['menu_slug'],
		));


		$child = acf_add_options_sub_page(array(
			'page_title'  => __('Facebook Section Setting'),
			'menu_title'  => __('Facebook Button Section'),
			'parent_slug' => $parent['menu_slug'],
		));
		$child = acf_add_options_sub_page(array(
			'page_title'  => __('Our Team Setting'),
			'menu_title'  => __('Our Team Section'),
			'parent_slug' => $parent['menu_slug'],
		));
		$child = acf_add_options_sub_page(array(
			'page_title'  => __('Header Section Setting'),
			'menu_title'  => __('Header Section'),
			'parent_slug' => $parent['menu_slug'],
		));
	}
}
function max_title_length($title)
{
	$max = 50;
	if (strlen($title) > $max) {
		return substr($title, 0, $max) . " &hellip;";
	} else {
		return $title;
	}
}

add_filter('the_title', 'max_title_length');
