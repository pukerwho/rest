<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="single-blogs">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="single-blogs__img">
						<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<?php if(!carbon_get_the_post_meta('crb_blogs_whether')): ?>
				<div class="row justify-content-center">
					<div class="col-md-8 text-center">
						<div class="single-blogs__icon">
							<img src="<?php bloginfo('template_url') ?>/img/clipboard.svg" width="35px" alt="">
						</div>
					</div>
				</div>
			<?php endif ?>
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="single-blogs__title">
						<h1><?php the_title(); ?></h1>	
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-8">
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
		</div>
	</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>