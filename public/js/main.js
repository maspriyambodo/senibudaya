(function (window, document, $, undefined) {
    'use strict';
    var axilInit = {
        i: function (e) {
            axilInit.s();
            axilInit.methods();
        },

        s: function (e) {
            this._window = $(window),
                this._document = $(document),
                this._body = $('body'),
                this._html = $('html'),
                this._subscribePopUp = $('.subscribe-popup')
        },
        methods: function (e) {
            axilInit.w();
            axilInit.axilHover();
            axilInit.axilBackToTop();
            axilInit.axilSlickActivation();
            axilInit.loadSubscribePopup();
            axilInit.megamenuHover();
            axilInit.mobileMenuShow();
            axilInit.mobileMenuHide();
            axilInit.mobileMenuNavShow();
            axilInit.trendPost();
            axilInit.cursorAnimate();
            axilInit.onhoverAnimated();
            axilInit.contactForm();
            axilInit.mobileSearch();
            axilInit._clickDoc();
        },

        w: function (e) {
            this._window.on('load', axilInit.l).on('scroll', axilInit.scrl).on('resize', axilInit.res)
        },

        scrl: function () {

        },

        mobileSearch: function () {
            $('.search-button-toggle').on('click', function (e) {
                e.preventDefault();
               $(this).toggleClass('open');
               $(this).siblings('.header-search-form').toggleClass('open');
            });
        },

        contactForm: function () {
            $('.axil-contact-form').on('submit', function (e) {
				e.preventDefault();
				var _self = $(this);
				var __selector = _self.closest('input,textarea');
				_self.closest('div').find('input,textarea').removeAttr('style');
				_self.find('.error-msg').remove();
				_self.closest('div').find('button[type="submit"]').attr('disabled', 'disabled');
				var data = $(this).serialize();
				$.ajax({
					url: 'mail.php',
					type: "post",
					dataType: 'json',
					data: data,
					success: function (data) {
						_self.closest('div').find('button[type="submit"]').removeAttr('disabled');
						if (data.code == false) {
							_self.closest('div').find('[name="' + data.field + '"]');
							_self.find('.btn-primary').after('<div class="error-msg"><p>*' + data.err + '</p></div>');
						} else {
							$('.error-msg').hide();
							$('.form-group').removeClass('focused');
							_self.find('.btn-primary').after('<div class="success-msg"><p>' + data.success + '</p></div>');
							_self.closest('div').find('input,textarea').val('');

							setTimeout(function () {
								$('.success-msg').fadeOut('slow');
							}, 5000);
						}
					}
				});
			});
        },

        cursorAnimate: function () {
			/*
            var myCursor = jQuery('.mouse-cursor');
            if (myCursor.length) {
                if ($('body')) {
                    const e = document.querySelector('.cursor-inner'),
                        t = document.querySelector('.cursor-outer');
                    let n, i = 0,
                        o = !1;
                    window.onmousemove = function (s) {
                        o || (t.style.transform = "translate(" + s.clientX + "px, " + s.clientY + "px)"), e.style.transform = "translate(" + s.clientX + "px, " + s.clientY + "px)", n = s.clientY, i = s.clientX
                    }, $('body').on("mouseenter", "a, .cursor-pointer", function () {
                        e.classList.add('cursor-hover'), t.classList.add('cursor-hover')
                    }), $('body').on("mouseleave", "a, .cursor-pointer", function () {
                        $(this).is("a") && $(this).closest(".cursor-pointer").length || (e.classList.remove('cursor-hover'), t.classList.remove('cursor-hover'))
                    }), e.style.visibility = "visible", t.style.visibility = "visible"
                }
            }
			*/
        },
        

        onhoverAnimated: function () {
            var cerchio = document.querySelectorAll('.cerchio');
            cerchio.forEach(function (elem) {
                $(document).on('mousemove touch', function (e) {
                    magnetize(elem, e);
                });
            })
            function magnetize(el, e) {
                var mX = e.pageX,
                    mY = e.pageY;
                const item = $(el);

                const customDist = item.data('dist') * 5 || 60;
                const centerX = item.offset().left + (item.width() / 2);
                const centerY = item.offset().top + (item.height() / 2);

                var deltaX = Math.floor((centerX - mX)) * -0.45;
                var deltaY = Math.floor((centerY - mY)) * -0.45;

                var distance = calculateDistance(item, mX, mY);

                if (distance < customDist) {
                    TweenMax.to(item, 0.5, {
                        y: deltaY,
                        x: deltaX,
                        scale: 1.05
                    });
                    item.addClass('magnet');
                } else {
                    TweenMax.to(item, 0.6, {
                        y: 0,
                        x: 0,
                        scale: 1
                    });
                    item.removeClass('magnet');
                }
            }

            function calculateDistance(elem, mouseX, mouseY) {
                return Math.floor(Math.sqrt(Math.pow(mouseX - (elem.offset().left + (elem.width() / 2)), 2) + Math.pow(mouseY - (elem.offset().top + (elem.height() / 2)), 2)));
            }
            /*- MOUSE STICKY -*/
            function lerp(a, b, n) {
                return (1 - n) * a + n * b
            }
        },

        loadSubscribePopup: function () {
            setTimeout(function () {
                axilInit._subscribePopUp.addClass('show-popup');
            }, 3000);
        },

        mobileMenuShow: function () {
            $('.hamburger-menu').on('click', function (e) {
                e.preventDefault();
                axilInit._body.addClass('popup-mobile-menu-show'),
                    axilInit._html.css({
                        overflow: 'hidden'
                    });
            });
        },

        mobileMenuHide: function () {
            $('.mobile-close').on('click', function (e) {
                e.preventDefault();
                axilInit._body.removeClass('popup-mobile-menu-show'),
                    axilInit._html.css({
                        overflow: ''
                    });
                $('.popup-mobilemenu-area .menu-item-has-children a').removeClass('open').siblings('.axil-submenu').slideUp('400');  
				
				$('.popup-mobilemenu-area .menu-item-has-sub-children a').removeClass('open').siblings('.axil-sub-submenu').slideUp('400'); 

            })
            $('.popup-mobilemenu-area').on('click', function (e) {
                e.target === this && axilInit._body.removeClass('popup-mobile-menu-show'),
                    axilInit._html.css({
                        overflow: ''
                    });
            })
        },

        mobileMenuNavShow: function (e) {
            var screenWidth = axilInit._window.width();
            if (screenWidth < 1200) {
                $('.popup-mobilemenu-area .menu-item-has-children a').on('click', function (e) {
                    $(this).siblings('.axil-submenu').slideToggle('400');
                    $(this).toggleClass('open').siblings('.axil-submenu').toggleClass('active');

                    $(this).parent('.menu-item-has-children').siblings('.menu-item-has-children').children('.axil-submenu').slideUp('400');
                    $(this).parent('.menu-item-has-children').siblings('.menu-item-has-children').children('.axil-submenu').removeClass('active');
                    $(this).parent('.menu-item-has-children').siblings('.menu-item-has-children').children('a').removeClass('open');
                })
				
				$('.popup-mobilemenu-area .menu-item-has-sub-children a').on('click', function (e) {
                    $(this).siblings('.axil-sub-submenu').slideToggle('400');
                    $(this).toggleClass('open').siblings('.axil-sub-submenu').toggleClass('active');

                    $(this).parent('.menu-item-has-sub-children').siblings('.menu-item-has-sub-children').children('.axil-sub-submenu').slideUp('400');
                    $(this).parent('.menu-item-has-sub-children').siblings('.menu-item-has-sub-children').children('.axil-sub-submenu').removeClass('active');
                    $(this).parent('.menu-item-has-sub-children').siblings('.menu-item-has-sub-children').children('a').removeClass('open');
                })
            }
        },

        axilHover: function () {
            $('.content-direction-column, .post-listview-visible-color').mouseenter(function () {
                var self = this;
                $(self).removeClass('axil-control');
                setTimeout(function () {
                    $('.content-direction-column.is-active, .post-listview-visible-color .post-list-view.is-active').removeClass('is-active').addClass('axil-control');
                    $(self).removeClass('axil-control').addClass('is-active');
                }, 0);
            });
        },

        trendPost: function () {
            $(window).resize(function () {

            });
            //do something
            var width = axilInit._window.width();
            if (width > 991) {
                $('.trend-post').mouseenter(function () {
                    var self = this;
                    $(self).removeClass('axil-control');
                    setTimeout(function () {
                        $('.trend-post.is-active').removeClass('is-active').addClass('axil-control');
                        $(self).removeClass('axil-control').addClass('is-active');
                    }, 0);

                });
            }
        },

        megamenuHover: function () {
            $('.vertical-nav-menu li.vertical-nav-item').hover(function () {
                $('.axil-vertical-inner').hide();
                $('.vertical-nav-menu li.vertical-nav-item').removeClass('active');
                $(this).addClass('active');
                var selected_tab = $(this).find('a').attr("href");
                $(selected_tab).stop().fadeIn();
                return false;
            });
        },

        axilBackToTop: function () {
            var btn = $('#backto-top');
            $(window).scroll(function () {
                if ($(window).scrollTop() > 300) {
                    btn.addClass('show');
                } else {
                    btn.removeClass('show');
                }
            });
            btn.on('click', function (e) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: 0
                }, '300');
            });
        },

        
        axilSlickActivation: function (e) {
            $('.slider-activation').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                dots: false,
                fade: true,
                autoplay: true,
                autoplaySpeed: 6000,
                adaptiveHeight: true,
                cssEase: 'linear',
                prevArrow: '<button class="slide-arrow prev-arrow"><i class="fal fa-arrow-left"></i></button>',
                nextArrow: '<button class="slide-arrow next-arrow"><i class="fal fa-arrow-right"></i></button>'
            });

			$('.banner-activation').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                dots: false,
                fade: true,
                adaptiveHeight: true,
                autoplay: true,
                autoplaySpeed: 4000,
                cssEase: 'linear',
                prevArrow: '<button class="slide-arrow prev-arrow"><i class="fal fa-arrow-left"></i></button>',
                nextArrow: '<button class="slide-arrow next-arrow"><i class="fal fa-arrow-right"></i></button>'
            });

			$('.videos-activation').slick({
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 1,
                arrows: true,
                dots: false,
                adaptiveHeight: true,
                prevArrow: '<button class="slide-arrow prev-arrow"><i class="fal fa-arrow-left"></i></button>',
                nextArrow: '<button class="slide-arrow next-arrow"><i class="fal fa-arrow-right"></i></button>',
                responsive: [{
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                        }
                    }

                ]
            });
			
			$('.photo-activation').slick({
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                arrows: true,
                dots: false,
                adaptiveHeight: true,
                prevArrow: '<button class="slide-arrow prev-arrow"><i class="fal fa-arrow-left"></i></button>',
                nextArrow: '<button class="slide-arrow next-arrow"><i class="fal fa-arrow-right"></i></button>',
                responsive: [{
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
                        }
                    }

                ]
            });

            $('.modern-post-activation').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                arrows: true,
                dots: false,
                prevArrow: '<button class="slide-arrow prev-arrow"><i class="fal fa-arrow-left"></i></button>',
                nextArrow: '<button class="slide-arrow next-arrow"><i class="fal fa-arrow-right"></i></button>',
                responsive: [{
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });

            // Bootstrap Tab With Slick 
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
                $('.modern-post-activation').slick('setPosition');
            });

            $('.post-gallery-activation').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                dots: false,
                fade: true,
                adaptiveHeight: true,
                cssEase: 'linear',
                prevArrow: '<button class="slide-arrow prev-arrow"><i class="fal fa-arrow-left"></i></button>',
                nextArrow: '<button class="slide-arrow next-arrow"><i class="fal fa-arrow-right"></i></button>',
            });

            $('.categories-activation').slick({
                infinite: true,
                slidesToShow: 7,
                slidesToScroll: 1,
                arrows: true,
                dots: false,
                adaptiveHeight: true,
                prevArrow: '<button class="slide-arrow prev-arrow"><i class="fal fa-arrow-left"></i></button>',
                nextArrow: '<button class="slide-arrow next-arrow"><i class="fal fa-arrow-right"></i></button>',
                responsive: [{
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 5,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 4,
                        }
                    }

                ]
            });

            $('.slick-nav-avtivation-new').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                vertical: true,
                asNavFor: '.slick-for-avtivation-new',
                dots: false,
                focusOnSelect: true,
                verticalSwiping: false,
                centerMode: false,
                centerPadding: '0',
                arrows: false,
                autoplay: true,
                autoplaySpeed: 5000,
                infinite: false,
                responsive: [{
                        breakpoint: 1199,
                        settings: {
                            vertical: true,
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            vertical: true,
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 577,
                        settings: {
                            vertical: true,
                            slidesToShow: 2,
                        }
                    }
                ]

            });

            $('.slick-for-avtivation-new').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.slick-nav-avtivation-new',
                infinite: false,
                autoplay: true,
                responsive: [{
                    breakpoint: 769,
                }]
            });
        },
        
        _clickDoc: function (e) {
            var subscribePopupHide;
            subscribePopupHide = function (e) {
                if (!$('.subscribe-popup-inner, .subscribe-popup-inner *:not(.close-popup, .close-popup i, .newsletter-content .close-button)').is(e.target)) {
                    axilInit._subscribePopUp.fadeOut("300");
                }
            };
            axilInit._document
                .on('click', '.close-popup', subscribePopupHide)
                .on('click', subscribePopupHide)
        }
    }
    axilInit.i();

})(window, document, jQuery);

