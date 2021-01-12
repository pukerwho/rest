<div class="allcity maincards">
	<div class="container mx-auto px-2 lg:px-0">
		<div class="flex justify-center mb-8">
			<div class="w-full">
				<h2 class="font-bold"><?php _e( 'Популярные курорты', 'restx' ); ?></h2>
				<p class="text-lg mb-8"><?php _e( 'Где отдыхать в Украине?', 'restx' ); ?></p>		

				<!-- MAINCARDS PC VERSION -->
				<div class="citycards flex flex-wrap -mx-2">
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
					foreach ( array_slice($maincitylists, 0, 6) as $citylist ): ?>
						<div class="citycard w-1/2 lg:w-1/5 relative px-2 mb-4">
							<a href="<?php echo get_term_link($citylist); ?>" >
								<div class="citycard_photo">
									<img src="<?php echo carbon_get_term_meta($citylist->term_id, 'crb_citylist_img' ); ?>" alt="<?php echo $citylist->name ?>" loading="lazy" width="300" class="citycard_photo_img">
								</div>
								<div class="citycard_title text-xl text-white">
									<?php echo $citylist->name ?>
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
		<div class="flex mb-8">
			<div class="w-full flex justify-center">
				<a href="<?php echo get_page_url('tpl_allcity') ?>" class="btn-more text-center flex items-center">
					<img src="<?php bloginfo('template_url'); ?>/img/more.svg" width="35" class="mr-4">
					<div class="btn-more-info flex items-center">
						<img src="https://vidpochivai.com.ua/wp-content/uploads/2019/08/dragobrat-150x150.jpg" width="50" class="rounded-full">
						<span><?php _e( 'Посмотреть все города', 'restx' ); ?></span>	
					</div>
				</a>
			</div>
		</div>
	</div>
</div>