<?php
/*
Template Name: Все города
*/
?>

<?php get_header(); ?>

<div class="maincards">
	<div class="maincards__grid">
		<?php $citylists = get_terms( array( 'taxonomy' => 'citylist', 'parent' => 0 ) );
		foreach ( $citylists as $citylist ): ?>
		<div class="maincards__item">
			<a href="<?php echo get_term_link($citylist); ?>">
				<div class="maincards__item__card" style="background: url('<?php echo carbon_get_term_meta($citylist->term_id, 'crb_citylist_img' ); ?>')">
					<div class="maincards__item__card__title">
						<?php echo $citylist->name ?>
					</div>
				</div>
			</a>
		</div>
		<?php endforeach; ?>
	</div>
</div>

<?php get_footer(); ?>