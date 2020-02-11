<?php
function wph_theme_support() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Custom background color.
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'f5efe0',
		)
	);

	// Set content-width.
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 580;
	}

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Set post thumbnail size.
	set_post_thumbnail_size( 1200, 9999 );

	// Add custom image size used in Cover Template.
	add_image_size( 'wph-fullscreen', 1980, 9999 );

	// Custom logo.
	$logo_width  = 120;
	$logo_height = 90;

	// If the retina setting is active, double the recommended width and height.
	if ( get_theme_mod( 'retina_logo', false ) ) {
		$logo_width  = floor( $logo_width * 2 );
		$logo_height = floor( $logo_height * 2 );
	}

	add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

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
			'script',
			'style',
		)
	);
 
	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	 

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	register_nav_menus(array(
		'main'=>'Menu Principal',
		'mobile'=>'Menu Movil', 
		'footer' =>'Footer Menú',
		'social'=>'Social Media' 

	)); 
 
}

add_action( 'after_setup_theme', 'wph_theme_support' );




//  Menus

// function wph_menus() {

// 	$locations = array(
// 		'primary'  => __( 'Menu Principal', 'wph' ),
// 		'expanded' => __( 'Menu Alternativo', 'wph' ),
// 		'mobile'   => __( 'Menu Mobile', 'wph' ),
// 		'footer'   => __( 'Menu Footer ', 'wph' ),
// 		'social'   => __( 'Redes Sociales', 'wph' ),
// 	);

// 	register_nav_menus( $locations );
// 	 // register Menu 
// }

// add_action( 'init', 'wph_menus' );



// Widgets
 
function wph_front_widgets(){
    register_sidebar(array(
        'name' => __('Footer Contact'),
        'id' =>'footer_contact',
        'description'   => 'Contactos de la empresa',
        'before_widget' => '<div class="footer-contact">',
        'after_widget'  => '</div>' 
 
    )); 
  
}
add_action('widgets_init', 'wph_front_widgets');

// Logo

function wph_get_custom_logo( $html ) {

	$logo_id = get_theme_mod( 'custom_logo' );

	if ( ! $logo_id ) {
		return $html;
	}

	$logo = wp_get_attachment_image_src( $logo_id, 'full' );

	if ( $logo ) {
		// For clarity.
		$logo_width  = esc_attr( $logo[1] );
		$logo_height = esc_attr( $logo[2] );

		// If the retina logo setting is active, reduce the width/height by half.
		if ( get_theme_mod( 'retina_logo', false ) ) {
			$logo_width  = floor( $logo_width / 2 );
			$logo_height = floor( $logo_height / 2 );

			$search = array(
				'/width=\"\d+\"/iU',
				'/height=\"\d+\"/iU',
			);

			$replace = array(
				"width=\"{$logo_width}\"",
				"height=\"{$logo_height}\"",
			);

			// Add a style attribute with the height, or append the height to the style attribute if the style attribute already exists.
			if ( strpos( $html, ' style=' ) === false ) {
				$search[]  = '/(src=)/';
				$replace[] = "style=\"height: {$logo_height}px;\" src=";
			} else {
				$search[]  = '/(style="[^"]*)/';
				$replace[] = "$1 height: {$logo_height}px;";
			}

			$html = preg_replace( $search, $replace, $html );

		}
	}

	return $html;

}

add_filter( 'get_custom_logo', 'wph_get_custom_logo' ); 



//Menu
function wph_setup(){ 
  add_theme_support('html5', array(
    'comment-list',
    'comment-form',
    'search-form',
    'gallery',
    'caption'
  ));
  add_theme_support( 'post-formats', array ( 
    'aside',
    'gallery',
    'link',
    'image',
    'quote',
    'status',
    'video',
    'audio',
    'chat' 
    ) ); 
  add_theme_support('post-thumbnails'); 
  add_theme_support('title-tag');
  add_theme_support('automatic-feed-links'); //Para lectures de RSD
  remove_action('wp_head', 'wp_generator'); //Eliminar La version de  wordpress del codigo
}
add_action('after_setup_theme', 'wph_setup');