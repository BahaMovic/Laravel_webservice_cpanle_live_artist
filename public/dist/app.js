;(function($) {
	"use strict";
	
	$(document).ready(function() {

		var $win = $(window);
		var $doc = $(document);

		// Load Foundation
		$(document).foundation();

		// Intro Small 
		$('.intro-small .intro-image').stellar({
			horizontalScrolling: false,
			verticalOffset: 40
		});

		//FullSize Image
		var attrSrc;
		function fullsizeImageHelper () {
			$('.fullsize-image').each(function () {
				attrSrc = $(this).attr('src');
				$(this)
					.closest('.fullsize-image-container')
					.css('background-image', 'url(' + attrSrc + ')');
			});
		}

		fullsizeImageHelper();

		//Intro Slider
		var introSlider = $('.intro-slider .slides').bxSlider({
			auto: true,
			pager: false,
			autoControls: true,
			autoHover: true
		});

		var sliderTestimonials;
		$win.on('load', function () {

			$('.bx-controls-direction a').on('click', function (event) {
				event.preventDefault();

				if($(this).parents().hasClass('slider-testimonials')) {
					sliderTestimonials.stopAuto();
					sliderTestimonials.startAuto();
				}
			});

		});

		$('.field-date').fdatepicker();

		// Waypoint
		var itemIndex;
		$('.waypoint').on('click', function (event) {
			/*event.preventDefault();*/

			$('body, html').animate({scrollTop: $("#section-book-appointment").offset().top - 40}, 1000)
		});
        
        
        /*$(".select-seaction").on('change',function () {

            if($(".select-seaction option:selected").val() == 1){
                $(".select-doctore1").children("option").remove();
                $(".select-doctore1").append('<option value="22">د. محمد السيد</option><option value="23>د. السيد الشرنوبى</option>')
                $(".nice-select .list").append('<li data-value="22" class="option>د. محمد السيد</li><li data-value="23" class="option>د. السيد الشرنوبى</li>')
            }
            if($(".select-seaction option:selected").val() == 2){
                $(".select-doctore1").children("option").remove();
                $(".select-doctore1").append('<option value="s2-d1">د. سارة محمد</option><option value="s2-d2">د. اشرف السيد </option><option value="s2-d3">د. اية محمد </option>')
            }
            if($(".select-seaction option:selected").val() == 3){
                $(".select-doctore1").children("option").remove();
                $(".select-doctore1").append('<option value="s3-d1">د. عبدالرحمن محمد </option><option value="s3-d2">د. السيد عطية </option><option value="s3-d3">د. عبير السيد </option>')
            }
            
            
                                                        
        });*/
        
        $(".select-one .dropdown li").on('click',function () {
            if($(this).hasClass("check1")){
                $(".d-hidden").hide();
                $(".d-one").show();
            }
            if($(this).hasClass("check2")){
                $(".d-hidden").hide();
                $(".d-two").show();
            }
            if($(this).hasClass("check3")){
                $(".d-hidden").hide();
                $(".d-three").show();
            }
            
            
        });
        
        $(".select-two .dropdown li").on('click',function () {
            if($(this).hasClass("d-1")){
                $(".d-hidden").hide();
                $(".day-one").show();
            }
            if($(this).hasClass("d-2")){
                $(".d-hidden").hide();
                $(".day-two").show();
            }
            if($(this).hasClass("d-3")){
                $(".d-hidden").hide();
                $(".day-three").show();
            }
        });
        
        
        

        

        
		// Tabs
		var currentItem;
		$('.tabs .list-services a').on('click', function (event) {
			event.preventDefault();

			currentItem = $(this).attr('href');

			$(this)
				.parent()
				.addClass('current')
				.siblings()
				.removeClass('current');

			$(currentItem)
				.addClass('current')
				.siblings()
				.removeClass('current');

			$('video').each(function () {
				$(this)[0].pause();
				$('.btn-play').show();
			});
			
		});

		//Slider Services
		var sliderList = $('.list-services-slider').bxSlider({
			pager: false,
			minSlides: 1,
			maxSlides: 6,
			moveSlides: 1,
			slideWidth: 200,
			infiniteLoop: false,
			hideControlOnEnd: true
		});

		$('.bx-controls-direction a').on('click', function (event) {
			event.preventDefault();

			if($(this).parents().hasClass('intro-slider')) {
				introSlider.stopAuto();
				introSlider.startAuto();
			}

			if($(this).parents().hasClass('list-services-slider')) {
				sliderList.stopAuto();
				sliderList.startAuto();	
			}
		});

		// FitVids
		$('.service-video').fitVids();

		var $video;
		$('video').click(function(event) {
			event.preventDefault();
			$video = $(this);

			$video.addClass('active');

			if($video.get(0).paused) {
				$video.get(0).play()
				$video.next().fadeOut()
			} else {
				$video.get(0).pause();
				$video.next().show()
			}
		});

		// Tablet Nav
		$('.nav li').each(function () {
			if($(this).find('.nav-dropdown').length) {
				$(this).addClass('has-dropdown');
			}
		});

		// Event Slider
		var $slider;
		$('.event-slider ').each(function () {
			$slider = $(this).find('.slides');

			$slider.bxSlider({
				auto: true,
				pager: false
			});
		});

		var $listItem;
		$('.nav li.has-dropdown > a').on('click', function (event) {
			$listItem = $(this).parent();
			if($win.width() < 1025) {
				event.preventDefault();
			}

			$listItem
				.toggleClass('active')	   			
				.siblings()
				.removeClass('active');

			if($win.width() < 768) {
				$listItem
					.children('.nav-dropdown')
					.slideToggle();
			}	
		});

		// Mobile Nav
		$('.btn-menu').on('click', function (event) {
			event.preventDefault();

			$(this)
				.toggleClass('active');

			$('.nav').slideToggle();
			$('.nav-dropdown').slideUp();	
		});

		var isMobileWidth = false;
		function resizeHelper () {
			if($win.width() < 768) {
				if(isMobileWidth) {
					return;
				}

				isMobileWidth = true;

			} else {
				if(!isMobileWidth) {
					return;
				}

				isMobileWidth = false;
				$('.nav').show();
				$('.nav-dropdown').removeAttr('style');
			}
		}

		$win.on('resize', function () {
			resizeHelper();
			$('.intro-slider .bx-start').trigger('click');
		});

		$('audio').mediaelementplayer();

		var tagName;

		/*$('form').each(function () {
			$(this).validate({
				highlight: function(element, errorClass) {
					tagName = element.tagName.toLowerCase();

					if(tagName === 'select') {
						$(element)
							.closest('.selecter')
							.addClass('error');
					} else {
						$(element).addClass('error');
					}
				},
				focusCleanup: true,
				rules: {
					name: "required",
					email: {
						required: true,
						email: true
					}
				},
				errorPlacement: function (error, element) {
					$(element)
						.closest('form')
						.find('.message-error')
						.addClass('active');
				},
				submitHandler: function(form) { 
					$(form).submit(function () {
						$(this).ajaxSubmit();

						return false;
					});
				}
			});
		});*/

		$(function(){
			$.stellar({
				horizontalScrolling: false,
				verticalOffset: 300
			});
		});
	});
	
	
	
})(jQuery);


    $(document).on("hover", function(event){
        var $trigger = $(".lang");
        if($trigger !== event.target && !$trigger.has(event.target).length){
            $(".dorp-menu-Navtop").fadeOut();
        }            
    });

    $(document).on("click", function(event){
        var $trigger = $(".accousnt");
        if($trigger !== event.target && !$trigger.has(event.target).length){
            $(".dorsp-account").fadeOut();
        }            
    });
    
