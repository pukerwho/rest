jQuery(function($){
  $(document).on('click', '.catalog-more', function(event){
    var button = $(this),
        data = {
      'action': 'loadmore__catalog',
      'query': loadmore_params__catalog.posts, // that's how we get params from wp_localize_script() function
      'page' : loadmore_params__catalog.current_page
    };
 
    $.ajax({
      url: loadmore_params__catalog.ajaxurl, // AJAX handler
      data: data,
      type: 'POST',
      beforeSend : function ( xhr ) {
        $('.catalog-more .btn').text('Загружаем...'); // change the button text, you can also add a preloader image
      },
      success : function( data ){
        if( data ) { 
          $('.catalog-more .btn').text( 'Загрузить еще' ).prev().before(data); // insert new posts          
          loadmore_params__catalog.current_page++;
          $('#response .col-md-3:last-child').after(data);

          if ( loadmore_params__catalog.current_page == loadmore_params__catalog.max_page ) 
            button.remove(); // if last page, remove the button
 
          // you can also fire the "post-load" event here if you use a plugin that requires it
          // $( document.body ).trigger( 'post-load' );
        } else {
          button.remove(); // if no data, remove the button as well
        }
      }
    });
  });
});