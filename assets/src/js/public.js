jQuery(document).ready(function($) {

	// alert('working');

  $('.get-related-posts').on( 'click', function(event) {

  		event.preventDefault();
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
  	 		console.log(response);



  	 		$.each(response, function (index, obj) {
  	 			// body...
  	 			$('#mpf-related-posts').append(`

		  	 		<a href="${obj.link}"<h3>${obj.title.rendered}</h3></a>
		  	 		<p>
						${obj.excerpt.rendered}
		  	 		</p>
						


	  	 			<br>`
  	 			);
  	 		}) 
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