<?php 

/*
 * Plugin Name:       Servicess swiper
 * Plugin URI:        https://techlabds.com
 * Description:       Слайдер сервисов
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Zhaniya Meiramova
 * Author URI:        https://zhan883.kz
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       servicess-swiper
 * Domain Path:       /languages
 * Requires Plugins: woocommerce
 */

 
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



function register_servicess_styles() {
	wp_register_style( 'flicking', 'https://unpkg.com/@egjs/flicking/dist/flicking.css' );
    wp_register_script( 'tailwind', 'https://cdn.tailwindcss.com/3.3.3' );
	wp_register_script( 'flicking', 'https://unpkg.com/@egjs/flicking/dist/flicking.pkgd.min.js' );
    
	wp_register_script( 'servicess-acf-carousel', plugin_dir_url( __FILE__ ) . '/blocks/servicess/script.js', array( 'flicking' ), filemtime( plugin_dir_path( __FILE__ ) . '/blocks/servicess/script.js' ), true );
   
}
add_action( 'wp_enqueue_scripts', 'register_servicess_styles' );
add_action( 'admin_enqueue_scripts', 'register_servicess_styles' );



function servicess(){
    register_block_type(__DIR__ . '/blocks/servicess');
  }
  add_action( 'init','servicess');


