<?php
/*
Template Name: Выбрать тариф
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="container">
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
	<div class="row mb-5">
		<div class="col-md-4 text-center">
			<div class="p_partner__box">
				<div class="p_partner__subtitle mb-4">
					<?php _e( 'Базовый', 'restx' ); ?>
				</div>
				<div>
					<img src="<?php bloginfo('template_url') ?>/img/growth.svg" alt="" width="55px" class="mb-5">
				</div>
				<div class="p_partner__text">
					0 грн
				</div>
				<div class="mb-5">
					<?php _e( 'за год', 'restx' ); ?>
				</div>
				<div class="p_partner__list mb-5">
					<li class="mb-3"><?php _e( 'Размещение жилья', 'restx' ); ?></li>
					<li class="mb-3"><?php _e( 'До 5 фотографий', 'restx' ); ?></li>
					<li class="mb-3">500-1000 <?php _e( 'просмотров за месяц', 'restx' ); ?></li>
				</div>
				<a href="#" data-toggle="modal" data-target="#budgetModal" class="text-dark">
					<div class="btn bg-pastel-green">
						<?php _e( 'Выбрать', 'restx' ); ?>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-4 text-center">
			<div class="p_partner__box">
				<div class="p_partner__subtitle mb-4">
					<?php _e( 'Стандарт', 'restx' ); ?>
				</div>
				<div>
					<img src="<?php bloginfo('template_url') ?>/img/startup.svg" alt="" width="55px" class="mb-5">
				</div>
				<div class="p_partner__text">
					800 грн
				</div>
				<div class="mb-5">
					<?php _e( 'за год', 'restx' ); ?>
				</div>
				<div class="p_partner__list mb-5">
					<li class="mb-3"><?php _e( 'Размещение жилья', 'restx' ); ?></li>
					<li class="mb-3"><?php _e( 'До 15 фотографий', 'restx' ); ?></li>
					<li class="mb-3"><?php _e( 'Техническая поддержка', 'restx' ); ?></li>
					<li class="mb-3">2500-5000 <?php _e( 'просмотров за месяц', 'restx' ); ?></li>
				</div>
				<a href="#" data-toggle="modal" data-target="#standartModal" class="text-dark">
					<div class="btn bg-pastel-red">
						<?php _e( 'Выбрать', 'restx' ); ?>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-4 text-center">
			<div class="p_partner__box">
				<div class="p_partner__subtitle mb-4">
					<?php _e( 'Премиум', 'restx' ); ?>
				</div>
				<div>
					<img src="<?php bloginfo('template_url') ?>/img/diamond.svg" alt="" width="55px" class="mb-5">
				</div>
				<div class="p_partner__text">
					1500 грн
				</div>
				<div class="mb-5">
					<?php _e( 'за год', 'restx' ); ?>
				</div>
				<div class="p_partner__list mb-5">
					<li class="mb-3"><?php _e( 'Размещение жилья', 'restx' ); ?></li>
					<li class="mb-3"><?php _e( 'До 60 фотографий', 'restx' ); ?></li>
					<li class="mb-3"><?php _e( 'Техническая поддержка', 'restx' ); ?></li>
					<li class="mb-3"><?php _e( 'Ссылка на ваш сайт', 'restx' ); ?></li>
					<li class="mb-3"><?php _e( 'Реклама в наших соцсетях', 'restx' ); ?></li>
					<li class="mb-3"><?php _e( 'Упоминание в e-mail рассылке', 'restx' ); ?></li>
					<li class="mb-3">7000-10000 <?php _e( 'просмотров за месяц', 'restx' ); ?></li>
				</div>
				<a href="#" data-toggle="modal" data-target="#premiumModal" class="text-dark">
					<div class="btn bg-pastel-blue">
						<?php _e( 'Выбрать', 'restx' ); ?>
					</div>
				</a>
			</div>
		</div>
	</div>
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