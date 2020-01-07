<!-- Основной город -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="table-text mb-5">
				<h1><?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_title') ?></h1>
				<p><?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_description') ?></p>
			</div>
			<div class="citylist_wrapper">
				<div class="citylist_content mb-5">
					<?php get_template_part( 'blocks/filters/city_filter', 'default' ); ?>	
					<div class="lead">
			  		<?php get_template_part( 'blocks/citylist/parent-catalog', 'default' ); ?>
			  	</div>
			  	<div class="mobile-show">
			  		<?php 
							$current_term = get_queried_object_id();
							$custom_query = new WP_Query( array( 
							'post_type' => 'blogs', 
							'posts_per_page' => 5,
							'tax_query' => array(
						    array(
					        'taxonomy' => 'citylist',
							    'terms' => $current_term,
					        'field' => 'term_id',
					        'include_children' => true,
					        'operator' => 'IN'
						    )
							),
						) );
						?>
						<?php if ($custom_query->have_posts()): ?>
							<div class="title mb-4">
								Информация
							</div>
						<?php endif; ?>
						<?php
						if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
					  	<div>
				  			<?php get_template_part( 'blocks/citylist/blog', 'default' ); ?>
				  		</div>
						<?php endwhile; endif; wp_reset_postdata(); ?>
			  	</div>
			  	<div class="mobile-show mb-5">
			  		<div class="title mb-4">
							<?php _e( 'Видео', 'restx' ); ?>
						</div>
						<?php if(carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_video')): ?>
					  	<h3 class="mb-4"><?php _e( 'Наслаждайтесь видео!', 'restx' ); ?></h3>
					  	<div class="youtube-player" data-id="<?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_video') ?>"></div>
					  	<?php else: ?>
				  		<div class="no-video">
				  			<div class="mb-5">
				  				<img src="<?php bloginfo('template_url') ?>/img/sad.svg" alt="" width="50px">
				  			</div>
				  			<div class="sad mb-5">
				  				<?php _e( 'К сожалению, мы пока не подготовили для вас хорошего видеоматериала', 'restx' ); ?>
				  			</div>
				  			<div class="help mb-5">
				  				<?php _e( 'Но вы можете помочь нам, отправив ссылку на подходящее видео', 'restx' ); ?>
				  			</div>
				  			<div class="send-message mb-5">
				  				<img src="<?php bloginfo('template_url') ?>/img/life-saver.svg" alt="" width="25px">
				  				<div>
				  					<?php _e( 'Отправить ссылку на видео', 'restx' ); ?>
				  				</div>
				  			</div>
				  		</div>
				  	<?php endif ?>
			  	</div>
			  	<div>
				  	<?php 
							$current_term = get_queried_object_id();
							$custom_query_post_comment = new WP_Query( array( 
							'post_type' => 'post_comment', 
							'posts_per_page' => 1,
							'tax_query' => array(
						    array(
					        'taxonomy' => 'citylist',
							    'terms' => $current_term,
					        'field' => 'term_id',
					        'include_children' => true,
					        'operator' => 'IN'
						    )
							),
						) );
						if ($custom_query_post_comment->have_posts()) : while ($custom_query_post_comment->have_posts()) : $custom_query_post_comment->the_post(); ?>
					  	<?php global $withcomments;
							$withcomments = true;
							comments_template(); ?> 
						<?php endwhile; endif; wp_reset_postdata(); ?>
					</div>
					<div>
						<div class="citylist__text lead">
							<?php echo apply_filters( 'the_content', carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_rich_text') ); ?>
						</div>
						<!-- Вопросы и ответы -->
						<?php if (carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_faq')): ?>
							<div id="citylist-faq" class="mt-5">
								<h3 class="mb-4">Вопросы и ответы</h3>
								<div>
									<ul itemscope itemtype="https://schema.org/FAQPage">
										<?php 
										$city_faqs = carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_faq');
										foreach( $city_faqs as $city_faq ): ?>
											<li itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
												<h4 class="zag" itemprop="name">
													<?php echo $city_faq['crb_citylist_faq_question'] ?>
												</h4>
												<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
													<div class="lead" itemprop="text">
														<p><?php echo $city_faq['crb_citylist_faq_answer'] ?></p>
													</div>
												</div>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="citylist_sidebar">
					<div>
						<?php 
							$current_term = get_queried_object_id();
							$custom_query = new WP_Query( array( 
							'post_type' => 'blogs', 
							'posts_per_page' => 5,
							'tax_query' => array(
						    array(
					        'taxonomy' => 'citylist',
							    'terms' => $current_term,
					        'field' => 'term_id',
					        'include_children' => true,
					        'operator' => 'IN'
						    )
							),
						) );
						?>
						<?php if ($custom_query->have_posts()): ?>
							<div class="title mb-4">
								<?php _e( 'Информация', 'restx' ); ?>
							</div>
						<?php endif; ?>
						<?php
						if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
					  	<div>
				  			<?php get_template_part( 'blocks/citylist/blog', 'default' ); ?>
				  		</div>
						<?php endwhile; endif; wp_reset_postdata(); ?>
					</div>
					<div class="title mb-4">
						Видео
					</div>
					<?php if(carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_video')): ?>
				  	<h3 class="mb-4"><?php _e( 'Наслаждайтесь видео!', 'restx' ); ?></h3>
				  	<div class="youtube-player" data-id="<?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_citylist_video') ?>"></div>
				  	<?php else: ?>
			  		<div class="no-video">
			  			<div class="mb-5">
			  				<img src="<?php bloginfo('template_url') ?>/img/sad.svg" alt="" width="50px">
			  			</div>
			  			<div class="sad mb-5">
			  				<?php _e( 'К сожалению, мы пока не подготовили для вас хорошего видеоматериала', 'restx' ); ?>
			  			</div>
			  			<div class="help mb-5">
			  				<?php _e( 'Но вы можете помочь нам, отправив ссылку на подходящее видео', 'restx' ); ?>
			  			</div>
			  			<div class="send-message mb-5">
			  				<img src="<?php bloginfo('template_url') ?>/img/life-saver.svg" alt="" width="25px">
			  				<div>
			  					<?php _e( 'Отправить ссылку на видео', 'restx' ); ?>
			  				</div>
			  			</div>
			  		</div>
			  	<?php endif ?>
				</div>
			</div>
		</div>
	</div>
	<!-- Хлебные крошки -->
	<div class="row mt-3">
		<div class="col-md-12">
			<div class="breadcrumbs" itemprop="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
        <ul>
					<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
						<a itemprop="item" href="<?php echo home_url(); ?>">
							<span itemprop="name"><?php _e( 'Снять жилье', 'restx' ); ?></span>
						</a>                        
						<meta itemprop="position" content="1">
					</li>
          <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
          	<?php 
          		$term_link = get_term_link(get_queried_object_id(), 'citylist');
          	?>
            <a itemprop="item" href="<?php echo $term_link ?>">
              <span itemprop="name"><?php single_term_title(); ?></span>
            </a>
            <meta itemprop="position" content="2">
          </li>
        </ul>
      </div>
		</div>
	</div>
	<!-- Микроразметка Цена -->
	<script>
		createProductSchema = function(min, max) {
			var el = document.createElement('script');
			el.type = 'application/ld+json';
			el.text = JSON.stringify({
			    "@context": "https://schema.org/",
			    "@type": "Product",
			    "name":"<?php single_term_title(); ?>: снять жилье",
			    "offers": {
			        "@type": "AggregateOffer",
			        "priceCurrency": "UAH",
			        "lowPrice": min,
			        "highPrice":max
			    }
			});
			document.querySelector('head').appendChild(el);
			console.log(el);
		};
		let getHotelsMinprice = document.querySelectorAll('.get_hotel_minprice');
		let arrayHotelsMinprice = [];
		for (getHotelMinprice of getHotelsMinprice) {
			arrayHotelsMinprice.push(getHotelMinprice.innerText);
		}
		var minHotelPrice = Math.min.apply(Math, arrayHotelsMinprice);
		var maxHotelPrice = Math.max.apply(Math, arrayHotelsMinprice);

		createProductSchema(minHotelPrice, maxHotelPrice);
	</script>
</div>