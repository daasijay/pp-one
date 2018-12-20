<?php
/*
@package dns wizard
	========================
	      MAIN FUNCTIONS
	========================
*/
//define paths
define( 'PP_PATH', get_template_directory_uri().'/' );
define( 'PP_IMG_PATH', get_template_directory_uri().'/images/' );
define( 'PP_CSS_PATH', get_template_directory_uri().'/css/' );
define( 'PP_JS_PATH', get_template_directory_uri().'/js/' );

// registering files
require get_template_directory() . '/inc/theme-support.php';
require get_template_directory() . '/inc/theme-functions.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/theme-post-type.php';

// Registering ACF settings
require get_template_directory() . '/theme-settings/theme-settings.php';



function website_url(){
	return get_bloginfo('url');
}
add_shortcode( 'URL', 'website_url' );
