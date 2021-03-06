<?php get_header(); ?>

<!-- Рейтинг отеля -->
<?php $countNumber = tutCount(get_the_ID()); ?>
<?php 
	$current_rating = rwmb_meta('meta-hotel-mainrating');
	if (rwmb_meta('meta-hotel-rating-count')) {
		$count_rating = rwmb_meta('meta-hotel-rating-count');	
	} else {
		$count_rating = 1;
	}
	
	if ($count_rating) {
		$count_rating = $count_rating;
	} else {
		$count_rating = 1;
	}
	$new_rating = $current_rating/$count_rating;
	$width_rating = ($new_rating/5) * 100;

?>

<!-- Текущая категория  -->
<?php 
	$current_term = wp_get_post_terms(  get_the_ID() , 'citylist', array( 'parent' => 0 ) );
	foreach ($current_term as $myterm); {
		$current_term_slug = $myterm->slug;
		$current_term_name = $myterm->name;
	} 
?>
<?php $getCurrentTermId = pll_get_term($myterm->term_id); ?>

<input type="hidden" value="<?php echo $current_rating; ?>" class="post_rating_old">
<input type="hidden" value="<?php echo get_the_ID(); ?>" class="post_id">
<input type="hidden" value="<?php echo $count_rating; ?>" class="post_rating_count">

