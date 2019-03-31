<?php
/*
Template Name: Главная страница
*/
?>

<?php get_header(); ?>

<?php get_template_part( 'blocks/welcome', 'default' ); ?>
<?php get_template_part( 'blocks/who', 'default' ); ?>
<?php get_template_part( 'blocks/maincards', 'default' ); ?>
<div class="pt-5">
	<?php get_template_part( 'blocks/newhotels', 'default' ); ?>	
</div>
<div class="pt-5">
	<?php get_template_part( 'blocks/b_rest', 'default' ); ?>	
</div>
<div class="pt-5">
	<?php get_template_part( 'blocks/popularhotels', 'default' ); ?>	
</div>
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
<div class="pt-5">
	<?php get_template_part( 'blocks/nearseahotels', 'default' ); ?>	
</div>
<div class="py-5">
	<?php get_template_part( 'blocks/b_youtube', 'default' ); ?>	
</div>
<div class="pt-5">
	<?php get_template_part( 'blocks/animalshotels', 'default' ); ?>	
</div>


<?php get_footer(); ?>