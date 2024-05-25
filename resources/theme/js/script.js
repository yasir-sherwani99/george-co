import $ from 'jquery';
import Swiper from 'swiper';
import 'magnific-popup';
import WOW from 'wow.js'

// loader
$(window).on('load', function() {
    $('.preloader-wrap').fadeOut(1000);
});

$(".label-box").hover(function () {
    $(".text-img-box").hide();
    $(this).parent().next(".text-img-box").show();
});

$(".text-img-box").mouseleave(function () {
    $(this).hide();
});

// swiper slider for clients
if ($(".clients-carousel").length > 0) {
    let j2 = new Swiper(".clients-carousel .swiper-container", {
        preloadImages: false,
        freeMode: false,
        slidesPerView: 6,
        spaceBetween: 10,
        loop: true,
        grabCursor: true,
        mousewheel: false,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.cc-next',
            prevEl: '.cc-prev',
        },
        breakpoints: {
            1064: {
                slidesPerView: 5,
            },
            768: {
                slidesPerView: 3,
            },
            520: {
                slidesPerView: 1,
            },
        }
    });
}

// Initialize wow
new WOW().init();
   
// Project section popup
$('.project-sec').magnificPopup({
    delegate: 'a',
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    mainClass: 'mfp-img-mobile',
    gallery: {
        enabled: true,
        navigateByImgClick: true,
        preload: [0, 1]
    }
});

        