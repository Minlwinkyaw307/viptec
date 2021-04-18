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
    slidesPerView: 3,
    lazy: true,
    autoplay: {
      delay: 3000
    },
    keyboard: {
      enabled: true,
      onlyInViewport: false
    },
    navigation: {
        nextEl: '.about-certificate-button-next',
        prevEl: '.about-certificate-button-prev',
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
  
    $(".theme-faq-qa-head").click(function() {
    var display = $(this).next().is(":visible") ? 1 : 0;
    $(".theme-faq-qa-content").hide();
    if (display) {
        $(this).next('.theme-faq-qa-content').hide()
    } else {
        $(this).next('.theme-faq-qa-content').show()
    }
});

$(document).on("click", ".media-less-box", function() {
  var video = $(this).data("video");
  var title = $(this).data("title");
  var short = $(this).data("short");
  if (video) {
      $('#video-container').attr('src', video);
      $('#title').html(title);
      $('#short').html(short);
  }
});