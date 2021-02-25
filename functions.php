<?php
/**
 * steppenwolf functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package steppenwolf
 */

if ( ! defined( 'STEPPENWOLF_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'STEPPENWOLF_VERSION', '1.0.0' );
}

if ( ! function_exists( 'steppenwolf_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function steppenwolf_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on steppenwolf, use a find and replace
		 * to change 'steppenwolf' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'steppenwolf', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in two location.
		register_nav_menus(
			array(
				'header' => esc_html__( 'Primary', 'steppenwolf' ),
				'social' => esc_html__( 'Social', 'steppenwolf' ),
				'terms' => esc_html__( 'Terms', 'steppenwolf' ),
			)
		);

    class Primary_Walker_Nav_Menu extends Walker_Nav_Menu
    {
    function start_lvl(&$output, $depth = 0, $args = array())
      {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu level-$depth\" role=\"menu\">\n";
      }
    }

    class WO_Nav_Social_Walker extends Walker_Nav_Menu
    {
      function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent\n";
      }
      function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent\n";
      }
      function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
        $output .= $indent . '';
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $item_output = $args->before;
            if (strpos($item->url, 'facebook') !== false) {
                $item_output .= '<a'. $attributes .'><i class="fab fa fa-facebook-f"></i>';
                $item_output .= '</a>';
                $item_output .= $args->after;
            } elseif (strpos($item->url, 'twitter') !== false)  {
                $item_output .= '<a'. $attributes .'><i class="fab fa fa-twitter">';
                $item_output .= '</i></a>';
                $item_output .= $args->after;
            } elseif (strpos($item->url, 'instagram') !== false)  {
                $item_output .= '<a'. $attributes .'><i class="fab fa fa-instagram">';
                $item_output .= '</i></a>';
                $item_output .= $args->after;
            } elseif (strpos($item->url, 'youtube') !== false)  {
                $item_output .= '<a'. $attributes .'><i class="fab fa fa-youtube-play">';
                $item_output .= '</i></a>';
                $item_output .= $args->after;
            }  elseif (strpos($item->url, 'snapchat') !== false)  {
                $item_output .= '<a'. $attributes .'><i class="fab fa fa-snapchat">';
                $item_output .= '</i></a>';
                $item_output .= $args->after;
            } elseif (strpos($item->url, 'vimeo') !== false)  {
                $item_output .= '<a'. $attributes .'><i class="fab fa fa-vimeo-v">';
                $item_output .= '</i></a>';
                $item_output .= $args->after;
            } 
        
        
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
      }
    function end_el( &$output, $item, $depth = 0, $args = array() ) {
      $output .= "\n";
    }
}
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
				'steppenwolf_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'steppenwolf_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function steppenwolf_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'steppenwolf_content_width', 640 );
}
add_action( 'after_setup_theme', 'steppenwolf_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function steppenwolf_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'steppenwolf' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'steppenwolf' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'steppenwolf_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function steppenwolf_scripts() {
  wp_enqueue_style( 'bootstrap-style', "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css", array(), null );
  wp_register_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js', array(), null, true );
  wp_enqueue_script( 'bootstrap' );

	wp_enqueue_style( 'steppenwolf-style', get_stylesheet_uri(), array(), STEPPENWOLF_VERSION );
	wp_style_add_data( 'steppenwolf-style', 'rtl', 'replace' );

	wp_enqueue_style( 'din-font', "https://use.typekit.net/vmm5oll.css", array(), null );

	wp_enqueue_script( 'steppenwolf-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), STEPPENWOLF_VERSION, true );
	wp_enqueue_script( 'font-awesome', 'https://use.fontawesome.com/2994bf75c1.js', array(), null, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'steppenwolf_scripts' );

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

/**
 * Widget for menu
 * Used mainly to insert a sendinblue/mailchimp subscribe form in the fullscreen menu
 */

 function menu_widget_init() {

	register_sidebar( array(
		'name'          => 'Menu widget',
		'id'            => 'menu_widget',
    'description'   => 'Widget area for menu',
		'before_widget' => '<div class="menu-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'menu_widget_init' );

/**
 * Widget for Footer Right
 * Used mainly to insert a contact form into the footer
 */

 function footer_right_widget() {

	register_sidebar( array(
		'name'          => 'Footer Right widget',
		'id'            => 'footer_right_widget',
    'description'   => 'Widget area for footer right',
		'before_widget' => '<div class="footer_right-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'footer_right_widget' );
