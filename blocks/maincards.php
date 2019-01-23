<div class="maincards">
	<div class="container ">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<h2 class="mb-5">Где отдыхать летом в Украине?</h2>
				<!-- MAINCARDS PC VERSION -->
				<div class="maincards__grid pc-show">
					<?php $citylists = get_terms( array( 'taxonomy' => 'citylist', 'parent' => 0 ) );
					foreach ( $citylists as $citylist ): ?>
					<div class="maincards__item">
						<a href="<?php echo get_term_link($citylist); ?>">
							<div class="maincards__item__card" style="background: url('<?php echo carbon_get_term_meta($citylist->term_id, 'crb_citylist_img' ); ?>')">
								<div class="maincards__item__card__title">
									<?php echo $citylist->name ?>
								</div>
							</div>
						</a>
					</div>
					<?php endforeach; ?>
				</div>
				<!-- MAINCARDS MOBILE VERSION -->
				<div class="mobile-show">
					<div class="swiper-container swiper-maincards">
				    <div class="swiper-wrapper">
				    	<?php $citylists = get_terms( array( 'taxonomy' => 'citylist', 'parent' => 0 ) );
				    	foreach ( $citylists as $citylist ): ?>
								<div class="swiper-slide">
			          	<div class="maincards__item">
										<a href="<?php echo get_term_link($citylist); ?>">
											<div class="maincards__item__card" style="background: url('<?php echo carbon_get_term_meta($citylist->term_id, 'crb_citylist_img' ); ?>')">
												<div class="maincards__item__card__title">
													<?php echo $citylist->name ?>
												</div>
											</div>
										</a>
									</div>
			          </div>
		          <?php endforeach; ?>
				    </div>
				    <div class="swiper-button-next swiper-maincards-button-next"></div>
		      	<div class="swiper-button-prev swiper-maincards-button-prev"></div>
				  </div>	
				</div>
			</div>
		</div>
	</div>
</div>