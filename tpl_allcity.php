<?php
/*
Template Name: Все города
*/
?>

<?php get_header(); ?>

<div class="allcity maincards">
	<div class="container ">
		<div class="row mb-5">
			<div class="col-md-12">
				<div class="d-flex flex-column align-items-center">
					<img src="<?php bloginfo('template_url') ?>/img/allcity.svg" width="80px" class="mb-5" alt="">
					<h1 class="text-uppercase text-center"><?php _e( 'Отдых в Украине', 'restx' ); ?>.<br><?php _e( 'Куда поехать?', 'restx' ); ?></h1>
				</div>
			</div>
		</div>
		<div class="row mb-5">
			<div class="col-md-12">
				<div class="d-flex align-items-center">
					<img src="<?php bloginfo('template_url') ?>/img/blacksea.svg" alt="" width="40px" class="mr-3">
					<h2 class="mb-0"><?php _e( 'На Черное море', 'restx' ); ?></h2>	
				</div>
			</div>
		</div>
		<div class="row mb-5">
			<div class="col-md-12">
				<!-- MAINCARDS PC VERSION -->
				<div class="allcity">
					<div class="maincards__grid pc-show">
						<?php $citylists = get_terms( array( 
							'taxonomy' => 'citylist', 
							'parent' => 0, 
							'hide_empty' => false,
							'meta_key' => '_crb_citylist_location',
						  'meta_value' => 'blacksea'
						) );
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
				<!-- MAINCARDS MOBILE VERSION -->
				<div class="mobile-show">
					<div class="allcity">
						<div class="maincards__grid">
							<?php $citylists = get_terms( array( 
								'taxonomy' => 'citylist', 
								'parent' => 0, 
								'hide_empty' => false,
								'meta_key' => '_crb_citylist_location',
							  'meta_value' => 'blacksea'
							) );
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
		<div class="row mb-5">
			<div class="col-md-12">
				<div class="d-flex align-items-center">
					<img src="<?php bloginfo('template_url') ?>/img/azovsea.svg" alt="" width="40px" class="mr-3">
					<h2 class="mb-0"><?php _e( 'На Азовское море', 'restx' ); ?></h2>	
				</div>
			</div>
		</div>
		<div class="row mb-5">
			<div class="col-md-12">
				<!-- MAINCARDS PC VERSION -->
				<div class="allcity">
					<div class="maincards__grid pc-show">
						<?php $citylists = get_terms( array( 
							'taxonomy' => 'citylist', 
							'parent' => 0, 
							'hide_empty' => false,
							'meta_key' => '_crb_citylist_location',
						  'meta_value' => 'azovsea'
						) );
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
				<!-- MAINCARDS MOBILE VERSION -->
				<div class="mobile-show">
					<div class="allcity">
						<div class="maincards__grid">
							<?php $citylists = get_terms( array( 
								'taxonomy' => 'citylist', 
								'parent' => 0, 
								'hide_empty' => false,
								'meta_key' => '_crb_citylist_location',
							  'meta_value' => 'azovsea'
							) );
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
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="d-flex align-items-center mb-5">
					<img src="<?php bloginfo('template_url') ?>/img/mountains.svg" alt="" width="40px" class="mr-3">
					<h2 class="mb-0"><?php _e( 'В Карпаты', 'restx' ); ?></h2>	
				</div>
			</div>
		</div>
		<div class="row mb-5">
			<div class="col-md-12">
				<!-- MAINCARDS PC VERSION -->
				<div class="allcity">
					<div class="maincards__grid pc-show">
						<?php $citylists = get_terms( array( 
							'taxonomy' => 'citylist', 
							'parent' => 0, 
							'hide_empty' => false,
							'meta_key' => '_crb_citylist_location',
						  'meta_value' => 'karpaty'
						) );
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
				<!-- MAINCARDS MOBILE VERSION -->
				<div class="mobile-show">
					<div class="allcity">
						<div class="maincards__grid">
							<?php $citylists = get_terms( array( 
								'taxonomy' => 'citylist', 
								'parent' => 0, 
								'hide_empty' => false,
								'meta_key' => '_crb_citylist_location',
							  'meta_value' => 'karpaty'
							) );
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
	</div>
</div>

<?php get_footer(); ?>