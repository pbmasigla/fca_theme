<?php
/*
Customizr Child functions created by Patricia Masigla
*/
// MAIN WIDGET AREA 1
if (function_exists('register_sidebar')) {
	register_sidebar(array(
	'name' => 'Main Widget Area 1',
	'id' => 'extra-widget-area-1',
	'description' => 'Main widget area 1',
	'before_widget' => '<div class="main-widget-area-1">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>'
	));
}

// MAIN WIDGET AREA 2
if (function_exists('register_sidebar')) {
	register_sidebar(array(
	'name' => 'Main Widget Area 2',
	'id' => 'extra-widget-area-2',
	'description' => 'Main widget area 2',
	'before_widget' => '<div class="main-widget-area-2">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>'
	));
}

// MAIN WIDGET AREA 3
if (function_exists('register_sidebar')) {
	register_sidebar(array(
	'name' => 'Main Widget Area 3',
	'id' => 'extra-widget-area3',
	'description' => 'Main widget area 3',
	'before_widget' => '<div class="main-widget-area-3">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>'
	));
}

// // MAIN WIDGET AREA 4
// if (function_exists('register_sidebar')) {
// 	register_sidebar(array(
// 	'name' => 'Main Widget Area 4',
// 	'id' => 'extra-widget-area1',
// 	'description' => 'Main widget area 4',
// 	'before_widget' => '<div class="main-widget-area-4">',
// 	'after_widget' => '</div>',
// 	'before_title' => '<h2>',
// 	'after_title' => '</h2>'
// 	));
// }

// Place the widget area after the header
add_action ('tc_fp_block_display', 'add_my_widget_area', 0);
function add_my_widget_area() {
	if (function_exists('dynamic_sidebar')) {
	dynamic_sidebar('Main Widget Area 1');
	dynamic_sidebar('Main Widget Area 2');
	dynamic_sidebar('Main Widget Area 3');
	// dynamic_sidebar('Main Widget Area 4');
	}
}

/*Isotope Code*/

/*
 * Add an eboard custom post type.
 */

add_action('init', 'create_redvine_eboard_member');
function create_redvine_eboard_member() 
{
  $labels = array(
    'name' => _x('Eboard Members', 'eboard_member'),
    'singular_name' => _x('Eboard Members', 'eboard_member'),
    'add_new' => _x('Add New Member', 'eboard_member'),
    'add_new_item' => __('Add New Member'),
    'edit_item' => __('Edit Item'),
    'new_item' => __('New Item'),
    'view_item' => __('View Item'),
    'search_items' => __('Search Items'),
    'not_found' =>  __('No items found'),
    'not_found_in_trash' => __('No items found in Trash'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 20,
    'supports' => array('title')
  ); 
  register_post_type('eboard_member',$args);
}

register_taxonomy( "eboard_member_years", 
	array( 	"eboard_member" ), 
	array( 	"hierarchical" => true,
			"labels" => array('name'=>"Eboard Years",'add_new_item'=>"Add New Field"), 
			"singular_label" => __( "Field" ), 
			"rewrite" => array( 'slug' => 'fields', // This controls the base slug that will display before each term 
							'with_front' => false)
		 ) 
);

/*
Add in a custom icon for the dashboard
*/
add_action( 'admin_head', 'eboard_member_icons' );
function eboard_member_icons() {
    ?>
    <style type="text/css" media="screen">
        #menu-posts-eboard_member .wp-menu-image {
            background: url(<?php bloginfo('template_url') ?>/images/your_image.png) no-repeat 6px -17px !important;
        }
		#menu-posts-eboard_member:hover .wp-menu-image, #menu-posts-eboard_member.wp-has-current-submenu .wp-menu-image {
            background-position:6px 7px!important;
        }
    </style>
 
 
<?php } 

function isotope_scripts(){
	wp_enqueue_script('Latest jQuery', 'http://code.jquery.com/jquery-latest.js');
	wp_enqueue_script('Isotope jQuery', '/wp-content/themes/customizr_child/js/jquery.isotope.min.js');
}

add_action('wp_enqueue_scripts', 'isotope_scripts');


/*Change thumnbnail size*/
add_filter( 'tc_thumb_size', 'my_thumb_size');
function my_thumb_size() {
    $sizeinfo = array( 'width' => 500 , 'height' => 400, 'crop' => false );
    return $sizeinfo;
}

/*Add custom post type family members*/

add_action('init', 'create_redvine_fca_member');
function create_redvine_fca_member() 
{
  $labels = array(
    'name' => _x('FCA Family Members', 'fca_member'),
    'singular_name' => _x('FCA Family Members', 'fca_member'),
    'add_new' => _x('Add New Member', 'fca_member'),
    'add_new_item' => __('Add New Member'),
    'edit_item' => __('Edit Item'),
    'new_item' => __('New Item'),
    'view_item' => __('View Item'),
    'search_items' => __('Search Items'),
    'not_found' =>  __('No items found'),
    'not_found_in_trash' => __('No items found in Trash'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 20,
    'supports' => array('title')
  ); 
  register_post_type('fca_member',$args);
}

register_taxonomy( "families", 
	array( 	"fca_member" ), 
	array( 	"hierarchical" => true,
			"labels" => array('name'=>"Families",'add_new_item'=>"Add New Field"), 
			"singular_label" => __( "Field" ), 
			"rewrite" => array( 'slug' => 'fields', // This controls the base slug that will display before each term 
							'with_front' => false)
		 ) 
);

/*
Add in a custom icon for the dashboard
*/
add_action( 'admin_head', 'fca_member_icons' );
function fca_member_icons() {
    ?>
    <style type="text/css" media="screen">
        #menu-posts-fca_member .wp-menu-image {
            background: url(<?php bloginfo('template_url') ?>/images/your_image.png) no-repeat 6px -17px !important;
        }
		#menu-posts-fca_member:hover .wp-menu-image, #menu-posts-fca_member.wp-has-current-submenu .wp-menu-image {
            background-position:6px 7px!important;
        }
    </style>
 
 
<?php } 
?>