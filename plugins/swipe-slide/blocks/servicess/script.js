const flicking = new Flicking("#carousel", {
	align: "next",
	easing: x => x,
	bounce: "100%",
	
	circular: true,
	bound: true,
	renderOnlyVisible: true
  });

if( window.acf ) {
	// Initialize dynamic block preview (editor).
	window.acf.addAction( 'render_block_preview/type=carousel', initializeBlock );
} else {
	// Initialize on the frontend.
	initializeBlock();
}