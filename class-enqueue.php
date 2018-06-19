<?php 

/**
* MPF Scripts Enqueue Class
*/
class RelatedPostMPFEnqueue
{
	
	function __construct()
	{

	}

	public function initialize() {

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_public_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_public_scripts' ) );

	}

	public function enqueue_admin_styles() {

		wp_enqueue_style(
			
			'related-post-mpf-admin',
			plugins_url( '/assets/dist/css/admin.min.css', __FILE__ ),
			array(),
			'1.0'

		);
	}

	public function enqueue_public_styles() {

		
		if ( is_single() && is_main_query() ) {

			wp_enqueue_style(
				
				'related-post-mpf-public',
				plugins_url( '/assets/dist/css/public.min.css', __FILE__ ),
				array(),
				'1.0'

			);
		}
	}


	public function enqueue_admin_scripts() {

		wp_enqueue_script(
			
			'related-post-mpf-admin-js',
			plugins_url( '/assets/dist/js/admin.min.js', __FILE__ ),
			array('jquery'),
			'1.0'

		);

	}	

	public function enqueue_public_scripts() {

		if ( is_single() && is_main_query() ) {

			wp_enqueue_script(
				
				'related-post-mpf-public',
				plugins_url( '/assets/dist/js/public.min.js', __FILE__ ),
				array('jquery'),
				'1.0',
				true

			);
		}


		global $post;
		$post_id = $post->ID;

		wp_localize_script( 'related-post-mpf-public', 'postdata', 

			array(
				'post_id' => $post_id,
				'json_url' => RelatedPostMPF::related_post_get_json()
			)
 
		);	

	}	
}


















