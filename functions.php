<?php
// Include your functions files here
include('inc/enqueues.php');
// Add your theme support ( cf :  http://codex.wordpress.org/Function_Reference/add_theme_support )
function customThemeSupport() {
    global $wp_version;
    load_theme_textdomain( 'restx', get_template_directory() . '/languages' );
    add_theme_support( 'menus' );
    add_theme_support( 'post-thumbnails' );
    // let wordpress manage the title
    add_theme_support( 'title-tag' );
    add_theme_support( 'caption' );
    add_theme_support( 'gallery' );
    //add_theme_support( 'custom-background', $args );
    //add_theme_support( 'custom-header', $args );
    // Automatic feed links compatibility
    if( version_compare( $wp_version, '3.0', '>=' ) ) {
        add_theme_support( 'automatic-feed-links' );
    } else {
        automatic_feed_links();
    }
}
add_action( 'after_setup_theme', 'customThemeSupport' );
// Content width
if( !isset( $content_width ) ) {
    // @TODO : edit the value for your own specifications
    $content_width = 960;
}

/**
 * Get the bootstrap!
 * (Update path to use cmb2 or CMB2, depending on the name of the folder.
 * Case-sensitive is important on some systems.)
 */
require_once __DIR__ . '/inc/cmb2/init.php';
require_once __DIR__ . '/inc/CMB2-Post-Search-field/lib/init.php';
require_once get_template_directory() . '/inc/carbon-fields/carbon-fields-plugin.php';
require_once get_template_directory() . '/inc/custom-fields/citylist-meta.php';
require_once get_template_directory() . '/inc/custom-fields/post-meta.php';
require_once get_template_directory() . '/inc/custom-fields/page-meta.php';
require_once get_template_directory() . '/inc/hotels/meta.php';
require_once get_template_directory() . '/inc/filters/catalog-filter.php';
require_once get_template_directory() . '/inc/filters/city-filter.php';
require_once get_template_directory() . '/inc/loadmore/catalog-loadmore.php';

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

function itsme_disable_feed() {
 wp_die( __( 'No feed available, please visit the <a href="'. esc_url( home_url( '/' ) ) .'">homepage</a>!' ) );
}

add_action('do_feed', 'itsme_disable_feed', 1);
add_action('do_feed_rdf', 'itsme_disable_feed', 1);
add_action('do_feed_rss', 'itsme_disable_feed', 1);
add_action('do_feed_rss2', 'itsme_disable_feed', 1);
add_action('do_feed_atom', 'itsme_disable_feed', 1);
add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );

register_nav_menus( array(
  'head_menu' => 'Главное меню',
) );

