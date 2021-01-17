<div class="citylist bg-custom-grey py-12">
	<div class="container mx-auto px-2 lg:px-0">
		<div class="flex justify-center">
			<div class="w-full lg:w-8/12">
				<h1 class="text-5xl text-center"><?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_title') ?></h1>
				<!-- Хлебные крошки -->
				<div class="flex justify-center mb-5">
					<?php get_template_part( 'blocks/citylist/breadcrumbs', 'default' ); ?>
				</div>
				<!-- END Хлебные крошки -->
				
				<!-- Вступительный текст -->
				<div class="text-xl mb-10">
					<?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_innertext') ?>
				</div>
				<!-- END Вступительный текст -->
			</div>
		</div>
	</div>

	<!-- Контент фон -->
	<div>
		<div class="container mx-auto px-2 lg:px-0">
			<div class="flex justify-center">
				<div class="w-full lg:w-9/12 bg-white shadow-lg px-6 py-6 lg:px-8 lg:py-8" style="border-radius: 0.75rem;">
					<div class="flex flex-col lg:flex-row">
						<!-- Оглавление -->
						<div class="w-full lg:w-1/2">
							<div class="citylist_subjects mb-5">
								<div class="citylist_subjects_title text-2xl font-bold"><?php _e('Содержание', 'restx'); ?></div>
								<div>
									<ol>
										<li class="mb-1"><a href="#citylist_common" class="text-xl text-blue-700"><?php _e('Общая информация', 'restx'); ?></a></li>
										<li class="mb-1"><a href="#citylist_hotels" class="text-xl text-blue-700"><?php _e('Жилье в городе', 'restx'); ?></a></li>
										<li class="mb-1"><a href="#citylist_wow" class="text-xl text-blue-700"><?php _e('Куда пойти', 'restx'); ?></a></li>
										<?php if(carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_camers')): ?>
											<li class="mb-1"><a href="#citylist_camers" class="text-xl text-blue-700"><?php _e('Онлайн камеры', 'restx'); ?></a></li>
										<?php endif ?>
										<?php if(carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_camers')): ?>
											<li class="mb-1"><a href="#citylist_video" class="text-xl text-blue-700"><?php _e('Видео', 'restx'); ?></a></li>
										<?php endif ?>	
										<li class="mb-1"><a href="#near" class="text-xl text-blue-700"><?php _e('Ближайшие курорты', 'restx'); ?></a></li>
										<li class="mb-1"><a href="#citylist-faq" class="text-xl text-blue-700"><?php _e('Часто задаваемые вопросы', 'restx'); ?></a></li>
										<li class="mb-1"><a href="#review" class="text-xl text-blue-700"><?php _e('Комментарии', 'restx'); ?></a></li>
									</ol>
								</div>
							</div>
						</div>
						<!-- Первая фотка -->
						<div class="w-full lg:w-1/2">
							<?php 
								$first_photo_medium = wp_get_attachment_image_src(carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_firstphoto'), 'medium'); 
								$first_photo_large = wp_get_attachment_image_src(carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_firstphoto'), 'large'); 
								$first_photo_full = wp_get_attachment_image_src(carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_firstphoto'), 'full'); 
							?>
							<div class="citylist_firstphoto">
								<img srcset="<?php echo $first_photo_medium[0] ?> 767w, 
								<?php echo $first_photo_large[0] ?> 1280w,
								<?php echo $first_photo_full[0] ?> 1440w"
								sizes="(max-width: 767px) 767px,
							  (max-width: 1280px) 1280px,
							  1440px"
								src="<?php echo $first_photo_full[0] ?>" alt="" loading="lazy">
							</div>
						</div>
						<!-- END Первая фотка -->
					</div>
					<!-- END Оглавление -->
					<!-- Общая информация -->
					<h2 id="citylist_common" class="mb-4"><?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_welcometitle') ?></h2>
					<div class="citylist_text text-2xl mb-5">
						<?php echo apply_filters( 'the_content', carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_welcometext') ); ?>	
					</div>
					<!-- END Общая информация -->

					<!-- Жилье в городе -->
					<h2 id="citylist_hotels" class="mb-4"><?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_hotelstitle') ?></h2>
					<div class="citylist_text mb-5">
						<?php echo apply_filters( 'the_content', carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_hotelstext') ); ?>
					</div>
					<div class="flex justify-center mb-5">
						<!-- Находим субкатегорию ALL -->
						<?php 
							$t_terms = get_terms(
								'citylist', array(
									'parent' => get_queried_object_id(), 
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
						?>
						<!-- END Находим субкатегорию ALL -->
						<a href="<?php echo get_term_link( $t_terms[0]->term_id, 'citylist' ); ?>" class="btn-more white text-center flex items-center">
							<img src="<?php bloginfo('template_url'); ?>/img/more.svg" width="35" class="mr-4">
							<div class="btn-more-info bg-custom-grey flex items-center">
								<img src="https://vidpochivai.com.ua/wp-content/uploads/2020/07/photo_2020-07-06_22-58-09-150x150.jpg" width="50px" class="rounded-full">
								<span><?php _e( 'Перейти в каталог', 'restx' ); ?></span>	
							</div>
						</a>	
					</div>
					<!-- END Жилье в городе -->

					<!-- Места в городе -->
					<h2 id="citylist_wow" class="mb-4"><?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_placestitle') ?></h2>
					<div class="citylist_text mb-5">
						<?php echo apply_filters( 'the_content', carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_placestext') ); ?>
					</div>
					<!-- END Места в городе -->

					<!-- Камеры -->
					<?php if(carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_camers')): ?>
						<h2 id="citylist_camers" class="mb-4"><?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_camerstitle') ?></h2>
				  	<div>
				  		<?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_camers') ?>	
				  	</div>
			  	<?php endif ?>
					<!-- END Камеры -->

					<!-- Видео -->
					<?php if(carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_video')): ?>
						<h2 id="citylist_video" class="mb-4"><?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_videotitle') ?></h2>
				  	<div class="youtube-player" data-id="<?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_video') ?>"></div>
			  	<?php endif ?>
					<!-- END Видео -->

					<!-- Ближайшие курорты -->
					<?php if(carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_association')): ?>
			  	<div id="near" class="citylist_near mb-5">
			  		<h2 class="mb-4">
			  			<?php _e( 'Ближайшие курорты', 'restx' ); ?>
			  		</h2>
			  		<div class="citylist_near_grid flex flex-wrap">
			  			<?php 
					  		$near_cities_array = [];
					  		$near_cities = carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_association'); 
					  		foreach($near_cities as $near_city) {
						  		$near_city_id = $near_city['id'];
						  		array_push($near_cities_array, $near_city_id);
						  	}
					  	?>
					  	<?php $near_city_terms = get_terms(array(
					  		'taxonomy' => 'citylist',
					  		'include' => $near_cities_array,
					  	)) ?>
					  	<?php foreach($near_city_terms as $near_city_term): ?>
					  		<div class="citylist_near_item">
					  			<a href="<?php echo get_term_link($near_city_term->term_id, 'citylist') ?>" class="citylist_near_item_content">
					  				<div class="citylist_near_item_img">
						  				<img src="<?php echo carbon_get_term_meta($near_city_term->term_id, 'crb_citylist_img' ); ?>" alt="<?php echo $near_city_term->name ?>">	
					  				</div>
						  			<div class="citylist_near_item_link">
						  				<?php echo $near_city_term->name ?>
						  			</div>
					  			</a>
					  		</div>
					  	<?php endforeach; ?>
			  		</div>
					</div>
					<?php endif; ?>
					<!-- END Ближайшие курорты -->

					<!-- FAQ -->
					<?php if (carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_faq')): ?>
						<div id="citylist-faq" class="mb-5">
							<h2 class="mb-4"><?php _e('Часто задаваемые вопросы', 'restx'); ?></h2>
							<div>
								<div itemscope itemtype="https://schema.org/FAQPage">
									<?php 
									$city_faqs = carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_faq');
									foreach( $city_faqs as $city_faq ): ?>
										<details itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="mb-3">
											<summary class="zag" itemprop="name">
												<div>
													<?php echo $city_faq['crb_citylist_faq_question'] ?>	
												</div>
												<div class="icon">
													<span></span>
													<span></span>
												</div>
											</summary> 
											<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" class="content">
												<div itemprop="text">
													<p><?php echo $city_faq['crb_citylist_faq_answer'] ?></p>
												</div>
											</div>
										</details>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<!-- END FAQ -->

					<!-- Комментарии -->
					<div id="review">
						<h2 class="mb-5">
							<?php _e('Комментарии', 'restx'); ?>
						</h2>
						<div>
							<?php 
								$current_term = get_queried_object_id();
								$post_comment_query = new WP_Query( array( 
								'post_type' => 'post_comment', 
								'posts_per_page' => 1,
								'tax_query' => array(
							    array(
						        'taxonomy' => 'citylist',
								    'terms' => $current_term,
						        'field' => 'term_id',
						        
							    )
								),
							) );
							?>
							<?php if ($post_comment_query->have_posts()): ?>
								<?php while ($post_comment_query->have_posts()) : $post_comment_query->the_post(); ?>
							  	<?php /* echo do_shortcode('[anycomment]'); */ ?>
							  	<?php get_template_part('blocks/custom_comments'); ?>				  	
							  	<?php wp_reset_postdata(); ?>
								<?php endwhile; ?>
							<?php endif; ?>
						</div>
					</div>
					<!-- END Комментарии -->
				</div>
			</div>
		</div>
	</div>
</div>