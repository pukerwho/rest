var windowWidth = 767;

if ($(document).width() < windowWidth) {
  var mySwiper = new Swiper ('.swiper-maincards', {
    slidesPerView: 'auto',
    spaceBetween: 30,
    loop: true,
    navigation: {
      nextEl: '.swiper-maincards-button-next',
      prevEl: '.swiper-maincards-button-prev',
    },
  });
};

if ($(document).width() < windowWidth) {
  var mySwiper = new Swiper ('.swiper-hotels', {
    slidesPerView: 'auto',
    spaceBetween: 30,
    loop: true,
    navigation: {
      nextEl: '.swiper-hotels-button-next',
      prevEl: '.swiper-hotels-button-prev',
    },
  });
};

//SWIPER REGION
if ($(document).width() > windowWidth) {
  var myRegionSwiper = new Swiper ('.swiper-region', {
    slidesPerView: 5,
    spaceBetween: 15,
    loop: true,
    navigation: {
      nextEl: '.swiper-region-button-next',
      prevEl: '.swiper-region-button-prev',
    },
  });
};
if ($(document).width() < windowWidth) {
  var myRegionSwiper = new Swiper ('.swiper-region', {
    slidesPerView: 2,
    spaceBetween: 15,
    loop: true,
    navigation: {
      nextEl: '.swiper-region-button-next',
      prevEl: '.swiper-region-button-prev',
    },
  });
};

//SWIPER CITYLIST MOBILE NAV
var NavSwiper = new Swiper ('.citylist_nav_container', {
  slidesPerView: 4,
  spaceBetween: 30,
  slidesOffsetBefore: 40,
  slidesOffsetAfter: 20,
  loop: true,
});

//SWIPER NOW WATCH
var nowwatch_button_next = $('.swiper-nowwatch-button-next');
var nowwatch_button_prev = $('.swiper-nowwatch-button-prev');
var mySwiper = new Swiper ('.swiper-hotels-now-watch', {
  slidesPerView: 7,
  spaceBetween: 30,
  loop: true,
  navigation: {
    nextEl: nowwatch_button_next,
    prevEl: nowwatch_button_prev,
  },
});

//SWIPER ДЛЯ ОТЕЛЯ (ТЕРРИТОРИЯ) -- MOBILE
var singleHotelTerritory = new Swiper ('.single-hotel-territory', {
  slidesPerView: "auto",
  spaceBetween: 0,
  autoHeight: true,  
});

var mySwiperHomePlaces = new Swiper ('.swiper-home-places', {
  slidesPerView: 'auto',
  spaceBetween: 20,
});

var hotelItemSwiper = function() {
  $('.hotel-item-swiper').each(function(){
    swiper_next = $(this).find('.swiper-hotelcard-button-next');
    swiper_next_id = swiper_next.attr("data-swiper");
    var mySwiperHotelCard = new Swiper($(this), {
      slidesPerView: 1,
      spaceBetween: 0,
      loop: true,
      navigation: {
        nextEl: $('.swiper-next-'+swiper_next_id),
        prevEl: $('.swiper-prev-'+swiper_next_id),
      },
    });
  });
}
hotelItemSwiper();