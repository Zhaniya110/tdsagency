// Helper function to initialize our carousel.
initializeBlock = function() {
	const carousels = document.getElementsByClassName('service-carousel');

	// Loop through all carousels.
	for ( var i = 0; i < carousels.length; i++ ) {
		var flkty = new Flickity( carousels[i], {
			cellAlign: 'center',
		
			wrapAround: true,
			draggable: true,
			autoPlay: true,
			autoPlay: 5500,
          
		});
	}
}


if( window.acf ) {
	// Initialize dynamic block preview (editor).
	window.acf.addAction( 'render_block_preview/type=carousel', initializeBlock );
} else {
	// Initialize on the frontend.
	initializeBlock();
}