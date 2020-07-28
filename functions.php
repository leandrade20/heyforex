<?php
/**
 * webbiz functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package webbiz
 */

if ( ! function_exists( 'webbiz_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function webbiz_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on webbiz, use a find and replace
		 * to change 'webbiz' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'webbiz', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'webbiz' ),
			'menu-2' => esc_html__( 'Second', 'webbiz' ),
			'menu-3' => esc_html__( 'Mobile Menu', 'webbiz' ),
			'menu-4' => esc_html__( 'Footer Menu 1', 'webbiz' ),
			'menu-5' => esc_html__( 'Footer Menu 2', 'webbiz' ),
			'menu-6' => esc_html__( 'Footer Menu 3', 'webbiz' ),
			'menu-7' => esc_html__( 'Footer Menu 4', 'webbiz' ),
		) );

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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'webbiz_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		
		/**
		* Add support for SVG image uploads
		*
		*/
		function add_svg_to_upload_mimes( $upload_mimes ) {
			$upload_mimes['svg'] = 'image/svg+xml';
			$upload_mimes['svgz'] = 'image/svg+xml';
			return $upload_mimes;
		}
		add_filter( 'upload_mimes', 'add_svg_to_upload_mimes', 10, 1 );
	}
endif;
add_action( 'after_setup_theme', 'webbiz_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function webbiz_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'webbiz_content_width', 640 );
}
add_action( 'after_setup_theme', 'webbiz_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function webbiz_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'webbiz' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'webbiz' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Store Sidebar', 'webbiz' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'webbiz' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'webbiz_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function webbiz_scripts() {
	
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/fontawesome/css/fontawesome.css' );
	wp_enqueue_style( 'fontawesome-all', get_template_directory_uri() . '/fontawesome/css/fontawesome-all.css' );
	wp_enqueue_style( 'monrope-font', '//fonts.googleapis.com/css2?family=Manrope:wght@400;600;800&display=swap' );
	wp_enqueue_style( 'aos-css', '//unpkg.com/aos@2.3.1/dist/aos.css' );

	// wp_enqueue_style( 'font_unicons', '//unicons.iconscout.com/release/v2.0.1/css/unicons.css' );
	wp_enqueue_style( 'slick', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css' );
	wp_enqueue_style( 'slick_theme', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css' );
	// Styles
	if ( defined( 'WP_LOCAL_DEV' ) && WP_LOCAL_DEV ) {
		wp_enqueue_style( 'heyfx-style', get_template_directory_uri() . '/style.css', array(), filemtime( get_stylesheet_directory().'/style.css')  );
	} else {
		wp_enqueue_style( 'heyfx-style', get_template_directory_uri() . '/style.min.css', array(), filemtime( get_stylesheet_directory().'/style.min.css')  );
	}

	// Scripts
	$google_key = get_field('google_maps_key', 'option');
	if($google_key) {
		wp_enqueue_script('wbproject-g-maps-js', '//maps.googleapis.com/maps/api/js?v=3.exp&key='.$google_key, '', '', true );
	}
	wp_enqueue_script( 'bootstrap_tab', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array(), '20151215', true );
	wp_enqueue_script('ionicons', '//unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js', array(), '20151215', true );
	wp_enqueue_script( 'acf-google-maps', get_template_directory_uri() . '/js/acf-google-maps.js', array(), '20151215', true );
	wp_enqueue_script( 'heyfx-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'heyfx-modernizer', get_template_directory_uri() . '/js/modernizr.js', array(), '20151215', true );
	wp_enqueue_script( 'heyfx-browser', get_template_directory_uri() . '/js/browser_detect.js', array(), '20151215', true );
	wp_enqueue_script( 'heyfx-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'heyfx-js', get_template_directory_uri() . '/js/heyfx.js', array(), '20151215', true );
	wp_enqueue_script( 'scrollmagic', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.js', array(), '20151215', true );
	wp_enqueue_script( 'scrollmagic-plugin', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js', array(), '20151215', true );
	wp_enqueue_script( 'aos-js', '//unpkg.com/aos@2.3.1/dist/aos.js', array(), '20151215', true );
	wp_enqueue_script( 'heyfx-aos-js', get_template_directory_uri() . '/js/aos.js', array(), '20151215', true );
	
	// wp_enqueue_script( 'tweenmax', '//cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js', array(), '20151215', true );
	// wp_enqueue_script( 'menujs', get_template_directory_uri() . '/js/aos.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	if ( defined( 'WP_LOCAL_DEV' ) && WP_LOCAL_DEV ) {
		wp_register_script( 'webbiz-custom', get_template_directory_uri() . '/js/dist/bundle.js', array('jquery'), filemtime( get_stylesheet_directory().'/js/dist/bundle.js'), true );
	} else {
		wp_register_script( 'webbiz-custom', get_template_directory_uri() . '/js/dist/bundle.js', array('jquery'), filemtime( get_stylesheet_directory().'/js/dist/bundle.js'), true );
	}
	$backup_img = get_field('backup_img', 'option');
	$backup_img = $backup_img['url'];
	$local_array = array(
		'site_url' => get_home_url(),
		'post_per_page' => get_option( 'posts_per_page' ),
		'page_id' => get_the_id(),
		'backup_img' => $backup_img
	);

	wp_localize_script( 'webbiz-custom', 'local_vars', $local_array );		

	wp_enqueue_script( 'webbiz-custom');
}
add_action( 'wp_enqueue_scripts', 'webbiz_scripts' );

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

// CRM 
require get_template_directory() . '/inc/shortcode.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/crm.php';

/**
 * Customizer additions.
 */
 require get_template_directory() . '/inc/webbiz-functions.php';
 require get_template_directory() . '/inc/minify-html.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
// if ( class_exists( 'WooCommerce' ) ) {
// 	require get_template_directory() . '/inc/woocommerce.php';
// }

// Load Woocommerce customisations
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce/general.php';
}

// DIV SHORTCODE. Usage: [div id="ID" class="CLASS"]xxxx[/div]
function createDiv($atts, $content = null) {
	extract(shortcode_atts(array(
	   'id' => "",
	   'class' => "",
	), $atts));
 return '<div id="'. $id . '" class="'. $class . '" />' . $content . '</div>';
 }
 add_shortcode('div', 'createDiv');


// Filter except length to 35 words.
// tn custom excerpt length
function tn_custom_excerpt_length( $length ) {
	return 10;
	}
	add_filter( 'excerpt_length', 'tn_custom_excerpt_length', 999 );



	
	// Register Custom Post Type Contest
function create_contest_cpt() {

	$labels = array(
		'name' => _x( 'Contests', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Contest', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Contests', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Contest', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Contest Archives', 'textdomain' ),
		'attributes' => __( 'Contest Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Contest:', 'textdomain' ),
		'all_items' => __( 'All Contests', 'textdomain' ),
		'add_new_item' => __( 'Add New Contest', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Contest', 'textdomain' ),
		'edit_item' => __( 'Edit Contest', 'textdomain' ),
		'update_item' => __( 'Update Contest', 'textdomain' ),
		'view_item' => __( 'View Contest', 'textdomain' ),
		'view_items' => __( 'View Contests', 'textdomain' ),
		'search_items' => __( 'Search Contest', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Contest', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Contest', 'textdomain' ),
		'items_list' => __( 'Contests list', 'textdomain' ),
		'items_list_navigation' => __( 'Contests list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Contests list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Contest', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-book',
		'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'contest', $args );

}
add_action( 'init', 'create_contest_cpt', 0 );

 /* IF Affiliate code set cookie */
 function if_name_set_cookie($ref, $name) {

	if (isset($_GET[$ref])) {
		$path = $_SERVER['HTTP_HOST'] == "localhost" ? '/' : null;
		$domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
		setcookie($name, $_GET[$ref], time() + 86400 * 30, '/', $domain);  /* expire in 24 hour */
	}
}
	
if_name_set_cookie('refid', 'affiliatedTo');
if_name_set_cookie('cmp', 'campaignId');

function is_cookie_set($ref, $name) {
	if ( isset($_GET[$ref]) ) {
			return  $cookie =$_GET[$ref];
	} else {
			if ( isset($_COOKIE[$name]) ) {
				return   $cookie = $_COOKIE[$name];
			} else {
				return $cookie = '';
			}
	}
}



add_filter( 'nav_menu_link_attributes', function ( $atts, $item, $args ) {
    if ( 'animated' === $item->classes[0] ) {
		$atts['data-aos'] = 'fade-left';

    }

    return $atts;
}, 10, 3 );