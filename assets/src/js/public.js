jQuery(document).ready(function($) {

	// alert('working');

  $('.get-related-posts').on( 'click', function(event) {

  		event.preventDefault();

  		$('.ajax-loader').show(); 
  	 	// console.log('Click');
  	 	var json_url = postdata.json_url;
  	 	var post_id = postdata.post_id;

  	 	console.log(json_url);
  	 	console.log( `This is the post ID: ${post_id}`);

  	 	// The Ajax
  	 	$.ajax({
  	 		dataType: 'json',
  	 		url: json_url
  	 	})

  	 	.done(function (response) {
  	 		// body...
  	 		// console.log(response);

  	 		$.each(response, function (index, obj) {
  	 			// body...
  	 			$('#mpf-related-posts').append(`

		  	 		<section class='post-block'>
			  	 		<a href="${obj.link}"><h2>${obj.title.rendered}</h2></a>
			  	 		<h5>Author Name: ${obj.author_name}</h5>
			  	 		<a href="${obj.link}"><figure>${obj.featured_image}</figure></a>
			  	 		<p>
							${obj.excerpt.rendered}
			  	 		</p>
		  	 		</section>
						
	  	 			<br>`
  	 			);
  	 		});

  	 		$('.ajax-loader').remove(); 
  	 	})

  	 	.fail(function () {
  	 		// body...
  	 		console.log('Failure!')
  	 	})

  	 	.always(function () {
  	 		// body...
  	 		console.log('Complete');
  	 	});
  });
	
});