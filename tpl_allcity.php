<?php
/*
Template Name: Все города
*/
?>

<?php get_header(); ?>

<div class="allcity maincards py-12">
	<div class="container mx-auto px-2 lg:px-0">
		<div class="flex mb-8">
			<div class="w-full">
				<div class="flex flex-col items-center">
					<img src="<?php bloginfo('template_url') ?>/img/allcity.svg" width="80" class="mb-5" alt="">
					<h1 class="uppercase text-center"><?php _e( 'Популярные курорты в Украине', 'restx' ); ?></h1>
				</div>
			</div>
		</div>
		<div class="flex justify-center mb-8">
			<div class="w-full lg:w-8/12">
				<div>
					<?php the_content(); ?>	
				</div>
			</div>
		</div>
		<div class="flex justify-center mb-5">
			<div class="tags w-full flex flex-col justify-center lg:flex-row text-md lg:-mx-2">
				<li class="mb-3 lg:px-1"><a href="<?php echo get_page_url('tpl_karpaty') ?>" class="tag px-6 py-4 rounded-lg"><?php _e('Карпаты', 'restx'); ?></a></li>
				<li class="mb-3 lg:px-1"><a href="<?php echo get_page_url('tpl_blacksea') ?>" class="tag px-6 py-4 rounded-lg" style="background: rgba(255, 211, 29, 0.15);"><?php _e('Черное море', 'restx'); ?></a></li>
				<li class="mb-3 lg:px-1"><a href="<?php echo get_page_url('tpl_azovsea') ?>" class="tag px-6 py-4 rounded-lg" style="background: rgba(95, 126, 255, 0.15);"><?php _e('Азовское', 'restx'); ?></a></li>
			</div>
		</div>
		<div class="flex justify-center">
			<div class="w-full lg:w-8/12">
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