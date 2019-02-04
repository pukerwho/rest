<a href="<?php the_permalink() ?>">
	<div class="hotel-item-light">
		<div class="hotel-item-light__img">
			<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
			<div class="hotel-item-light__citylist">
				<?php
					$myterms = wp_get_post_terms(  get_the_ID() , 'citylist', array( 'parent' => 0 ) );
					foreach ($myterms as $myterm): ?>
						<div class="hotel-item-light__citylist__bg">
							<img src="<?php bloginfo('template_url'); ?>/img/pin.svg" alt="" class="hotel-item__icon mr-2"><span><?php echo $myterm->name; ?><span>	
						</div>
					<?php endforeach; ?>	
			</div>
		</div>
		<div class="hotel-item-light__title">
			<?php the_title(); ?>
		</div>
	</div>
</a>