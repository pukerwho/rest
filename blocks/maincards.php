<div class="allcity maincards">
	<div class="container-fluid cf_px">
		<div class="row justify-content-center mb-5">
			<div class="col-md-12">
				<h2><?php _e( 'Куда поехать летом на море', 'restx' ); ?></h2>
				<p class="mb-5"><?php _e( 'Где отдыхать в Украине?', 'restx' ); ?></p>		
				<!-- MAINCARDS PC VERSION -->
				<div class="maincards__grid pc-show">
					<?php $maincitylists = get_terms( array( 
						'taxonomy' => 'citylist', 
						'parent' => 0, 
						'hide_empty' => false,
						'meta_query' => array(
							'relation' => 'OR',
				      array(
								'key'       => '_crb_citylist_location',
								'value'     => 'azovsea',
								'compare'   => '='
				      ),
				      array(
								'key'       => '_crb_citylist_location',
								'value'     => 'blacksea',
								'compare'   => '='
				      )
				    )
					));
					shuffle( $maincitylists );
					foreach ( array_slice($maincitylists, 0, 5) as $citylist ): ?>
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
							<?php $maincitylists = get_terms( array( 
								'taxonomy' => 'citylist', 
								'parent' => 0, 
								'hide_empty' => false,
								'meta_query' => array(
									'relation' => 'OR',
						      array(
										'key'       => '_crb_citylist_location',
										'value'     => 'azovsea',
										'compare'   => '='
						      ),
						      array(
										'key'       => '_crb_citylist_location',
										'value'     => 'blacksea',
										'compare'   => '='
						      )
						    )
							));
							shuffle( $maincitylists );
							foreach ( array_slice($maincitylists, 0, 6) as $citylist ): ?>
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
					<a href="<?php echo get_page_url('tpl_allcity') ?>">
					<div class="btn"><?php _e( 'Все города', 'restx' ); ?></div>
				</a>
				</div>
			</div>
		</div>
	</div>
</div>