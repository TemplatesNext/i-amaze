<?php
/**
 * i-amaze functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package i-amaze
 * @since i-amaze 1.0
 */

/*
 * Set up the content width value based on the theme's design.
 *
 * @see iamaze_content_width() for template-specific adjustments.
 */
if ( ! isset( $content_width ) )
	$content_width = 604;


/**
 * i-amaze only works in WordPress 3.6 or later.
 */

/**
 * i-amaze setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * i-amaze supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.  
 * @uses add_editor_style() To add Visual Editor stylesheets.
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since i-amaze 1.0
 *
 * @return void
 */
function iamaze_setup() {
	/*
	 * Makes i-amaze available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on i-amaze, use a find and
	 * replace to change 'i-amaze' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'i-amaze', get_template_directory() . '/languages' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'fonts/genericons.css', iamaze_fonts_url() ) );
	//add_editor_style( array( 'css/admin-style.css', array(), '2016-05-22' ) );	

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Switches default core markup for search form, comment form,
	 * and comments to output valid HTML5.
	 */
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Navigation Menu', 'i-amaze' ) );
	
	// add title tag support since WordPress 4.1 
	add_theme_support( 'title-tag' );		

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 604, 270, true );

	/*
	 * additional Image sizes.
	 */
	//add_image_size( 'iamaze-slider-thumb', 1920, 1080, true ); //(cropped)	
	add_image_size( 'iamaze-slider-thumb', 1280, 720, true ); //(cropped)	
	add_image_size( 'iamaze-single-thumb', 1200, 480, true ); //(cropped)
	
	// Add Support for woocommerce
	add_theme_support( 'woocommerce' );	
	
	$iamaze_defaults_bg = array(
		'default-color'          => '#f3f1ed',
		'default-image'          => get_template_directory_uri() . '/images/default-bg.png',
		'default-repeat'         => 'repeat-all'
	);	
	
	add_theme_support( 'custom-background', $iamaze_defaults_bg );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
	
	
	// Add theme logo //
	add_theme_support( 'custom-logo', array(
		'height'      => 64,
		'width'       => 280,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
	
	add_theme_support( 'customize-selective-refresh-widgets' );	
	
}
add_action( 'after_setup_theme', 'iamaze_setup' );


/**
 * Return the Google font stylesheet URL, if available.
 *
 * The use of Source Sans Pro and Bitter by default is localized. For languages
 * that use characters not supported by the font, the font can be disabled.
 *
 * @since i-amaze 1.0
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function iamaze_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Open Sans, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	 //fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,600,700|Roboto:400,400italic,500italic,700italic'
	$open_sans = _x( 'on', 'Open Sans font: on or off', 'i-amaze' );

	/* Translators: If there are characters in your language that are not
	 * supported by Roboto, translate this to 'off'. Do not translate into your
	 * own language.
	 */
	$roboto = _x( 'on', 'Roboto font: on or off', 'i-amaze' );

	if ( 'off' !== $open_sans || 'off' !== $roboto ) {
		$font_families = array();

		if ( 'off' !== $open_sans )
			$font_families[] = 'Open Sans:300,400,700,300italic,400italic,700italic';

		if ( 'off' !== $roboto )
			$font_families[] = 'Roboto:300,400,700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}

	return $fonts_url;
}

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since i-amaze 1.0
 *
 * @return void
 */
function iamaze_scripts_styles() {
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
		
	// load masonry for footer and post layout
	wp_enqueue_script( 'jquery-masonry' );	

	// Loads JavaScript file with functionality specific to i-amaze.
	//wp_enqueue_script( 'modernizer-custom', get_template_directory_uri() . '/js/modernizr.custom.js', array( 'jquery' ), '2014-01-13', true );
	
	// Loads JavaScript file for scroll related functions and animations.
	wp_enqueue_script( 'iamaze-waypoint', get_template_directory_uri() . '/js/waypoints.min.js', array( 'jquery' ), '2014-01-13', true );
	
	// Loads JavaScript file for small screen side menu.
	wp_enqueue_script( 'iamaze-sidr', get_template_directory_uri() . '/js/jquery.sidr.min.js', array( 'jquery' ), '2014-01-13', true );
	
	// Loads JavaScript file for jquery carousel
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), '2014-01-13', true );
	
	// Loads JavaScript file for inview
	wp_enqueue_script( 'inview', get_template_directory_uri() . '/js/jquery.inview.min.js', array( 'jquery' ), '1.1.2', true );		
	
	// Loads JavaScript file for pace preloader
	//wp_enqueue_script( 'pace', get_template_directory_uri() . '/js/pace.min.js', array( 'jquery' ), '1.1.2', true );				
	
	// Loads JavaScript file with functionality specific to i-amaze.
	wp_enqueue_script( 'iamaze-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '2013-07-18', true );
	
	
	$blog_layout = get_theme_mod('blog_layout', '2');

	// Add Source Sans Pro and Bitter fonts, used in the main stylesheet.
	wp_enqueue_style( 'iamaze-fonts', iamaze_fonts_url(), array(), null );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/fonts/genericons.css', array(), '2.09' );
	
	// Add Animate stle, used used for css animations.
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.min.css', array(), '2014-01-12' );
	
	// Add Animate stle, used used for side menu.
	wp_enqueue_style( 'iamaze-sidr', get_template_directory_uri() . '/css/jquery.sidr.dark.css', array(), '2014-01-12' );	
	
	// Add owl-carusel style
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css', array(), '2014-01-12' );
	
	// Add owl-carusel theme
	wp_enqueue_style( 'owl-carousel-theme', get_template_directory_uri() . '/css/owl.theme.css', array(), '2014-01-12' );	
	
	// Add owl-carusel transition
	wp_enqueue_style( 'owl-carousel-transitions', get_template_directory_uri() . '/css/owl.transitions.css', array(), '2014-01-12' );				
	
	// Loads our main stylesheet.
	wp_enqueue_style( 'iamaze-style', get_stylesheet_uri(), array(), '2013-07-18' );
	
	// blog posts layout style
	if ( $blog_layout == '2' ) {
		wp_enqueue_style( 'i-amaze-blog-layout', get_template_directory_uri() . '/css/twocol-blog.css', array(), '2014-03-11' );	
	}

	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'iamaze-ie', get_template_directory_uri() . '/css/ie.css', array( 'iamaze-style' ), '2013-07-18' );
	wp_style_add_data( 'iamaze-ie', 'conditional', 'lt IE 9' );
	
	
	wp_enqueue_style( 'i-amaze-extra-stylesheet', get_template_directory_uri() . '/css/extra-style.css', array(), '2014-03-11' );
	$custom_css = wp_filter_nohtml_kses(get_theme_mod('extra_style', ''), '');
	
	if ( $custom_css ) {
		wp_add_inline_style( 'i-amaze-extra-stylesheet', $custom_css );
	}
}
add_action( 'wp_enqueue_scripts', 'iamaze_scripts_styles' );

