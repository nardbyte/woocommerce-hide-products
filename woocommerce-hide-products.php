<?php
/*
Plugin Name: Hide Product in WooCommerce
Plugin URI: https://evosoluciones.com/
Description: Adds an option to hide a product from the shop and category pages without disabling purchase.
Version: 1.0
Author: nardbyte
Author URI: https://evosoluciones.com/
License: GPL2
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add custom field in product settings
add_action( 'woocommerce_product_options_general_product_data', 'hpw_add_hide_product_option' );
function hpw_add_hide_product_option() {
	echo '<div class="options_group">';
	woocommerce_wp_checkbox( array(
		'id'          => '_hide_from_shop',
		'label'       => __( 'Hide from shop', 'woocommerce' ),
		'description' => __( 'Check this box to hide the product from the shop and category pages.', 'woocommerce' )
	) );
	echo '</div>';
}

// Save custom field in product settings
add_action( 'woocommerce_process_product_meta', 'hpw_save_hide_product_option' );
function hpw_save_hide_product_option( $post_id ) {
	$hide_from_shop = isset( $_POST['_hide_from_shop'] ) ? 'yes' : 'no';
	update_post_meta( $post_id, '_hide_from_shop', $hide_from_shop );
}

// Hide specific products from shop, category, and tag pages but keep them accessible via direct link
add_action( 'woocommerce_product_query', 'hpw_exclude_hidden_products' );
function hpw_exclude_hidden_products( $query ) {
	$hidden_products = get_hidden_product_ids();
	if ( ! empty( $hidden_products ) ) {
		$query->set( 'post__not_in', $hidden_products );
	}
}

// Get all product IDs that should be hidden
function get_hidden_product_ids() {
	$args = array(
		'post_type'      => 'product',
		'posts_per_page' => -1,
		'meta_query'     => array(
			array(
				'key'     => '_hide_from_shop',
				'value'   => 'yes',
				'compare' => '='
			)
		),
		'fields'         => 'ids'
	);
	return get_posts( $args );
}



