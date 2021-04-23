let loader = '<div class="eng-loader-wp"><div class="eng-loader"></div></div>';

let loader2 = '<div class="eng-loader-wp"><div class="eng-loader2"></div></div>';

let origin = window.location.origin;


const slide = new Swiper('.slides', {

    spaceBetween: 0,

    effect: 'fade',

    // loop: true,

    lazy: true,

    autoplay: {

        delay: 5000,

    },

    keyboard: {

        enabled: true,

        onlyInViewport: false,

    },

    pagination: {

        el: '.swiper-pagination',

        clickable: true,

    },

    navigation: {

        nextEl: '.swiper-button-next',

        prevEl: '.swiper-button-prev',

    }

});


const productSlide = new Swiper(".products-slide", {

    spaceBetween: 20,

    slidesPerView: 4,

    lazy: true,

    autoplay: {

        delay: 3000

    },

    keyboard: {

        enabled: true,

        onlyInViewport: false

    },

    navigation: {

        nextEl: '.product-button-next',

        prevEl: '.product-button-prev',

    },

    breakpoints: {

        1024: {

            slidesPerView: 3

        },

        768: {

            slidesPerView: 2

        },

        640: {

            slidesPerView: 1

        },

        320: {

            slidesPerView: 1

        }

    }

});


const aboutCertificateSlide = new Swiper(".about-certificate-slide", {

    spaceBetween: 20,

    slidesPerView: 4,

    lazy: true,

    autoplay: {

        delay: 3000

    },

    keyboard: {

        enabled: true,

        onlyInViewport: false

    },

    navigation: {

        nextEl: '.about-certificate-button-prev',

        prevEl: '.about-certificate-button-next',

    },

    breakpoints: {

        1024: {

            slidesPerView: 4

        },

        768: {

            slidesPerView: 2

        },

        640: {

            slidesPerView: 1

        },

        320: {

            slidesPerView: 1

        }

    }

});


const galleryThumbs = new Swiper('.gallery-thumbs', {

    spaceBetween: 10,

    slidesPerView: 3,

    freeMode: true,

    watchSlidesVisibility: true,

    watchSlidesProgress: true,

});

const galleryTop = new Swiper('.gallery-top', {

    spaceBetween: 10,

    navigation: {

        nextEl: '.swiper-button-next',

        prevEl: '.swiper-button-prev',

    },

    thumbs: {

        swiper: galleryThumbs

    }

});


$(".theme-faq-qa-head").click(function () {

    let display = $(this).next().is(":visible") ? 1 : 0;

    $(".theme-faq-qa-content").hide();

    if (display) {

        $(this).next('.theme-faq-qa-content').hide()

    } else {

        $(this).next('.theme-faq-qa-content').show()

    }

});


$(document).on("click", "[data-video]", function () {

    let video = $(this).data("video");

    let title = $(this).data("title");

    let short = $(this).data("short");

    if (video) {

        $('.videos iframe').attr('src', video);

        $('#title').html(title);

        $('#short').html(short);

    }

});


$(document).on("click", "#bulletinButton", function (e) {

    let email = $("#email").val();

    let t = $(this);

    let html = t.html();

    t.html(loader);

    t.prop("disabled", !0);

    $.ajax({

        url: registerNewsLetterUrl,

        type: "POST",

        dataType: "json",

        data: {"email": email},

        success: function (data) {
            console.log(data);

            if (data.success) {

                getMessage(data.success, 'success');

                $("#email").val("");

            } else {

                getMessage(data.message, 'error');

            }

        },
        error: function(data) {

            getMessage(data.responseJSON.message, 'error');
        },

        complete: function () {

            // $("#email").val("");

            t.html(html);

            t.prop("disabled", !1)

        }

    })

    e.preventDefault();

});


$(document).on("click", "#contactFormButton", function (e) {

    let t = $(this);

    let html = t.html();

    t.html(loader);

    t.prop("disabled", !0);

    let name = $("#name").val();

    let surname = $("#lastname").val();

    let email = $("#email").val();

    let phone = $("#phone").val();

    let message = $("#message").val();

    $.ajax({

        url: origin + "/service/data",

        type: "POST",

        dataType: "json",

        data: {
            "name": name,
            "surname": surname,
            "email": email,
            "phone": phone,
            "message": message,
            "type": "contactform"
        },

        success: function (data) {

            if (data.success) {

                $("form").trigger("reset");

                getMessage(data.success, 'success');

            } else {

                getMessage(data.error, 'error');

            }

        },

        complete: function () {

            t.html(html);

            t.prop("disabled", !1)

        }

    })

    e.preventDefault();

});


$(document).on("click", "#send-getquote", function (e) {

    let t = $(this);

    let html = t.html();

    t.html(loader);

    t.prop("disabled", !0);

    let name = $("#q-name").val();

    let surname = $("#q-surname").val();

    let email = $("#q-email").val();

    let phone = $("#q-phone").val();

    let message = $("#q-message").val();

    let product = $("#q-product").val();

    let piece = $("#q-piece").val();

    $.ajax({

        url: getFreeQuoteUrl,

        type: "POST",

        dataType: "json",

        data: {
            "name": name,
            "surname": surname,
            "email": email,
            "phone": phone,
            "product_id": product,
            "piece": piece,
            "message": message,
        },

        success: function (data) {

            if (data.success) {

                $("form").trigger("reset");

                getMessage(data.success, 'success');

            } else {

                getMessage(data.error, 'error');

            }

        },
        error(data) {
            getMessage(data.responseJSON.message, 'error')
        },

        complete: function () {

            t.html(html);

            t.prop("disabled", !1)

        }

    })

    e.preventDefault();

});


function getMessage(message, type) {

    Swal.fire({

        position: 'top-center',

        icon: type,

        title: message,

        showConfirmButton: false,

        timer: 2500

    })

}


$(document).click(function (e) {

    const target = e.target;

    if (!$(target).is('.offer-area, .offer-area *, .infobar .offer-btn , .infobar .offer-btn *')) {

        $(".product-modal").fadeOut();

    }

});


$(document).click(function (e) {

    const target = e.target;

    if (!$(target).is('.offer-area, .offer-area *, .pd-info-buttons .offer-button , .pd-info-buttons .offer-button *')) {

        $(".product-modal").fadeOut();

    }

});


// modal

function modal(clickelement) {

    $(clickelement).click(function () {

        const target = $(this).data("target");

        $(target).fadeIn();

    });


    $('.modal-close').click(function () {

        const target = $(this).parent().parent().parent();

        $(target).fadeOut();

    });

}


modal(".infobar .offer-btn");
modal(".mobile-nav-content-buttons .offer-btn");

modal(".pd-info-buttons .offer-button");


// Mobile Nav

$('.mobile-nav-btn').click(function () {

    $('.mobile-nav').fadeIn();

    $('.mobile-nav-content').css('right', '0');

    $('body').css('overflow-y', 'hidden');

});

$('.mobile-nav-content span svg').click(function () {

    $('.mobile-nav-content').css('right', '-999px');

    $('.mobile-nav').fadeOut();

    $('body').css('overflow-y', 'auto');

});

// Mobile Nav Drop

$('.mobile-nav-drop-go').click(function () {

    let display = $(this).children('.mobile-nav-drop').is(':visible') ? 1 : 0;

    if (display) {

        $(this).children('a').children('svg').css('transform', 'rotate(0deg)');

        $(this).children('.mobile-nav-drop').slideUp();

    } else {

        $(this).children('a').children('svg').css('transform', 'rotate(45deg)');

        $(this).children('.mobile-nav-drop').slideDown();

    }

})
