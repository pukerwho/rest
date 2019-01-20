<?php
/*
Template Name: Каталог
*/
?>

<?php get_header(); ?>


<?php
$post_type = 'cities';
$taxonomy  = 'collections';
$terms     = get_terms( $taxonomy );
?>
<?php
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
	foreach ( $terms as $term ) { ?>

        <h2><?php echo $term->name; ?></h2>

		<?php
		$args = array(
			'post_type'      => $post_type,
			'posts_per_page' => - 1,
			'tax_query'      => array(
				array(
					'taxonomy' => $taxonomy,
					'field'    => 'slug',
					'terms'    => $term->slug,
					'operator' => 'IN'
				)
			),
		);
		$q = new WP_Query( $args );
		if ( $q->have_posts() ) : ?>

			<?php while ( $q->have_posts() ) : $q->the_post(); ?>

				<?php the_title(); ?>

			<?php endwhile; ?>

		<?php endif; ?>

		<?php wp_reset_query(); ?>

	<?php }
}

?>

<div class="container">
	<div class="row">
	
		<?php 
		  $custom_query = new WP_Query( array( 'post_type' => 'hotels') );
		  if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
				<div class="col-md-3">
					<?php get_template_part( 'blocks/hotel-card', 'default' ); ?>
				</div>
			<?php endwhile; endif; ?>
	</div>
</div>

<?php get_footer(); ?>