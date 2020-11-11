<?php
	//Шорткод для вывода страницы по ID
	function addBlogPage($atts) {
		$params = shortcode_atts( array(
			'id' => 1,
		), $atts );
		ob_start();
    ?>
    	<?php 
    		$shortcode_blog_title = get_the_title($params['id']); 
    		$shortcode_blog_img = get_the_post_thumbnail_url( $params['id'], 'thumbnail' );
    		$shortcode_blog_date = get_the_date( 'j/n/Y', $params['id'] );
    		$shortcode_blog_permalink = get_the_permalink($params['id']);
    		
    		$post_author_id = get_post_field( 'post_author', $params['id'] );
    		$post_author_name = get_the_author_meta( 'user_nicename', $post_author_id );
    	?>
    	<div class="my-4">
    		<a href="<?php echo $shortcode_blog_permalink; ?>" class="shortcode_blog">
    			<div class="shortcode_blog_photo">
    				<img src="<?php echo $shortcode_blog_img; ?>" alt="<?php echo $shortcode_blog_title; ?>">
    			</div>
    			<div class="shortcode_blog_content">
    				<div class="shortcode_blog_title">
    					<?php echo $shortcode_blog_title; ?>
    				</div>
    				<div class="shortcode_blog_meta">
    					<span><?php _e('Автор', 'restx'); ?>:</span> <?php echo $post_author_name; ?>; <span><?php _e('Дата', 'restx'); ?>:</span> <?php echo $shortcode_blog_date; ?>
    				</div>
    			</div>
    		</a>
    	</div>
    <?php
    $out = ob_get_clean();
    wp_reset_postdata();
    return $out;
	}
	add_shortcode( 'add_blog_page', 'addBlogPage' );

	function addHotelPage($atts) {
		$params_hotel = shortcode_atts( array(
			'id' => 1,
			'text' => 'Hello',
		), $atts );
		ob_start();
    ?>
    	<div class="shortcode_hotel_title my-5">
    		<div class="shortcode_hotel_title mb-2">
    			<a href="<?php echo get_the_permalink($params_hotel['id']); ?>">
    				<?php echo get_the_title($params_hotel['id']); ?>	
    			</a>
    		</div>
    		<div class="shortcode_hotel_address mb-4">
    			<?php echo rwmb_meta( 'meta-hotel-address', null, $params_hotel['id'] ); ?>	
    		</div>
    		<div class="shortcode_hotel_img mb-4">
    			<img src="<?php echo get_the_post_thumbnail_url( $params_hotel['id'], 'large' ); ?>" alt="">
    		</div>
  			<p class="mb-4">
  				<?php echo $params_hotel['text']; ?>
  			</p>
  			<div class="shortcode_hotel_btn d-flex align-items-center">
	  			<a href="<?php echo get_the_permalink($params_hotel['id']); ?>" class="btn-rest btn-rest-yellow d-flex align-items-center">
	    			<span class="mr-3"><?php _e('Подробнее', 'restx'); ?></span>
            <img src="<?php bloginfo('template_url'); ?>/img/arrow.svg" width="15px">
	    		</a>	
  			</div>
    	</div>
    <?php
    $out = ob_get_clean();
    wp_reset_postdata();
    return $out;
	}
	add_shortcode( 'add_hotel_page', 'addHotelPage' );
?>