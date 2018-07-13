(function ($) {
    "use strict";

    window.btcPay = $.extend({}, {
        winWidth: $(window).width(),
        winHeight: $(window).height(),
        winScroll: $(window).scrollTop(),
        preloader: $('.preloader'),
        modalWindow: $('.modal'),

        init() {
            btcPay.initModal();
            btcPay.initSliders();
            btcPay.initHoverCard();

        },
        initHoverCard() {
            if (!$('.hoverCard').length) return false;
            let card = $('.hoverCard');
            card.each(function () {
                $(this).on('mouseenter', function () {
                    $(this).siblings().removeClass('hovered');

                    $(this).addClass('hovered');

                });
                $(this).on('mouseleave', function () {
                    $(this).removeClass('hovered');
                });
            });
        },
        initSliders() {
            $('.main-slider').slick({
                arrows: false,
                infinite: true,
                slidesToShow: 6.8,
                slidesToScroll: 1,
                dots: false,
                focusOnSelect: true,
                autoplay: true,
            });
            $('.main-slider_cards').slick({
                arrows: false,
                infinite: true,
                slidesToShow: 2.9,
                slidesToScroll: 1,
                focusOnSelect: true,
                dots: false,
                autoplay: true,
            });
            $('.teamSlider').slick({
                arrows: true,
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                dots: false,
                autoplay: true,
                focusOnSelect: true,
            });
            $('.slider-partners').slick({
                arrows: false,
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                dots: false,
                focusOnSelect: true,
                autoplay: true,
            });


        },
        initModal() {

            let openModal = $('.openModal'),
                modal = $('.modal-container');

            //  calls
            openClicks();
            // 

            function openClicks() {
                openModal.each(function () {
                    $(this).on('click', function (e) {
                        e.preventDefault();
                        let dataOpenModal = $(this).attr('data-open-modal');
                        openModalWindow(dataOpenModal);
                    });
                });
            }

            function openModalWindow(dataOpenModal) {
                modal.each(function () {
                    let modal = $(this).attr('data-modal');

                    if (modal == dataOpenModal) {
                        $(this).addClass('modal-visible');
                        $(this).siblings().removeClass('modal-visible');
                    }
                }, closeModal()); // callback
            }

            function closeModal() {
                modal.each(function () {
                    $(this).on('click', function (e) {
                        if (e.target !== e.currentTarget) return false;
                        $(this).removeClass('modal-visible');
                    });
                    $(document).keyup(function (e) {
                        if (e.keyCode == 27) {
                            modal.removeClass('modal-visible');
                        }
                    });
                });

            }
        }
    });

    $(document).ready(function () {
        btcPay.init();
    });

})(jQuery);
