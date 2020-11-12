<div class="allcity maincards">
	<div class="container-fluid cf_px">
		<div class="row justify-content-center mb-5">
			<div class="col-md-12">
				<h2><?php _e( 'Популярные курорты', 'restx' ); ?></h2>
				<p class="mb-5"><?php _e( 'Где отдыхать в Украине?', 'restx' ); ?></p>		
				<!-- MAINCARDS PC VERSION -->
				<div class="maincards__grid pc-show">
					<?php $maincitylists = get_terms( array( 
						'taxonomy' => 'citylist', 
						'parent' => 0, 
						'hide_empty' => false,
						'meta_query' => array(
							'relation' => 'AND',
				      array(
								'key'       => '_crb_citylist_iscurort',
								'value'     => 'yes',
								'compare'   => '='
				      ),
				      array(
								'key'       => '_crb_citylist_showmain',
								'value'     => 'yes',
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
						      array(
										'key'       => '_crb_citylist_iscurort',
										'value'     => 'yes',
										'compare'   => '='
						      ),
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
		<div class="row mb-5">
			<div class="col-md-12 d-flex justify-content-center">
				<a href="<?php echo get_page_url('tpl_allcity') ?>" class="btn-more text-center d-flex align-items-center">
					<img src="<?php bloginfo('template_url'); ?>/img/more.svg" width="35px" class="mr-4">
					<div class="btn-more-info d-flex align-items-center">
						<img src="https://vidpochivai.com.ua/wp-content/uploads/2019/08/dragobrat-150x150.jpg" height="50px" class="rounded-circle">
						<span><?php _e( 'Посмотреть все города', 'restx' ); ?></span>	
					</div>
				</a>
			</div>
		</div>
	</div>
</div>