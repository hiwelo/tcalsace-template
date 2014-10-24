<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic&subset=latin-ext' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" media="all" href="<?php echo bloginfo('stylesheet_url'); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/scripts/html5shiv.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header id="top" role="banner">
		<h1 id="logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php bloginfo('name'); ?>
			</a>
		</h1>
		
		<div id="socialsearch">
			<a href="http://www.facebook.com/tc.alsace/" class="facebook" title="Aller vers le Facebook TC Alsace">&#xe801;</a>
			<a href="http://twitter.com/tcalsace/" class="twitter" title="Aller vers le Twitter TC Alsace">&#xe811;</a>
			<a href="http://www.tc-alsace.eu/forums/" class="forums" title="Aller vers les forums TC Alsace">&#xe86d;</a>
			<!--<?php get_search_form(); ?>-->
		</div>
	</header>
	
	<div id="main">
	
		<?php
			$parametres = array('theme_location'	=>	'primaire',
								'container'			=>	'nav',
								'container_class'	=>	'navigation',
								'container_id'		=>	'nav-primaire',
								'menu_class'		=>	'nav-menu',
								'echo'				=>	true,
								'fallback_cb'		=>	false,
								'items_wrap'		=>	'<ul id="%1$s" class="%2$s">%3$s</ul>',
								'depth'				=>	0 );
			wp_nav_menu($parametres);
		?>
