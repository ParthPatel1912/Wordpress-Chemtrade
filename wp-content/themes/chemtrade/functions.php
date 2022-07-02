<?php
/**
 * chemtrade functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package chemtrade
 */

if (! defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook.The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function chemtrade_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on chemtrade, use a find and replace
		* to change 'chemtrade' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('chemtrade', get_template_directory() .'/languages');

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
			'chemtrade_custom_background_args',
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
add_action('after_setup_theme', 'chemtrade_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function chemtrade_content_width() {
	$GLOBALS['content_width'] = apply_filters('chemtrade_content_width', 640);
}
add_action('after_setup_theme', 'chemtrade_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function chemtrade_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'chemtrade'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'chemtrade'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'chemtrade_widgets_init');

require get_template_directory() .'/inc/custom-function.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() .'/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() .'/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() .'/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() .'/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() .'/inc/jetpack.php';
}

/**
 * Enqueue scripts and styles.
 */
function chemtrade_scripts() {
    $themeVersion = wp_get_theme()->Version;
	wp_enqueue_style('chemtrade-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('chemtrade-style', 'rtl', 'replace');
	wp_enqueue_script('chemtrade-navigation', get_template_directory_uri() .'/js/navigation.js', array(), _S_VERSION, true);
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	// custom css for all pages
	wp_register_style('main-css',get_template_directory_uri() .'/assets/css/main.css', array(), false, 'all');
    wp_enqueue_style('main-css');

    wp_register_script('main-js',get_template_directory_uri() .'/assets/js/main.js', array(), $themeVersion, true);
    wp_localize_script('main-js', 'myajax', array('ajaxurl' => admin_url('admin-ajax.php'), 'directory_url' => get_template_directory_uri()));
    wp_enqueue_script('main-js');
}
add_action('wp_enqueue_scripts', 'chemtrade_scripts');

/**
 * register all menus
 */
register_nav_menus(
    array(
        'header-1-menu' => __('Header 1 menu','theme'),
        'header-2-menu' => __('Header 2 menu','theme'),
        'footer-menu' => __('Footer menu','theme'),
        'footer-link' => __('Footer link','theme'),
        'mega-menu' => __('Mega Menu','theme'),
  )
);

/**
 * Create Custom post type Product
 */
function create_custom_post_type() {
    $supports = array(
    'title',
    'editor',
    'author',
    'thumbnail',
    'excerpt',
    'custom-fields',
    'comments',
    'revisions',
    'post-formats',
  ); 
    $labels = array(
    'name' => _x('Product', 'plural'),
    'singular_name' => _x('Product', 'singular'),
    'menu_name' => _x('Product', 'admin menu'),
    'name_admin_bar' => _x('Product', 'admin bar'),
    'add_new' => _x('Add New', 'add new'),
    'add_new_item' => __('Add New Product'),
    'new_item' => __('New Product'),
    'edit_item' => __('Edit Product'),
    'view_item' => __('View Product'),
    'all_items' => __('All Products'),
    'search_items' => __('Search Products'),
    'not_found' => __('No Products found.'),
   );
    $args = array(
    'supports' => $supports,
    'labels' => $labels,
    'description' => 'Holds our Products and specific data',
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_in_admin_bar' => true,
    'can_export' => true,
    'capability_type' => 'post',
    'show_in_rest' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'product'),
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => 25,
    'menu_icon' => 'dashicons-megaphone',
   );
    register_post_type('product',$args);
}
add_action('init', 'create_custom_post_type');

/**
 * create option page.
 */
if (function_exists('acf_add_options_page')) {
	acf_add_options_page('Theme Setting');
}

/**
 * create custom texonomy Product Type
 */
function create_custom_taxonomy() {
    $labels = array(
        'name' => 'Types',
        'singular_name' => 'Type',
        'search_items' => 'Search Types',
        'all_items' => 'All Types',
        'parent_item' => 'Parent Type',
        'parent_item_colon' => 'Parent Type:',
        'edit_item' => 'Edit Type',
        'update_item' => 'Update Type',
        'add_new_item' => 'Add New Type',
        'new_item_name' => 'New Type Name',
        'menu_name' => 'Type',
   );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug'=>'type'),
   );
    register_taxonomy('type',array('product'),$args);
}
add_action('init','create_custom_taxonomy');

/**
 * change product slug in frontend
 */
function space_change_custom_taxonomy_slug_args($taxonomy, $object_type, $args) {
    if ('type' == $taxonomy) { 
        remove_action(current_action(), __FUNCTION__);
        $args['rewrite'] = array('slug' => 'products');
        register_taxonomy($taxonomy, $object_type, $args);
    }
}
add_action('registered_taxonomy', 'space_change_custom_taxonomy_slug_args', 10, 3);

/**
 * Create Custom post type SDS
 */
