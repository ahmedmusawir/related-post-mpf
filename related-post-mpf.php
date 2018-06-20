<?php 

/**
 *
 * Plugin Name: MPF Related Post
 * Plugin URI:	https://htmlfivedev.com 
 * Description: Displays Related Posts.
 * Version: 	1.0
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

// ADDING AUTHOR FIELD TO REST

	function related_post_register_fields() {

		# Add Author Name
		register_rest_field( 'post', 
			'author_name',
			array(
				'get_callback' => 'related_post_author_name',
				'update_callback' => null,
				'schema' => null
			)
		);
		# Add Featured Image
		register_rest_field( 'post', 
			'featured_image',
			array(
				'get_callback' => 'related_post_featured_image',
				'update_callback' => null,
				'schema' => null
			)
		);
	}

	function related_post_author_name( $object, $field_name, $request )	{
		# code...
		return get_the_author_meta( 'display_name' );
	}

	function related_post_featured_image( $object, $field_name, $request )	{
		# code...
		$featured_image_array = wp_get_attachment_image( $object['featured_media'], 'thumbnail', true );
		// $featured_image_array = wp_get_attachment_image_src( $object['featured_media'], 'thumbnail', true );

		return $featured_image_array;
	}


	add_filter( 'rest_api_init', 'related_post_register_fields' );



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