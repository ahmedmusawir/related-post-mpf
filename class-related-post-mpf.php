<?php 

/**
* RelatedPostMPF Class
*/
class RelatedPostMPF
{
	
	function __construct()
	{
		add_filter( 'the_content', array( $this, 'display_html' ) );
	}

	public function make_html() {

		ob_start(); // OUTPUT BUFFERING

		?>
		
			<section id="mpf-related-posts">
				
				<h2><a href="#" class="get-related-posts">Get Related Post</a></h2>
				<div class="ajax-loader">
					<img src="<?php echo plugin_dir_url( __FILE__ ) . 'assets/img/spinner.gif'; ?>" alt="">
				</div>

			</section>	
			<!-- End Related Posts -->

		<?php 

		$html_content = ob_get_contents();

		ob_end_clean();

		return $html_content;		
	}	

	public function display_html( $content ) {

		if ( is_single() && is_main_query() ) {

			$content .= $this->make_html();
		}

		return $content;
	}

	public static function related_post_get_json()	{

		// http://plugin.local/wp-json/wp/v2/posts?categories=6,2&per_page=2

		$cats = get_the_category(); //Gets only the the Categories of the current post
		$cat_ids = array();

		foreach ($cats as $cat) {
			
			$cat_ids[] = $cat->term_id;
		}

		$args = array(
			'categories' => implode(",", $cat_ids), 
			'per_page' => 5
		);

		$url = add_query_arg( $args, rest_url( 'wp/v2/posts' ) );

		return $url;

	}
}







































