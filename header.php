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


<!-- TOP HEADER -->
<section id="headerTop">
	<div class="container">
		<div class="banner-content">
			<div class="contact-social">
				
			</div>
			<div class="login">
				
			</div>
		</div>
	</div>
</section>

<!-- HEADER -->
<section id="header">
	<div class="container">
		<div class="banner-content">
			<div class="logo header-grid"></div>
			<div class="nav header-grid"></div>
			<div class="tools header-grid"></div>
		</div>
	</div>
</section>

<!--  BANNER -->
<section id="banner">
	<div class="container">
		<div class="banner-content"></div>
	</div>	
</section>

<!--  SUBSCRIBE -->
<section id="subscribe-one">
	<div class="container">
		<div class="banner-content"></div>
	</div>	
</section>


<!--  HOME 2 GRID -->
<section id="homeGrids">
	<div class="container">
		<div class="content"></div>
	</div>
</section>

<!--  ABOUT PHILIP -->
<section id="aboutPhilip">
	<div class="container">
		<div class="banner-content">
			<div class="philipImage">
				
			</div>
			<div class="philipDesc">
				
				<div class="readmore">
					<a href="#">Read More</a>
				</div>	
			</div>
		</div>
	</div>	
</section>

<!--  3 PILLAR CONTENT -->
<section id="three-pillar">
	<div class="container">
		<div class="pillar-full-width">
			
		</div>
		<div class="content">
			<div class="pillar-grids">
				
			</div>
		</div>
	</div>
</section>


<!--  TESTIMONIALS -->
<section id="testimonials">
	<div class="container">
		<div class="testimonial-content"></div>
	</div>	
</section>


<!--  BLOG FEATURED -->
<section id="blogs">
	<div class="container">
		<div class="content">
			<div class="blog-grid">
				
			</div>
		</div>
	</div>	
</section>


<!--  FOOTER -->
<section id="footer">
	<div class="container">
		<div class="social">
			<ul>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>
		<div class="footerNav">
			
		</div>
		<div class="copyright">
			<div class="content">
				<div class="copyright-left"></div>
				<div class="copyright-right"></div>
				onex  asdas
			</div>
		</div>
	</div>	
</section>