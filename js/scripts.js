$(function(){
//Mobile Menu
$('.header__mobile__menu').on('click', function(){
	$('.header__mobile__cover').addClass('header__mobile__cover__active');
});

$('.header__mobile__close').on('click', function(){
	$('.header__mobile__cover').removeClass('header__mobile__cover__active');
});

$(window).scroll(function(){
  var h_scroll = $(this).scrollTop();
  if (h_scroll > 500) {
    $('.mobile-link').fadeIn();
  } else {
    $('.mobile-link').fadeOut();
  }
})

//Открывает и закрывает Фильтр-коллекций
$('.select_collections_class').on('click', function (e) {
  var collections_checkboxes = $('.collections_filter_class');
  collections_checkboxes.toggle();
  e.stopPropagation();
});

$('.collections_filter_class').click(function(e) { 
  e.stopPropagation();
})

$(document).click(function(e) {
  var collections_checkboxes = $('.collections_filter_class');
  collections_checkboxes.hide();
  e.stopPropagation();
})

//Открывает и закрывает Фильтр-номеров
$('.select_numers_class').on('click', function (e) {
  var numers_checkboxes = $('.numers_filter_class');
  numers_checkboxes.toggle();
  e.stopPropagation();
});

$('.numers_filter_class').click(function(e) { 
  e.stopPropagation();
})

$(document).click(function(e) {
  var numers_checkboxes = $('.numers_filter_class');
  numers_checkboxes.hide();
  e.stopPropagation();
})

//Catalog filter
$(document).on('submit','#catalog-filter',function(event){
  var filter = $(this);
  console.log(filter.serialize());
  $.ajax({
    url:ajaxurl, // обработчик
    data:filter.serialize(), // данные
    type:filter.attr('method'), // тип запроса
    beforeSend:function(xhr){
      filter.find('button').text('Загружаю...'); // изменяем текст кнопки
    },
    success:function(data){
      console.log(data);
      filter.find('button').text('Применить фильтр'); // возвращаеи текст кнопки
      $('#response').html(data);
      hotelItemSwiper();
    }
  });
  return false;

});

//City filter
$(document).on('submit','#city-filter',function(event){
  var filter = $(this);
  console.log(filter.serialize());
  $.ajax({
    url:ajaxurl, // обработчик
    data:filter.serialize(), // данные
    type:filter.attr('method'), // тип запроса
    beforeSend:function(xhr){
      filter.find('button').text('Загружаю...'); // изменяем текст кнопки
    },
    success:function(data){
      console.log(data);
      filter.find('button').text('Применить фильтр'); // возвращаеи текст кнопки
      $('#response').html(data);
      hotelItemSwiper();
    }
  });
  return false;
});

//TABS
if ($(document).width() < 960) {
  $(document).on('click', '.tab-button-outer .nav-item', function(){
    $('.nav-tabs').toggleClass('open');
  })
}

//SWIPER
if ($(document).width() < 960) {
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

if ($(document).width() < 960) {
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

//SWIPER SINGLE CARD IMG
// $(document).on('click', '.swiper-click', function(event){
//   var swiper_id = $(this).attr("data-swiper");
//   console.log(swiper_id);
//   hotelcard_button_next = $('.swiper-next-' + swiper_id);
// })



var hotelItemSwiper = function() {
  $('.hotel-item-swiper').each(function(){
    swiper_next = $(this).find('.swiper-hotelcard-button-next');
    swiper_next_id = swiper_next.attr("data-swiper");
    console.log(swiper_next_id);
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

// var hotelcard_button_next = $('.swiper-hotelcard-button-next');
// var hotelcard_button_prev = $('.swiper-hotelcard-button-prev');
// var mySwiperHotelCard = new Swiper ('.hotel-item-swiper', {
//   slidesPerView: 1,
//   spaceBetween: 0,
//   loop: true,
//   navigation: {
//     nextEl: hotelcard_button_next,
//     prevEl: hotelcard_button_prev,
//   },
// });

$(document).on('click', '.nomer', function(event){
  var nomer = $(this).attr("data-nomer");
  $('.nomer-modal-' + nomer).show();
  $('body').addClass('nomer-modal__open');
})

$(document).on('click', '.nomer-modal__back', function(event){
  var nomer = $(this).attr("data-nomer");
  $('.nomer-modal-' + nomer).hide();
  $('body').removeClass('nomer-modal__open');
});
});