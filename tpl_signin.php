<?php
/**
 * Template Name: Вход
 * Template Post Type: page
 *
 */

get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="container mx-auto px-2 lg:px-0 pt-20 lg:pt-12 lg:pb-12">
	<h1 class="text-3xl lg:text-5xl text-center uppercase mb-8"><span><?php _e( 'Вход', 'restx' ); ?></span></h1>
	<div class="flex flex-col lg:flex-row">
		<div class="w-full lg:w-2/5 mx-auto">

			<?php if ( is_user_logged_in() ) { ?>
				<!-- Если уже залогинился -->
				<script>window.location.href = 'https://vidpochivai.com.ua/';</script>
			<?php } else { 
				 wp_login_form( 
					 array(
							'echo'           => true,
							// Default 'redirect' value takes the user back to the request URI.
							'redirect'       => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
							'form_id'        => 'loginform',
							'label_username' => __( 'Your Username' ),
							'label_password' => __( 'Your Password' ),
							'label_remember' => __( 'Remember Me' ),
							'label_log_in'   => __( 'Log In' ),
							'id_username'    => 'user_login',
							'id_password'    => 'user_pass',
							'id_remember'    => 'rememberme',
							'id_submit'      => 'wp-submit',
							'remember'       => true,
							'value_username' => '',
							// Set 'value_remember' to true to default the "Remember me" checkbox to checked.
							'value_remember' => false,
						)
					);
			  }			
			?>

			<?php endwhile; else: ?>
				<p><?php _e('Ничего не найдено'); ?></p>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>