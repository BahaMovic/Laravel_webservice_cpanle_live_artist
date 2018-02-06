/*global $, jquery, alert ,console ,scrollY*/



$(function () {

	"use strict";
	$('.top-nav i.fa.fa-bars').click(function () {
		$('.right-menu').toggleClass('col-lg-2 col-md-2 col-sm-2 col-xs-2');
		$('.right-menu').toggleClass('col-lg-1 col-md-1 col-sm-1 col-xs-1');
		$('.dashbord-toggle').toggleClass('col-lg-10 col-md-10 col-sm-10 col-xs-10');
		$('.dashbord-toggle').toggleClass('col-lg-11 col-md-11 col-sm-11 col-xs-11');
		$('.section-container p').toggleClass('hide');

	});
	$('.service-top').click(function () {
		$(this).children().toggle(500);

	});

	$('.owl-one').owlCarousel({
		loop: true,
		margin: 10,
//		nav: true,
		rtl: true,
		dots: false,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 3
			},
			1000: {
				items: 5
			}
		}
	});

	$('.owl-two').owlCarousel({
		loop: true,
		margin: 10,
//		nav: true,
		rtl: true,
		dots: false,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 3
			},
			1000: {
				items: 3
			}
		}
	});

		$('.owl-three').owlCarousel({
		loop: true,
		margin: 10,
//		nav: true,
		rtl: true,
		dots: false,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 3
			},
			1000: {
				items: 3
			}
		}
	});


	$('.copy').click(function (){
		$(this).siblings('.text-copy').select();
		var target = $(this).siblings('.text-copy').select();
		target = document.execCommand('copy')
	});


		$('#btnCode').click(function(){
			$("#code").val(makeid());
		});


		function makeid() {
				var text = "";
				var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

				for (var i = 0; i < 5; i++)
					text += possible.charAt(Math.floor(Math.random() * possible.length));

				return text;
			}



});