$(document).ready(function () {
	$(".style-select").niceSelect();
	
	$('#pro').change(function(){
		$.fn.kab();
	});

	$.fn.kab = function() {
		$.get(app_url + "/kabupaten/" + $("#pro").val(), function(data, status){
			var obj = $.parseJSON(data);
			$("#kab option").remove();
			$.each(obj, function(idx, val) {
				var opt = new Option(val.name, val.id, false, false);
				$('#kab').append(opt).trigger('change');
				$('#kab').niceSelect('update');
			});
		});
	}

	$('#prop').change(function(){
		$.fn.kabp();
	});

	$.fn.kabp = function() {
		$.get(app_url + "/kabupaten/" + $("#prop").val(), function(data, status){
			var obj = $.parseJSON(data);
			$("#kabp option").remove();
			$.each(obj, function(idx, val) {
				var opt = new Option(val.name, val.id, false, false);
				$('#kabp').append(opt).trigger('change');
				$('#kabp').niceSelect('update');
			});
		});
	}

	$('#propinsi').change(function(){
		$.fn.kabupaten();
	});

	$.fn.kabupaten = function() {
		$.get(app_url + "/kabupaten/" + $("#propinsi").val(), function(data, status){
			var obj = $.parseJSON(data);
			$("#kabupaten option").remove();
			$.each(obj, function(idx, val) {
				var opt = new Option(val.name, val.id, false, false);
				$('#kabupaten').append(opt).trigger('change');
				$('#kabupaten').niceSelect('update');
			});
		});
	}

	$('#jurnalis').change(function(){
		var slug = replaceAll($('#jurnalis option:selected').text().trim().toLowerCase(), ' ', '-');
		var page = slug == 'semua-jurnalis' ? '/jurnalis' : '/jurnalis/' + slug;
		$(location).prop('href', app_url + page);
	});

	$('#editor').change(function(){
		var slug = replaceAll($('#editor option:selected').text().trim().toLowerCase(), ' ', '-');
		var page = slug == 'semua-editor' ? '/editor' : '/editor/' + slug;
		$(location).prop('href', app_url + page);
	});

	$('#fotografer').change(function(){
		var slug = replaceAll($('#fotografer option:selected').text().trim().toLowerCase(), ' ', '-');
		var page = slug == 'semua-fotografer' ? '/fotografer' : '/fotografer/' + slug;
		$(location).prop('href', app_url + page);
	});

	$('#direktorat').change(function(){
		var slug = replaceAll($('#direktorat option:selected').text().trim().toLowerCase(), ' ', '-');
		var page = slug == 'semua-direktorat' ? '/berita' : '/direktorat/' + slug;
		$(location).prop('href', app_url + page);
	});
	
	$('#form').submit(function(){
        if(grecaptcha.getResponse().length < 1){
            $('.text-validate').html("<i class='fas fas fa-exclamation'></i> Checked reCAPTCHA.");
            return false;
        }
    });
});


