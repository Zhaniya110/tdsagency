<?php 

/*
 * Plugin Name:       Services Slider
 * Plugin URI:        https://techlabds.com
 * Description:       Слайдер сервисов
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Zhaniya Meiramova
 * Author URI:        https://zhan883.kz
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       services-slider
 * Domain Path:       /languages
 * Requires Plugins: acf
 */

 
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



function register_services_styles() {
	wp_register_style( 'flickity', 'https://unpkg.com/flickity@2/dist/flickity.min.css' );
    wp_register_script( 'tailwind', 'https://cdn.tailwindcss.com/3.3.3' );
	wp_register_script( 'flickity', 'https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js' );
	wp_register_script( 'services-acf-carousel', plugin_dir_url( __FILE__ ) . '/blocks/services/script.js', array( 'flickity' ), filemtime( plugin_dir_path( __FILE__ ) . '/blocks/services/script.js' ), true );
}
add_action( 'wp_enqueue_scripts', 'register_services_styles' );
add_action( 'admin_enqueue_scripts', 'register_services_styles' );



function services(){
    register_block_type(__DIR__ . '/blocks/services');
  }
  add_action( 'init','services');


  function wp_example_excerpt_length( $length ) {
    return 10;
}
add_filter( 'excerpt_length', 'wp_example_excerpt_length');
function add_price_widget() {
    global $woocommerce;
    $product = new WC_Product(get_the_ID()); 
    $thePrice = $product->get_price();
    echo thePrice;
   }