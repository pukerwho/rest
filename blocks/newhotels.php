<div class="newhotels">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="mb-5">
					<h2>Недавно добавленные на сайт</h2>
					<p>Поприветствуем новичков!</p>	
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
						<a href="<?php the_permalink(); ?>">
							<div class="hotel-item">
								<div class="hotel-item__img mb-4">
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
									<?php the_title(); ?>
								</div>
							</div>
						</a>
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
			          	<a href="<?php the_permalink(); ?>">
										<div class="hotel-item">
											<div class="hotel-item__img mb-4">
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
												<?php the_title(); ?>
											</div>
										</div>
									</a>
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