jQuery(document).ready(function($){
	var win = $(window);

	$('.home-product_cats-carousel').owlCarousel({
		loop:true,
		margin:10,
		responsiveClass:true,
		nav:true,
		dots:false,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:1
			},
			768:{
				items:3
			}
		}
	});
	$('.home-recent_posts-carousel').owlCarousel({
		loop:true,
		margin:10,
		responsiveClass:true,
		nav:true,
		dots:false,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:1
			},
			768:{
				items:2
			}
		}
	});

	
	var btb = $('#back-to-top')

	win.on('scroll', function(e){
		if(win.scrollTop() > 100) {
			btb.fadeIn();
		} else {
			btb.fadeOut();
		}
	});

	btb.on('click', function(e){
		$('html,body').animate({
			scrollTop: 0
		}, 600)
	});

});
