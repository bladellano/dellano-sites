
$(function(){

	/* Slick parceiros */
	$('.slick-parceiros').slick({
		infinite: true,
		slidesToShow: 5,
		slidesToScroll: 3,
		// centerMode: true,
		responsive: [
		{
			breakpoint: 768,
			settings: {
				arrows: false,
				centerMode: true,
				centerPadding: '40px',
				slidesToShow: 3
			}
		},
		{
			breakpoint: 480,
			settings: {
				arrows: false,
				centerMode: true,
				centerPadding: '40px',
				slidesToShow: 1
			}
		}
		]
	});

	/* Formulário de envio de tentatica de contato */
	$('#form-contact').submit(function(e) {
		e.preventDefault();

		const data = $(this).serializeArray();
		let val_btn = $(this).find('button').html();

		$.ajax({
			url: 'send-contact.php',
			type: 'post',
			async:false,
			dataType: 'json',
			data: data,
			beforeSend:()=>{
				$(this).find(':input,select').prop('disabled',true);				
				$(this).find('button').html('Enviando').append(' <i class="fas fa-spinner fa-spin"></i>');
			},
			success:(r)=>{
				if(r.status = true){
					$(this)[0].reset();
					return alert(r.message + ' Logo entraremos em contato.');
				} else {
					return alert(r.message);
				}
			}
		})
		.always(()=> {
			$(this).find(':input,select').prop('disabled',false);	
			$(this).find('button').html(val_btn);
		});

	});

	/* Owl carousel */
/*	$('.owl-partners').owlCarousel({
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
	})*/

	/* Botão que surge no rodapé p/ levar até o topo.*/
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

	/* Fixed navbar */
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

});//Fim