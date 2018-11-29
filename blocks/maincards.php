<div class="maincards">
	<div class="container ">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<h2 class="mb-5">Где отдыхать летом в Украине?</h2>
				<!-- MAINCARDS PC VERSION -->
				<div class="maincards__grid pc-show">
					<?php 
          $custom_query = new WP_Query( array( 'post_type' => 'maincards' ) );
          if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
					<div class="maincards__item">
						<a href="#">
							<div class="maincards__item__card" style="background: url('<?php echo get_the_post_thumbnail_url(); ?>')">
								<div class="maincards__item__card__title">
									<?php the_title(); ?>
								</div>
							</div>
						</a>
					</div>
					<?php endwhile; endif; ?>
				</div>
				<!-- MAINCARDS MOBILE VERSION -->
				<div class="mobile-show">
					<div class="swiper-container swiper-maincards">
				    <div class="swiper-wrapper">
				    	<?php 
		          $custom_query = new WP_Query( array( 'post_type' => 'maincards' ) );
		          if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
								<div class="swiper-slide">
			          	<div class="maincards__item">
										<a href="#">
											<div class="maincards__item__card" style="background: url('<?php echo get_the_post_thumbnail_url(); ?>')">
												<div class="maincards__item__card__title">
													<?php the_title(); ?>
												</div>
											</div>
										</a>
									</div>
			          </div>
		          <?php endwhile; endif; ?>
				    </div>
				    <div class="swiper-button-next swiper-maincards-button-next"></div>
		      	<div class="swiper-button-prev swiper-maincards-button-prev"></div>
				  </div>	
				</div>
			</div>
		</div>
	</div>
</div>