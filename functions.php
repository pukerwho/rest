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
  register_taxonomy('tx_cities', array('hotels'), array(
    'label'                 => '', // определяется параметром $labels->name
    'labels'                => array(
      'name'              => 'Города',
      'singular_name'     => 'Город',
      'search_items'      => 'Поиск города',
      'all_items'         => 'Все города',
      'view_item '        => 'Посмотреть город',
      'parent_item'       => 'Родительский город',
      'parent_item_colon' => 'Родительский город:',
      'edit_item'         => 'Редактировать город',
      'update_item'       => 'Одновить город',
      'add_new_item'      => 'Добавить',
      'new_item_name'     => 'Новый',
      'menu_name'         => 'Города',
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
    'rewrite'               => true,
    //'query_var'             => $taxonomy, // название параметра запроса
    'capabilities'          => array(),
    'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
    'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
    '_builtin'              => false,
    'show_in_quick_edit'    => null, // по умолчанию значение show_ui
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
        'name' => esc_html__( 'Адрес', 'hotels-info' ),
      ),
      array(
        'name'  => 'Контакты',
        'id'    => $prefix . 'hotel-contact',
        'size'        => 50,
        'field_type' => 'text',
        'clone' => true,
      ),
      array(
        'name'  => 'Фотографии',
        'id' => $prefix . 'hotel-photos',
        'type' => 'image_advanced',
      ),
    ),
  );
  return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'your_prefix_get_meta_box' );

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