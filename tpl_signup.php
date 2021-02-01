<?php
/**
 * Template Name: Регистрация
 * Template Post Type: page
 *
 */

get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div class="container mx-auto px-2 lg:px-0 pt-20 lg:pt-12 lg:pb-12">
		<h1 class="text-3xl lg:text-5xl text-center uppercase mb-8"><span><?php _e( 'Регистрация', 'restx' ); ?></span></h1>
		<div class="flex flex-col lg:flex-row">
			<div class="w-full lg:w-2/5 mx-auto">
				<?php global $wpdb, $user_ID; 

				//Check whether the user is already logged in 
				if (!$user_ID) {
					// Default page shows register form. 
					// To show Login form set query variable action=login
					$action = (isset($_GET['action']) ) ? $_GET['action'] : 0;
					// Login Page
					if ($action === "login") { ?>


					<?php  
						
						$login = (isset($_GET['login']) ) ? $_GET['login'] : 0;
						if ( $login === "failed" ) {
							echo '<div class="register-error text-red-900 mb-2"><strong>ERROR:</strong> Invalid username and/or password.</div>';
						} elseif ( $login === "empty" ) {
							echo '<div class="register-error text-red-900 mb-2"><strong>ERROR:</strong> Username and/or Password is empty.</div>';
						} elseif ( $login === "false" ) {
							echo '<div class="register-error text-red-900 mb-2"><strong>ERROR:</strong> You are logged out.</div>';
						}

					?>

					<div class="col-md-5">
						<?php 
						$args = array(
							'redirect' => home_url().'/welcome/', 
						);

						wp_login_form($args); ?>

						<p class="text-center"><a class="mr-2" href="<?php echo wp_registration_url(); ?>">Register Now</a>
							<span clas="mx-2">·</span><a class="ml-2" href="<?php echo wp_lostpassword_url( ); ?>" title="Lost Password">Lost Password?</a></p>
					</div>

				<?php
				} else { // Register Page ?>

					<?php 
						if ( $_POST ) {
							$error = 0;
							$username = esc_sql($_REQUEST['username']); 
							if ( empty($username) ) {
								echo '<div class="register-error text-red-900 mb-2">'. _e("Поле Логин не должно быть пустым", "restx") .'</div>'; 
								$error = 1;
							}

							$email = esc_sql($_REQUEST['email']);
							if ( !preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email) ) { 
								echo '<div class="register-error text-red-900 mb-2">'. _e("Email введен некорректно", "restx") .'</div>';
								$error = 1;
							}

							if ( $error == 0 ) {
								$random_password = wp_generate_password( 12, false ); 
								$status = wp_create_user( $username, $random_password, $email ); 
								if ( is_wp_error($status) ) {
									echo '<div class="register-error text-red-900 mb-2">'. _e("Такой логин или email уже есть. Пожалуйста, введите что-то другое", "restx") .'</div>';
								} else {
									$from = 'Vidpochivai'; 
									$headers = 'Від: Vidpochivai'; 
									$subject = "Vidpochivai::Ви успішно зареєстровані"; 
									$message = "Ви зареєстровані.\nВаші дані для входу\nLogin: $username\nPassword: $random_password"; 
									// Email password and other details to the user
									wp_mail( $email, $subject, $message, $headers ); 
									echo _e("Пожалуйста, проверьте свой электронный адрес для получения данных для входа. Письмо может попасть в СПАМ", "restx"); 
									$error = 2; // We will check for this variable before showing the sign up form. 
								}
							}
						}

						if ( $error != 2 ) { ?> 
							<?php if(get_option('users_can_register')) { ?>
								<div class="w-full manual-register-form">
									<form action="" method="post"> 
										<p>
											<label for="user_login">Логин</label>
											<input type="text" name="username" placeholder="<?php _e('Какой у вас будет логин?', 'restx'); ?>" class="register-input mt-2 mb-4" value="<?php if( ! empty($username) ) echo $username; ?>" /><br />
										</p>
										<p> 
											<label for="user_email">Email</label>
											<input type="text" name="email" placeholder="<?php _e('Введите ваш email, туда прийдет пароль', 'restx'); ?>" class="register-input mb-4" value="<?php if( ! empty($email) ) echo $email; ?>" /> <br /> 
										</p>
										<input type="submit" id="register-submit-btn" class="mb-4" name="submit" value="<?php _e('Зарегистрироваться', 'restx'); ?>" /> 
									</form>

									<p><?php _e('Уже есть аккаунт','restx'); ?>? <a href="/welcome" class="blue-links"><?php _e('Войдите здесь','restx'); ?></a></p>
									</div>
								<?php } else {
									echo _e('Регистрация сейчас недоступна. Зайдите позже.', 'restx');
								}
							} ?>
						<?php }
					} 
				else { ?>

				<!-- Если уже залогинился -->
				<script>window.location.href = 'https://vidpochivai.com.ua/';</script>

				<?php } ?>
			</div>				
		</div>
	</div>

<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>