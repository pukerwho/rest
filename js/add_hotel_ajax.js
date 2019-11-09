$(document).on('submit','#add_hotels',function(){
  var filter = $(this);
  console.log(filter.serialize());
  console.log(ajaxurl);
  $.ajax({
    url:filter.attr('action'), // обработчик
    data:filter.serialize(), // данные
    type:filter.attr('method'), // тип запроса
    beforeSend:function(xhr){
      console.log('Отправляю')
    },
    success:function(data){
      console.log('Отправлено');
      console.log(data);
    }
  });
  return false;
});