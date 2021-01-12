<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="way">
	<div class="container mx-auto px-2 lg:px-0 pt-20 lg:pt-12 lg:pb-12">
		<div class="row mb-5">
			<div class="col-md-12">
				<div class="single-blogs__breadcrumb flex">
						<div class="breadcrumbs" itemprop="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
				      <ul>
								<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
									<a itemprop="item" href="<?php echo home_url(); ?>">
										<span itemprop="name"><?php _e( 'Главная', 'restx' ); ?></span>
									</a>                        
									<meta itemprop="position" content="1">
								</li>
								<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
									<a itemprop="item" href="<?php echo get_post_type_archive_link('way'); ?>">
										<span itemprop="name"><?php _e( 'Автобусные перевозки', 'restx' ); ?></span>
									</a>                        
									<meta itemprop="position" content="2">
								</li>
				      </ul>
				    </div>
				</div>
			</div>
		</div>
		<div class="row mb-5">
			<div class="col-md-12">
				<h1 class="single"><?php _e('Направление', 'restx'); ?>: <?php the_title(); ?></h1>	
			</div>
		</div>
		<div class="flex">
			<div class="w-full lg:w-8/12 pr-0 lg:pr-4">
			<?php $ways = carbon_get_the_post_meta('crb_way'); 
			foreach($ways as $key => $way): ?>
				<div class="way_block flex flex-col lg:flex-row justify-between p-4 pl-5 mb-5">
					<div class="way_block_left mb-5 lg:mb-0">
						<div class="way_block_start position-relative flex items-start mb-4">
							<div class="way_block_time mr-5">
								<?php echo $way['crb_way_start_time']; ?>
							</div>
							<div class="way_block_city">
								<?php $cities_from = carbon_get_the_post_meta('crb_way_start_city');
								foreach($cities_from as $city_from): ?>
									<?php 
										$city_from_id = $city_from['id'];
										$city_from_term = get_term( $city_from_id, 'citylist' ); 
									?>
									<div><?php echo $city_from_term->name; ?></div>
									<div class="text-muted"><?php _e('Отправление', 'restx'); ?></div>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="way_block_end position-relative flex items-start">
							<div class="way_block_time mr-5">
								<?php echo $way['crb_way_end_time']; ?>
							</div>
							<div class="way_block_city">
								<?php $cities_to = carbon_get_the_post_meta('crb_way_end_city');
								foreach($cities_to as $city_to): ?>
									<?php 
										$city_to_id = $city_to['id'];
										$city_to_term = get_term( $city_to_id, 'citylist' ); 
									?>
									<div><?php echo $city_to_term->name; ?></div>
									<div class="text-muted"><?php _e('Прибытие', 'restx'); ?></div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
					<div class="way_block_middle flex flex-row lg:flex-col justify-between mb-5 lg:mb-0">
						<div>
							<div class="text-muted"><?php _e('Перевозчик', 'restx'); ?>:</div>
							<div><?php echo $way['crb_way_perevozhik']; ?></div>	
						</div>
						<div>
							<div class="text-muted"><?php _e('Регулярность', 'restx'); ?>:</div>
							<div><?php echo $way['crb_way_when']; ?></div>	
						</div>
					</div>
					<div class="way_block_right flex flex-col justify-between">
						<div class="way_block_when mb-4 mb-md-0">
							<?php echo $way['crb_way_price']; ?>
						</div>
						<div class="flex justify-center lg:justify-end">
							<div class="way_block_contacts js-openmodal-click" data-modal-id="way">
								<?php _e('Контакты', 'restx'); ?>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
			</div>
			<div class="w-full lg:w-4/12 pl-0 lg:pl-4">
				<div class="citylist_sidebar_box before_green relative mb-5">
					<div class="title text-center mb-4"><h3><?php _e('Обратное направление', 'restx'); ?>:</h3></div>
				<!-- Обратный маршрут -->
				<?php 
	  			$back_city_from = 'term:citylist:'. $city_from_term->term_id .'';
	  			$back_city_to = 'term:citylist:'. $city_to_term->term_id .'';
					$custom_query = new WP_Query( array( 
					'post_type' => 'way', 
					'posts_per_page' => 1,
					'meta_query' => array(
						'relation' => 'AND',
						array(
							'key'     => 'crb_way_end_city',
				      'value'   => array($back_city_from),
				      'compare' => 'IN', 
						),
						array(
							'key'     => 'crb_way_start_city',
				      'value'   => array($back_city_to),
				      'compare' => 'IN', 
						)
					)
				) );
				if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
      		<a href="<?php the_permalink(); ?>">
    				<div class="single-blogs__other-title text-center mb-2">
    					<?php the_title(); ?>	
    				</div>
        	</a>
				<?php endwhile; endif; ?>
			</div>
				<!-- start Из города другие рейсы -->
				<div class="citylist_sidebar_box mb-5">
		  		<div class="citylist-blog mb-5">
						<div class="citylist-blog__img" style="background-color: #cdf5d4;">
							<img src="<?php bloginfo('template_url') ?>/img/direction-sign.svg" width="30px" alt="">
						</div>
						<div class="title">
							<h3>
								<?php _e( 'Из города', 'restx' ); ?>: <?php echo $city_from_term->name ?>
							</h3>
						</div>
					</div>
					<?php 
		  			$current_city_for_way = 'term:citylist:'. $city_from_term->term_id .'';
						$custom_query = new WP_Query( array( 
						'post_type' => 'way', 
						'posts_per_page' => 10,
						'meta_query' => array(
							'relation' => 'AND',
							array(
								'key'     => 'crb_way_start_city',
					      'value'   => array($current_city_for_way),
					      'compare' => 'IN', 
							)
						)
					) );
					if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
        		<a href="<?php the_permalink(); ?>">
      				<div class="single-blogs__other-title mb-2">
      					<?php the_title(); ?>	
      				</div>
	        	</a>
					<?php endwhile; endif; ?>
				</div>
				<!-- end Из города другие рейсы -->
				<!-- start В город другие рейсы -->
				<div class="citylist_sidebar_box">
		  		<div class="citylist-blog mb-5">
						<div class="citylist-blog__img" style="background-color: #cdf5d4;">
							<img src="<?php bloginfo('template_url') ?>/img/direction-sign.svg" width="30px" alt="">
						</div>
						<div class="title">
							<h3>
								<?php _e( 'В город', 'restx' ); ?>: <?php echo $city_to_term->name ?>
							</h3>
						</div>
					</div>
					<?php 
		  			$current_city_for_way = 'term:citylist:'. $city_to_term->term_id .'';
						$custom_query = new WP_Query( array( 
						'post_type' => 'way', 
						'posts_per_page' => 10,
						'meta_query' => array(
							'relation' => 'AND',
							array(
								'key'     => 'crb_way_end_city',
					      'value'   => array($current_city_for_way),
					      'compare' => 'IN', 
							)
						)
					) );
					if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
        		<a href="<?php the_permalink(); ?>">
      				<div class="single-blogs__other-title mb-2">
      					<?php the_title(); ?>	
      				</div>
	        	</a>
					<?php endwhile; endif; ?>
				</div>
				<!-- end В город другие рейсы -->
			</div>
		</div>
	</div>
