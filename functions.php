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






