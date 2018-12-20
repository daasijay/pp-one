<?php
/*
This is the template for the hedaer
@package philip_flags
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
    <title><?php if ( defined('WPSEO_VERSION') ) {wp_title('');} else {bloginfo('name'); ?> <?php wp_title(' - ', true);}?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 		<meta property="og:title" content="Cloud Hosting, Managed Hosting &amp; Web Hosting by Entity Data" />
    	<meta property="og:url" content="<?php echo site_url();?>" />
    	<meta property="og:image" content="<?php bloginfo('template_url');?>/images/og-image.jpg" />
    	<meta property="og:description" content="Entity Data is a national Internet services provider, offering VPS hosting, virtual dedicated servers, managed exchange, DNS hosting and web hosting." />
		<link rel="shortcut icon" href="<?php bloginfo('template_url');?>/images/favicon.ico" /> -->
		<meta name="theme-color" content="#ffffff">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>
		<!--[if IE]>
			<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/ie.css">
		<![endif]-->
		<?php wp_head(); ?>
	</head>
	<?php if(is_page()){
		$current_pageId = get_the_ID();
		$current_page = get_page($current_pageId);
		$current_page_slug = $current_page->post_name;?>
	<?php } 
		if(is_single()){
		$current_pageId = get_the_ID();
		$current_page = get_page($current_pageId);
		$current_page_slug = $current_page->post_name;?>
		<?php }
	?>
<body <?php body_class();?> id="<?php echo $current_page_slug;?>-page">
