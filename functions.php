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
    wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/js/lightbox.min.js','','',true);
    wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/swiper.min.js','','',true);
    wp_register_script( 'loadmore__catalog', get_stylesheet_directory_uri() . '/js/loadmore_catalog.js', array('jquery') );
    wp_enqueue_script( 'myscripts', get_template_directory_uri() . '/js/scripts.js', '','',true);
 
    wp_localize_script( 'loadmore__catalog', 'loadmore_params__catalog', array(
        'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
        'posts' => json_encode( $custom_query_catalog->query_vars ), // everything about your loop is here
        'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
        'max_page' => $custom_query_catalog->max_num_pages
    ) );

    wp_enqueue_script( 'loadmore__catalog');
};

//подключаем стили к админке
function load_custom_wp_admin_style() {
        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/css/admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

function loadmore_ajax_handler_catalog(){
  // prepare our arguments for the query
  $args = json_decode( stripslashes( $_POST['query'] ), true );
  $args['paged'] = $_POST['page'] + 1; 
  $args['post_status'] = 'publish';
  $args['post_type'] = 'hotels';
  
  query_posts( $args );
  $custom_query_catalog = new WP_Query( array( 'post_type' => 'hotels', 'posts_per_page' => 24, 'paged' => $args['paged'], 'orderby' => 'meta_value', 'meta_key' => 'meta-hotel-mainrating' ) );
  if ($custom_query_catalog->have_posts()) : while ($custom_query_catalog->have_posts()) : $custom_query_catalog->the_post();
    echo '<div class="col-md-3">';
    get_template_part( 'blocks/hotel-card', 'default' );
    echo '</div>';
  endwhile; 
  endif;
  die;
}

add_action('wp_ajax_loadmore__catalog', 'loadmore_ajax_handler_catalog');
add_action('wp_ajax_nopriv_loadmore__catalog', 'loadmore_ajax_handler_catalog');

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
    'has_archive' => true,
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
        'type' => 'number',
        'std'  => 1,
      ),
      array(
        'name'  => 'Минимальная стоимость',
        'id' => $prefix . 'hotel-minprice',
        'type' => 'number',
        'std'  => 1,
      ),
      array(
        'name'  => 'Максимальная стоимость',
        'id' => $prefix . 'hotel-maxprice',
        'type' => 'number',
        'std'  => 2,
      ),
      array(
        'name'  => 'Открыть отзывы?',
        'id' => $prefix . 'hotel-reviews',
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
    'id' => 'hotels-sale',
    'title' => esc_html__( 'Скидки', 'hotels-sale' ),
    'post_types' => array( 'hotels' ),
    'context' => 'advanced',
    'priority' => 'default',
    'autosave' => true,
    'fields' => array(
      array(
        'name'  => 'Есть скидки?',
        'id' => $prefix . 'hotel-sale',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Текст',
        'id' => $prefix . 'hotel-sale-text',
        'type' => 'wysiwyg',
        'options' => array(
          'textarea_rows' => 4,
        ),
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
      array(
        'name'  => 'Зона отдыха',
        'id' => $prefix . 'hotel-restzone',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Кухня',
        'id' => $prefix . 'hotel-kitchen',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Стиральная машина',
        'id' => $prefix . 'hotel-stiralka',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Бильярд',
        'id' => $prefix . 'hotel-billiard',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Спортивная площадка',
        'id' => $prefix . 'hotel-workout',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Сауна',
        'id' => $prefix . 'hotel-sauna',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Безналичный расчет',
        'id' => $prefix . 'hotel-mastercard',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Рядом рынок',
        'id' => $prefix . 'hotel-market',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Частный пляж',
        'id' => $prefix . 'hotel-beach',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Аренда лежаков',
        'id' => $prefix . 'hotel-lejak',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Кафе/ресторан',
        'id' => $prefix . 'hotel-restrant',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Мангал',
        'id' => $prefix . 'hotel-mangal',
        'type' => 'checkbox',
        'std'  => 0,
      ),
    ),
  );

  $meta_boxes[] = array(
    'id' => 'hotels-kottedg',
    'title' => esc_html__( 'Коттедж', 'hotels-kottedg' ),
    'post_types' => array( 'hotels' ),
    'context' => 'advanced',
    'priority' => 'default',
    'autosave' => true,
    'fields' => array(
      array(
        'name'  => 'Есть такие?',
        'id' => $prefix . 'hotel-kottedg-has',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Фотографии люксовых номеров',
        'id' => $prefix . 'hotel-kottedg-photos',
        'type' => 'image_advanced',
      ),
      array(
        'name'  => 'Минимальная стоимость в сезон',
        'id' => $prefix . 'hotel-kottedg-minprice_sezon',
        'type' => 'number',
      ),
      array(
        'name'  => 'Максимальная стоимость в сезон',
        'id' => $prefix . 'hotel-kottedg-maxprice_sezon',
        'type' => 'number',
      ),
      array(
        'name'  => 'Минимальная стоимость в не сезон',
        'id' => $prefix . 'hotel-kottedg-minprice_nesezon',
        'type' => 'number',
      ),
      array(
        'name'  => 'Максимальная стоимость в не сезон',
        'id' => $prefix . 'hotel-kottedg-maxprice_nesezon',
        'type' => 'number',
      ),
      array(
        'name'  => 'Одноместные',
        'id' => $prefix . 'hotel-kottedg-hasone',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Двуместные',
        'id' => $prefix . 'hotel-kottedg-hastwo',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Трехместные',
        'id' => $prefix . 'hotel-kottedg-hasthree',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Четырехместные',
        'id' => $prefix . 'hotel-kottedg-hasfour',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Пятиместные',
        'id' => $prefix . 'hotel-kottedg-hasfive',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Шестиместные',
        'id' => $prefix . 'hotel-kottedg-hassix',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Семиместные',
        'id' => $prefix . 'hotel-kottedg-hasseven',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Кондиционер',
        'id' => $prefix . 'hotel-kottedg-conder',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Телевизор',
        'id' => $prefix . 'hotel-kottedg-tv',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Холодильник',
        'id' => $prefix . 'hotel-kottedg-frize',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Чайник',
        'id' => $prefix . 'hotel-kottedg-boiling',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Аптечка',
        'id' => $prefix . 'hotel-kottedg-aptechka',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Фен',
        'id' => $prefix . 'hotel-kottedg-fen',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Микроволновая печь',
        'id' => $prefix . 'hotel-kottedg-micro',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Кофеварка',
        'id' => $prefix . 'hotel-kottedg-coffee',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Утюг',
        'id' => $prefix . 'hotel-kottedg-utug',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Санузел',
        'id' => $prefix . 'hotel-kottedg-sanuzel',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Душ',
        'id' => $prefix . 'hotel-kottedg-dush',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Сейф',
        'id' => $prefix . 'hotel-kottedg-safe',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Вентилятор',
        'id' => $prefix . 'hotel-kottedg-fan',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Уборка в номере',
        'id' => $prefix . 'hotel-kottedg-clean',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Wi-Fi',
        'id' => $prefix . 'hotel-kottedg-wifi',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Вид на море',
        'id' => $prefix . 'hotel-kottedg-sunset',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Минибар',
        'id' => $prefix . 'hotel-kottedg-minibar',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Телефон',
        'id' => $prefix . 'hotel-kottedg-telephone',
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
        'name'  => 'Минимальная стоимость в сезон',
        'id' => $prefix . 'hotel-lux-minprice_sezon',
        'type' => 'number',
      ),
      array(
        'name'  => 'Максимальная стоимость в сезон',
        'id' => $prefix . 'hotel-lux-maxprice_sezon',
        'type' => 'number',
      ),
      array(
        'name'  => 'Минимальная стоимость в не сезон',
        'id' => $prefix . 'hotel-lux-minprice_nesezon',
        'type' => 'number',
      ),
      array(
        'name'  => 'Максимальная стоимость в не сезон',
        'id' => $prefix . 'hotel-lux-maxprice_nesezon',
        'type' => 'number',
      ),
      array(
        'name'  => 'Одноместные',
        'id' => $prefix . 'hotel-lux-hasone',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Двуместные',
        'id' => $prefix . 'hotel-lux-hastwo',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Трехместные',
        'id' => $prefix . 'hotel-lux-hasthree',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Четырехместные',
        'id' => $prefix . 'hotel-lux-hasfour',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Пятиместные',
        'id' => $prefix . 'hotel-lux-hasfive',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Шестиместные',
        'id' => $prefix . 'hotel-lux-hassix',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Семиместные',
        'id' => $prefix . 'hotel-lux-hasseven',
        'type' => 'checkbox',
        'std'  => 0,
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
        'name'  => 'Чайник',
        'id' => $prefix . 'hotel-lux-boiling',
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
      array(
        'name'  => 'Санузел',
        'id' => $prefix . 'hotel-lux-sanuzel',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Душ',
        'id' => $prefix . 'hotel-lux-dush',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Сейф',
        'id' => $prefix . 'hotel-lux-safe',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Вентилятор',
        'id' => $prefix . 'hotel-lux-fan',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Уборка в номере',
        'id' => $prefix . 'hotel-lux-clean',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Wi-Fi',
        'id' => $prefix . 'hotel-lux-wifi',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Вид на море',
        'id' => $prefix . 'hotel-lux-sunset',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Минибар',
        'id' => $prefix . 'hotel-lux-minibar',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Телефон',
        'id' => $prefix . 'hotel-lux-telephone',
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
        'name'  => 'Минимальная стоимость в сезон',
        'id' => $prefix . 'hotel-halflux-minprice_sezon',
        'type' => 'number',
      ),
       array(
        'name'  => 'Максимальная стоимость в сезон',
        'id' => $prefix . 'hotel-halflux-maxprice_sezon',
        'type' => 'number',
      ),
        array(
        'name'  => 'Минимальная стоимость в не сезон',
        'id' => $prefix . 'hotel-halflux-minprice_nesezon',
        'type' => 'number',
      ),
         array(
        'name'  => 'Максимальная стоимость в не сезон',
        'id' => $prefix . 'hotel-halflux-maxprice_nesezon',
        'type' => 'number',
      ),
      array(
        'name'  => 'Одноместные',
        'id' => $prefix . 'hotel-halflux-hasone',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Двуместные',
        'id' => $prefix . 'hotel-halflux-hastwo',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Трехместные',
        'id' => $prefix . 'hotel-halflux-hasthree',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Четырехместные',
        'id' => $prefix . 'hotel-halflux-hasfour',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Пятиместные',
        'id' => $prefix . 'hotel-halflux-hasfive',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Шестиместные',
        'id' => $prefix . 'hotel-halflux-hassix',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Семиместные',
        'id' => $prefix . 'hotel-halflux-hasseven',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Кондиционер',
        'id' => $prefix . 'hotel-halflux-conder',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Телевизор',
        'id' => $prefix . 'hotel-halflux-tv',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Холодильник',
        'id' => $prefix . 'hotel-halflux-frize',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Чайник',
        'id' => $prefix . 'hotel-halflux-boiling',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Аптечка',
        'id' => $prefix . 'hotel-halflux-aptechka',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Фен',
        'id' => $prefix . 'hotel-halflux-fen',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Микроволновая печь',
        'id' => $prefix . 'hotel-halflux-micro',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Кофеварка',
        'id' => $prefix . 'hotel-halflux-coffee',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Утюг',
        'id' => $prefix . 'hotel-halflux-utug',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Санузел',
        'id' => $prefix . 'hotel-halflux-sanuzel',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Душ',
        'id' => $prefix . 'hotel-halflux-dush',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Сейф',
        'id' => $prefix . 'hotel-halflux-safe',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Вентилятор',
        'id' => $prefix . 'hotel-halflux-fan',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Уборка в номере',
        'id' => $prefix . 'hotel-halflux-clean',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Wi-Fi',
        'id' => $prefix . 'hotel-halflux-wifi',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Вид на море',
        'id' => $prefix . 'hotel-halflux-sunset',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Минибар',
        'id' => $prefix . 'hotel-halflux-minibar',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Телефон',
        'id' => $prefix . 'hotel-halflux-telephone',
        'type' => 'checkbox',
        'std'  => 0,
      ),
    ),
  );

  $meta_boxes[] = array(
    'id' => 'hotels-standart',
    'title' => esc_html__( 'Номера Стандарт', 'hotels-standart' ),
    'post_types' => array( 'hotels' ),
    'context' => 'advanced',
    'priority' => 'default',
    'autosave' => true,
    'fields' => array(
      array(
        'name'  => 'Есть такие?',
        'id' => $prefix . 'hotel-standart-has',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Фотографии люксовых номеров',
        'id' => $prefix . 'hotel-standart-photos',
        'type' => 'image_advanced',
      ),
      array(
        'name'  => 'Минимальная стоимость в сезон',
        'id' => $prefix . 'hotel-standart-minprice_sezon',
        'type' => 'number',
      ),
      array(
        'name'  => 'Максимальная стоимость в сезон',
        'id' => $prefix . 'hotel-standart-maxprice_sezon',
        'type' => 'number',
      ),
      array(
        'name'  => 'Минимальная стоимость в не сезон',
        'id' => $prefix . 'hotel-standart-minprice_nesezon',
        'type' => 'number',
      ),
      array(
        'name'  => 'Максимальная стоимость в не сезон',
        'id' => $prefix . 'hotel-standart-maxprice_nesezon',
        'type' => 'number',
      ),
      array(
        'name'  => 'Одноместные',
        'id' => $prefix . 'hotel-standart-hasone',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Двуместные',
        'id' => $prefix . 'hotel-standart-hastwo',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Трехместные',
        'id' => $prefix . 'hotel-standart-hasthree',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Четырехместные',
        'id' => $prefix . 'hotel-standart-hasfour',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Пятиместные',
        'id' => $prefix . 'hotel-standart-hasfive',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Шестиместные',
        'id' => $prefix . 'hotel-standart-hassix',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Семиместные',
        'id' => $prefix . 'hotel-standart-hasseven',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Кондиционер',
        'id' => $prefix . 'hotel-standart-conder',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Телевизор',
        'id' => $prefix . 'hotel-standart-tv',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Холодильник',
        'id' => $prefix . 'hotel-standart-frize',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Чайник',
        'id' => $prefix . 'hotel-standart-boiling',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Аптечка',
        'id' => $prefix . 'hotel-standart-aptechka',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Фен',
        'id' => $prefix . 'hotel-standart-fen',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Микроволновая печь',
        'id' => $prefix . 'hotel-standart-micro',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Кофеварка',
        'id' => $prefix . 'hotel-standart-coffee',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Утюг',
        'id' => $prefix . 'hotel-standart-utug',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Санузел',
        'id' => $prefix . 'hotel-standart-sanuzel',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Душ',
        'id' => $prefix . 'hotel-standart-dush',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Сейф',
        'id' => $prefix . 'hotel-standart-safe',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Вентилятор',
        'id' => $prefix . 'hotel-standart-fan',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Уборка в номере',
        'id' => $prefix . 'hotel-standart-clean',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Wi-Fi',
        'id' => $prefix . 'hotel-standart-wifi',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Вид на море',
        'id' => $prefix . 'hotel-standart-sunset',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Минибар',
        'id' => $prefix . 'hotel-standart-minibar',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Телефон',
        'id' => $prefix . 'hotel-standart-telephone',
        'type' => 'checkbox',
        'std'  => 0,
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
        'name'  => 'Минимальная стоимость в сезон',
        'id' => $prefix . 'hotel-budget-minprice_sezon',
        'type' => 'number',
      ),
      array(
        'name'  => 'Максимальная стоимость в сезон',
        'id' => $prefix . 'hotel-budget-maxprice_sezon',
        'type' => 'number',
      ),
      array(
        'name'  => 'Минимальная стоимость в не сезон',
        'id' => $prefix . 'hotel-budget-minprice_nesezon',
        'type' => 'number',
      ),
      array(
        'name'  => 'Максимальная стоимость в не сезон',
        'id' => $prefix . 'hotel-budget-maxprice_nesezon',
        'type' => 'number',
      ),
      array(
        'name'  => 'Одноместные',
        'id' => $prefix . 'hotel-budget-hasone',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Двуместные',
        'id' => $prefix . 'hotel-budget-hastwo',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Трехместные',
        'id' => $prefix . 'hotel-budget-hasthree',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Четырехместные',
        'id' => $prefix . 'hotel-budget-hasfour',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Пятиместные',
        'id' => $prefix . 'hotel-budget-hasfive',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Шестиместные',
        'id' => $prefix . 'hotel-budget-hassix',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Семиместные',
        'id' => $prefix . 'hotel-budget-hasseven',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Кондиционер',
        'id' => $prefix . 'hotel-budget-conder',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Телевизор',
        'id' => $prefix . 'hotel-budget-tv',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Холодильник',
        'id' => $prefix . 'hotel-budget-frize',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Чайник',
        'id' => $prefix . 'hotel-budget-boiling',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Аптечка',
        'id' => $prefix . 'hotel-budget-aptechka',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Фен',
        'id' => $prefix . 'hotel-budget-fen',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Микроволновая печь',
        'id' => $prefix . 'hotel-budget-micro',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Кофеварка',
        'id' => $prefix . 'hotel-budget-coffee',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Утюг',
        'id' => $prefix . 'hotel-budget-utug',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Санузел',
        'id' => $prefix . 'hotel-budget-sanuzel',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Душ',
        'id' => $prefix . 'hotel-budget-dush',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Сейф',
        'id' => $prefix . 'hotel-budget-safe',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Вентилятор',
        'id' => $prefix . 'hotel-budget-fan',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Уборка в номере',
        'id' => $prefix . 'hotel-budget-clean',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Wi-Fi',
        'id' => $prefix . 'hotel-budget-wifi',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Вид на море',
        'id' => $prefix . 'hotel-budget-sunset',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Минибар',
        'id' => $prefix . 'hotel-budget-minibar',
        'type' => 'checkbox',
        'std'  => 0,
      ),
      array(
        'name'  => 'Телефон',
        'id' => $prefix . 'hotel-budget-telephone',
        'type' => 'checkbox',
        'std'  => 0,
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

//catalog filter
function catalog_hotels_filter_function(){
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
  // if ($_POST['budgetfilter'] != '') { 
  //   $filterargs['meta_query'][] = array(
  //     'key'     => 'meta-hotel-budget-has',
  //     'value'   => $_POST['budgetfilter'],
  //     'compare' => '=', 
  //   );
  // }
  // if ($_POST['halfluxfilter'] != '') { 
  //   $filterargs['meta_query'][] = array(
  //     'key'     => 'meta-hotel-halflux-has',
  //     'value'   => $_POST['halfluxfilter'],
  //     'compare' => '=', 
  //   );
  // }
  // if ($_POST['luxfilter'] != '') { 
  //   $filterargs['meta_query'][] = array(
  //     'key'     => 'meta-hotel-lux-has',
  //     'value'   => $_POST['luxfilter'],
  //     'compare' => '=', 
  //   );
  // }
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
 
add_action('wp_ajax_my_catalog_filter', 'catalog_hotels_filter_function'); 
add_action('wp_ajax_nopriv_my_catalog_filter', 'catalog_hotels_filter_function');


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

// function change_rating_function(){
//   $metas = get_post_meta( $post->ID );
//   if( !isset($metas['meta-hotel-mainrating']) ){
//     echo 'vot';
//     update_post_meta($post->ID, 'meta-hotel-mainrating', 2);
//   } 
//   die;
// }