<?php
function load_bootstrap(){
wp_enqueue_style('style', get_template_directory_uri().'/style.css');
wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/css/bootstrap.min.css');
wp_enqueue_script('jqure-js', get_template_directory_uri().'/js/jquery.js');
wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.min.js');

}
add_action('wp_enqueue_scripts', 'load_bootstrap');
register_nav_menu( $location, $description );

function glavnoe_menu() {
	wp_nav_menu( array( 	'theme_location'  => '',
	'menu'            => '', 
	'container'       => 'ul', 
	'container_class' => '', 
	'container_id'    => '',
	'menu_class'      => 'nav navbar-nav navbar-right', 
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
	'walker' => new Bootstrap_Walker_Nav_Menu,
 ) ); }
add_action( 'after_setup_theme', 'mytheme_setup' ); 
function mytheme_setup() {
        add_theme_support( 'menus' );
}
function wpdocs_after_setup_theme() {
    add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'wpdocs_after_setup_theme' );
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}
function menu_set_dropdown( $sorted_menu_items, $args ) {
    $last_top = 0;
    foreach ( $sorted_menu_items as $key => $obj ) {
        // it is a top lv item?
        if ( 0 == $obj->menu_item_parent ) {
            // set the key of the parent
            $last_top = $key;
        } else {
            $sorted_menu_items[$last_top]->classes['dropdown'] = 'dropdown ';
        }
    }
    return $sorted_menu_items;
}
add_filter( 'wp_nav_menu_objects', 'menu_set_dropdown', 10, 2 );
function new_submenu_class($menu) {    
    $menu = preg_replace('/ class="sub-menu"/','/ class="dropdown-menu" aria-labelledby="navbarDropdown" /',$menu);        
    return $menu;      
}
add_filter('wp_nav_menu','new_submenu_class'); 

class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {
 
  /**
   * Display Element
   */
  function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
    $id_field = $this->db_fields['id'];
 
    if ( isset( $args[0] ) && is_object( $args[0] ) )
    {
      $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
 
    }
 
    return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
  }
 
  /**
   * Start Element
   */
  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    if ( is_object($args) && !empty($args->has_children) )
    {

    }
 
    parent::start_el($output, $item, $depth, $args, $id);
 
    if ( is_object($args) && !empty($args->has_children) )
      $args->link_after = $link_after;
  }
 
  /**
   * Start Level
   */
  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("t", $depth);
    $output .= "\n$indent<ul class=\"dropdown-menu list-unstyled\">\n";
  }
}
add_filter('nav_menu_link_attributes', function($atts, $item, $args)  {
  if ( $args->has_children  )
  {
    $atts['data-toggle'] = "dropdown" ;
   $atts['id']="navbarDropdown" ;
    $atts['role']="button"; 
    $atts['aria-haspopup']="true"; 
   $atts['aria-expanded']="false" ;
    $atts['class'] = 'dropdown-toggle';
  }
 
  return $atts;
}, 10, 3);
function add_menuclass($ulclass) {
   return preg_replace('/<a /', '<a class="nav-link text-costum-colors"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');
function true_register_wp_sidebars() {
 
  /* В боковой колонке - первый сайдбар */
  register_sidebar(
    array(
      'id' => 'true_side', // уникальный id
      'name' => 'Боковая колонка', // название сайдбара
      'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
      'before_widget' => '<div id="%1$s" class="side widget %2$s">', // по умолчанию виджеты выводятся <li>-списком
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">', // по умолчанию заголовки виджетов в <h2>
      'after_title' => '</h3>'
    )
  );
 
  /* В подвале - второй сайдбар */
  register_sidebar(
    array(
      'id' => 'true_foot',
      'name' => 'Футер',
      'description' => 'Перетащите сюда виджеты, чтобы добавить их в футер.',
      'before_widget' => '<div id="%1$s" class="foot widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>'
    )
  );
   /* слайдер*/
  register_sidebar(
    array(
      'id' => 'true_head',
      'name' => 'Под меню',
      'description' => 'Перетащите сюда виджеты, чтобы добавить их в футер.',
      'before_widget' => '<div id="%1$s" class="foot widget %2$s">',
      'after_widget' => '</div>'
    )
  );
}
 
add_action( 'widgets_init', 'true_register_wp_sidebars' );
add_theme_support('post-thumbnails'); set_post_thumbnail_size(auto,auto,TRUE);
function set_post_views($id){
    $count_key = 'post_views_count'; //задаем название поля для хранения просмотров
    $count = get_post_meta($id, $count_key, true); //получаем по id поста есть ли у него данное поле
    if ($count == '') { // если у поста его то задаем его
        delete_post_meta($id, $count_key); // очищаем поле в посте
        add_post_meta($postID, $count_key, '0'); // добавляем поле просмотров к записи
    } else { // если же есть то продолжаем
        $count++; // увеличиваем количество просмотров на 1
        update_post_meta($id, $count_key, $count); // записываем количество в наше поле
    }
}
function get_post_views($id) {
    $count_key = 'post_views_count'; //задаем название поля для хранения просмотров
    $count = get_post_meta($id, $count_key, true); //получаем по id поста есть ли у него данное поле
    if ($count == '') {// если у поста его нет то задаем его
        delete_post_meta($id, $count_key); // очищаем поле в посте
        add_post_meta($id, $count_key, '0'); // добавляем поле просмотров к записи
        return 0; // возвращаем 0 в качестве начального количества просмотров
    }
    return $count; // возвращаем число с количеством постов
}
 ?>