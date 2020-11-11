<div class="citylist">
	<div class="container-fluid cf_px">
		<div class="row d-flex justify-content-center">
			<div class="col-md-8">
				<h1 class="text-center"><?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_title') ?></h1>
				<!-- Хлебные крошки -->
				<div class="d-flex justify-content-center mb-5">
					<?php get_template_part( 'blocks/citylist/breadcrumbs', 'default' ); ?>
				</div>
				<!-- END Хлебные крошки -->
				
				<!-- Вступительный текст -->
				<div class="text-2xl mb-5">
					<?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_innertext') ?>
				</div>
			</div>
		</div>
	</div>

	<!-- Первая фотка -->
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
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e6ebf7" fill-opacity="1" d="M0,128L21.8,144C43.6,160,87,192,131,176C174.5,160,218,96,262,74.7C305.5,53,349,75,393,90.7C436.4,107,480,117,524,149.3C567.3,181,611,235,655,234.7C698.2,235,742,181,785,149.3C829.1,117,873,107,916,96C960,85,1004,75,1047,58.7C1090.9,43,1135,21,1178,26.7C1221.8,32,1265,64,1309,74.7C1352.7,85,1396,75,1418,69.3L1440,64L1440,320L1418.2,320C1396.4,320,1353,320,1309,320C1265.5,320,1222,320,1178,320C1134.5,320,1091,320,1047,320C1003.6,320,960,320,916,320C872.7,320,829,320,785,320C741.8,320,698,320,655,320C610.9,320,567,320,524,320C480,320,436,320,393,320C349.1,320,305,320,262,320C218.2,320,175,320,131,320C87.3,320,44,320,22,320L0,320Z"></path></svg>	
	</div>
	<!-- END Первая фотка -->

	<!-- ТЕмный фон -->
	<div class="citylist_darkbgcontent">
		<div class="container-fluid cf_px">
			<div class="row d-flex justify-content-center">
				<div class="col-md-8">
					<!-- END Вступительный текст -->
					<!-- Оглавление -->
					<div class="citylist_subjects mb-5">
						<h2 class="mb-4"><?php _e('Содержание', 'restx'); ?></h2>
						<div>
							<ol>
								<li><a href="#citylist_common"><?php _e('Общая информация', 'restx'); ?></a></li>
								<li><a href="#citylist_hotels"><?php _e('Жилье в городе', 'restx'); ?></a></li>
								<li><a href="#citylist_wow"><?php _e('Куда пойти', 'restx'); ?></a></li>
								<?php if(carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_camers')): ?>
									<li><a href="#citylist_camers"><?php _e('Онлайн камеры', 'restx'); ?></a></li>
								<?php endif ?>
								<?php if(carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_camers')): ?>
									<li><a href="#citylist_video"><?php _e('Видео', 'restx'); ?></a></li>
								<?php endif ?>	
								<li><a href="#near"><?php _e('Ближайшие курорты', 'restx'); ?></a></li>
								<li><a href="#citylist-faq"><?php _e('Часто задаваемые вопросы', 'restx'); ?></a></li>
								<li><a href="#review"><?php _e('Комментарии', 'restx'); ?></a></li>
							</ol>
						</div>
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
					<div class="d-flex justify-content-center mb-5">
						<a href="#" class="btn-more white text-center d-flex align-items-center">
							<img src="<?php bloginfo('template_url'); ?>/img/more.svg" width="35px" class="mr-4">
							<div class="btn-more-info d-flex align-items-center">
								<img src="https://vidpochivai.com.ua/wp-content/uploads/2020/07/photo_2020-07-06_22-58-09-150x150.jpg" height="50px" class="rounded-circle">
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
				</div>
			</div>
		</div>
	</div>

	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e6ebf7" fill-opacity="1" d="M0,160L30,170.7C60,181,120,203,180,202.7C240,203,300,181,360,154.7C420,128,480,96,540,85.3C600,75,660,85,720,101.3C780,117,840,139,900,138.7C960,139,1020,117,1080,128C1140,139,1200,181,1260,181.3C1320,181,1380,139,1410,117.3L1440,96L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path></svg>

	<div class="container-fluid cf_px">
		<div class="row d-flex justify-content-center">
			<div class="col-md-8">

				<!-- Ближайшие курорты -->
				<?php if(carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_association')): ?>
		  	<div id="near" class="citylist_near mb-5">
		  		<h2 class="mb-4">
		  			<?php _e( 'Ближайшие курорты', 'restx' ); ?>
		  		</h2>
		  		<div class="citylist_near_grid d-flex flex-wrap">
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