</div>

<!-- Модальное окно, автобусные перевозки -- контакты -->
<div class="modal" data-modal-id="way">
  <div class="modal_content">
    <div class="modal_content_close">
      <img src="<?php bloginfo('template_url'); ?>/img/close-modal.svg" width="15px">
    </div>
    <div class="modal_content_title mb-5">
      <?php _e('Контакты', 'restx'); ?>
    </div>
    <?php $oh_ways = carbon_get_the_post_meta('crb_way');
		foreach($oh_ways as $key => $oh_way): ?>
    	<div class="flex items-center mb-3">
      	<img src="<?php bloginfo('template_url'); ?>/img/phone-call.svg" alt="" width="25px" class="mr-3">
        <h3><?php _e('Телефоны', 'restx'); ?>:</h3>	
    	</div>
      <?php 
      	$ways_phones = $oh_way['crb_way_phones']; 
      	foreach($ways_phones as $ways_phone): 
      ?>
        <div class="phone">
        	<a href="tel:<?php echo $ways_phone['crb_way_phone']; ?>"><?php echo $ways_phone['crb_way_phone']; ?></a>
        </div>
      <?php endforeach; ?>
    </div>
		<?php endforeach; ?>
  </div>
</div>
<!-- Конец Модальное окно, автобусные перевозки -- контакты -->

<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>