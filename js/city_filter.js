//City sort filter 
$(document).on('change', '.select', function(){
  var selected = $('.select').val();
  var city_id = $('.city_filter_id').val()
  console.log(selected)
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
})