const nav = document.querySelector('#nav');
let navTop = nav.offsetTop;

function fixedNav() {
	if (window.scrollY >= navTop)
		nav.classList.add('fixed');
	else
		nav.classList.remove('fixed');
}
window.addEventListener('scroll', fixedNav);

function lightGalleryInit() {
	$(".image-popup").lightGallery({
		selector: "this",
		cssEasing: "cubic-bezier(0.25, 0, 0.25, 1)",
		download: false,
		counter: false
	});
	var o = $(".lightgallery"),
		p = o.data("looped");
	o.lightGallery({
		selector: ".lightgallery a.popup-image",
		cssEasing: "cubic-bezier(0.25, 0, 0.25, 1)",
		download: false,
		loop: false,
		counter: false
	});
	$('#html5-videos').lightGallery({
		selector: 'this',
		counter: false,
		download: false,
		zoom: false
	});
}
lightGalleryInit();

function doc(title, path){
	document.getElementById('title-dokumen').innerHTML = title;
	document.getElementById('file-dokumen').src = path; 
}

function replaceAll(Source,stringToFind,stringToReplace){
	var temp = Source;
	if(temp == undefined) return false;
	var index = temp.indexOf(stringToFind);
	while(index != -1){
		temp = temp.replace(stringToFind,stringToReplace);
		index = temp.indexOf(stringToFind);
	}
	return temp;
}
