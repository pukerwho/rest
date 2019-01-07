<div class="hotel-item">
	<div class="hotel-item__img p-relative mb-4">
		<div class="cover-icon">
			<?php if(rwmb_meta( 'meta-hotel-mainrating' ) > 75): ?>
				<img src="<?php bloginfo('template_url'); ?>/img/sun.svg" alt="">
			<? elseif (rwmb_meta( 'meta-hotel-mainrating' ) > 50): ?>
				<img src="<?php bloginfo('template_url'); ?>/img/sun-cloud.svg" alt="">
			<? elseif (rwmb_meta( 'meta-hotel-mainrating' ) > 25): ?>
				<img src="<?php bloginfo('template_url'); ?>/img/cloud.svg" alt="">
			<? elseif (rwmb_meta( 'meta-hotel-mainrating' ) < 25): ?>
				<img src="<?php bloginfo('template_url'); ?>/img/rain.svg" alt="">
			<?php endif ?>
		</div>
		<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
		<div class="hotel-item__img__city">
			<?php $post_id = rwmb_meta( 'meta-hotelcity' ); ?>
			<div class="hotel-item__img__city__link">
				<a href="<?php echo get_permalink($post_id) ?>"><img src="<?php bloginfo('template_url'); ?>/img/pin.svg" alt="" class="hotel-item__icon mr-2"><span><?php echo get_the_title( $post_id ); ?><span></a>	
			</div>
		</div>
	</div>
	<div class="hotel-item__title">
		<a href="<?php the_permalink(); ?>" class="pb-3"><?php the_title(); ?></a>
	</div>
	<div class="hotel-item__rating pt-3">
		Оценка: 
	</div>
</div>