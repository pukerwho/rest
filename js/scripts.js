$(function() {
  (function() {
    var div, n,
        v = document.getElementsByClassName("youtube-player");
    for (n = 0; n < v.length; n++) {
        div = document.createElement("div");
        div.setAttribute("data-id", v[n].dataset.id);
        div.innerHTML = labnolThumb(v[n].dataset.id);
        div.onclick = labnolIframe;
        v[n].appendChild(div);
    }
  })();

  function labnolThumb(id) {
    var thumb = '<img src="https://i.ytimg.com/vi/ID/maxresdefault.jpg">',
        play = '<div class="play"></div>';
    return thumb.replace("ID", id) + play;
  }

  function labnolIframe() {
    var iframe = document.createElement("iframe");
    var embed = "https://www.youtube.com/embed/ID?autoplay=1";
    iframe.setAttribute("src", embed.replace("ID", this.dataset.id));
    iframe.setAttribute("frameborder", "0");
    iframe.setAttribute("allowfullscreen", "1");
    this.parentNode.replaceChild(iframe, this);
  }
  
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

if($(document).width() > 760) {
  $(window).scroll(function(){
    var h_scroll = $(this).scrollTop();
    if (h_scroll > 100) {
      $('.single-hotel-cover-item').css({'position':'fixed'}).animate({'top':'100px'});
    } else {
      $('.single-hotel-cover-item').css({'position':'absolute'}).animate({'top':'0'});
    }
  })
}

$('.allcity-button').on('click', function(){
  $('.header__allcity').toggleClass('header__allcity-open');
  $('.allcity-button-open').toggleClass('allcity-button-open-active');
  $('.allcity-button-close').toggleClass('allcity-button-close-active');
  $('.modal-bg').toggleClass('modal-bg__open');
  $('body').toggleClass('modal-open');
});

//partner page
if ($('.page-template-tpl_partner').length > 0) {
  var compareHeight = $('#compare').height();
  var compareTop = $('#compare').offset().top;
  $(window).scroll(function(){
    var h_scroll = $(this).scrollTop();
    if (h_scroll > (compareTop - compareHeight/1.75)) {
      $('.p_partner__other-graph').addClass('p_partner__other-graph__open');
      $('.p_partner__we-graph').addClass('p_partner__we-graph__open');
      $('.p_partner__thinkabout').addClass('p_partner__thinkabout__open');
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
if ($('.select_collections_class').length > 0) {
  $('.select_collections_class').on('click', function (e) {
    find_collections_select = $(this).find('.select');
    find_collections_select.toggleClass('b_filter__item__open');
    var collections_checkboxes = $('.collections_filter_class');
    collections_checkboxes.toggle();
    e.stopPropagation();
  });
}

$('.collections_filter_class').click(function(e) { 
  e.stopPropagation();
})

//скрыть все фильтры
$(document).click(function(e) {
  find_select = $(this).find('.select');
  find_select.removeClass('b_filter__item__open');

  var collections_checkboxes = $('.collections_filter_class');
  collections_checkboxes.hide();

  var price_block = $('.price_filter_class');
  price_block.hide();

  var numers_checkboxes = $('.numers_filter_class');
  numers_checkboxes.hide();

  e.stopPropagation();
})

//Открывает и закрывает Фильтр-номеров
if ($('.select_numers_class').length > 0 ) {
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
}

//Открывает и закрывает Фильтр-цены
$('.select_price_class').on('click', function (e) {
  find_price_select = $(this).find('.select');
  find_price_select.toggleClass('b_filter__item__open');
  var price_block = $('.price_filter_class');
  price_block.toggle();
  e.stopPropagation();
});

$('.price_filter_class').click(function(e) { 
  e.stopPropagation();
})


//Catalog filter
$(document).on('submit','#catalog-filter',function(){
  var filter = $(this);
  var cityname_val = $('#catalog-filter #b_filter__item-cityname').val();
  $('.cityname').data('id', cityname_val);
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
      // $('.cityname').data('name', 'Бердянск');
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

//Пожаловаться
//Callback Form Open
if ($('.send-message').length > 0) {
  $(document).on('click', '.send-message', function(){
    $('.send-message-modal').addClass('send-message-modal__open');
    $('body').addClass('modal-open');
    $('.modal-bg').addClass('modal-bg__open');
  });

  $(document).on('click', '.send-message-modal__close', function(){
    $('.send-message-modal').removeClass('send-message-modal__open');
    $('body').removeClass('modal-open');
    $('.modal-bg').removeClass('modal-bg__open');
  });  
}

// WEATHER START //
var cityWeather = $(".weather-block").data("weather");
console.log(cityWeather);
var mainWeather = {
    init: function() {
      return mainWeather.getWeather();
  },

  getWeather: function() {
      $.get(
      'https://api.openweathermap.org/data/2.5/weather?q=' + cityWeather + "," + 'UA' + "&lang=ru&APPID=90218217a5640940a557861baa80b780", 
      function(data) {
        var json = {
          json: JSON.stringify(data),
          delay: 1
        };
        echo(json);
      }
    );
  },
  //Prints result from the weatherapi, receiving as param an object
  createWeatherWidg: function(data) {
    var cityTemp = data.main.temp - 273.15;
    for(key in data.weather) {
      if(data.weather.hasOwnProperty(key)) {
        var value = data.weather[key];
        var cityStatus = value.description;
        var cityIcons = value.icon;
      }
    }
    // var cityStatus = data.weather[description];
    return "<div class='pressure'><span class='font-weight-bold'>Температура:</span> " + cityTemp.toFixed(2) + " C</div><div><span class='font-weight-bold'>В данный момент:</span> " + cityStatus + "</div><div class='weather-block__icon'><img src='https://openweathermap.org/img/w/" + cityIcons + ".png' ></div>"
  }
};

var echo = function(dataPass) {
  $.ajax({
    type: "POST",
    url: 'https://api.openweathermap.org/data/2.5/weather?q=' + cityWeather + "," + 'UA' + "&lang=ru&APPID=90218217a5640940a557861baa80b780",
    data: dataPass,
    cache: false,
    success: function(json) {
      var wrapper = $("#weather");
      wrapper.empty();
      wrapper.append(mainWeather.createWeatherWidg(json));
    }
  });
};

mainWeather.init();
// WEATHER END //

//Add NEW
$('.addnew__nomers_checked').change(function(){
  var addNewNomers = $(this).data('addnewnomers');
  if (this.checked) {
    $('.'+addNewNomers).css({"display":"block"});
    console.log('checked');
  }
  else {
    $('.'+addNewNomers).css({"display":"none"});
  }                   
});

var singleHotelMain = document.querySelector('.single-hotel-main');
var singleHotelSibebar = document.querySelector('.single-hotel-cover-item');
var userHeight = window.innerHeight - 50;
console.log(userHeight);
console.log(singleHotelMain.offsetHeight);

window.addEventListener('scroll', function() {
  if ((singleHotelMain.offsetHeight - userHeight) < pageYOffset) {
    singleHotelSibebar.classList.add('single-hotel-cover-item__bottom');
    console.log('yes');
  } else {
    singleHotelSibebar.classList.remove('single-hotel-cover-item__bottom');
  }
});