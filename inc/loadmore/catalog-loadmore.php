<?php

function loadmore_ajax_handler_catalog(){
  // prepare our arguments for the query
  $args = json_decode( stripslashes( $_POST['query'] ), true );
  $args['paged'] = $_POST['page'] + 1; 
  $args['post_status'] = 'publish';
  $args['post_type'] = 'hotels';
  $cityname = $_POST['cityname'];
  $catalog_price_min = $_POST['catalog_price_min'];
  $catalog_price_max = $_POST['catalog_price_max'];
  $catalog_args = array( 
  	'post_type' => 'hotels', 
  	'posts_per_page' => 24, 
  	'paged' => $args['paged'], 
  	'orderby' => 'meta_value', 
  	'meta_key' => 'meta-hotel-mainrating',
  	'meta_query' => array(
	    'relation' => 'OR',
	    array(
	      'relation' => 'AND',
	      array(
	        'key'     => 'meta-hotel-minprice',
	        'value'   => $catalog_price_max,
	        'compare' => '<=', 
	        'type'    => 'NUMERIC',
	      ),
	      array(
	        'key'     => 'meta-hotel-maxprice',
	        'value'   => $catalog_price_min,
	        'compare' => '>=', 
	        'type'    => 'NUMERIC',
	      )
	    ),
	  )
  );
  if ($cityname != '') {
  	$catalog_args['tax_query'][] = array(
      'taxonomy' => 'citylist',
      'terms' => $cityname,
      'field' => 'term_id',
      'include_children' => true,
      'operator' => 'IN'
    );
  }
  
  query_posts( $args );
  $custom_query_catalog = new WP_Query( $catalog_args );
  
  if ($custom_query_catalog->have_posts()) : while ($custom_query_catalog->have_posts()) : $custom_query_catalog->the_post();
    echo '<div class="col-md-12 col-lg-3">';
    get_template_part( 'blocks/hotel-card', 'default' );
    echo '</div>';
  endwhile; 
  endif;
  die;
}

add_action('wp_ajax_loadmore__catalog', 'loadmore_ajax_handler_catalog');
add_action('wp_ajax_nopriv_loadmore__catalog', 'loadmore_ajax_handler_catalog');

?>