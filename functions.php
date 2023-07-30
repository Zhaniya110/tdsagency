<?php
/**
 * This file adds functions to the Techlab Digital Solutions Agency WordPress theme.
 *
 * @package Techlab Digital Solutions Agency
 * @author Zhaniya Meiramova
 * @license GNU General Public License v2 or later
 * @link    https://techlabds.com
 */

if ( ! function_exists( 'tdsagency_setup' ) ) {

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since 0.8.0
	 *
	 * @return void
	 */
	function tdsagency_setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'tdsagency', get_template_directory() . '/languages' );

		// Enqueue editor styles and fonts.
		add_editor_style(
			array(
				'./style.css',
				'https://cdn.tailwindcss.com/3.3.3'
			)
		);

		// Remove core block patterns.
		remove_theme_support( 'core-block-patterns' );
		add_theme_support('menus');
		register_nav_menus( array(
			'auth' => 'Администрация',
			't-services' => 'Сервисы Techlab',
			'primary' => 'Главная',
			'footer-1' => 'О компании',	
			'footer-2' => 'Услуги',
			'footer-3' => 'Контакты',	
			'mobile' => 'Mobile Menu',	
			
		) );
	
		add_theme_support('woocommerce');
		add_theme_support('post-thumbnails');
		

	}
}
add_action( 'after_setup_theme', 'tdsagency_setup' );

