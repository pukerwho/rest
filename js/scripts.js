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


$(window).scroll(function(){
  var h_scroll = $(this).scrollTop();
  if (h_scroll > 100) {
    $('.header_bottom').addClass('header_bottom_fixed')
  } else {
    $('.header_bottom').removeClass('header_bottom_fixed')
  }
})

function getMaxArray(forMaxArray) {
  return Math.max.apply(null, forMaxArray);
}

$('.allcity-button').on('click', function(){
  $('.header__allcity').toggleClass('header__allcity-open');
  $('.allcity-button-open').toggleClass('allcity-button-open-active');
  $('.allcity-button-close').toggleClass('allcity-button-close-active');
  $('.modal-bg').toggleClass('open');
  $('body').toggleClass('modal-open');
});

console.log('aga');


$('.header__mobile_toggle').on('click', function(){
  $(this).toggleClass('open');
  $('.mobile-menu').toggleClass('show');
})

$('.lang').on('click', function(){
  if ($('.lang a').hasClass('active')){
    $('.lang a').removeClass('active');  
  } else {
    $('.lang a').addClass('active');
  }
});

//
function scrollToAnchor(sectionId) {
  console.log(sectionId);
  var targetScroll =  $(sectionId).offset().top;
  $('html, body').animate({
      scrollTop: (targetScroll - 100 /* минус сто - это нужный вам отступ, чтобы сделать прокрутку немного выше якоря */ )
  }, 500);
}

$('.citylist_nav a[href*="#"]').on('click', function(){
  sectionId = $(this).attr('href');
  scrollToAnchor(sectionId);
});

document.addEventListener('DOMContentLoaded', function(event) {
  if (location.href.indexOf("#wait_approval") != -1) {
    var wait_approval_scroll =  $('#wait_approval').offset().top;
    console.log(wait_approval_scroll);
    $('html, body').animate({
        scrollTop: (wait_approval_scroll - 100 /* минус сто - это нужный вам отступ, чтобы сделать прокрутку немного выше якоря */ )
    }, 500);
  }
});

//MODAL BOTTOM MENU
let bottomMenuItems = document.querySelectorAll('.bottom_menu_js');
let modalMenus = document.querySelectorAll('.modal_menu');
let modalBg = document.querySelector('.modal-bg');
let modalCloses = document.querySelectorAll('.modal_close_js');

for (bottomMenuItem of bottomMenuItems) {
  if (bottomMenuItem) {
    bottomMenuItem.addEventListener('click', function(e){
      e.preventDefault;
      dataThisItem = this.dataset.bottomBtn;
      findDivWithData = document.querySelector('.modal_menu[data-bottom-btn='+ dataThisItem +']');
      findDivWithData.classList.add('open');
      modalBg.classList.add('open');
    })
  }
}

for (modalClose of modalCloses) {
  if (modalClose) {
    modalClose.addEventListener('click', function(e){
      e.preventDefault;
      for (modalMenu of modalMenus) {
        modalMenu.classList.remove('open');
        modalBg.classList.remove('open');    
      }
    })
  }
}


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
};

//BUS FORM Кнопка добавить рейс
let busFormAddWay = document.querySelector('.bus_form_add_way span');
let busFormWayNumber = 1;
function createInputWay(input,name,type,value, placeholder) {
  input.setAttribute('name', name);
  input.setAttribute('type', type);
  input.setAttribute('value', '');
  input.setAttribute('placeholder', placeholder);
  return input;
}
if (busFormAddWay) {
  busFormAddWay.addEventListener('click', function(){
    busFormLabel = document.createElement('div');
    busFormLabel.innerHTML = 'Рейс ' + busFormWayNumber;

    busFormFromCityInput = document.createElement('input');
    busFormInCityInput = document.createElement('input');
    busFormDateFromInput = document.createElement('input');
    busFormDateInInput = document.createElement('input');
    busFormPhonesInput = document.createElement('input');

    createInputWay(busFormFromCityInput, 'Город отправления' + busFormWayNumber, 'text', '', 'Город отправления');
    createInputWay(busFormInCityInput, 'Город прибытия' + busFormWayNumber, 'text', '', 'Город прибытия');
    createInputWay(busFormDateFromInput, 'Время отправления' + busFormWayNumber, 'text', '', 'Время отправления');
    createInputWay(busFormDateInInput, 'Время прибытия' + busFormWayNumber, 'text', '', 'Время прибытия');
    createInputWay(busFormPhonesInput, 'Телефоны для бронирования' + busFormWayNumber, 'text', '', 'Телефоны для бронирования');

    $(this).before(busFormLabel);
    $(this).before(busFormFromCityInput);
    $(this).before(busFormInCityInput);
    $(this).before(busFormDateFromInput);
    $(this).before(busFormDateInInput);
    $(this).before(busFormPhonesInput);

    busFormWayNumber = busFormWayNumber + 1;
  });
  
}

