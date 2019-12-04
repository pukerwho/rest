const scriptURL = 'https://script.google.com/macros/s/AKfycbzcFaNN-7qsLF4QEdVGzgcJiqGRpjBZMXbKPlWFlpaKfKY2iNl3/exec'
const form = document.forms['submit-to-google-sheet']

if (form) {
	form.addEventListener('submit', e => {
	  e.preventDefault()
	  fetch(scriptURL, { method: 'POST', mode: 'cors', body: new FormData(form)})
	    .then(response => showSuccessMessage())
	    .catch(error => console.error('Error!', error.message))
	})	
}

function showSuccessMessage(){
  $('.rest_modal').addClass('open');
  $('.rest_modal_bg').addClass('open');  
}

// var $form = $('form#add_hotels'),
//     url = 'https://script.google.com/macros/s/AKfycbzcFaNN-7qsLF4QEdVGzgcJiqGRpjBZMXbKPlWFlpaKfKY2iNl3/exec'


// $(document).on('submit','#add_hotels',function(e){
//   e.preventDefault();
//   var jqxhr = $.ajax({
//     url: url,
//     method: "GET",
//     dataType: "json",
//     data: $form.serializeObject()
//   }).success(
//     console.log('yes')
//   );
// })

// $(document).on('submit','#add_hotels',function(){
//   var filter = $(this);
//   console.log(filter.serialize());
//   console.log(ajaxurl);
//   $.ajax({
//     url:filter.attr('action'), // обработчик
//     data:filter.serialize(), // данные
//     type:filter.attr('method'), // тип запроса
//     beforeSend:function(xhr){
//       console.log('Отправляю')
//     },
//     success:function(data){
//       console.log('Отправлено');
//       console.log(data);
//       $('.rest_modal').addClass('open');
//       $('.rest_modal_bg').addClass('open');
//     }
//   });
//   return false;
// });