// Enqueue style sheet.
add_action( 'wp_enqueue_scripts', 'tdsagency_enqueue_style_sheet' );
function tdsagency_enqueue_style_sheet() {

	wp_enqueue_style( 'tdsagency', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
   wp_enqueue_script( 'tailwind', 'https://cdn.tailwindcss.com/3.3.3', array(), '3.3.3', true );
   wp_enqueue_script( 'tailwindcss', 'https://cdn.tailwindcss.com/3.3.3');
   wp_enqueue_script( 'flowbite', 'https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js');
   wp_enqueue_style('flowbitecss','https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css',array(),'1');
 
}

/**
 * Register block styles.
 *
 * @since 0.9.2
 */
function tdsagency_register_block_styles() {

	$block_styles = array(
		'core/columns' => array(
			'columns-reverse' => __( 'Reverse', 'tdsagency' ),
		),
		'core/group' => array(
			'shadow-light' => __( 'Shadow', 'tdsagency' ),
			'shadow-solid' => __( 'Solid', 'tdsagency' ),
		),
		'core/image' => array(
			'shadow-light' => __( 'Shadow', 'tdsagency' ),
			'shadow-solid' => __( 'Solid', 'tdsagency' ),
		),
		'core/list' => array(
			'no-disc' => __( 'No Disc', 'tdsagency' ),
		),
		'core/navigation-link' => array(
			'outline' => __( 'Outline', 'tdsagency' ),
		),
		'core/quote' => array(
			'shadow-light' => __( 'Shadow', 'tdsagency' ),
			'shadow-solid' => __( 'Solid', 'tdsagency' ),
		),
		'core/social-links' => array(
			'outline' => __( 'Outline', 'tdsagency' ),
		),
	);

	foreach ( $block_styles as $block => $styles ) {
		foreach ( $styles as $style_name => $style_label ) {
			register_block_style(
				$block,
				array(
					'name'  => $style_name,
					'label' => $style_label,
				)
			);
		}
	}
}
add_action( 'init', 'tdsagency_register_block_styles' );

/**
 * Register block pattern categories.
 *
 * @since 1.0.4
 */
function tdsagency_register_block_pattern_categories() {

	register_block_pattern_category(
		'page',
		array(
			'label'       => __( 'Page', 'tdsagency' ),
			'description' => __( 'Create a full page with multiple patterns that are grouped together.', 'tdsagency' ),
		)
	);
	register_block_pattern_category(
		'pricing',
		array(
			'label'       => __( 'Pricing', 'tdsagency' ),
			'description' => __( 'Compare features for your digital products or service plans.', 'tdsagency' ),
		)
	);

}

add_action( 'init', 'tdsagency_register_block_pattern_categories' );

function techlabds_custom_logo_setup() {
	$defaults = array(
		'height'               => 40,
		'width'                => 170,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' ),
		'unlink-homepage-logo' => false, 
	);
	add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'techlabds_custom_logo_setup' );


function custom_polylang_langswitcher() {
	$output = '';
	if ( function_exists( 'pll_the_languages' ) ) {
		$args   = [
		'show_flags' => 0,
        'hide_if_empty' => 0,
		'show_names' => 1,
		'echo'       => 0,
			];
		$output = '<ul class="polylang_langswitcher">'.pll_the_languages( $args ). '</ul>';
	}

	return $output;
}

add_shortcode( 'polylang_langswitcher', 'custom_polylang_langswitcher' );

add_action( 'init', 'my_register_nav_menus' );

function my_register_nav_menus() {
	register_nav_menu( 'social', __( 'Social', 'tdsagency' ) );
}
/* Create Buy Now Button dynamically after Add To Cart button */


/* Create Buy Now Button dynamically after Add To Cart button */

function add_content_after_addtocart() {
    
	// get the current post/product ID
	$current_product_id = get_the_ID();

	// get the product based on the ID
	$product = wc_get_product( $current_product_id );

	// get the "Checkout Page" URL
	$checkout_url = WC()->cart->get_checkout_url();

	// run only on simple products
	if( $product->is_type( 'simple' ) ){
		echo '<a href="'.$checkout_url.'?add-to-cart='.$current_product_id.'" class="buy-now button">Buy Now</a>';
		//echo '<a href="'.$checkout_url.'" class="buy-now button">Buy Now</a>';
	}
}
add_action( 'woocommerce_after_add_to_cart_button', 'add_content_after_addtocart' );



register_sidebar(
    array(

        'name' => __('Сайдбар'),
        'id' => __('page-sidebar'),
        'class' => 'page-sidebar',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    )



);


add_theme_support( 'title-tag' );



function portfolio()
{
$args = array(
'labels' => array(
'name' => 'Портфолио',
'singular_name' => 'TechLab Портфолио'
),
'hierarchical' => true ,// true - like page, false - like post
'public' => true,
'menu_icon' => 'dashicons-welcome-learn-more',
'has_archive'=> true,
'menu_icon' => 'data:image/svg+xml;base64,' . base64_encode('<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M2.02188 3.0166C2.00986 3.02865 2 4.03912 2 5.26216V7.4858H4.22995H6.45991V5.24636V3.00696L4.25184 3.00084C3.03742 2.99747 2.03394 3.00458 2.02188 3.0166ZM13.8459 3.02276C13.8372 3.03141 13.8301 4.03928 13.8301 5.26246V7.48641L16.0506 7.47665L18.2711 7.4669V5.23778V3.00862L16.0664 3.00783C14.8537 3.00737 13.8545 3.0141 13.8459 3.02276ZM7.93394 10.1312V17.2371H10.164H12.394L12.3845 10.141L12.375 3.04479L10.1544 3.03504L7.93394 3.02529V10.1312ZM13.8679 15.045V17.2371H16.0789H18.29V15.045V12.8528H16.0789H13.8679V15.045Z" fill="black"/>
</svg>'),
'supports' => array('title','editor','thumbnail'),

);
register_post_type('portfolio', $args);
}

add_action('init','portfolio');



function portfolio_taxonomy(){
 $args = array (
               
            'labels' => array(

                          'name' => 'Категории',
                          'singular_name' => 'Портфолио' 
                                
            ),
            'public' => true,
            'hierarchical' => true,

        );
 register_taxonomy( 'Категории', array('portfolio'), $args );
}

add_action('init','portfolio_taxonomy');


/*=============================================
=            BREADCRUMBS			            =
=============================================*/

//  to include in functions.php
function the_breadcrumb() {

    $sep = ' > ';

    if (!is_front_page()) {
	
	// Start the breadcrumb with a link to your homepage
        echo '<div class="breadcrumbs">';
        echo '<a href="';
        echo get_option('home');
        echo '">';
        bloginfo('name');
        echo '</a>' . $sep;
	
	// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if (is_category() || is_single() ){
            the_category('title_li=');
        } elseif (is_archive() || is_single()){
            if ( is_day() ) {
                printf( __( '%s', 'text_domain' ), get_the_date() );
            } elseif ( is_month() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'text_domain' ) ) );
            } elseif ( is_year() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'Y', 'yearly archives date format', 'text_domain' ) ) );
            } else {
                _e( 'Blog Archives', 'text_domain' );
            }
        }
	
	// If the current page is a single post, show its title with the separator
        if (is_single()) {
            echo $sep;
            the_title();
        }
	
	// If the current page is a static page, show its title.
        if (is_page()) {
            echo the_title();
        }
	
	// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) { 
                $post = get_post($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }

        echo '</div>';
    }
}
/*
* Credit: http://www.thatweblook.co.uk/blog/tutorials/tutorial-wordpress-breadcrumb-function/
*/
