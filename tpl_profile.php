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

				<!-- Навигация -->
				<div class="w-full lg:w-3/12">
					<div>
						<div>
							<?php _e('Ваши объявления', 'restx'); ?>
						</div>
						<div>
							<?php _e('Избранное', 'restx'); ?>
						</div>
						<div>
							<?php _e('Настройки', 'restx'); ?>
						</div>
					</div>
					
				</div>
				<!-- END Навигация -->

				<!-- Информация -->
				<div class="w-full lg:w-9/12">
					<?php 
						// echo $current_user->nickname;
						// echo $current_user->id;
					?>

					<!-- Избранные объявления -->
					Избранное
					<!-- END Избранные объявления -->

					<!-- Комментарии пользователя -->
					<div class="mb-6">
						<?php
				    $args = array(
			        'user_id' => $current_user->id,
			        'number' => 10, // how many comments to retrieve
			        'status' => 'approve'
		        );
				    $comments = get_comments( $args );
				    if ( $comments ): ?>
				    	<?php foreach ($comments as $comment): ?>

				    		<!-- Дата комментария -->
				    		<div>
				    			<a href="<?php echo get_comment_link( $comment->comment_ID ); ?>" class="blue-links">
				    				<?php echo get_comment_date("j/n/Y", $comment->comment_ID) ?>
				    			</a>
				    		</div>
				    		<!-- END Дата комментария -->

				    		<!-- Текст комментария -->
				    		<?php echo $comment->comment_content; ?>
				    		<!-- END Текст комментария -->

				      <?php endforeach; ?>
				    <?php else: ?>
				    	Комментов нет
				    <?php endif; ?>
				  </div>
				  <!-- END Комментарии пользователя -->
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