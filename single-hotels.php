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

<div class="container mx-auto px-2 lg:px-0 pt-20 lg:pt-12 lg:pb-12">
	<div class="flex flex-wrap flex-col-reverse lg:flex-row">
		<!-- Сайдбар -->
		<div class="w-full lg:w-3/12 mb-6 lg:mb-0 pr-0 lg:pr-8">
			<div class="sticky" style="top: 90px;">
				<div>
					<div class="mb-3 text-blue-500" style="border-bottom: 1px solid #f0f0f0; padding-bottom: 12px;">
						<a href="/hotels"><?php _e('Жилье в Украине', 'restx'); ?></a>
					</div>
					<div class="mb-3"><?php echo $current_term_name; ?>: <?php _e('все жилье в городе', 'restx'); ?>	</div>
					<ul class="ml-6">
						<?php 
						$taxonomyName = 'citylist';
						$t_terms = get_terms($taxonomyName, array('parent' => $getCurrentTermId, 'hide_empty' => false));
						foreach ($t_terms as $t_term): ?>
							<li class="mb-2">
								<a href="<?php echo get_term_link( $t_term->term_id, $taxonomyName ); ?>" class="text-blue-500"><?php echo carbon_get_term_meta($t_term->term_id, 'crb_citylist_menu_name'); ?></a>
							</li>
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
						<li itemprop='itemListElement' itemscope itemtype='https://schema.org/ListItem'>
							<a itemprop="item" href="<?php echo get_term_link($getCurrentTermId, 'citylist') ?>">
								<span itemprop="name"><?php echo $current_term_name ?></span>
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

			<div class="flex flex-wrap flex-col-reverse lg:flex-row">
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
					<div class="mb-6">
						<div class="text-2xl font-bold mb-4">
							<?php _e('Отзывы', 'restx'); ?>
						</div>
						<?php get_template_part('blocks/custom_comments'); ?>	
					</div>
				</div>
				<!-- end Контент Отеля -->

				<!-- Инфо Отеля -->
				<div class="w-full lg:w-4/12 mb-12 lg:mb-0">
					<div class="sticky" style="top: 90px;">
						<span class="text-sm text-gray-700"><?php _e('Просмотров', 'restx'); ?>: <?php echo $countNumber; ?></span>
						<h1 class="text-2xl lg:text-3xl font-normal mb-2"><?php the_title(); ?></h1>	

						<div>
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
</div>


<?php get_footer(); ?>