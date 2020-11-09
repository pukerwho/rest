<?php
/*
Template Name: Все города
*/
?>

<?php get_header(); ?>

<div class="allcity maincards">
	<div class="container ">
		<div class="row mb-5">
			<div class="col-md-12">
				<div class="d-flex flex-column align-items-center">
					<img src="<?php bloginfo('template_url') ?>/img/allcity.svg" width="80px" class="mb-5" alt="">
					<h1 class="text-uppercase text-center"><?php _e( 'Популярные курорты в Украине', 'restx' ); ?></h1>
				</div>
			</div>
		</div>
		<div class="row justify-content-center mb-5">
			<div class="col-md-9">
				<div>
					<?php the_content(); ?>	
				</div>
			</div>
		</div>
		<div class="row justify-content-center mb-5">
			<div class="tags d-flex">
				<li><a href="<?php echo get_page_url('tpl_karpaty') ?>" class="tag"><?php _e('Карпаты', 'restx'); ?></a></li>
				<li><a href="<?php echo get_page_url('tpl_blacksea') ?>" class="tag" style="background: rgba(255, 211, 29, 0.15);"><?php _e('Черное море', 'restx'); ?></a></li>
				<li><a href="<?php echo get_page_url('tpl_azovsea') ?>" class="tag" style="background: rgba(95, 126, 255, 0.15);"><?php _e('Азовское', 'restx'); ?></a></li>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-9">
				<?php $cities = get_terms( array (
          'taxonomy' => 'citylist',
          'orderby' => 'name',
          'menu_order' => false,
          'hide_empty' => true,
          'parent'   => 0,
          'meta_key' => '_crb_citylist_iscurort', 
          'meta_value' => 'yes'
        ));
				foreach ( $cities as $city ): ?>
					<div class="text-2xl allcity_item">
						<a href="<?php echo get_term_link($city); ?>">
							<?php echo $city->name; ?>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>