// Register sidebars
function registerThemeSidebars() {
    if( !function_exists( 'register_sidebar' ) ) {
        return;
    }
    register_sidebar( array(
        'name' => 'Main sidebar',
        'id' => 'main-sidebar',
        'description' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'registerThemeSidebars' );
function addAdminEditorStyle() {
    add_editor_style( get_stylesheet_directory_uri() . 'css/editor-style.css' );
};
// подключаем файлы со стилями
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );
function theme_name_scripts() {
    wp_enqueue_style( 'editor-style', get_stylesheet_directory_uri() . '/css/style.css', false, time() );
    wp_enqueue_style( 'jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css', false, time() );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script('comment-reply');
    wp_enqueue_script( 'jquery-ui-core' );
    wp_enqueue_script( 'jquery-ui-touch-punch', get_template_directory_uri() . '/js/jquery-ui-touch-punch.min.js', '','',true);
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js','','',true);
    wp_enqueue_script( 'jquery.serialize-object', get_template_directory_uri() . '/js/jquery.serialize-object.min.js','','',true);
    wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/js/lightbox.min.js','','',true);
    wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/swiper.min.js','','',true);
    wp_enqueue_script( 'add_hotel_ajax', get_template_directory_uri() . '/js/add_hotel_ajax.js','','',true);
    wp_enqueue_script( 'animate-puk', get_template_directory_uri() . '/js/animate-puk.js','','',true);
    wp_register_script( 'loadmore__catalog', get_stylesheet_directory_uri() . '/js/loadmore_catalog.js', array('jquery') );
    wp_enqueue_script( 'myscripts', get_template_directory_uri() . '/js/scripts.js', '','',true);
 
    wp_localize_script( 'loadmore__catalog', 'loadmore_params__catalog', array(
        'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
        'posts' => json_encode( $custom_query_catalog->query_vars ), // everything about your loop is here
        'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
        'max_page' => $custom_query_catalog->max_num_pages,
        'cityname' => $custom_query_catalog->cityname,
        'catalog_price_min' => $custom_query_catalog->catalog_price_min,
        'catalog_price_max' => $custom_query_catalog->catalog_price_max,
    ) );

    wp_enqueue_script( 'loadmore__catalog');
};

//подключаем стили к админке
function load_custom_wp_admin_style() {
        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/css/admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );


function create_post_type() {
  register_post_type( 'hotels',
    array(
      'labels' => array(
          'name' => __( 'Hotels' ),
          'singular_name' => __( 'Hotel' )
      ),
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,
      'show_in_rest' => false,
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
    )
  );
  register_post_type( 'webcamers',
    array(
      'labels' => array(
          'name' => __( 'Вебкамеры' ),
          'singular_name' => __( 'Вебкамера' )
      ),
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    )
  );
  register_post_type( 'blogs',
    array(
      'labels' => array(
          'name' => __( 'Блог' ),
          'singular_name' => __( 'Блог' )
      ),
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    )
  );
  register_post_type( 'way',
    array(
      'labels' => array(
          'name' => __( 'Направления' ),
          'singular_name' => __( 'Направление' )
      ),
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    )
  );
  register_post_type( 'wow',
    array(
      'labels' => array(
          'name' => __( 'Впечатления' ),
          'singular_name' => __( 'Впечатление' )
      ),
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    )
  );
  register_post_type( 'post_comment',
    array(
      'labels' => array(
          'name' => __( 'Страницы-Комменты' ),
          'singular_name' => __( 'Страницы-Комменты' )
      ),
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    )
  );
}
add_action( 'init', 'create_post_type' );

add_action('init', 'create_taxonomy');
function create_taxonomy(){
  register_taxonomy('collections', array('hotels'), array(
    'label'                 => '', // определяется параметром $labels->name
    'labels'                => array(
      'name'              => 'Подборки',
      'singular_name'     => 'Подборка',
      'search_items'      => 'Поиск подборки',
      'all_items'         => 'Все подборки',
      'view_item '        => 'Посмотреть подборку',
      'parent_item'       => 'Родительская подборка',
      'parent_item_colon' => 'Родительская подборка:',
      'edit_item'         => 'Редактировать подборку',
      'update_item'       => 'Одновить подборку',
      'add_new_item'      => 'Добавить',
      'new_item_name'     => 'Новая',
      'menu_name'         => 'Подборки',
    ),
    'description'           => '', // описание таксономии
    'public'                => true,
    'publicly_queryable'    => null, // равен аргументу public
    'show_in_nav_menus'     => true, // равен аргументу public
    'show_ui'               => true, // равен аргументу public
    'show_in_menu'          => true, // равен аргументу show_ui
    'show_tagcloud'         => true, // равен аргументу show_ui
    'show_in_rest'          => true, // добавить в REST API
    'rest_base'             => null, // $taxonomy
    'hierarchical'          => true,
    'update_count_callback' => '',
    //'query_var'             => $taxonomy, // название параметра запроса
    'capabilities'          => array(),
    'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
    'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
    '_builtin'              => false,
    'show_in_quick_edit'    => null, // по умолчанию значение show_ui
  ) );

  register_taxonomy('blog-categories', array('blogs'), array(
    'label'                 => '', // определяется параметром $labels->name
    'labels'                => array(
      'name'              => 'Категории',
      'singular_name'     => 'Категория',
      'search_items'      => 'Поиск категории',
      'all_items'         => 'Все категории',
      'view_item '        => 'Посмотреть Категорию',
      'parent_item'       => 'Родительская категория',
      'parent_item_colon' => 'Родительская категория:',
      'edit_item'         => 'Редактировать категорию',
      'update_item'       => 'Одновить категорию',
      'add_new_item'      => 'Добавить',
      'new_item_name'     => 'Новая',
      'menu_name'         => 'Категории',
    ),
    'description'           => '', // описание таксономии
    'public'                => true,
    'publicly_queryable'    => null, // равен аргументу public
    'show_in_nav_menus'     => true, // равен аргументу public
    'show_ui'               => true, // равен аргументу public
    'show_in_menu'          => true, // равен аргументу show_ui
    'show_tagcloud'         => true, // равен аргументу show_ui
    'show_in_rest'          => true, // добавить в REST API
    'rest_base'             => null, // $taxonomy
    'hierarchical'          => true,
    'update_count_callback' => '',
    //'query_var'             => $taxonomy, // название параметра запроса
    'capabilities'          => array(),
    'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
    'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
    '_builtin'              => false,
    'show_in_quick_edit'    => null, // по умолчанию значение show_ui
  ) );
}

function your_prefix_register_taxonomy() {
  $args = array (
    'label' => 'Города',
    'labels' => array(
      'menu_name' => 'Города',
      'all_items' => esc_html__( 'All citylists', 'text-domain' ),
      'edit_item' => esc_html__( 'Edit citylist', 'text-domain' ),
      'view_item' => esc_html__( 'View citylist', 'text-domain' ),
      'update_item' => esc_html__( 'Update citylist', 'text-domain' ),
      'add_new_item' => esc_html__( 'Add new citylist', 'text-domain' ),
      'new_item_name' => esc_html__( 'New citylist', 'text-domain' ),
      'parent_item' => esc_html__( 'Parent citylist', 'text-domain' ),
      'parent_item_colon' => esc_html__( 'Parent citylist:', 'text-domain' ),
      'search_items' => esc_html__( 'Search citylists', 'text-domain' ),
      'popular_items' => esc_html__( 'Popular citylists', 'text-domain' ),
      'separate_items_with_commas' => esc_html__( 'Separate citylists with commas', 'text-domain' ),
      'add_or_remove_items' => esc_html__( 'Add or remove citylists', 'text-domain' ),
      'choose_from_most_used' => esc_html__( 'Choose most used citylists', 'text-domain' ),
      'not_found' => esc_html__( 'No citylists found', 'text-domain' ),
      'name' => 'Города',
      'singular_name' => 'Города',
    ),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_tagcloud' => true,
    'show_in_quick_edit' => true,
    'show_admin_column' => true,
    'show_in_rest' => true,
    'hierarchical' => true,
    'query_var' => true,
    'has_archive' => true,
    'sort' => true,
    'rewrite' => array(
      'with_front' => false,
      'hierarchical' => true,
    ),
  );

  register_taxonomy( 'citylist', array( 'hotels', 'webcamers', 'blogs', 'post_comment', 'way', 'wow' ), $args );
}
add_action( 'init', 'your_prefix_register_taxonomy');

function my_custom_upload_mimes($mimes = array()) {
    $mimes['svg'] = "image/svg+xml";
    return $mimes;
}
add_action('upload_mimes', 'my_custom_upload_mimes');


// создаем новую колонку
add_filter( 'manage_'.'hotels'.'_posts_columns', 'add_citylist_column', 4 );
function add_citylist_column( $columns ){
  $num = 2; // после какой по счету колонки вставлять новые
  $new_columns = array(
    'citylist' => 'Город',
  );

  return array_slice( $columns, 0, $num ) + $new_columns + array_slice( $columns, $num );
}

// заполняем колонку данными
add_action('manage_'.'hotels'.'_posts_custom_column', 'fill_citylist_column', 5, 2 );
function fill_citylist_column( $colname, $post_id ){
  if( $colname === 'citylist' ){
    $citylists = wp_get_post_terms(  $post_id , 'citylist', array( 'parent' => 0 ) );
    foreach ($citylists as $citylist) {
      echo $citylist->name;
    }
    // echo get_post_meta( $post_id, 'views', 1 ); 
  }
}


//Add Ajax
add_action('wp_head', 'myplugin_ajaxurl');
function myplugin_ajaxurl() {
  echo '<script type="text/javascript">
    var ajaxurl = "' . admin_url('admin-ajax.php') . '";
  </script>';
}

function get_page_url($template_name) {
  $pages = get_posts([
    'post_type' => 'page',
    'post_status' => 'publish',
    'meta_query' => [
      [
        'key' => '_wp_page_template',
        'value' => $template_name.'.php',
        'compare' => '='
      ]
    ]
  ]);
  if(!empty($pages))
  {
    foreach($pages as $pages__value)
    {
      return get_permalink($pages__value->ID);
    }
  }
  return get_bloginfo('url');
}


//GET PARENT TERM INFO
function get_parent_term_title($parent_term_id, $parent_term_name) {
  $parent_city_terms = get_ancestors( $parent_term_id, $parent_term_name );
  foreach ($parent_city_terms as $parent_city_term); {
    $current_parent_term_id = $parent_city_term;
  }
  $current_parent_term = get_term($current_parent_term_id, $parent_term_name);
  return $current_parent_term->name;
}

function get_parent_term_id($parent_term_id, $parent_term_name) {
  $parent_city_terms = get_ancestors( $parent_term_id, $parent_term_name );
  foreach ($parent_city_terms as $parent_city_term); {
    $current_parent_term_id = $parent_city_term;
  }
  $current_parent_term = get_term($current_parent_term_id, $parent_term_name);
  return $current_parent_term->term_id;
}

function get_parent_term_slug($parent_term_id, $parent_term_name) {
  $parent_city_terms = get_ancestors( $parent_term_id, $parent_term_name );
  foreach ($parent_city_terms as $parent_city_term); {
    $current_parent_term_id = $parent_city_term;
  }
  $current_parent_term = get_term($current_parent_term_id, $parent_term_name);
  return $current_parent_term->slug;
}

function tutCount($id) {
  $tr_array_id = array();
  $tr_ids = pll_get_post_translations($id);
  foreach ($tr_ids as $tr_id) {
    array_push($tr_array_id, $tr_id);
  }
  foreach ($tr_array_id as $post_id) {
    if ( metadata_exists( 'post', $post_id, 'hotel_count' ) ) {
      $count_value = get_post_meta( $post_id, 'hotel_count', true );
      $count_value = $count_value + 1;
      update_post_meta( $post_id, 'hotel_count', $count_value );
    } else {
      add_post_meta( $post_id, 'hotel_count', '200', true);
    }
    $hotel_count = get_post_meta( $post_id, 'hotel_count', true );
    return $hotel_count;
  }
}


//Alert для комментов
add_action( 'set_comment_cookies', function( $comment, $user ) {
  setcookie( 'ta_comment_wait_approval', '1', 0, '/' );
}, 10, 2 );

add_action( 'init', function() {
  if( isset( $_COOKIE['ta_comment_wait_approval'] ) && $_COOKIE['ta_comment_wait_approval'] === '1' ) {
    setcookie( 'ta_comment_wait_approval', '0', 0, '/' );
    echo "<script type='text/javascript'>
    document.addEventListener('DOMContentLoaded', function(event) {
      function insertAfter(referenceNode, newNode) {
        console.log(referenceNode);
        referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
      }

      var commentAlert = document.createElement('p');
      commentAlert.setAttribute('id', 'wait_approval');
      commentAlert.innerHTML = 'Ваш комментарий ожидает одобрения';

      var respondDiv = document.querySelector('#respond');
      console.log(respondDiv);
      insertAfter(respondDiv, commentAlert);
    });
    </script>";
    // add_action( 'comment_form_after', function() {
    //   echo "<p id='wait_approval' style=''><strong>" . _e('Ваш комментарий ожидает одобрения', 'restx') . "</strong></p>";
    // });
  }
});

add_filter( 'comment_post_redirect', function( $location, $comment ) {
  if ( get_post_type( $comment->comment_post_ID ) == 'post_comment' ) {
    // $current_url = home_url( add_query_arg( array(), $wp->request ) );
    $city_terms = get_the_terms($comment->comment_post_ID, 'citylist');
    foreach ($city_terms as $city_term) {
      $current_term_url = get_term_link($city_term->term_id, 'citylist'); 
    }
    $location = $current_term_url . '#wait_approval';  
    return $location;
  } else {
    $location = get_permalink( $comment->comment_post_ID ) . '#wait_approval';  
    return $location;
  }
}, 10, 2 );

// function change_rating_function(){
//   $metas = get_post_meta( $post->ID );
//   if( !isset($metas['meta-hotel-mainrating']) ){
//     echo 'vot';
//     update_post_meta($post->ID, 'meta-hotel-mainrating', 2);
//   } 
//   die;
// }


// function updateTermMeta() {
//   $terms_citylist = get_terms( array( 'taxonomy' => 'citylist', 'parent' => 0, 'hide_empty' => false));
//   foreach ($terms_citylist as $term_citylist) {
//     $temp_citylist_id = $term_citylist->term_id;
//     update_term_meta($temp_citylist_id, '_crb_citylist_iscurort', 'yes', false);
//   }  
// }

// add_action('init', 'updateTermMeta');