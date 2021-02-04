<?php
/*
Template Name: Профиль
*/
?>

<?php get_header(); ?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php if ( is_user_logged_in() ): ?>
		<?php global $current_user; ?>

		<div class="container mx-auto px-2 lg:px-0 pt-20 lg:pt-12 lg:pb-12">
			<div class="flex flex-col lg:flex-row mx-auto">

				
				<div class="w-full lg:w-3/12 lg:pr-6">
					<!-- Инфо Юзер -->
					<div class="mb-6" style="border-bottom: 1px solid #f0f0f0; padding-bottom: 20px;">
						<div class="text-lg"><?php echo $current_user->nickname; ?></div>
						<div class="opacity-75"><?php echo $current_user->user_email; ?></div>
					</div>
					<!-- Навигация -->
					<div class="profile-tabs text-lg">
						<div class="mb-2">
							<div class="profile-tab blue-links cursor-pointer" data-profile-tab="profile-tab-ads">
								<?php _e('Ваши объявления', 'restx'); ?>
							</div>
						</div>
						<div class="mb-2">
							<span class="profile-tab blue-links cursor-pointer" data-profile-tab="profile-tab-favorites">
								<?php _e('Избранное', 'restx'); ?>
							</span>
						</div>
						<div class="mb-2">
							<span class="profile-tab blue-links cursor-pointer" data-profile-tab="profile-tab-settings">
								<?php _e('Настройки', 'restx'); ?>
							</span>
						</div>
					</div>
					
				</div>
				<!-- END Навигация -->

				<!-- Информация -->
				<div class="w-full lg:w-9/12 lg:pl-6">

					<!-- Мои объявления -->
					<div class="profile-tab-content show" data-content-tab="profile-tab-ads">
						<div class="text-2xl"><?php _e('Мои объявления','restx'); ?></div>
					</div>
					<!-- END Мои объявления -->

					<!-- Избранные объявления -->
					<div class="profile-tab-content" data-content-tab="profile-tab-favorites">
						<div class="text-2xl"><?php _e('Избранное','restx'); ?></div>
					</div>
					<!-- END Избранные объявления -->

					<!-- Избранные объявления -->
					<div class="profile-tab-content" data-content-tab="profile-tab-settings">
						<div class="text-2xl"><?php _e('Настройки','restx'); ?></div>
					</div>
					<!-- END Избранные объявления -->

				</div>
				<!-- END Информация -->
			</div>
		</div>
	<?php else: ?>
		Вы не вошли
	<?php endif; ?>

<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>