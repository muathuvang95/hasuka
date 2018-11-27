jQuery(document).ready(function($){
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
});

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("back-to-top").style.display = "block";
    } else {
        document.getElementById("back-to-top").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}