<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="way">
		<div class="container py-5">
			<div class="row mb-5">
				<div class="col-md-12">
					<div class="single-blogs__breadcrumb d-flex">
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
			<div class="row">
				<div class="col-md-8">
				<?php $ways = carbon_get_the_post_meta('crb_way'); 
				foreach($ways as $key => $way): ?>
					<div class="way_block d-flex flex-column flex-md-row justify-content-between p-4 pl-5 mb-5">
						<div class="way_block_left mb-5 mb-md-0">
							<div class="way_block_start position-relative d-flex align-items-start mb-4">
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
							<div class="way_block_end position-relative d-flex align-items-start">
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
						<div class="way_block_middle d-flex flex-row flex-md-column justify-content-between mb-5 mb-md-0">
							<div>
								<div class="text-muted"><?php _e('Перевозчик', 'restx'); ?>:</div>
								<div><?php echo $way['crb_way_perevozhik']; ?></div>	
							</div>
							<div>
								<div class="text-muted"><?php _e('Регулярность', 'restx'); ?>:</div>
								<div><?php echo $way['crb_way_when']; ?></div>	
							</div>
						</div>
						<div class="way_block_right d-flex flex-column justify-content-between">
							<div class="way_block_when mb-4 mb-md-0">
								<?php echo $way['crb_way_price']; ?>
							</div>
							<div class="d-flex justify-content-center justify-content-md-end">
								<div class="way_block_contacts" data-toggle="modal" data-target="#wayModal_<?php echo $key; ?>">
									<?php _e('Контакты', 'restx'); ?>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
				</div>
				<div class="col-md-4">
					<div class="citylist_sidebar_box before_green position-relative mb-5">
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

	<!-- Modal -->
<?php $oh_ways = carbon_get_the_post_meta('crb_way');
foreach($oh_ways as $key => $oh_way): ?>

	<div class="modal fade way_modal" id="wayModal_<?php echo $key ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h3 class="modal-title" id="exampleModalLabel"><?php _e('Контакты', 'restx'); ?></h3>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body py-5">
	      	<div class="d-flex align-items-center mb-3">
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
	    </div>
	  </div>
	</div>
<?php endforeach; ?>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>