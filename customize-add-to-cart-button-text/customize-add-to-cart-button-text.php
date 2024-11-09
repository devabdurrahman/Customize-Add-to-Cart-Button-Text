<?php 
/**
 * Plugin Name:						Customize Add to Cart Button Text
 * Plugin URI:						https://wordpress.org/plugins/customize-add-to-cart-button-text/
 * Description:						Customize the "Add to Cart" button text in WooCommerce by product type.
 * Version:								1.0
 * Requires at Least:			5.2
 * Requires PHP:					7.2
 * WC requires at least:	8.0
 * WC tested up to:				9.0
 * Author:								Abdur Rahman
 * Author URI:						https://github.com/devabdurrahman
 * License:								GPL2
 * License URI:						https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:						customize-add-to-cart-button-text
 */

// Prevent direct access to the file
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// adding all of the necessery post types and custom fileds
add_action('plugins_loaded', 'cacbt_plugins_loaded');
function cacbt_plugins_loaded(){
	 //load plugin options page
	require_once plugin_dir_path(__FILE__) . 'options.php'; 
}

/*
* Plugin Option Page Style
*/
function cacbt_add_theme_css(){
  wp_enqueue_style( 'cacbt-admin-style', plugins_url( 'css/cacbt-admin-style.css', __FILE__ ), false, "1.0.0");
}
add_action('admin_enqueue_scripts', 'cacbt_add_theme_css');


// Function for changing add to cart text on single product & archive page depending on product type
add_filter('woocommerce_product_add_to_cart_text', 'cacbt_modify_product_button_text');
add_filter('woocommerce_product_single_add_to_cart_text', 'cacbt_modify_product_button_text');

function cacbt_modify_product_button_text() {
    global $product;
    
    if (!$product){
    	return _x('Read more', 'button text', 'customize-add-to-cart-button-text'); // Safety check
    }
    
    $product_type = $product->get_type();
    
    switch ($product_type) {
	    case 'external':
	        $external_single = get_option('cacbt-external-single', '');
	        return !empty($external_single) ? $external_single : __('Buy Now', 'customize-add-to-cart-button-text');

	    case 'grouped':
	        $grouped_single = get_option('cacbt-grouped-single', '');
	        return !empty($grouped_single) ? $grouped_single : __('Select Options', 'customize-add-to-cart-button-text');

	    case 'simple':
	        $simple_single = get_option('cacbt-simple-single', '');
	        return !empty($simple_single) ? $simple_single : __('Add to Cart', 'customize-add-to-cart-button-text');

	    case 'variable':
	        $variable_single = get_option('cacbt-variable-single', '');
	        return !empty($variable_single) ? $variable_single : __('Select Options', 'customize-add-to-cart-button-text');

	    default:
	        return __('Read more', 'customize-add-to-cart-button-text');
	}
}

?>