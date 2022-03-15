/*
Template Name: Probiz
Author: TrendyTheme
Version: 1.0
*/

(function () {

	"use strict"; // use strict to start

	$(document).ready(function () {


        /* ======= Preloader ======= */
        (function () {
            $('#status').fadeOut();
            $('#preloader').delay(200).fadeOut('slow');
        }());




        $(function() {
            var list = $('.top-bar-address-list .nav-tabs ul');
            var link = $('.top-bar-address-list .nav-tabs > li > a');

            list.find('li > a').click(function() {
                var text = $(this).html();
                var icon = '<span class="fa fa-caret-down"></span>';
                link.html(text+icon);
            });
        });


        /* === Topbar visibility toggle in small devices === */
        if($('.tt-toggle-bar').length > 0){

            $(".tt-toggle-bar").click(function(){
                $(".top-bar").toggle();
            });
        }



        /* === Full Screen Banner === */
        $(window).on('resizeEnd', function () {
            $(".fullscreen-banner").height($(window).height());
        });

        $(window).resize(function () {
            if (this.resizeTO) clearTimeout(this.resizeTO);
            this.resizeTO = setTimeout(function () {
                $(this).trigger('resizeEnd');
            }, 300);
        }).trigger("resize");



        /* === Detect IE version === */
        (function () {

            function getIEVersion() {
                var match = navigator.userAgent.match(/(?:MSIE |Trident\/.*; rv:)(\d+)/);
                return match ? parseInt(match[1], 10) : false;
            }

            if( getIEVersion() ){
                $('html').addClass('ie'+getIEVersion());
            }

        }());



        /* ======= Stellar for background scrolling ======= */
        if ($('.parallax-bg').length > 0) {
            $('.parallax-bg').imagesLoaded( function() {

                $(window).stellar({
                    horizontalScrolling: false,
                    verticalOffset: 0,
                    horizontalOffset: 0,
                    responsive: true,
                    hideDistantElements: true
                });
            });
        }



		//fun fact
		$('.tt-count').on('inview', function(event, visible, visiblePartX, visiblePartY) {
            if (visible) {
                    $(this).find('.timer').each(function () {
                        var $this = $(this);
                        $({ Counter: 0 }).animate({ Counter: $this.text() }, {
                          duration: 2000,
                          easing: 'swing',
                          step: function () {
                              $this.text(Math.ceil(this.Counter));
                            }
                        });
                    });
                $(this).off('inview');
            }
        });

    	if($('.swiper-container').length > 0){
    		var swiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination',
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            slidesPerView: 4,
            slidesPerColumn: 2,
            // slidesPerGroup: 8,
            // paginationClickable: true,
            // spaceBetween: 10,
            // loop: true,
            // breakpoints: {
            //   720: {
            //     slidesPerView: 1,
            //     spaceBetween: 30
            //   }
            // }
          });
    	}



        /* ======= Contact Form ======= */
        $('#contactForm').on('submit',function(e){

            e.preventDefault();

            var $action = $(this).prop('action');
            var $data = $(this).serialize();
            var $this = $(this);

            $this.prevAll('.alert').remove();

            $.post( $action, $data, function( data ) {

                if( data.response=='error' ){

                    $this.before( '<div class="alert danger-border"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <i class="fa fa-times-circle"></i> '+data.message+'</div>' );
                }

                if( data.response=='success' ){

                    $this.before( '<div class="alert success-border"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-thumbs-o-up"></i> '+data.message+'</div>' );
                    $this.find('input, textarea').val('');
                }

            }, "json");

        });




		//popup video
		if ($('.popup-video').length > 0) {
            $('.popup-video').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false
            });
        }

        /* === blogGrid === */
        if ($('.blog-grid').length > 0) {

            var $grid = $('.blog-grid').imagesLoaded( function() {
              // init Masonry after all images have loaded
              $grid.masonry({
                itemSelector: '.blog-item',
              });
            });
        }

        /* === Progress Bar === */
        $('.progress').on('inview', function(event, visible, visiblePartX, visiblePartY) {
          if (visible) {
            $.each($('div.progress-bar'),function(){
              $(this).css('height', $(this).attr('aria-valuenow')+'%');
            });
            $(this).off('inview');
          }
        });
	});


})(jQuery);
