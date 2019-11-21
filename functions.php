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
require_once get_template_directory() . '/inc/hotels/meta.php';
require_once get_template_directory() . '/inc/filters/catalog-filter.php';
require_once get_template_directory() . '/inc/filters/city-filter.php';
require_once get_template_directory() . '/inc/loadmore/catalog-loadmore.php';

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

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
      'show_in_rest' => true,
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
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
    'show_in_rest'          => null, // добавить в REST API
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
    'show_admin_column' => false,
    'show_in_rest' => false,
    'hierarchical' => true,
    'query_var' => true,
    'has_archive' => true,
    'sort' => true,
    'rewrite' => array(
      'with_front' => false,
      'hierarchical' => true,
    ),
  );

  register_taxonomy( 'citylist', array( 'hotels', 'webcamers', 'blogs', 'post_comment' ), $args );
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

// function change_rating_function(){
//   $metas = get_post_meta( $post->ID );
//   if( !isset($metas['meta-hotel-mainrating']) ){
//     echo 'vot';
//     update_post_meta($post->ID, 'meta-hotel-mainrating', 2);
//   } 
//   die;
// }