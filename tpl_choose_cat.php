<?php
/*
Template Name: Выбрать категорию
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="custom-page">
	<div class="container py-5">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center"><?php the_title(); ?></h1>
			</div>
		</div>
		<div class="row justify-center">
			<div class="col-md-6 text-center ">
				<div class="p_partner__box">
					<div>
						<img src="<?php bloginfo('template_url') ?>/img/house.svg" alt="" width="55px" class="mb-5">
					</div>
					<div class="p_partner__subtitle mb-5">
						<?php _e( 'Аренда жилья', 'restx' ); ?>
					</div>
					<a href="<?php echo get_page_url( 'tpl_partner' ); ?>" class="text-dark">
						<div class="btn bg-pastel-green">
							<?php _e( 'Далее', 'restx' ); ?>
						</div>
					</a>
				</div>
			</div>
			<div class="col-md-6 text-center ">
				<div class="p_partner__box">
					<div>
						<img src="<?php bloginfo('template_url') ?>/img/bus.svg" alt="" width="55px" class="mb-5">
					</div>
					<div class="p_partner__subtitle mb-5">
						<?php _e( 'Пассажирские перевозки', 'restx' ); ?>
					</div>
					<a href="<?php echo get_page_url( 'tpl_bus_form' ); ?>" class="text-dark">
						<div class="btn bg-pastel-blue">
							<?php _e( 'Далее', 'restx' ); ?>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>