<?php
/*
Template Name: Главная страница
*/
?>

<?php get_header(); ?>

<?php get_template_part( 'blocks/welcome', 'default' ); ?>
<?php /* get_template_part( 'blocks/who', 'default' );  */ ?>
<?php get_template_part( 'blocks/maincards', 'default' ); ?>
<div class="pt-5">
	<?php get_template_part( 'blocks/b_rest', 'default' ); ?>	
</div>
<div class="pt-5">
	<?php get_template_part( 'blocks/popularhotels', 'default' ); ?>	
</div>
<!-- <div class="pc-show pt-5">
	<?php get_template_part( 'blocks/gocity', 'default' ); ?>	
</div> -->
<div class="py-5">
	<?php get_template_part( 'blocks/now-watch', 'default' ); ?>	
</div>
<div class="pt-5">
	<?php get_template_part( 'blocks/familyhotels', 'default' ); ?>	
</div>
<div class="py-5">
	<?php get_template_part( 'blocks/b_instagram', 'default' ); ?>	
</div>
<div class="pt-5">
	<?php get_template_part( 'blocks/premiumhotels', 'default' ); ?>	
</div>
<!-- <div class="pt-5">
	<?php /* get_template_part( 'blocks/nearseahotels', 'default' ); */ ?>	
</div> -->
<div class="py-5">
	<?php get_template_part( 'blocks/b_youtube', 'default' ); ?>	
</div>
<div class="pt-5">
	<?php get_template_part( 'blocks/animalshotels', 'default' ); ?>	
</div>

<div class="container pt-5">
	<div class="row">
		<div class="col-md-12">
			<div class="b_rest__text citylist__text">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; else: ?>
					<p><?php _e('Ничего не найдено'); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>