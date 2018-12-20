<?php 
//THEME OPTIONS
function nd_theme_setting() {
	$labels = array(
		'name'                  => _x( 'Theme Settings', 'Post Type General Name', 'neverend' ),
		'singular_name'         => _x( 'Theme Settings', 'Post Type Singular Name', 'neverend' ),
		'menu_name'             => __( 'Theme Settings', 'neverend' ),
		'name_admin_bar'        => __( 'Theme Settings', 'neverend' ),
		'all_items'             => __( 'Theme Settings', 'neverend' ),
	);
	$args = array(
		'label'                 => __( 'Theme Settings', 'neverend' ),
		'description'           => __( 'Custom Theme Settings', 'neverend' ),
		'labels'                => $labels,
		'supports'              => array( '', '' ),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 25,
		'show_in_admin_bar'     => true,
		'menu_icon'				=> 'dashicons-admin-settings',
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'capabilities' => array(
          'create_posts' => false,
          'delete_posts' => false,
        ),
        'map_meta_cap' => true,
	);
	register_post_type( 'nd_theme_settings', $args );

}
add_action( 'init', 'nd_theme_setting', 0 );


//==================================================
//Create a sample post
//==================================================
function wp_create_a_posts() {

  $author_id = 1;
  $slug = 'my-theme-options';
  $title = 'My Theme Options';
  // If the post doesn't already exist, then create it only create new post
  if( null == get_page_by_title( $title, 'OBJECT', 'nd_theme_settings') ) {
  //Check that post already avilable or not in wordpress
    $post_arr = array(
    'post_title' => $title,
    'post_name' => $slug,
    'post_author' => $author_id,
    'post_status' => 'publish',
    'post_type' => 'nd_theme_settings'
   );
   $post_id = wp_insert_post($post_arr);
  }

} //end wordpress_create_post_programmatically
add_filter( 'after_setup_theme', 'wp_create_a_posts' );


//==============================================
//Disabling tools
//==============================================
add_filter( 'post_row_actions', 'my_disable_quick_edit', 10, 2 );
add_filter( 'page_row_actions', 'my_disable_quick_edit', 10, 2 );

function my_disable_quick_edit( $actions = array(), $post = null ) {

    // Abort if the post type is not "books"
    if ( ! is_post_type_archive( 'nd_theme_settings' ) ) {
        return $actions;
    }

    // Remove the Quick Edit/view/trash link
    if ( isset( $actions['inline hide-if-no-js'] ) ) {
        unset( $actions['inline hide-if-no-js'] );
    }
    if ( isset( $actions['view'] ) ) {
    	unset( $actions['view'] );
    }
    if ( isset( $actions['trash'] ) ) {
    	unset( $actions['trash'] );
    }

    return $actions;

}


/*=========================================================
//Redirecting the posttype to first post
/*=========================================================*/
$arg = array("post_type" => "nd_theme_settings");
$arg_qury = new WP_Query($arg);

while($arg_qury->have_posts()): $arg_qury->the_post();
$id = get_the_id();
endwhile;  wp_reset_query($arg_qury);

global $pagenow;
if( $pagenow == 'edit.php' && isset( $_GET['post_type'] ) && $_GET['post_type'] == 'nd_theme_settings' ){
    wp_redirect( admin_url( 'post.php?post='.$id.'&action=edit' ), 301 );
    exit;
}


/*=========================================================
//Remove indexing for theme settings
/*=========================================================*/
function get_theme_settings_id(){
	$page_args = array("post_type" => "nd_theme_settings");
	$query_post = new WP_Query($page_args);
	if($query_post->have_posts()): while($query_post->have_posts()): $query_post->the_post();
		$postId = get_the_id();
	endwhile; endif; wp_reset_query($query_post);
}
add_shortcode( "test", "get_theme_settings_id" );

function add_noindex_to_posts() {
		if (get_the_ID() == $postId)
		echo '<meta name="robots" content="noindex">';
		return;
	}
add_action('wp_head', 'add_noindex_to_posts');


/*=========================================================
//Remove delete/move to trash option from a custom post
/*=========================================================*/
add_filter ('user_has_cap', 'wpcs_prevent_last_page_deletion', 10, 3);
 
function wpcs_prevent_last_page_deletion ($allcaps, $caps, $args) {
    global $wpdb;
    if (isset($args[0]) && isset($args[2]) && $args[0] == 'delete_post') {
        $post = get_post ($args[2]);
        if ($post->post_status == 'publish' && $post->post_type == 'nd_theme_settings') {
            $query = "SELECT COUNT(*) FROM {$wpdb->posts} WHERE post_status = 'publish' AND post_type = %s";
            $num_posts = $wpdb->get_var ($wpdb->prepare ($query, $post->post_type));
            if ($num_posts < 2)
                $allcaps[$caps[0]] = false;
        }
    }
    return $allcaps;
}

/*=========================================================
//Disable
/*=========================================================*/
function hide_publishing_actions(){
        global $post;
        if($post->post_type == 'nd_theme_settings'){
            echo '
                <style type="text/css">
                    #misc-publishing-actions,
                    #minor-publishing-actions{
                        display:none;
                    }
                </style>
            ';
        }
}
add_action('admin_head-post.php', 'hide_publishing_actions');
add_action('admin_head-post-new.php', 'hide_publishing_actions');

/*=========================================================
/*ADMIN STYLES*/
/*=========================================================*/
function theme_settings_assets(){
	wp_enqueue_style('theme-style', get_template_directory_uri() . './theme-settings/theme-style.css');
}
add_action( 'admin_enqueue_scripts','theme_settings_assets' );


/*=========================================================
/*FRONTEND*/
/*=========================================================*/

$arg = array("post_type" => "nd_theme_settings");
$arg_qury = new WP_Query($arg);
while($arg_qury->have_posts()): $arg_qury->the_post();
    $id = get_the_id();
endwhile;  wp_reset_query($arg_qury);
define('ID', $id);