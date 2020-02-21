<?php
/*
Template Name: Выбрать тариф
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="container mt-5">
	<div class="row mb-5">
		<div class="col-md-12">
			<div class="d-flex flex-column align-items-center">
				<img src="<?php bloginfo('template_url') ?>/img/clipboard.svg" width="80px" class="mb-5" alt="">
				<h1 class="text-uppercase text-center"><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
	<div class="row justify-content-center mb-5">
		<div class="col-md-8">
			<div class="addnew__content">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
	<?php get_template_part('blocks/partner/tarifs', 'restx'); ?>
</div>

<!-- Modal Бюджет тариф -->
<div class="modal fade" id="budgetModal" tabindex="-1" role="dialog" aria-labelledby="budgetModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><?php _e( 'Тариф Базовый', 'restx' ); ?></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="modal-body-budget">
	      	<?php echo do_shortcode('[contact-form-7 id="2226" title="Тариф Базовый"]') ?>	
      	</div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Стандартный тариф -->
<div class="modal fade" id="standartModal" tabindex="-1" role="dialog" aria-labelledby="standartModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><?php _e( 'Тариф Стандартный', 'restx' ); ?></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="modal-body-standart">
	      	<?php echo do_shortcode('[contact-form-7 id="2227" title="Тариф Стандарт"]') ?>	
      	</div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Премиум тариф -->
<div class="modal fade" id="premiumModal" tabindex="-1" role="dialog" aria-labelledby="premiumModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><?php _e( 'Тариф Премиум', 'restx' ); ?></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="modal-body-premium">
	      	<?php echo do_shortcode('[contact-form-7 id="2228" title="Тариф Премиум"]') ?>	
      	</div>
      </div>
    </div>
  </div>
</div>


<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>