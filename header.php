<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package www2
 * @since www2 1.0
 */
global $theme_options;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'before' ); ?>
<nav class="pre-header">
	<div class="container">
		<?php wp_nav_menu( array(
			'theme_location'  => 'top',
			'menu_class'      => 'menu nav  nav--fit  top-nav',
			'menu_id'         => 'top-nav',
			'fallback_cb'     => false,
		) ); ?>
	</div>
</nav>
<header id="masthead" class="site-header" role="banner">
	<div class="container">
		<hgroup>
			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?
				$logo = $theme_options['logo'];
				if (!empty($logo)) { 
					?><img src="<?php echo $logo; ?>" /><?php 
				} 
				?><span class="site-title-text" <?php 
				if(!$theme_options['showTitle']) echo 'style="display: none;"'; ?>><?php 
				echo esc_attr( get_bloginfo( 'name', 'display' ) ); 
				?></span></a>
			</h1>
			<?php
			$site_description = get_bloginfo('description');
			if ($theme_options['showDescription'] && !empty( $site_description ) ) { ?>
			<h2 class="site-description" <?php 
				if(!$theme_options['showDescription']) echo 'style="display: none;"'; ?>><?php 
				echo $site_description; 
			?></h2>
			<? } ?>
		</hgroup>
	</div><!-- .container -->
</header><!-- #masthead .site-header -->
<nav role="navigation" class="site-navigation main-navigation" id="main-navigation">
	<div class="container">
		<h1 class="assistive-text"><?php _e( 'Menu', www2 ); ?></h1>
		<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', www2 ); ?>"><?php _e( 'Skip to content', www2 ); ?></a></div>
		<?php wp_nav_menu( array(
			'theme_location'  => 'primary',
			'menu_class'      => 'menu nav  main-nav cf',
			'menu_id'         => 'main-nav',
			'fallback_cb'     => false,
		) ); ?>
	</div><!-- .container -->
</nav><!-- .site-navigation .main-navigation -->
<div class="sub-navigation">
	<div class="container">
		<div class="sub-nav cf" id="sub-nav"></div>
	</div>
</div>