//Успешно отправлена форма BUS_FORM
let busFormSuccess = document.querySelector('.bus_form_success');
const busFormURL = 'https://script.google.com/macros/s/AKfycbzvdyugnq2EPDDxPbs-YZbo5FrmeQnPSbTriZovigMY4R_VHHBG/exec'
const bus_form = document.forms['bus-form']
if (bus_form) {
  bus_form.addEventListener('submit', e => {
    e.preventDefault()
    let this_form = bus_form
    let data = new FormData(bus_form)
    fetch(busFormURL, { method: 'POST', mode: 'cors', body: data})
      .then(response => showSuccessMessage(data, this_form))
      .catch(error => console.error('Error!', error.message))
  })  
}

function showSuccessMessage(data, this_form){
  this_form.reset();
  busFormSuccess.classList.add('bus_form_success_show', 'mb-5');
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
    $('.modal-bg').toggleClass('open');
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

// Определяем высоту для блока Info (Места на главной странице)
let allHomePlacesInfo = document.querySelectorAll('.home_places_item_info');
let homePlacesInfoArray = [];
for (HomePlacesInfo of allHomePlacesInfo) {
  if (HomePlacesInfo) {
    homePlacesInfoArray.push(HomePlacesInfo.offsetHeight);
  }
}

if (homePlacesInfoArray.length > 1) {
  let maxHomePlacesInfoHeight = getMaxArray(homePlacesInfoArray);  
  for (HomePlacesInfo of allHomePlacesInfo) {
    if (HomePlacesInfo) {
      HomePlacesInfo.style.height = maxHomePlacesInfoHeight + 'px';
    }
  }
}


if ( $('.single-hotel-territory').length > 0 ) {
  var singleHotelTerritoryLength = singleHotelTerritory.slides.length;
  $('.single-hotel-territory-count-length').append(singleHotelTerritoryLength);

  var singleHotelTerritoryCurrent = singleHotelTerritory.realIndex;
  singleHotelTerritoryCurrent = singleHotelTerritoryCurrent + 1;
  $('.single-hotel-territory-count-current').append(singleHotelTerritoryCurrent);
}

singleHotelTerritory.on('slideChange', function () {
  var singleHotelTerritoryCurrent = singleHotelTerritory.realIndex;
  singleHotelTerritoryCurrent = singleHotelTerritoryCurrent + 1;
  $('.single-hotel-territory-count-current').html(singleHotelTerritoryCurrent);
});


// Модальное окно
function openModal(attrModal) {
  $('.modal[data-modal-id='+attrModal+']').addClass('open');
  $('.modal-bg').addClass('open');
}

function closeModal(attrModal) {
  $('.modal').removeClass('open');
  $('.modal-bg').removeClass('open');
}

$('.js-openmodal-click').on('click', function(e){
  var clickModalData = $(this).data('modal-id');
  openModal(clickModalData);
});

$('.modal_content_close').on('click', function(){
  closeModal();
});

document.addEventListener('click', function(e){
  console.log(e.target.classList.value);
    if(e.target.classList.value === 'modal open') {
      closeModal();
    }
  });

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
    $('.modal-bg').addClass('open');
  });

  $(document).on('click', '.send-message-modal__close', function(){
    $('.send-message-modal').removeClass('send-message-modal__open');
    $('body').removeClass('modal-open');
    $('.modal-bg').removeClass('open');
  });  
}

// WEATHER START //
var cityWeather = $(".weather-block").data("weather");
console.log(cityWeather);
if (cityWeather) {
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
}

