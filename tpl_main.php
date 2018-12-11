<?php
/*
Template Name: Главная страница
*/
?>

<?php get_header(); ?>

<?php get_template_part( 'blocks/welcome', 'default' ); ?>
<?php get_template_part( 'blocks/who', 'default' ); ?>
<?php get_template_part( 'blocks/maincards', 'default' ); ?>
<div class="py-5">
	<?php get_template_part( 'blocks/newhotels', 'default' ); ?>	
</div>
<div class="py-5">
	<?php get_template_part( 'blocks/popularhotels', 'default' ); ?>	
</div>


<?php get_footer(); ?>