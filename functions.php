<?php
/**
 * Georgia Workers’ Compensation functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Georgia_Workers’_Compensation
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'georgia_workers_comp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function georgia_workers_comp_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Georgia Workers’ Compensation, use a find and replace
		 * to change 'georgia-workers-comp' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'georgia-workers-comp', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'georgia-workers-comp' ),
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
				'georgia_workers_comp_custom_background_args',
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
add_action( 'after_setup_theme', 'georgia_workers_comp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function georgia_workers_comp_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'georgia_workers_comp_content_width', 640 );
}
add_action( 'after_setup_theme', 'georgia_workers_comp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function georgia_workers_comp_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar Left', 'georgia-workers-comp' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'georgia-workers-comp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar Right', 'georgia-workers-comp' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'georgia-workers-comp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'georgia_workers_comp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function georgia_workers_comp_scripts() {
	wp_enqueue_style( 'georgia-workers-comp-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'georgia-workers-comp-style', 'rtl', 'replace' );

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/dist/bootstrap.min.js', array('jquery'), '4.3.1', true );

	wp_enqueue_script( 'anchor_scroll', get_template_directory_uri() . '/js/anchorscroll.js', array('jquery'), '20151215', true );

	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/custom.css', array(), '4.4.1', 'all' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'georgia_workers_comp_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

// Register Custom Navigation Walker
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

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

/* 
	remove archive from title on archive pages
	solution from https://developer.wordpress.org/reference/functions/get_the_archive_title/
	*/
	
	function my_theme_archive_title( $title ) {
		if ( is_category() ) {
			$title = single_cat_title( 'Category: ', false );
		} elseif ( is_post_type_archive('authors') ) {
			$title = "Authors";
		} elseif ( is_post_type_archive('articles') ) {
			$title = "Articles";
		} elseif ( is_tag() ) {
			$title = single_tag_title( 'Posts Tagged: ', false );
		} elseif ( is_author() ) {
			$title = 'Posts by <span class="vcard">' . get_the_author() . '</span>';
		} elseif ( is_post_type_archive() ) {
			$title = post_type_archive_title( '', false );
		} elseif ( is_tax() ) {
			$title = single_term_title( '', false );
		}
	  
		return $title;
	}
	 
	add_filter( 'get_the_archive_title', 'my_theme_archive_title' );

/*
 * get authors
 */

function ga_authors($outputString){		
	$authorNumber = count(get_field('authors')); //get the total number of authors from our Author field
	$leftText = "by ";
	//if we pass an argument to the function, that argument will be the left text
	if ($outputString !== '') {
		$leftText = $outputString;
	}
					
		if ($authorNumber == 1) { //just one author
				$authors = get_field('authors');
				foreach ($authors as $author) {
				    $name = get_the_title( $author->ID );
					$organization = get_field( 'organization', $author->ID );
					$url = get_field( 'url', $author->ID );
					echo esc_html( $leftText );
					echo esc_html( $name );
					if ( $organization ) {
						echo '<br />';
						echo esc_html( $organization );	
  					}
					if ( $url ) {
						echo '<br /><a href="'. $url .'" target="_blank" rel="noopener noreferrer">' . $url . '</a>';
  					}
				} 
		} else { //two authors
				echo "$leftText";
				$authors = get_field('authors');
				$i = 0;
				foreach ($authors as $author) {
					$i++;
					$name = get_the_title( $author->ID );
					$organization = get_field( 'organization', $author->ID );
					$url = get_field( 'url', $author->ID );
					echo esc_html( $name );
					if ( $organization ) {
						echo ' - ';
						echo esc_html( $organization );	
  					}
					if ( $url ) {
						echo '- <a href="'. $url .'" target="_blank" rel="noopener noreferrer">' . $url . '</a>';
  					}
					if ($i != $authorNumber) echo', and ';
			}
		}			
}