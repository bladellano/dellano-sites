
// Owl carousel
$('.owl-partners').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})

/*Botão que surge no rodapé p/ ir até o topo.*/
$(window).scroll(function(e) {
	if ($(this).scrollTop() > 0) {
		$('.topo').fadeIn();
	} else {
		$('.topo').fadeOut();
	}
});

$('.topo').click(function(e) {
	e.preventDefault();
	$('html, body').animate({
		scrollTop: 0
	}, 500)
});


$(window).scroll(function() {
	if ($(document).scrollTop() > 150) {
		$('.navbar').addClass('navbar-shrink');
	}
	else {
		$('.navbar').removeClass('navbar-shrink');
	}
});

$(function() {
	$('a[href*="#"]:not([href="#"])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			var height = $('.navbar').height();
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top - height
				}, 1000);
				return false;
			}
		}
	});
});