/**
 * add body class for boxed layout.
 *
 * @since i-amaze 1.0
 */
add_filter( 'body_class', 'iamaze_layout_body_class' );
function iamaze_layout_body_class( $classes ) {
	// add 'class-name' to the $classes array
	
	if ( get_theme_mod('wide_layout', '1') != 0 )
	{
		$classes[] = 'nx-wide';		
	} else
	{
		$classes[] = 'nx-boxed';
	}
	
	// return the $classes array
	return $classes;
}


/**
 * Register two widget areas.
 *
 * @since i-amaze 1.0
 *
 * @return void
 */
function iamaze_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Widget Area', 'i-amaze' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Appears in the footer section of the site.', 'i-amaze' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Main Sidebar Widget Area', 'i-amaze' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears on posts and pages in the sidebar.', 'i-amaze' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    
}
add_action( 'widgets_init', 'iamaze_widgets_init' );


if ( ! function_exists( 'iamaze_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
*
* @since i-amaze 1.0
*
* @return void
*/
function iamaze_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'i-amaze' ); ?></h1>
		<div class="nav-links">

			<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'i-amaze' ) ); ?>
			<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'i-amaze' ) ); ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;


// Add specific CSS class by filter

add_filter( 'body_class', 'iamaze_twocol_blog_body_class' );
function iamaze_twocol_blog_body_class( $classes ) {

	if ( get_theme_mod('blog_layout', '2') == '2' ) {
		$classes[] = 'twocol-blog';
	} else
	{
		$classes[] = 'onecol-blog';
	}
	return $classes;
}




if ( ! function_exists( 'iamaze_entry_meta' ) ) :
/**
 * Print HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own iamaze_entry_meta() to override in a child theme.
 *
 * @since i-amaze 1.0
 *
 * @return void
 */
function iamaze_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post">' . __( 'Sticky', 'i-amaze' ) . '</span>';

	if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
		iamaze_entry_date();

	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'i-amaze' ) );
	if ( $categories_list ) {
		echo '<span class="categories-links">' . $categories_list . '</span>';
	}

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'i-amaze' ) );
	if ( $tag_list ) {
		echo '<span class="tags-links">' . $tag_list . '</span>';
	}

	// Post author
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'i-amaze' ), get_the_author() ) ),
			get_the_author()
		);
	}
}
endif;

