//City sort filter 
$(document).on('change', '.select', function(){
  var selected = $('.select').val();
  var city_id = $('.city_filter_id').val();
  if (selected === 'price') {
    $('.city_filter_minmax_price').css({'display':'block'});
  } else {
    $('.city_filter_minmax_price').css({'display':'none'});
  }
  var button = $(this),
  data = {
    'action': 'city_sort_filter',
    'selected': selected,
    'city_id': city_id
  };

  $.ajax({
    url: filter_params.ajaxurl, // AJAX handler
    data: data,
    type: 'POST',
    beforeSend : function ( xhr ) {
      console.log('Загружаю');
    },
    success : function( data ){
      if( data ) { 
        $('#response').html(data);
        hotelItemSwiper();
      } else {
        $('#response').html('Совпадений не найдено');
      }
    }
  });
});

//city price sort 
$('.city_filter_minmax_price').on('click', function(){
  $(this).toggleClass('active');
  var selected = $('.select').val();
  var price_sort = $(this).data('order');
  var city_id = $('.city_filter_id').val();
  data = {
    'action': 'city_price_filter',
    'selected': selected,
    'price_sort': price_sort,
    'city_id': city_id,
  };

  $.ajax({
    url: filter_params.ajaxurl, // AJAX handler
    data: data,
    type: 'POST',
    beforeSend : function ( xhr ) {
      console.log('Загружаю');
    },
    success : function( data ){
      if( data ) { 
        $('.city_filter_minmax_price').data('order', price_sort === 'DESC' ? 'ASC' : 'DESC');
        $('#response').html(data);
        hotelItemSwiper();
      } else {
        $('.city_filter_minmax_price').data('order', price_sort === 'DESC' ? 'ASC' : 'DESC');
        $('#response').html('Совпадений не найдено');
      }
    }
  });
})