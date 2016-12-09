// jquery-javascript //
(function($) {
	$( document ).ready( function() {
		$(".gallery-slides").slick({
			autoplay: true, 
			autoplaySpeed: 2000, 
			arrows: false, 
			slidesToShow: 3,
			responsive: [
				{
					breakpoint: 480,
					settings: {
					slidesToShow: 2
					}
				}
			]
		});
		$(".photo-carousel").slick({
			autoplay: true, 
			autoplaySpeed: 3000, 
			arrows: false, 
			dots: true
		});


	}); //document.ready //

})( jQuery ); 