if ( ! function_exists( 'iamaze_entry_date' ) ) :
/**
 * Print HTML with date information for current post.
 *
 * Create your own iamaze_entry_date() to override in a child theme.
 *
 * @since i-amaze 1.0
 *
 * @param boolean $echo (optional) Whether to echo the date. Default true.
 * @return string The HTML-formatted post date.
 */
function iamaze_entry_date( $echo = true ) {
	if ( has_post_format( array( 'chat', 'status' ) ) )
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'i-amaze' );
	else
		$format_prefix = '%2$s';

	$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'i-amaze' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);

	if ( $echo )
		echo $date;

	return $date;
}
endif;

if ( ! function_exists( 'iamaze_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since i-amaze 1.0
 *
 * @return void
 */
function iamaze_the_attached_image() {
	/**
	 * Filter the image attachment size to use.
	 *
	 * @since i-amaze 1.0
	 *
	 * @param array $size {
	 *     @type int The attachment height in pixels.
	 *     @type int The attachment width in pixels.
	 * }
	 */
	$attachment_size     = apply_filters( 'iamaze_attachment_size', array( 724, 724 ) );
	$next_attachment_url = wp_get_attachment_url();
	$post                = get_post();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Return the post URL.
 *
 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @since i-amaze 1.0
 *
 * @return string The Link format URL.
 */
function iamaze_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Active widgets in the sidebar to change the layout and spacing.
 * 3. When avatars are disabled in discussion settings.
 *
 * @since i-amaze 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function iamaze_body_class( $classes ) {
	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	if ( is_active_sidebar( 'sidebar-2' ) && ! is_attachment() && ! is_404() )
		$classes[] = 'sidebar';

	if ( ! get_option( 'show_avatars' ) )
		$classes[] = 'no-avatars';

	return $classes;
}
add_filter( 'body_class', 'iamaze_body_class' );

/**
 * Adjust content_width value for video post formats and attachment templates.
 *
 * @since i-amaze 1.0
 *
 * @return void
 */
function iamaze_content_width() {
	global $content_width;

	if ( is_attachment() )
		$content_width = 724;
	elseif ( has_post_format( 'audio' ) )
		$content_width = 484;
}
add_action( 'template_redirect', 'iamaze_content_width' );

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since i-amaze 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 * @return void
 */
function iamaze_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => 'a.home-link .site-title',
		'render_callback' => 'iamaze_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => 'a.home-link .site-description',
		'render_callback' => 'iamaze_customize_partial_blogdescription',
	) );

	$wp_customize->selective_refresh->add_partial( 'slider_stat', array(
		'selector' => '.site .iheader',
		'container_inclusive' => false,
		'settings' => array( 'slider_stat' ), //
		//'render_callback' => 'iamaze_customize_partial_normal_logo',
	) );
		/**/
}
add_action( 'customize_register', 'iamaze_customize_register' );

function iamaze_customize_partial_blogname() {
	bloginfo( 'name' );
}

function iamaze_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function iamaze_customize_partial_normal_logo() {
	$custom_logo_image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	$custom_logo_image = $custom_logo_image[0];
	echo esc_url($custom_logo_image);
}


/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JavaScript handlers to make the Customizer preview
 * reload changes asynchronously.
 *
 * @since i-amaze 1.0
 *
 * @return void
 */
 

function iamaze_customize_preview_js() {
	wp_enqueue_script( 'iamaze-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130226', true );
}
add_action( 'customize_preview_init', 'iamaze_customize_preview_js' );


/*-----------------------------------------------------------------------------------*/
/*	Metabox
/*-----------------------------------------------------------------------------------*/ 

include( get_template_directory() . '/inc/tnext-meta.php' );

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// check for plugin using plugin name
/*
if ( ! is_plugin_active( 'templatesnext-toolkit/tx-toolkit.php' ) && ! is_plugin_active( 'meta-box/meta-box.php' ) ) 
{
	require_once( get_template_directory() . '/inc/meta-box/meta-box.php' );
}
*/



/*-----------------------------------------------------------------------------------*/
/*	Custom Functions
/*-----------------------------------------------------------------------------------*/ 

include get_template_directory() . '/inc/custom_functions.php';

include get_template_directory() . '/inc/iamaze-custom-style.php';

/*-----------------------------------------------------------------------------------*/
/*	changing default Excerpt length 
/*-----------------------------------------------------------------------------------*/ 

function iamaze_excerpt_length($length) {
	return 32;
}
add_filter('excerpt_length', 'iamaze_excerpt_length');


