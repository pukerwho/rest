jQuery(function($){
	var goCatRating = 0;
  var goPostRating = 0;
  //Post Rating click
  $(document).on('change', '.rating__bar input', function(){
    if (goPostRating === 0){

      var postId = $('.post_id').val();
      var postRatingCount = $('.post_rating_count').val();
      var postRatingOld = $('.post_rating_old').val();
      var postRatingNew = $(this).val();

      console.log('postRatingNew',postRatingNew);
      var button = $(this),
        data = {
          'action': 'rating_post_back',
          'postId': postId,
          'postRatingNew': postRatingNew,
          'postRatingOld': postRatingOld,
          'postRatingCount': postRatingCount,
        };

      $.ajax({
        url: rating_params.ajaxurl, // AJAX handler
        data: data,
        type: 'POST',
        beforeSend : function ( xhr ) {
          console.log('отправляю');
        },
        success : function( data ){
          goPostRating = 1;
          $('.success_rating').addClass('show');
          setTimeout(function(){
          	$('.success_rating').removeClass('show');
          }, 2000)
        }
      });
    }
  });
});