<div class="swiper-container hotel-item-swiper">
	<div class="swiper-wrapper">
		<?php 
			$images = rwmb_meta( 'meta-hotel-photos', array( 'size' => 'medium' ) );
			$title_img_territory = get_the_title();
			foreach ( $images as $image ) {
			    echo '<div class="swiper-slide"><img src="', $image['url'], '" loading="lazy" alt="', $title_img_territory, '" decoding="async"></div>';
			} 
		?>
	</div>
	<div class="hotel-item__img-navigation">
		<div class="hotel-item__img-leftbg"></div>
		<div class="hotel-item__img-rightbg"></div>	
	</div>
  <div class="swiper-click swiper-hotelcard-button-prev swiper-prev-<?php echo the_ID(); ?>" data-swiper="<?php echo the_ID(); ?>">
  	<svg viewBox="0 0 18 18" role="img" aria-label="Предыдущее фото" focusable="false" style="height: 24px; width: 24px; display: block; fill: rgb(255, 255, 255);"><path d="m13.7 16.29a1 1 0 1 1 -1.42 1.41l-8-8a1 1 0 0 1 0-1.41l8-8a1 1 0 1 1 1.42 1.41l-7.29 7.29z" fill-rule="evenodd"></path></svg>
  </div>
  <div class="swiper-hotelcard-button-next swiper-next-<?php echo the_ID(); ?>" data-swiper="<?php echo the_ID(); ?>">
		<svg viewBox="0 0 18 18" role="img" aria-label="Следующее фото" focusable="false" style="height: 24px; width: 24px; display: block; fill: rgb(255, 255, 255);"><path d="m4.29 1.71a1 1 0 1 1 1.42-1.41l8 8a1 1 0 0 1 0 1.41l-8 8a1 1 0 1 1 -1.42-1.41l7.29-7.29z" fill-rule="evenodd"></path></svg>
	</div>
</div>