$(document).ready(function () {
    $('.lang').click(function () {
    $(".dorp-menu-Navtop").fadeToggle();
      $(".dorp-account").hide();
});
$('.account').click(function () {
    $(".dorp-account").fadeToggle();
$(".dorp-menu-Navtop").hide();
});
});






        $(function () {
            $('#name').keyup(function () {

                var lenght = $(this).val().length;

                if (lenght=='') {
                    $('#name').css({'border':'solid 1px red'});
                }
             
                else {

                    $('#name').css({ 'border': 'solid 1px green' });
                    $('#alret_name').html('');
                }


            });


        });
        
        
             $(function () {
            $('#phone').keyup(function () {

                var lenght = $(this).val().length;

                if (lenght=='') {
                    $('#phone').css({'border':'solid 1px red'});
                }
              
                else {

                    $('#phone').css({ 'border': 'solid 1px green' });
                    $('#alret_phone').html('');
                }


            });


        });
        
             $(function () {
            $('#email').keyup(function () {

                var lenght = $(this).val().length;

                if (lenght=='') {
                    $('#email').css({'border':'solid 1px red'});
                }
              
                else {

                    $('#email').css({ 'border': 'solid 1px green' });
                    $('#alret_phone').html('');
                }


            });


        });
        
                     $(function () {
            $('#opinion').keyup(function () {

                var lenght = $(this).val().length;

                if (lenght=='') {
                    $('#opinion').css({'border':'solid 1px red'});
                }
                else {

                    $('#opinion').css({ 'border': 'solid 1px green' });
                    $('#alret_phone').html('');
                }


            });


        });



/*Scroll Up*/


$(document).ready(function () {

    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('.scrollup').slideDown();
        } else {
            $('.scrollup').fadeOut();
        }
    });
    
    

    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });


});