<div class="container mx-auto px-2 lg:px-0 pt-20 lg:pt-12 lg:pb-4">
	<div class="flex flex-wrap flex-col-reverse lg:flex-row">
		<!-- Сайдбар -->
		<div class="w-full lg:w-3/12 mb-6 lg:mb-0 pr-0 lg:pr-8">
			<div class="sticky" style="top: 90px;">
				<div>
					<div class="mb-3" style="border-bottom: 1px solid #f0f0f0; padding-bottom: 12px;">
						<a href="/hotels" class="blue-links"><?php _e('Жилье в Украине', 'restx'); ?></a>
					</div>
					<?php 
						$taxonomyName = 'citylist'; 

						$find_all_hotels_term = get_terms(
							'citylist', array(
								'parent' => $getCurrentTermId, 
								'hide_empty' => false,
								'meta_query' => array(
						      array(
										'key'       => '_crb_citylist_all_category',
										'value'     => 'yes',
										'compare'   => '='
						      )
						    ),
							)
						);
						if ($find_all_hotels_term[0]->term_id) {
							$term_hotels_all_id = $find_all_hotels_term[0]->term_id;
						} else {
							$term_hotels_all_id = '1';
						}
					?>
					<div class="mb-3">
						<a href="
							<?php 
								if($term_hotels_all_id != 1) { 
									echo get_term_link( $term_hotels_all_id, $taxonomyName );
								} 
							?>" class="blue-links">
							<?php echo $current_term_name ?>: 
							<?php _e('все жилье в городе', 'restx'); ?>
						</a>
					</div>
					<ul class="ml-6">
						<?php 
						$t_terms = get_terms($taxonomyName, array('parent' => $getCurrentTermId, 'hide_empty' => false, 'exclude' => $term_hotels_all_id ));
						foreach ($t_terms as $t_term): ?>
							<?php if($t_term): ?>
							<li class="mb-2">
								<a href="<?php echo get_term_link( $t_term->term_id, $taxonomyName ); ?>" class="blue-links"><?php echo carbon_get_term_meta($t_term->term_id, 'crb_citylist_menu_name'); ?></a>
							</li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>

		<!-- Основной контент -->
		<div class="w-full lg:w-9/12 pl-0 lg:pl-8">
			<!-- Хлебные крошки (pc) -->
			<div class="block mb-4">
				<div class="breadcrumbs" itemprop="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
		      <ul>
						<li itemprop='itemListElement' itemscope itemtype='https://schema.org/ListItem'>
							<a itemprop="item" href="<?php echo home_url(); ?>">
								<span itemprop="name"><?php _e( 'Главная', 'restx' ); ?></span>
							</a>                        
							<meta itemprop="position" content="1">
						</li>
						<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
			        <a itemprop="item" href="<?php echo get_page_url('tpl_allcity') ?>">
			          <span itemprop="name"><?php _e( 'Курорты', 'restx' ); ?></span>
			        </a>                        
			        <meta itemprop="position" content="2">
			      </li>
						<li itemprop='itemListElement' itemscope itemtype='https://schema.org/ListItem'>
							<a itemprop="item" href="<?php echo get_term_link($getCurrentTermId, 'citylist') ?>">
								<span itemprop="name"><?php echo $current_term_name ?></span>
							</a>                        
							<meta itemprop="position" content="3">
						</li>
						<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
			        <span itemprop="name"><?php the_title(); ?></span>
			        <meta itemprop="position" content="4" />
			      </li>
		      </ul>
		    </div>
			</div>	
			<!-- end Хлебные крошки (pc) -->

			<div class="flex flex-wrap flex-col-reverse lg:flex-row mb-2 lg:mb-10">
				<!-- Контент Отеля -->
				<div class="w-full lg:w-8/12 pr-0 lg:pr-8">
					<div>
						<!-- Фотографии отеля -->
						<?php $all_photos = rwmb_meta('meta-hotel-all-photos'); ?>
						<?php if ($all_photos): ?>
							<!-- PC Все фото -->
							<div class="single-hotel_allphotos relative hidden lg:block mb-10">
								<div class="single-hotel_allphotos_list">
									<?php 
										$images = rwmb_meta( 'meta-hotel-all-photos', array( 'size' => 'large' ) );
										$count_images = count($images);
										foreach ($images as $img): ?>
											<div class="single-hotel_allphotos_item mb-2">
												<img src="<?php echo $img['url']; ?>" alt="Фото" class="w-full">	
											</div>
									<?php endforeach; ?> 	
								</div>
								
								<?php if ($count_images > 3): ?>
									<div class="single-hotel_allphotos_shadow"></div>
									<div class="single-hotel_allphotos_shadow_two"></div>
									<div class="single-hotel_allphotos_more flex justify-center text-center cursor-pointer mx-auto show">
										<span class="bg-yellow rounded-lg shadow-lg py-3 px-8"><?php _e('Показать все фото'); ?></span>
									</div>
									<div class="single-hotel_allphotos_more flex justify-center text-center cursor-pointer mx-auto">
										<span class="bg-white rounded-lg shadow-lg py-3 px-8"><?php _e('Свернуть фото'); ?></span>
									</div>
								<?php endif; ?>
							</div>

							<!-- Mobile Все фото -->
							<div class="single-hotel_allphotos relative block lg:hidden mb-10">
								<div class="single-hotel_allphotos_list">
									<?php 
										$images = rwmb_meta( 'meta-hotel-all-photos', array( 'size' => 'medium' ) );
										$count_images = count($images);
										foreach ($images as $img): ?>
											<div class="single-hotel_allphotos_item mb-2">
												<img src="<?php echo $img['url']; ?>" alt="Фото" class="w-full">	
											</div>
									<?php endforeach; ?> 	
								</div>
								
								<?php if ($count_images > 3): ?>
									<div class="single-hotel_allphotos_shadow"></div>
									<div class="single-hotel_allphotos_shadow_two"></div>
									<div class="single-hotel_allphotos_more flex justify-center text-center cursor-pointer mx-auto show">
										<span class="bg-yellow rounded-lg shadow-lg py-3 px-8"><?php _e('Показать все фото'); ?></span>
									</div>
									<div class="single-hotel_allphotos_more flex justify-center text-center cursor-pointer mx-auto">
										<span class="bg-white rounded-lg shadow-lg py-3 px-8"><?php _e('Свернуть фото'); ?></span>
									</div>
								<?php endif; ?>	
							</div>
						<?php else: ?>
							<!-- Старые фото -->
							<div class="single-hotel_allphotos relative block mb-10">
								<div class="single-hotel_allphotos_list">
									<?php 
										$images_territory = rwmb_meta( 'meta-hotel-photos', array( 'size' => 'large' ) );
										$images_appartment = rwmb_meta( 'meta-hotel-appartment-photos', array( 'size' => 'large' ) );
										$images_budget = rwmb_meta( 'meta-hotel-budget-photos', array( 'size' => 'large') );
										$images_camping = rwmb_meta( 'meta-hotel-camping-photos', array( 'size' => 'large') );
										$images_halflux = rwmb_meta( 'meta-hotel-halflux-photos', array( 'size' => 'large' ) );
										$images_kottedg = rwmb_meta( 'meta-hotel-kottedg-photos', array( 'size' => 'large') );
										$images_lux = rwmb_meta( 'meta-hotel-lux-photos', array( 'size' => 'large' ) );
										$images_standart = rwmb_meta( 'meta-hotel-standart-photos', array( 'size' => 'large') );

										$all_old_photos = array_merge((array)$images_territory, (array)$images_appartment, (array)$images_budget, (array)$images_camping, (array)$images_halflux, (array)$images_kottedg, (array)$images_lux, (array)$images_standart);
										foreach ( $all_old_photos as $all_old_photo ): 
									?> 
										<div class="single-hotel_allphotos_item mb-2">
											<img src="<?php echo $all_old_photo['url'] ?>" alt="<?php the_title(); ?>">
										</div>
									<?php endforeach; ?>
								</div>
								<?php if ($all_old_photos > 3): ?>
									<div class="single-hotel_allphotos_shadow"></div>
									<div class="single-hotel_allphotos_shadow_two"></div>
									<div class="single-hotel_allphotos_more flex justify-center text-center cursor-pointer mx-auto show">
										<span class="bg-yellow rounded-lg shadow-lg py-3 px-8"><?php _e('Показать все фото'); ?></span>
									</div>
									<div class="single-hotel_allphotos_more flex justify-center text-center cursor-pointer mx-auto">
										<span class="bg-white rounded-lg shadow-lg py-3 px-8"><?php _e('Свернуть фото'); ?></span>
									</div>
								<?php endif; ?>	
							</div>
						<?php endif; ?>
					</div>
					<div class="mb-6">
						<?php the_content(); ?>
					</div>
					<div class="mb-6">
						<div class="text-2xl font-bold mb-4">
							<?php _e('Адрес', 'restx'); ?>
						</div>
						<div class="mb-4">
							<?php 
								$args = array(
							    'width'        => '100%',
							    'height'       => '380px',
							    'zoom'         => 14,
							    'marker'       => true,
							    'marker_title' => 'Click me',
							    'info_window'  => '<h3>Title</h3><p>Content</p>.',
								);
								echo rwmb_meta( 'meta-hotel-map', $args );
							?>
						</div>
						<div>
							<?php echo rwmb_meta( 'meta-hotel-address' ); ?>		
						</div>
					</div>
					<div>
						<div class="text-2xl font-bold mb-4">
							<?php _e('Отзывы', 'restx'); ?>
						</div>
						<?php get_template_part('blocks/custom_comments'); ?>	
					</div>
				</div>
				<!-- end Контент Отеля -->

				<!-- Инфо Отеля -->
				<div class="w-full lg:w-4/12 mb-6 lg:mb-0">
					<div class="sticky" style="top: 90px;">
						<!-- Добавить в избранное -->
						<div style="position: absolute; right: 0; z-index: 2; top: 0; transform: translateY(-12px);">
							<?php if ( is_user_logged_in() ): ?>
								<?php
									global $current_user;
									$post_type = get_post_type();
									$post_id = get_the_ID();
									$user_id = $current_user->id;
									$favClass = new Favbtn();
									$favBtn = $favClass->show_fav_btn($user_id,$post_id,$post_type);
								?>
							<?php else: ?>
								<div class="btn-fav cursor-pointer js-openmodal-click" data-modal-id="login">
									<svg width="24" height="24" fill="none" class="color-red"><path fill-rule="evenodd" clip-rule="evenodd" d="M12.509 20.86C18.78 17.154 22 13.22 22 9c0-6.002-6.749-7.89-10-3.898C8.749 1.11 2 2.998 2 9c0 4.22 3.219 8.153 9.491 11.86a1 1 0 001.018 0zm.402-13.448C14.677 3.51 20 4.542 20 9c0 3.253-2.616 6.55-8 9.834C6.617 15.549 4 12.254 4 9c0-4.459 5.323-5.49 7.089-1.588a1 1 0 001.822 0z" fill="currentColor"></path></svg>
								</div>
							<?php endif; ?>
						</div>
						<!-- END Добавить в Избранное -->
						<span class="text-sm text-gray-700 mb-1"><?php _e('Просмотров', 'restx'); ?>: <?php echo $countNumber; ?></span>
						<h1 class="text-2xl lg:text-3xl font-normal mb-2"><?php the_title(); ?></h1>	
						<div class="text-2xl mb-6">
							<span class="text-red-600"><?php _e('Цена', 'restx'); ?></span>: <span class="get_hotel_minprice"><?php echo rwmb_meta( 'meta-hotel-minprice' ); ?></span> — <span class="get_hotel_maxprice"><?php echo rwmb_meta( 'meta-hotel-maxprice' ); ?></span> грн 
						</div>
						<div class="mb-4">
							<?php $all_contacts = rwmb_meta('meta-hotel-all-contacts'); ?>
							<?php if ($all_contacts): ?>
								<?php echo $all_contacts; ?>
							<?php else: ?>
								<?php get_template_part('blocks/single-hotel/contact') ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<!-- end Инфо Отеля -->
			</div>
		</div>
	</div>

	<!-- Другое жилье в этом городе -->
	<div>
		<h2 class="text-2xl lg:text-4xl text-center mb-6 lg:mb-10"><?php _e('Другие предложения в этом городе', 'restx'); ?></h2>
		<div class="flex flex-wrap lg:-mx-2">
			<?php 
				$current_id = get_the_ID();
				$query = new WP_Query( array( 
					'post_type' => 'hotels', 
					'posts_per_page' => 8,
					'post__not_in' => array($current_id),
					'order'    => 'DESC',
					'tax_query' => array(
				    array(
			        'taxonomy' => 'citylist',
					    'terms' => $getCurrentTermId,
			        'field' => 'term_id',
			        'include_children' => true,
			        'operator' => 'IN'
				    )
					),
				) );
			if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
				<div class="w-full lg:w-3/12 px-0 lg:px-2 mb-6">
					<?php get_template_part('blocks/hotel-card'); ?>
				</div>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
	</div>
	<!-- END Другое жилье в этом городе -->
</div>


<?php get_footer(); ?>