let contactSuccess = document.querySelector('.success_contact');
const contactScriptURL = 'https://script.google.com/macros/s/AKfycbzH8qiokEfHbJe07eaURr63TWtugVvaox3Xs7PfNjXxoERd4ls/exec'
const contact_page_form = document.forms['contacts']
if (contact_page_form) {
  contact_page_form.addEventListener('submit', e => {
    e.preventDefault()
    let this_form = contact_page_form
    let data = new FormData(contact_page_form)
    fetch(contactScriptURL, { method: 'POST', mode: 'cors', body: data})
      .then(response => showSuccessMessage(data, this_form))
      .catch(error => console.error('Error!', error.message))
  })  
}

function showSuccessMessage(data, this_form){
  this_form.reset();
  contactSuccess.classList.add('show');
  setTimeout(function(){
    $('.success_contact').removeClass('show');
  }, 2500)
}

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

//Form 
$(".wpcf7-form-control-wrap.nomers input[name = 'nomers[]']").change(function(){
  if($(this).is(':checked')) {
    console.log(this);
  }
});

$('.rest_modal_close').on('click', function(){
  $('.rest_modal').removeClass('open');
  $('.rest_modal_bg').removeClass('open');
})


//Image display
function readURL(input) {
  $(input).nextAll().remove();
  console.log(input);
  var inputFiles = input.files;
  if (inputFiles) {
    for (inputFile of inputFiles) {
      var reader = new FileReader();
      reader.onload = function(e) {
        fileImg = document.createElement('img');
        fileInput = document.createElement('input');
        fileInput.setAttribute('name', 'hotels_cover');
        fileInput.setAttribute('value', e.target.result);
        fileInput.setAttribute('crossorigin', 'anonymous');
        fileInput.setAttribute('type', 'hidden');
        fileImg.className = 'add_hotel_thumb';
        $(fileImg).attr('src', e.target.result);
        $(input).after(fileImg);
        $(input).after(fileInput);
        // $('.add_hotel_file_in.'+dataInput).attr('src', e.target.result);
      }
      reader.readAsDataURL(inputFile);
    }
  }
}

$(".add_hotel_file").change(function() {
  readURL(this);
});

//BLOG SUBJECTS 
let blogSubjects = document.querySelector('.single-blogs_subjects');
let blogH2 = document.querySelectorAll('.single-blogs__text h2');
let blogSubjectsBlock = document.querySelector('.single-blogs_subjects_inner');
let blogH2Array = [];

if (blogH2.length > 0) {
  blogSubjects.style.display = 'block';
}

if (blogH2) {
  for (const[index, bH2] of blogH2.entries()) {
    bH2.id = "s"+index;
    let tempH2 = bH2.innerText;
    blogH2Array.push(tempH2);
  }
}

for (const[index, bH2Ar] of blogH2Array.entries()) {
  let tempH2Li = document.createElement('li');
  let tempH2A = document.createElement('a');
  tempH2A.innerHTML = bH2Ar;
  tempH2A.href = "#s"+index;
  tempH2Li.append(tempH2A);
  blogSubjectsBlock.append(tempH2Li);
}

let anchors = document.querySelectorAll('.single-blogs_subjects_inner a[href*="#"]');

for (anchor of anchors) {
  if (anchor) {
    anchor.addEventListener('click', function(e){
      e.preventDefault();
      anchorId = this.getAttribute('href');
      document.querySelector(anchorId).scrollIntoView({
        behavior: 'smooth', block: 'start'
      })
    })
  }
}

var allCityItems = document.querySelectorAll('.allcity_item');
var allCityArray = [];
var charArray = [];

function createChar(item, char) {
  var newChar = document.createElement('div');
  newChar.className = 'text-3xl mt-4 mb-1';
  newChar.innerHTML = char;
  item.before(newChar);
}

for (allCityItem of allCityItems) {
  if (allCityItem) {
    var cityName = allCityItem.textContent;
    cityChar = cityName.replace(/\s/g, "").charAt(0);
    if (charArray.includes(cityChar)) {
      console.log('уже есть');
    } else {
      charArray.push(cityChar);
      createChar(allCityItem, cityChar)
    }
  }
}

