// jquery-javascript //
(function($) {
	$( document ).ready( function() {

		setupMoreButton();


		$(window).on("hashchange", function(event){
			event.preventDefault();
			var hash, id;
			if( this.location.hash !== "" ){
				id = $(this.location.hash);
				$("html").animate(
				{scrollTop: id.offset().top}, 5000
				);
				
			}

		});

		$(window).trigger("hashchange");

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

		$(document).on("click", ".entry-content .more-button", function(event){
			var _this, nextElements;
			_this = $(this);
			nextElements = _this.next("#more-content");
			nextElements.toggleClass("hidden in");
		}); //.more-button

	}); //document.ready //

})( jQuery ); 

function setupMoreButton(){
	var moreButton; 
		
		if( jQuery(".entry-content .more-button").length < 1 ){
			jQuery(".entry-content > p").each( function(index){
				var _this = jQuery(this);
				if(index === 5){
					_this.after("<p><button class='more-button'>continue reading</button></p>");
				}
			} );
			
		}
		moreButton = jQuery(".entry-content .more-button");
		moreButton.unwrap(); 
		moreButton.nextAll().wrapAll("<div id='more-content' class='hidden'></div>");
}

function smoothScroll( url ){
	var hash,id;
	if( jQuery(url.hash) !== "" ){
		hash = url.hash;
		id = jQuery(hash);
		jQuery('html, body').animate(
		{scrollTop: id.offset().top }, 
        5000
        );

	}
	
}