<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php elegant_titles(); ?></title>
<?php elegant_description(); ?>
<?php elegant_keywords(); ?>
<?php elegant_canonical(); ?>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<!--[if lt IE 7]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/ie6style.css" />
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/DD_belatedPNG_0.0.8a-min.js"></script>
	<script type="text/javascript">DD_belatedPNG.fix('img#logo, span.menu_arrow, a#search img, #searchform, .featured-img span.overlay, #featured .video-slide, #featured a.join-today, div#controllers a, a.readmore span, #breadcrumbs-left, #breadcrumbs-right, #breadcrumbs-content, .span.overlay2, span.overlay, a.zoom-icon, a.more-icon');</script>
<![endif]-->
<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/ie7style.css" />
<![endif]-->
<!--[if IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/ie8style.css" />
<![endif]-->

<script type="text/javascript">
	document.documentElement.className = 'js';
</script>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

</head>
<body<?php if ( is_front_page() || is_home() ) echo ' id="home"'; ?> <?php body_class(); ?>>
	<div id="center-highlight">
		<div id="header">
			<div class="container clearfix">
				<?php 
					global $shortname, $default_colorscheme;
					$colorSchemePath = '';
					$colorScheme = get_option($shortname . '_color_scheme');
					if ($colorScheme <> $default_colorscheme) $colorSchemePath = strtolower(esc_attr($colorScheme)) . '/'; 
				?>
				<a href="<?php bloginfo('url'); ?>">
					<?php $logo = (get_option('nova_logo') <> '') ? get_option('nova_logo') : get_bloginfo('template_directory').'/images/'.$colorSchemePath.'logo.png'; ?>
					<img src="<?php echo esc_url($logo); ?>" alt="Nova Logo" id="logo"/>
				</a>
				
				<?php $menuClass = 'nav';
				$menuID = 'top-menu';
				$primaryNav = '';
				if (function_exists('wp_nav_menu')) {
					$primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => $menuID, 'echo' => false ) ); 
				};
				if ($primaryNav == '') { ?>
					<ul id="<?php echo $menuID; ?>" class="<?php echo $menuClass; ?>">
						<?php if (get_option('nova_home_link') == 'on') { ?>
							<li <?php if (is_home()) echo('class="current_page_item"') ?>><a href="<?php bloginfo('url'); ?>"><?php esc_html_e('Home','Nova') ?></a></li>
						<?php }; ?>
						
						<?php show_page_menu($menuClass,false,false); ?>
					
						<?php show_categories_menu($menuClass,false); ?>
					</ul> <!-- end ul#nav -->
				<?php }
				else echo($primaryNav); ?>
								
				<div id="search-form">
					<a href="#" id="search"><img src="<?php bloginfo('template_directory'); ?>/images/<?php echo $colorSchemePath; ?>search_btn.png" width="15" height="15" alt="Search" /></a>
					
					<form method="get" id="searchform" action="<?php echo home_url(); ?>">
						<input type="text" value="<?php esc_attr_e('search this site...','Nova'); ?>" name="s" id="searchinput" />
					</form>
				</div> <!-- end #search-form -->
			</div> <!-- end .container -->
		</div> <!-- end #header -->
		
		<?php if ( (is_front_page() || is_home()) && get_option('nova_featured') == 'on' ) get_template_part('includes/featured');?>