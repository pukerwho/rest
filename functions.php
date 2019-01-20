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
  register_post_type( 'cities',
    array(
      'labels' => array(
          'name' => __( 'Города' ),
          'singular_name' => __( 'Город' )
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
  register_taxonomy('collections', array('hotels', 'cities'), array(
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

  register_taxonomy( 'citylist', array( 'hotels', 'cities' ), $args );
}
add_action( 'init', 'your_prefix_register_taxonomy', 0 );

add_action( 'cmb2_admin_init', 'cmb2_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function cmb2_sample_metaboxes() {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_yourprefix_';

  /**
   * Initiate the metabox
   */
  $cmb = new_cmb2_box( array(
    'id'            => 'citylist_metabox',
    'title'         => __( 'Города/Коллекции', 'cmb2' ),
    'object_types'     => array( 'term' ), // Tells CMB2 to use term_meta vs post_meta
    'taxonomies'       => array( 'citylist' ), // Tells CMB2 which taxonomies should have these fields
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    // 'closed'     => true, // Keep the metabox closed by default
  ) );

  $cmb->add_field( array(
    'name' => 'Заголовок',
    'id'   => $prefix . 'citylist_title',
    'type' => 'text',
  ) );

  $cmb->add_field( array(
    'name' => 'Подзаголовок',
    'id'   => $prefix . 'citylist_undertitle',
    'type' => 'text',
  ) );

  $cmb->add_field( array(
    'name' => 'Иконка',
    'id'   => $prefix . 'citylist_icon',
    'type' => 'file',
  ) );

  $cmb->add_field( array(
    'name' => 'Город',
    'id'   => $prefix . 'citylist_city',
    'type' => 'post_search_text',
    'post_type'   => 'cities',
    'select_type' => 'radio',
  ) );
}

add_action( 'cmb2_admin_init', 'yourprefix_register_theme_options_metabox' );
/**
 * Hook in and register a metabox to handle a theme options page and adds a menu item.
 */
function yourprefix_register_theme_options_metabox() {
  /**
   * Registers options page menu item and form.
   */
  $cmb_options = new_cmb2_box( array(
    'id'           => 'yourprefix_theme_options_page',
    'title'        => esc_html__( 'Theme Options', 'cmb2' ),
    'object_types' => array( 'options-page' ),
    /*
     * The following parameters are specific to the options-page box
     * Several of these parameters are passed along to add_menu_page()/add_submenu_page().
     */
    'option_key'      => 'yourprefix_theme_options', // The option key and admin menu page slug.
    'icon_url'        => 'dashicons-palmtree', // Menu icon. Only applicable if 'parent_slug' is left empty.
    // 'menu_title'      => esc_html__( 'Options', 'cmb2' ), // Falls back to 'title' (above).
    // 'parent_slug'     => 'themes.php', // Make options page a submenu item of the themes menu.
    // 'capability'      => 'manage_options', // Cap required to view options-page.
    // 'position'        => 1, // Menu position. Only applicable if 'parent_slug' is left empty.
    // 'admin_menu_hook' => 'network_admin_menu', // 'network_admin_menu' to add network-level options page.
    // 'display_cb'      => false, // Override the options-page form output (CMB2_Hookup::options_page_output()).
    // 'save_button'     => esc_html__( 'Save Theme Options', 'cmb2' ), // The text for the options-page save button. Defaults to 'Save'.
    // 'disable_settings_errors' => true, // On settings pages (not options-general.php sub-pages), allows disabling.
    // 'message_cb'      => 'yourprefix_options_page_message_callback',
  ) );
  /**
   * Options fields ids only need
   * to be unique within this box.
   * Prefix is not needed.
   */
  $cmb_options->add_field( array(
    'name'    => esc_html__( 'Site Background Color', 'cmb2' ),
    'desc'    => esc_html__( 'field description (optional)', 'cmb2' ),
    'id'      => 'bg_color',
    'type'    => 'colorpicker',
    'default' => '#ffffff',
  ) );
}

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
        'name'        => 'Город',
        'id'          => $prefix . 'hotelcity',
        'type'        => 'post',

        // Post type.
        'post_type'   => 'cities',

        // Field type.
        'field_type'  => 'select_advanced',

        // Placeholder, inherited from `select_advanced` field.
        'placeholder' => 'Выберите город',

        // Query arguments. See https://codex.wordpress.org/Class_Reference/WP_Query
        'query_args'  => array(
            'post_status'    => 'publish',
            'posts_per_page' => - 1,
        ),
      ),
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

function add_theme_menu_item() {
    add_menu_page("Theme Settings", "Theme Settings", "manage_options", "theme-settings", "theme_settings_page", null, 99);
    //register our settings
    register_setting( 'my-settings-group', 'facebook_link' );
    register_setting( 'my-settings-group', 'twitter_link' );
    register_setting( 'my-settings-group', 'google_link' );
    register_setting( 'my-settings-group', 'pinterest_link' );
    register_setting( 'my-settings-group', 'google_analytics' );
    register_setting( 'my-settings-group', 'jivosite_code' );
}

add_action("admin_menu", "add_theme_menu_item");

function theme_settings_page() {
    include 'form-file.php';
}