function create_custom_post_type_SDS() {
    $supports = array(
    'title',
    'editor',
    'author',
    'thumbnail',
    'excerpt',
    'custom-fields',
    'comments',
    'revisions',
    'post-formats',
   ); 
    $labels = array(
    'name' => _x('SDS', 'plural'),
    'singular_name' => _x('SDS', 'singular'),
    'menu_name' => _x('SDS', 'admin menu'),
    'name_admin_bar' => _x('SDS', 'admin bar'),
    'add_new' => _x('Add SDS', 'add new'),
    'add_new_item' => __('Add New SDS'),
    'new_item' => __('New SDS'),
    'edit_item' => __('Edit SDS'),
    'view_item' => __('View SDS'),
    'all_items' => __('All SDS'),
    'search_items' => __('Search SDS'),
    'not_found' => __('No SDS found.'),
   );
    $args = array(
    'supports' => $supports,
    'labels' => $labels,
    'description' => 'Holds our SDS and specific data',
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_in_admin_bar' => true,
    'can_export' => true,
    'capability_type' => 'post',
    'show_in_rest' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'sds'),
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => 25,
    'menu_icon' => 'dashicons-megaphone',
   );
    register_post_type('sds',$args);
}
add_action('init', 'create_custom_post_type_SDS');

/**
 * add svg support
 */

function add_file_types_to_uploads($file_types) {
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes);
    return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

/**
 * Create Custom post type News
 */
function create_custom_post_type_News() {
    $supports = array(
    'title',
    'editor',
    'author',
    'thumbnail',
    'excerpt',
    'custom-fields',
    'comments',
    'revisions',
    'post-formats',
   ); 
    $labels = array(
    'name' => _x('News', 'plural'),
    'singular_name' => _x('News', 'singular'),
    'menu_name' => _x('News', 'admin menu'),
    'name_admin_bar' => _x('News', 'admin bar'),
    'add_new' => _x('Add New', 'add new'),
    'add_new_item' => __('Add New News'),
    'new_item' => __('New News'),
    'edit_item' => __('Edit News'),
    'view_item' => __('View News'),
    'all_items' => __('All News'),
    'search_items' => __('Search News'),
    'not_found' => __('No News found.'),
   );
    $args = array(
    'supports' => $supports,
    'labels' => $labels,
    'description' => 'Holds our News and specific data',
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_in_admin_bar' => true,
    'can_export' => true,
    'capability_type' => 'post',
    'show_in_rest' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'news','with_front' => false),
    'has_archive' => false,
    'hierarchical' => true,
    'menu_position' => 25,
    'menu_icon' => 'dashicons-megaphone',
   );
    register_post_type('news',$args);
}
add_action('init', 'create_custom_post_type_News');

/**
 * Create Custom post type Document
 */
function create_custom_post_type_Document() {
    $supports = array(
    'title',
    'editor',
    'author',
    'thumbnail',
    'excerpt',
    'custom-fields',
    'comments',
    'revisions',
    'post-formats',
   ); 
    $labels = array(
    'name' => _x('Document', 'plural'),
    'singular_name' => _x('Document', 'singular'),
    'menu_name' => _x('Document', 'admin menu'),
    'name_admin_bar' => _x('Document', 'admin bar'),
    'add_new' => _x('Add New', 'add new'),
    'add_new_item' => __('Add New Document'),
    'new_item' => __('New Document'),
    'edit_item' => __('Edit Document'),
    'view_item' => __('View Document'),
    'all_items' => __('All Documents'),
    'search_items' => __('Search Documents'),
    'not_found' => __('No Documents found.'),
   );
    $args = array(
    'supports' => $supports,
    'labels' => $labels,
    'description' => 'Holds our Documents and specific data',
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_in_admin_bar' => true,
    'can_export' => true,
    'capability_type' => 'post',
    'show_in_rest' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'document'),
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => 25,
    'menu_icon' => 'dashicons-megaphone',
   );
    register_post_type('document',$args);
}
add_action('init', 'create_custom_post_type_Document');

/**
 * upload .ico file as site identity
 */
define('ALLOW_UNFILTERED_UPLOADS', true);

/**
 * add search icon in header 1 menu
 */
function your_custom_menu_item ($items, $args) {
    $header_search_image_icon = get_field('header_search_image_icon','options');
    if ( $args->theme_location == 'header-1-menu') {
        $items .= '<li><a href="#" class="search-btn" title="'.$header_search_image_icon['title'].'"><img src="'.$header_search_image_icon['url'].'" alt="'.$header_search_image_icon['alt'].'" title="'.$header_search_image_icon['title'].'"></a></li>';
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'your_custom_menu_item', 10, 2);

/**
 * remove search class for search page
 */
function remove_body_classes($classes) {
    $remove_classes = ['search'];
    $classes = array_diff($classes, $remove_classes);
    return $classes;
}
add_filter('body_class', 'remove_body_classes');

/**
 * max mega menu
 */
function megamenu_override_default_theme($value) {
    if ( !isset($value['header-2-menu']['theme']) ) {
      $value['header-2-menu']['theme'] = 'chemtrade';
    }  
    return $value;
  }
  add_filter('default_option_megamenu_settings', 'megamenu_override_default_theme');
?>