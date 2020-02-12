<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="single-blogs pt-5">
		<!-- <div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="single-blogs__img">
						<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
					</div>
				</div>
			</div>
		</div> -->
		<div class="container">
			<?php if(!carbon_get_the_post_meta('crb_blogs_whether')): ?>
				<div class="row justify-content-center">
					<div class="col-md-9 text-center">
						<div class="single-blogs__icon">
							<img src="<?php bloginfo('template_url') ?>/img/clipboard.svg" width="35px" alt="">
						</div>
					</div>
				</div>
			<?php endif ?>
			<div class="row justify-content-center">
				<div class="col-md-9">
					<div class="single-blogs__title">
						<h1><?php the_title(); ?></h1>	
						<div class="single-blogs__breadcrumb mb-5">
							<?php 
							$current_term = wp_get_post_terms(  get_the_ID() , 'citylist', array( 'parent' => 0 ) );
							foreach ($current_term as $myterm); {
							} ?>
							<span typeof="v:Breadcrumb"> <a href="<?php echo get_term_link($myterm->term_id, 'citylist') ?>" rel="v:url" property="v:title"> <?php echo $myterm->name; ?> </a> › </span> <span typeof="v:Breadcrumb"> <?php the_title(); ?> </span>
						</div>
					</div>
				</div>
			</div>
			<div class="row justify-content-center mb-5">
				<div class="col-md-9">
					<div class="single-blogs__text">
						<?php if(carbon_get_the_post_meta('crb_blogs_whether')): ?>
						<div class="weather-block" data-weather="<?php echo carbon_get_the_post_meta('crb_blogs_city'); ?>">
							<div id="weather"></div>		
						</div>
						<?php endif ?>
						<?php the_content(); ?>
					</div>
				</div>
			</div>
			<div class="row justify-content-center mb-4">
				<div class="col-md-8 text-center">
					<h3><?php _e( 'Популярные предложения в этом городе', 'restx' ); ?></h3>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="single-blogs-hotels">
						<?php 
							$current_term = wp_get_post_terms(  get_the_ID() , 'citylist', array( 'parent' => 0 ) );
							foreach ($current_term as $myterm); {
								$current_term_slug = $myterm->slug;
							}
						?>
						<?php 
							$current_term = wp_get_post_terms(  get_the_ID() , 'citylist', array( 'parent' => 0 ) );
							$custom_query = new WP_Query( array( 
							'post_type' => 'hotels', 
							'posts_per_page' => 6,
							'orderby' => 'rand',
							'order'    => 'ASC',
							'tax_query' => array(
						    array(
					        'taxonomy' => 'citylist',
							    'terms' => $current_term_slug,
					        'field' => 'slug',
					        'include_children' => true,
					        'operator' => 'IN'
						    )
							),
						) );
						if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
							<a href="<?php echo get_permalink(); ?>">
					  		<div class="single-blogs-hotel">
					  			<div class="single-blogs-hotel-img">
						  			<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">	
					  			</div>
					  			<div class="single-blogs-hotel-content">
						  			<div class="single-blogs-hotel-title">
						  				<?php the_title(); ?>	
						  			</div>
						  			<div class="single-blogs-hotel-price">
						  				<?php get_template_part('blocks/hotel-price'); ?>	
						  			</div>	
						  			<div class="single-blogs-hotel-nomer">
						  				<?php _e( 'Номера', 'restx' ); ?>: 
											<?php if(rwmb_meta( 'meta-hotel-kottedg-has' )): ?>
												<span><?php _e( 'Коттеджи', 'restx' ); ?></span>
											<?php endif ?>
											<?php if(rwmb_meta( 'meta-hotel-lux-has' )): ?>
												<span><?php _e( 'Люксы', 'restx' ); ?></span>
											<?php endif ?>
											<?php if(rwmb_meta( 'meta-hotel-halflux-has' )): ?>
												<span><?php _e( 'Полулюксы', 'restx' ); ?></span>
											<?php endif ?>
											<?php if(rwmb_meta( 'meta-hotel-standart-has' )): ?>
												<span><?php _e( 'Стандарты', 'restx' ); ?></span>
											<?php endif ?>
											<?php if(rwmb_meta( 'meta-hotel-budget-has' )): ?>
												<span><?php _e( 'Бюджетные', 'restx' ); ?></span>
											<?php endif ?>
						  			</div>
					  			</div>
					  		</div>
				  		</a>
						<?php endwhile; endif; wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>