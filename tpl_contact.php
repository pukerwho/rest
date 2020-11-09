<?php
/*
Template Name: Контакты
*/
?>

<?php get_header(); ?>

<div class="container contact mb-5">
	<div class="row mb-5">
		<div class="col-md-12">
			<div class="d-flex flex-column align-items-center">
				<img src="<?php bloginfo('template_url') ?>/img/hi.svg" width="80px" class="mb-5" alt="">
				<h1 class="text-uppercase text-center mb-4"><?php _e( 'Наши контакты', 'restx' ); ?></h1>
				<div class="text-center">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row d-flex justify-content-center contact_info">
		<div class="col-md-4">
			<h3 class="mb-4">
				Позвоните нам:
			</h3>
			<div class="mb-5">
				<li><a href="tel:099-77-13-997">099-77-13-997</a></li>
				<li><a href="tel:098-35-00-394">098-35-00-394</a></li>
			</div>
			<h3 class="mb-4">
				Напишите нам:
			</h3>
			<div class="mb-5">
				<li><a href="mailto:partner@vidpochivai.com.ua">partner@vidpochivai.com.ua</a></li>
			</div>
		</div>
		<div class="col-md-6">
			<form name="contacts">
				<div class="d-flex flex-column mb-3">
					<input type="text" name="Имя" placeholder="<?php _e('Имя или телефон', 'restx'); ?>" class="input-with-icon" required>
	        <textarea name="Сообщение" id="" rows="5" placeholder="Сообщение" class="w-full"></textarea>
	      </div>
					<button type="submit" class="btn-rest btn-rest-dark d-flex align-items-center">
	          <span class="mr-4"><?php _e('Отправить', 'restx'); ?></span>
	          <img src="<?php bloginfo('template_url'); ?>/img/white-arrow.svg" width="12px" class="mt-1">
	        </button>
	      </div>
			</form>
		</div>
		<div class="notice success_contact">
			<div class="notice_content notice_green">
				Спасибо за ваше сообщение.
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>