/*-----------------------------------------------------------------------------------*/
/*	changing changing default read more text 
/*-----------------------------------------------------------------------------------*/ 
function iamaze_excerpt_more($more) {
       global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '">'. __( 'Read More...', 'i-amaze' ). '</a>';
}
add_filter('excerpt_more', 'iamaze_excerpt_more');


/*-----------------------------------------------------------------------------------*/
/*	Adding customizer with kirki 
/*-----------------------------------------------------------------------------------*/ 
include get_template_directory() . '/nx-customizer.php' ;
include get_template_directory() . '/inc/kirki/kirki.php' ;

/**
 * Add a stylesheet for admin panels
 * @since i-spirit 1.0
 */
add_action('admin_init', 'iamaze_admin_css');
function iamaze_admin_css() {
   wp_register_style( 'iamaze-admin-css', get_template_directory_uri() . '/css/admin-style.css' );
   wp_enqueue_style( 'iamaze-admin-css' );
}

add_action( 'admin_enqueue_scripts', 'iamaze_admin_js' );
function iamaze_admin_js() {
    wp_enqueue_script( 'iamaze_admin_script', get_template_directory_uri() . '/js/admin-script.js' );
}


/*
Kirki Style
function mytheme_kirki_configuration() {
    return array( 'url_path'     => get_stylesheet_directory_uri() . '/inc/kirki/' );
}
add_filter( 'kirki/config', 'mytheme_kirki_configuration' );
*/

/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */

// Remove WooCommerce Native Breadcrumb
add_action( 'init', 'iamaze_remove_wc_breadcrumbs' );
function iamaze_remove_wc_breadcrumbs() {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

// Adding TGM Plugin activation
include get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'iamaze_register_required_plugins' );
function iamaze_register_required_plugins() {

    /**
* Array of plugin arrays. Required keys are name and slug.
* If the source is NOT from the .org repo, then source is also required.
*/
    $plugins = array(

         // This is an example of how to include a plugin from a private repo in your theme.
        array(
            'name' => 'Breadcrumb NavXT', // The plugin name.
            'slug' => 'breadcrumb-navxt', // The plugin slug (typically the folder name).
            'required' => false, // If false, the plugin is only 'recommended' instead of required.
        ),
         // This is an example of how to include a plugin from a private repo in your theme.
        array(
            'name' => 'TemplatesNext ToolKit', // The plugin name.
            'slug' => 'templatesnext-toolkit', // The plugin slug (typically the folder name).
            'required' => false, // If false, the plugin is only 'recommended' instead of required.
        )		

    );

    /**
* Array of configuration settings. Amend each line as needed.
* If you want the default strings to be available under your own theme domain,
* leave the strings uncommented.
* Some of the strings are added into a sprintf, so see the comments at the
* end of each line for what each argument will be.
*/
    $config = array(
        'id' => 'tgmpa', // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '', // Default absolute path to pre-packaged plugins.
        'menu' => 'tgmpa-install-plugins', // Menu slug.
        'has_notices' => true, // Show admin notices or not.
        'dismissable' => true, // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false, // Automatically activate plugins after installation or not.
        'message' => '', // Message to output right before the plugins table.
        'strings' => array(
            'page_title' => __( 'Install Required Plugins', 'i-amaze' ),
            'menu_title' => __( 'Install Plugins', 'i-amaze' ),
            'installing' => __( 'Installing Plugin: %s', 'i-amaze' ), // %s = plugin name.
            'oops' => __( 'Something went wrong with the plugin API.', 'i-amaze' ),
            'notice_can_install_required' => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'i-amaze' ), // %1$s = plugin name(s).
            'notice_can_install_recommended' => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'i-amaze' ), // %1$s = plugin name(s).
            'notice_cannot_install' => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'i-amaze' ), // %1$s = plugin name(s).
            'notice_can_activate_required' => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'i-amaze' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'i-amaze' ), // %1$s = plugin name(s).
            'notice_cannot_activate' => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'i-amaze' ), // %1$s = plugin name(s).
            'notice_ask_to_update' => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'i-amaze' ), // %1$s = plugin name(s).
            'notice_cannot_update' => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'i-amaze' ), // %1$s = plugin name(s).
            'install_link' => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'i-amaze' ),
            'activate_link' => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'i-amaze' ),
            'return' => __( 'Return to Required Plugins Installer', 'i-amaze' ),
            'plugin_activated' => __( 'Plugin activated successfully.', 'i-amaze' ),
            'complete' => __( 'All plugins installed and activated successfully. %s', 'i-amaze' ), // %s = dashboard link.
            'nag_type' => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}

