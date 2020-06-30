<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="wow wow_single">
		<div class="container py-5">
			<div class="row mb-2">
				<div class="col-md-12">
					<div class="single-blogs__breadcrumb d-flex mb-5">
						<div class="breadcrumbs" itemprop="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
				      <ul>
								<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
									<a itemprop="item" href="<?php echo home_url(); ?>">
										<span itemprop="name"><?php _e( 'Главная', 'restx' ); ?></span>
									</a>                        
									<meta itemprop="position" content="1">
								</li>
								<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
									<a itemprop="item" href="<?php echo get_post_type_archive_link('wow'); ?>">
										<span itemprop="name"><?php _e( 'Впечатления', 'restx' ); ?></span>
									</a>                        
									<meta itemprop="position" content="2">
								</li>
				        <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
										<span itemprop="name"><?php the_title(); ?></span>
									<meta itemprop="position" content="3">
				        </li>
				      </ul>
				    </div>
					</div>
				</div>
			</div>
			<div class="row mb-5">
				<div class="col-md-12">
					<h1><?php the_title(); ?></h1>
				</div>
			</div>
			<div class="row mb-5">
				<div class="col-md-12">
					<div class="wow_gallery">
						<?php 
							$wow_photos = carbon_get_the_post_meta('crb_wow_gallery');
							foreach ( $wow_photos as $wow_photo ): ?>
								<div class="wow_gallery_item">
									<?php $photo_src = wp_get_attachment_image_src($wow_photo, 'large'); ?>
									<a href="<?php echo $photo_src[0]; ?>" data-lightbox="wow-gallery" data-title="<?php the_title(); ?>">
										<img src="<?php echo $photo_src[0]; ?>" loading="lazy">
									</a>
								</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="row mb-5">
				<div class="col-md-4">
					<div class="wow_subtitle">
						<?php _e( 'Описание', 'restx' ); ?>
					</div>
				</div>
				<div class="col-md-8">
					<div class="wow_content pt-3">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
			<div class="row mb-5">
				<div class="col-md-4">
					<div class="wow_subtitle">
						<?php _e( 'Расположение', 'restx' ); ?>
					</div>
				</div>
				<div class="col-md-8">
					<div class="wow_content pt-3">
						<?php echo carbon_get_the_post_meta('crb_wow_map'); ?>
					</div>
				</div>
			</div>
			<div class="row mb-5">
				<div class="col-md-4">
					<div class="wow_subtitle">
						<?php _e( 'Отзывы', 'restx' ); ?>
					</div>
				</div>
				<div class="col-md-8">
					<div class="wow_content pt-3">
						<?php get_template_part('blocks/custom_comments'); ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 mb-5">
					<div class="wow_subtitle text-center">
						<?php _e( 'Есть много всего интересного', 'restx' ); ?>!
					</div>
				</div>
				<?php 
					$current_id = get_the_ID();
					$query = new WP_Query( array( 
						'post_type' => 'wow', 
						'posts_per_page' => 4,
						'post__not_in' => array($current_id),
						'order'    => 'DESC',
					) );
				if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
					<div class="col-md-3 mb-5">
						<a href="<?php the_permalink(); ?>">
							<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="" class="wow_archive_thumb mb-3">
							<div class="wow_archive_name">
								<?php the_title(); ?>
							</div>
						</a>
					</div>
				<?php endwhile; endif; wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>