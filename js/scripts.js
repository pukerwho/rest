//Mobile Menu
$('.header__mobile__menu').on('click', function(){
	$('.header__mobile__cover').addClass('header__mobile__cover__active');
});

$('.header__mobile__close').on('click', function(){
	$('.header__mobile__cover').removeClass('header__mobile__cover__active');
});

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

// $('.selectBox').on('click', function(event){
  
//   checkboxes.toggleClass('d-block');
//   event.stopPropagation();
// });

$('#filter').submit(function(){
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