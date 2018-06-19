<?php 

/**
 *
 * Plugin Name: MPF Related Post
 * Plugin URI:	https://htmlfivedev.com 
 * Description: Display a short notice above the post content.
 * Version: 	2.0
 * Author URI: 	https://www.linkedin.com/in/ahmedmusawir
 * License: 	GPL-2.0+ 
 *
 */


//If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die("Cannot Access Directly");
}

define( "RELATED_POST_MPF_PLUGIN_DIR", plugin_dir_path( __FILE__ ) );


require_once( plugin_dir_path( __FILE__ ) . 'class-related-post-mpf.php' );
require_once( plugin_dir_path( __FILE__ ) . 'class-enqueue.php' );


// INSTANTIATE CLASSES

	//Enqueue Styles & Scripts
	$setup_styles = new RelatedPostMPFEnqueue();
	$setup_styles->initialize();


	//Calling Plugin Main Class 
	$related_post = new RelatedPostMPF();

// Activation
require_once plugin_dir_path( __FILE__ ) . 'inc/Base/class-activate.php';
register_activation_hook( __FILE__, array( 'RelatedPostMPFActivate', 'activate' ) );

// Activation
require_once plugin_dir_path( __FILE__ ) . 'inc/Base/class-deactivate.php';
register_deactivation_hook( __FILE__, array( 'RelatedPostMPFDeactivate', 'deactivate' ) );