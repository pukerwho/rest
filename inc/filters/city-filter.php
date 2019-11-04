<?php

add_action( 'wp_enqueue_scripts', 'city_filter_scripts' );
function city_filter_scripts() {
  wp_register_script( 'forms', get_template_directory_uri() . '/js/city_filter.js', '','',true);
  wp_localize_script( 'forms', 'filter_params', array(
    'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
    
    'selected' => $custom_query_city->selected,
    'city_id' => $custom_query_city->city_id,
    'price_sort' => $custom_query_city->price_sort,

    'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
  ) );
  wp_enqueue_script( 'forms' );
}

//city sort filter 
function city_sort_filter_function(){
  $city_id = $_POST['city_id'];
  $selected = $_POST['selected'];
  $filterargs = array(
    'post_type' => 'hotels',
    'orderby' => 'date',
    // 'meta_key'       => 'meta-hotel-mainrating',
  );

  if ($_POST['selected'] === 'date') {
    $filterargs = array(
      'post_type' => 'hotels',
      'posts_per_page' => -1,
      'orderby' => 'date',
    ); 
  }
  
  if ($_POST['selected'] === 'rating') {
    $filterargs = array(
      'post_type' => 'hotels',
      'posts_per_page' => -1,
      'orderby' => 'meta_value',
      'meta_key' => 'meta-hotel-mainrating',
    );
  }

  if ($_POST['selected'] === 'price') {
    $filterargs = array(
      'post_type' => 'hotels',
      'posts_per_page' => -1,
      'orderby' => 'meta_value',
      'meta_key' => 'meta-hotel-minprice',
      'order' => 'ASC',
    );
  }

  if ($_POST['city_id'] != '') { 
    $filterargs['tax_query'][] = array(
      'taxonomy' => 'citylist',
      'terms' => $city_id,
      'field' => 'term_id',
      'include_children' => true,
      'operator' => 'IN'
    );
  }

  $custom_query_city = new WP_Query( $filterargs );
  if ($custom_query_city->have_posts()) : while ($custom_query_city->have_posts()) : $custom_query_city->the_post();
    echo '<div class="col-md-4">';
    get_template_part( 'blocks/hotel-card', 'default' );
    echo '</div>';
  endwhile; 
  endif;
  die;
}

add_action('wp_ajax_city_sort_filter', 'city_sort_filter_function');
add_action('wp_ajax_nopriv_city_sort_filter', 'city_sort_filter_function');

//price sort 
function city_price_filter_function(){
  $selected = $_POST['selected'];
  $price_sort = $_POST['price_sort'];
  $city_id = $_POST['city_id'];

  if ($_POST['selected'] === 'price') {
    $filterargs = array(
      'post_type' => 'hotels',
      'posts_per_page' => -1,
      'orderby' => 'meta_value',
      'meta_key' => 'meta-hotel-minprice',
      'order' => $price_sort,
    ); 
  }

  if ($_POST['city_id'] != '') { 
    $filterargs['tax_query'][] = array(
      'taxonomy' => 'citylist',
      'terms' => $city_id,
      'field' => 'term_id',
      'include_children' => true,
      'operator' => 'IN'
    );
  }

  $custom_query_city = new WP_Query( $filterargs );
  if ($custom_query_city->have_posts()) : while ($custom_query_city->have_posts()) : $custom_query_city->the_post();
    echo '<div class="col-md-4">';
    get_template_part( 'blocks/hotel-card', 'default' );
    echo '</div>';
  endwhile; 
  endif;
  die;
}

add_action('wp_ajax_city_price_filter', 'city_price_filter_function');
add_action('wp_ajax_nopriv_city_price_filter', 'city_price_filter_function');

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