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
        },
        initSliders() {
            $('.main-slider').slick({
                arrows: false,
                infinite: true,
                slidesToShow: 6.8,
                slidesToScroll: 1,
                dots: false,
                autoplay: true,
            });
            $('.main-slider_cards').slick({
                arrows: false,
                infinite: true,
                slidesToShow: 2.9,
                slidesToScroll: 1,
                dots: false,
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
