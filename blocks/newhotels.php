<div class="newhotels">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="mb-5">
					<div class="my-table">
						<div class="my-table-cell pr-4">
							<img src="<?php bloginfo('template_url'); ?>/img/newhotels.svg" alt="" width="40px">
						</div>
						<div class="table-text">
							<h2>Недавно добавленные на сайт</h2>
							<p>Поприветствуем новичков!</p>		
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- PC VERSION -->
		<div class="pc-show">
			<div class="row">
				<?php 
			  $custom_query = new WP_Query( array( 'post_type' => 'hotels', 'posts_per_page' => 4 ) );
			  if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
					<div class="col-md-3">
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
					</div>
				<?php endwhile; endif; ?>
			</div>
		</div>
		<!-- MOBILE VERSION -->
		<div class="mobile-show">
			<div class="row">
				<div class="col-md-12">
					<div class="swiper-container swiper-hotels">
				    <div class="swiper-wrapper">
				    	<?php 
						  $custom_query = new WP_Query( array( 'post_type' => 'hotels', 'posts_per_page' => 4 ) );
						  if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
								<div class="swiper-slide">
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
												<?php 
													$terms = get_the_terms( $post->ID , 'tx_cities' );
													foreach ( $terms as $term ): ?>
														<?php $term_link = get_term_link($term); ?>
														<div class="hotel-item__img__city__link">
															<a href="<?php echo $term_link; ?>"><img src="<?php bloginfo('template_url'); ?>/img/pin.svg" alt="" class="hotel-item__icon mr-2"><span><?php echo $term->name; ?><span></a>	
														</div>
												<?php endforeach; ?>
											</div>
										</div>
										<div class="hotel-item__title">
											<a href="<?php the_permalink(); ?>" class="pb-3"><?php the_title(); ?></a>
										</div>
										<div class="hotel-item__rating pt-3">
											Рейтинг: <?php echo rwmb_meta( 'meta-hotel-mainrating' ); ?> из 100
										</div>
									</div>
			          </div>
		          <?php endwhile; endif; ?>
				    </div>
				    <div class="swiper-button-next swiper-hotels-button-next"></div>
		      	<div class="swiper-button-prev swiper-hotels-button-prev"></div>
				  </div>
			  </div>
			</div>
		</div>
	</div>
</div>