<?php

//city filter
function city_hotels_filter_function(){
  $filterargs = array(
    'post_type' => 'hotels',
    'posts_per_page' => 24,
    'orderby'        => 'meta_value',
    'meta_key'       => 'meta-hotel-mainrating',
    'meta_query' => array(
      'relation' => 'OR',
      array(
        'relation' => 'AND',
        array(
          'key'     => 'meta-hotel-minprice',
          'value'   => $_POST['b_filter_price_max'],
          'compare' => '<=', 
          'type'    => 'NUMERIC',
        ),
        array(
          'key'     => 'meta-hotel-maxprice',
          'value'   => $_POST['b_filter_price_min'],
          'compare' => '>=', 
          'type'    => 'NUMERIC',
        )
      ),
    )
  );
  if ($_POST['citynamefilter'] != '') { 
    $filterargs['tax_query'][] = array(
      'taxonomy' => 'citylist',
      'terms' => $_POST['citynamefilter'],
      'field' => 'term_id',
      'include_children' => true,
      'operator' => 'IN'
    );
  }

  if ($_POST['budgetfilter'] != '') { 
    $filterargs['meta_query'][] = array(
      'key'     => 'meta-hotel-budget-has',
      'value'   => $_POST['budgetfilter'],
      'compare' => '=', 
    );
  }
  if ($_POST['halfluxfilter'] != '') { 
    $filterargs['meta_query'][] = array(
      'key'     => 'meta-hotel-halflux-has',
      'value'   => $_POST['halfluxfilter'],
      'compare' => '=', 
    );
  }
  if ($_POST['luxfilter'] != '') { 
    $filterargs['meta_query'][] = array(
      'key'     => 'meta-hotel-lux-has',
      'value'   => $_POST['luxfilter'],
      'compare' => '=', 
    );
  }
  if ($_POST['citylistfilter'] != '') { 
    $filterargs['tax_query'][] = array(
      'taxonomy' => 'citylist',
      'terms' => $_POST['citylistfilter'],
      'field' => 'term_id',
      'include_children' => true,
      'operator' => 'IN'
    );
  }
  if ($_POST['collectionsfilter'] != '') { 
    $filterargs['tax_query'][] = array(
      'taxonomy' => 'collections',
      'terms' => $_POST['collectionsfilter'],
      'field' => 'slug',
      'include_children' => true,
      'operator' => 'AND'
    );
  }

  $custom_query_afisha = new WP_Query( $filterargs );
  if ($custom_query_afisha->have_posts()) : while ($custom_query_afisha->have_posts()) : $custom_query_afisha->the_post();
    echo '<div class="col-md-12 col-lg-3">';
    get_template_part( 'blocks/hotel-card', 'default' );
    echo '</div>';
  endwhile; 
  endif;
  die;
}
 
add_action('wp_ajax_my_city_filter', 'city_hotels_filter_function'); 
add_action('wp_ajax_nopriv_my_city_filter', 'city_hotels_filter_function');


?>