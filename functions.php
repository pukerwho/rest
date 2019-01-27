<?php
// Include your functions files here
include('inc/enqueues.php');
// Add your theme support ( cf :  http://codex.wordpress.org/Function_Reference/add_theme_support )
function customThemeSupport() {
    global $wp_version;
    add_theme_support( 'menus' );
    add_theme_support( 'post-thumbnails' );
    // let wordpress manage the title
    add_theme_support( 'title-tag' );
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

// Register menus, use wp_nav_menu() to display menu to your template ( cf : http://codex.wordpress.org/Function_Reference/wp_nav_menu )
register_nav_menus( array(
    'main_menu' => __( 'Menu principal', 'minimal-blank-theme' ) //@TODO : change i18n domain name to yours
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
    wp_enqueue_style( 'editor-style', get_stylesheet_directory_uri() . '/css/style.css' );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js');
    wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/js/lightbox.min.js','','',true);
    wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/swiper.min.js');
    wp_register_script( 'loadmore', get_stylesheet_directory_uri() . '/js/loadmore.js', array('jquery') );
    wp_enqueue_script( 'myscripts', get_template_directory_uri() . '/js/scripts.js');
 

    wp_localize_script( 'loadmore', 'loadmore_params', array(
        'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', 
        'posts' => json_encode( $wp_query->query_vars ), 
        'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
        'max_page' => $wp_query->max_num_pages
    ) );
 
    wp_enqueue_script( 'loadmore' );
};

//подключаем стили к админке
function load_custom_wp_admin_style() {
        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/css/admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

function loadmore_ajax_handler(){
 
    // prepare our arguments for the query
    $args = json_decode( stripslashes( $_POST['query'] ), true );
    $args['paged'] = $_POST['page'] + 1; 
    $args['post_status'] = 'publish';
 
   
    query_posts( $args );
 
    if( have_posts() ) :
 
        
        while( have_posts() ): the_post();
            get_template_part( 'blocks/default/loop', 'default' );
        
        endwhile;
 
    endif;
    die; 
}

add_action('wp_ajax_loadmore', 'loadmore_ajax_handler'); 
add_action('wp_ajax_nopriv_loadmore', 'loadmore_ajax_handler'); 


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
    'label' => esc_html__( 'citylists', 'text-domain' ),
    'labels' => array(
      'menu_name' => esc_html__( 'citylists', 'text-domain' ),
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
      'name' => esc_html__( 'citylists', 'text-domain' ),
      'singular_name' => esc_html__( 'citylist', 'text-domain' ),
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
    'sort' => false,
    'rewrite' => array(
      'with_front' => false,
      'hierarchical' => true,
    ),
  );

  register_taxonomy( 'citylist', array( 'hotels' ), $args );
}
add_action( 'init', 'your_prefix_register_taxonomy', 0 );

function your_prefix_get_meta_box( $meta_boxes ) {
  $prefix = 'meta-';

  $meta_boxes[] = array(
    'id' => 'hotels-info',
    'title' => esc_html__( 'Информация', 'hotels-info' ),
    'post_types' => array( 'hotels' ),
    'context' => 'advanced',
    'priority' => 'default',
    'autosave' => true,
    'fields' => array(
      array(
        'name'  => 'Фотографии территории',
        'id' => $prefix . 'hotel-photos',
        'type' => 'image_advanced',
      ),
      array(
        'name'  => 'Рейтинг (Главный)',
        'id' => $prefix . 'hotel-mainrating',
        'type' => 'text',
      ),
      array(
        'name'  => 'Популярный?',
        'id' => $prefix . 'hotel-popular',
        'type' => 'checkbox',
        'std'  => 0,
      ),
    ),
  );

  $meta_boxes[] = array(
    'id' => 'hotels-contact',
    'title' => esc_html__( 'Контакты', 'hotels-contact' ),
    'post_types' => array( 'hotels' ),
    'context' => 'advanced',
    'priority' => 'default',
    'autosave' => true,
    'fields' => array(
      array(
        'id' => $prefix . 'hotel-address',
        'type' => 'text',
        'name' => esc_html__( 'Адрес', 'hotels-contact' ),
      ),
      array(
        'id'            => $prefix . 'hotel-map',
        'name'          => 'Location',
        'type'          => 'map',

        // Default location: 'latitude,longitude[,zoom]' (zoom is optional)
        'std'           => '-6.233406,-35.049906,15',

        // Address field ID
        'address_field' => $prefix . 'hotel-address',

        // Google API key
        'api_key'       => 'AIzaSyA7ofGxkOMREhswh27U_aOa-eLyzBfyZkI',
      ),
      array(
        'name'  => 'Телефоны',
        'id'    => $prefix . 'hotel-phones',
        'size'        => 50,
        'field_type' => 'text',
        'clone' => true,
      ),
      array(
        'name'  => 'Viber',
        'id'    => $prefix . 'hotel-viber',
        'size'        => 50,
        'field_type' => 'text',
        'clone' => true,
      ),
      array(
        'name'  => 'Whatsapp',
        'id'    => $prefix . 'hotel-whatsapp',
        'size'        => 50,
        'field_type' => 'text',
        'clone' => true,
      ),
      array(
        'name'  => 'Telegram',
        'id'    => $prefix . 'hotel-telegram',
        'size'        => 50,
        'field_type' => 'text',
        'clone' => true,
      ),
    ),
  );

  $meta_boxes[] = array(
    'id' => 'hotels-include',
    'title' => esc_html__( 'Удобства', 'hotels-include' ),
    'post_types' => array( 'hotels' ),
    'context' => 'advanced',
    'priority' => 'default',
    'autosave' => true,
    'fields' => array(
      array(
        'name'  => 'Wi-fi',
        'id' => $prefix . 'hotel-wifi',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Парковка',
        'id' => $prefix . 'hotel-parking',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Детская площадка',
        'id' => $prefix . 'hotel-playground',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Бассейн',
        'id' => $prefix . 'hotel-pool',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Трансфер',
        'id' => $prefix . 'hotel-transfer',
        'type' => 'checkbox',
        'std'  => 0,
      ),
    ),
  );

  $meta_boxes[] = array(
    'id' => 'hotels-lux',
    'title' => esc_html__( 'Номера люкс', 'hotels-lux' ),
    'post_types' => array( 'hotels' ),
    'context' => 'advanced',
    'priority' => 'default',
    'autosave' => true,
    'fields' => array(
      array(
        'name'  => 'Есть такие?',
        'id' => $prefix . 'hotel-lux-has',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Фотографии люксовых номеров',
        'id' => $prefix . 'hotel-lux-photos',
        'type' => 'image_advanced',
      ),
      array(
        'name'  => 'Стоимость',
        'id' => $prefix . 'hotel-lux-price',
        'type' => 'text',
      ),
      array(
        'name'  => 'Кондиционер',
        'id' => $prefix . 'hotel-lux-conder',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Телевизор',
        'id' => $prefix . 'hotel-lux-tv',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Холодильник',
        'id' => $prefix . 'hotel-lux-frize',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Стиральная машинка',
        'id' => $prefix . 'hotel-lux-stiralka',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Аптечка',
        'id' => $prefix . 'hotel-lux-aptechka',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Фен',
        'id' => $prefix . 'hotel-lux-fen',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Микроволновая печь',
        'id' => $prefix . 'hotel-lux-micro',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Кофеварка',
        'id' => $prefix . 'hotel-lux-coffee',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Утюг',
        'id' => $prefix . 'hotel-lux-utug',
        'type' => 'checkbox',
        'std'  => 0,
      ),
    ),
  );

  $meta_boxes[] = array(
    'id' => 'hotels-halflux',
    'title' => esc_html__( 'Номера полулюкс', 'hotels-halflux' ),
    'post_types' => array( 'hotels' ),
    'context' => 'advanced',
    'priority' => 'default',
    'autosave' => true,
    'fields' => array(
      array(
        'name'  => 'Есть такие?',
        'id' => $prefix . 'hotel-halflux-has',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Фотографии люксовых номеров',
        'id' => $prefix . 'hotel-halflux-photos',
        'type' => 'image_advanced',
      ),
      array(
        'name'  => 'Стоимость',
        'id' => $prefix . 'hotel-halflux-price',
        'type' => 'text',
      ),
    ),
  );

  $meta_boxes[] = array(
    'id' => 'hotels-budget',
    'title' => esc_html__( 'Бюджетные номера', 'hotels-budget' ),
    'post_types' => array( 'hotels' ),
    'context' => 'advanced',
    'priority' => 'default',
    'autosave' => true,
    'fields' => array(
      array(
        'name'  => 'Есть такие?',
        'id' => $prefix . 'hotel-budget-has',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Фотографии люксовых номеров',
        'id' => $prefix . 'hotel-budget-photos',
        'type' => 'image_advanced',
      ),
      array(
        'name'  => 'Стоимость',
        'id' => $prefix . 'hotel-budget-price',
        'type' => 'text',
      ),
    ),
  );

  return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'your_prefix_get_meta_box' );

function my_custom_upload_mimes($mimes = array()) {
    $mimes['svg'] = "image/svg+xml";
    return $mimes;
}
add_action('upload_mimes', 'my_custom_upload_mimes');

//Add Ajax
add_action('wp_head', 'myplugin_ajaxurl');
function myplugin_ajaxurl() {
  echo '<script type="text/javascript">
    var ajaxurl = "' . admin_url('admin-ajax.php') . '";
  </script>';
}

//catalog filter
function catalog_hotels_filter_function(){
  $filterargs = array(
    'post_type' => 'hotels',
    'meta_query' => array(
      'relation' => 'OR',
    )
  );
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
    echo '<div class="col-md-3">';
    get_template_part( 'blocks/hotel-card', 'default' );
    echo '</div>';
  endwhile; 
  endif;
  die;
}
 
add_action('wp_ajax_my_catalog_filter', 'catalog_hotels_filter_function'); 
add_action('wp_ajax_nopriv_my_catalog_filter', 'catalog_hotels_filter_function');


//city filter
function city_hotels_filter_function(){
  $filterargs = array(
    'post_type' => 'hotels',
    'meta_query' => array(
      'relation' => 'OR',
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
    echo '<div class="col-md-3">';
    get_template_part( 'blocks/hotel-card', 'default' );
    echo '</div>';
  endwhile; 
  endif;
  die;
}
 
add_action('wp_ajax_my_city_filter', 'city_hotels_filter_function'); 
add_action('wp_ajax_nopriv_my_city_filter', 'city_hotels_filter_function');