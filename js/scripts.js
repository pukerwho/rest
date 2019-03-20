$(function() {
  $( ".allcity .maincards__item__card__title" ).each(function() {
    var $quote = $(this);
    var $numWords = $quote.text().length;
    if (($numWords >= 18) && ($numWords < 28)) {
      $quote.css("font-size", "2.4rem");
    }
    else if ($numWords >= 28) {
      $quote.css("font-size", "1.85rem");
    }
  });
});

if ($(document).width() > 760) {
  $(window).scroll(function(){
    var h_scroll = $(this).scrollTop();
    if (h_scroll > 100) {
      $('header').addClass('header__fixed')
    } else {
      $('header').removeClass('header__fixed')
    }
  })
}

//Mobile Menu
$('.header__mobile__menu').on('click', function(){
	$('.header__mobile__cover').addClass('header__mobile__cover__active');
});

$('.header__mobile__close').on('click', function(){
	$('.header__mobile__cover').removeClass('header__mobile__cover__active');
});


if ($('.modal-callback-btn').length > 0) {
$(document).on('click', '.modal-callback-btn', function(){
  $('.modal-callback').toggleClass('modal-callback__open');
  $('body').toggleClass('modal-open');
  $('.modal-bg').toggleClass('modal-bg__open');
  // $('.modal-callback-icon').attr('src', 'https://vidpochivai.com.ua/wp-content/themes/rest/img/modal-close.svg');
  $('.modal-callback-icon-phone').toggleClass('modal-callback-icon-hide');
  $('.modal-callback-icon-close').toggleClass('modal-callback-icon-show');
});
}

// $(window).scroll(function(){
//   var h_scroll = $(this).scrollTop();
//   if (h_scroll > 500) {
//     $('.mobile-link').fadeIn();
//   } else {
//     $('.mobile-link').fadeOut();
//   }
// })

//Открывает и закрывает Фильтр-коллекций
$('.select_collections_class').on('click', function (e) {
  find_collections_select = $(this).find('.select');
  find_collections_select.toggleClass('b_filter__item__open');
  var collections_checkboxes = $('.collections_filter_class');
  collections_checkboxes.toggle();
  e.stopPropagation();
});

$('.collections_filter_class').click(function(e) { 
  e.stopPropagation();
})

$(document).click(function(e) {
  var collections_checkboxes = $('.collections_filter_class');
  find_collections_select.removeClass('b_filter__item__open');
  collections_checkboxes.hide();
  e.stopPropagation();
})

//Открывает и закрывает Фильтр-номеров
$('.select_numers_class').on('click', function (e) {
  find_numers_select = $(this).find('.select');
  find_numers_select.toggleClass('b_filter__item__open');
  var numers_checkboxes = $('.numers_filter_class');
  numers_checkboxes.toggle();
  e.stopPropagation();
});

$('.numers_filter_class').click(function(e) { 
  e.stopPropagation();
})

$(document).click(function(e) {
  var numers_checkboxes = $('.numers_filter_class');
  find_numers_select.removeClass('b_filter__item__open');
  numers_checkboxes.hide();
  e.stopPropagation();
});

//Открывает и закрывает Фильтр-цены
$('.select_price_class').on('click', function (el) {
  find_price_select = $(this).find('.select');
  find_price_select.toggleClass('b_filter__item__open');
  var price_block = $('.price_filter_class');
  price_block.toggle();
  el.stopPropagation();
});

$('.price_filter_class').click(function(el) { 
  el.stopPropagation();
})

$(document).click(function(el) {
  var price_block = $('.price_filter_class');
  find_price_select.removeClass('b_filter__item__open');
  price_block.hide();
  el.stopPropagation();
});

//Catalog filter
$(document).on('submit','#catalog-filter',function(){
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
$(document).on('submit','#city-filter',function(){
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


//Номер Модель Инфа
$(document).on('click', '.nomer', function(event){
  var nomer = $(this).attr("data-nomer");
  $('.nomer-modal-' + nomer).show();
  $('body').addClass('nomer-modal__open');
});

$(document).on('click', '.nomer-modal__back', function(event){
  var nomer = $(this).attr("data-nomer");
  $('.nomer-modal-' + nomer).hide();
  $('body').removeClass('nomer-modal__open');
});

//Поиск
$(document).on('click', '.search-button', function(){
  $('.b_search').show();
  $('body').addClass('nomer-modal__open');
});

$(document).on('click', '.b_search__close img', function(event){
  $('.b_search').hide();
  $('body').removeClass('nomer-modal__open');
});

//Фильтр по цене
$(".b_filter__range__price #slider-range").slider({
  range: true, 
  min: 0,
  max: 15000,
  values: [0, 15000],
  step: 50,
  slide: function( event, ui ) {
    $( "#min-price").html(ui.values[ 0 ]);
    $( "#max-price").html(ui.values[ 1 ]);
    document.getElementById('price_min_value').value = ui.values[0]
    document.getElementById('price_max_value').value = ui.values[1]
  }
});