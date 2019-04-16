<div class="allcity maincards">
	<div class="container ">
		<div class="row justify-content-center mb-5">
			<div class="col-md-12">
				<h2 class="mb-5">Где отдыхать летом в Украине?</h2>
				<!-- MAINCARDS PC VERSION -->
				<div class="maincards__grid pc-show">
					<?php $maincitylists = get_terms( array( 'taxonomy' => 'citylist', 'parent' => 0, 'hide_empty' => false, 'number' => 5 ) );
					foreach ( $maincitylists as $citylist ): ?>
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
					<div class="allcity">
						<div class="maincards__grid">
							<?php $citylists = get_terms( array( 'taxonomy' => 'citylist', 'parent' => 0, 'hide_empty' => false, 'number' => 6 ) );
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
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="button-more text-center">
					<a href="<?php echo get_permalink( get_page_by_path( 'allcity' ) ); ?>">
					<div class="btn">Все города</div>
				</a>
				</div>
			</div>
		</div>
	</div>
</div>