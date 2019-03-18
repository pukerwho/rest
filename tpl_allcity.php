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
					<h1 class="text-uppercase text-center">Отдых в Украине.<br>Куда поехать?</h1>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="maincards__grid">
					<?php $citylists = get_terms( array( 'taxonomy' => 'citylist', 'parent' => 0, 'hide_empty' => false ) );
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
		</div>
	</div>
</div>

<?php get_footer(); ?>