<?php
/*
Plugin Name: GC Wholesale Admin
Description: Allows for the ability to set wholesale pricing at the category level
Version: 1.0
Author: Paul Lyons
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Include the dependencies needed to instantiate the plugin.
foreach ( glob( plugin_dir_path( __FILE__ ) . 'admin/*.php' ) as $file ) {
	include_once $file;
}


add_action( 'plugins_loaded', 'wholesale_custom_admin_settings' );
/**
 * Starts the plugin.
 */
function wholesale_custom_admin_settings() {
	$plugin = new Submenu( new Submenu_Page() );
	$plugin->init();
}


function gc_admin_scripts() {
	wp_register_script('gc-script-admin', plugins_url() . '/gc-wholesale-admin/js/gc-wholesale-admin.js', array('jquery'), null, true );
	wp_enqueue_script('gc-script-admin');
}

add_action('admin_enqueue_scripts', 'gc_admin_scripts');

function gc_admin_styles() {
	wp_enqueue_style( 'gc-styles-framework', plugins_url() .'/gc-wholesale-admin/css/bootstrap-form.css',false,'1.1','all');
}

add_action('admin_enqueue_scripts', 'gc_admin_styles');



// get category ids by parent

function gc_woo_cats_ids_string($parent_id = 0) {

	$result  = '';

	$str = gc_woo_cats_ids( $parent_id );

	$str_clean = rtrim($str, ',');

	return $str_clean;

}

function sf_categories_ids_string( $atts ) {

	$a = shortcode_atts( array(
		'parent'      => 0,

	), $atts );

	return gc_woo_cats_ids_string( $a['parent']);

}

add_shortcode( 'sf_categories_ids_string', 'sf_categories_ids_string' );



