<?php
	global $basic_color, $basic_grab_image, $basic_catnum_posts; 
	if (get_option('basic_menupages') <> ''){
		$include_pages = implode(",", get_option('basic_menupages'));
	}
	$strdepth = '';
	if (get_option('basic_enable_dropdowns') == 'on'){
		$strdepth = "depth=".get_option('basic_tiers_shown_pages');
	}
	if ($strdepth == ''){
		$strdepth = "depth=1";
	}
?>
<!doctype html public "✰">
<!--[if lt IE 7 ]><html lang=en-us class="no-js ie6"><![endif]--> 
<!--[if IE 7 ]><html lang=en-us class="no-js ie7"><![endif]--> 
<!--[if IE 8 ]><html lang=en-us class="no-js ie8"><![endif]--> 
<!--[if (gte IE 9)|!(IE)]><!--> <html lang=en-us class=no-js> <!--<![endif]--> 
<head> 
	<meta http-equiv="X-UA-Compatible" content="IE=Edge;chrome=1">
	<meta charset="utf-8">
	<title><?php elegant_titles(); ?></title>
	<?php
		elegant_description();
		elegant_keywords();
		elegant_canonical();
		if ( is_singular() ){
			wp_enqueue_script( 'comment-reply' );
		}
		wp_head();
	?>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style<?php echo $basic_color; ?>.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="/wp-content/themes/default/css/custom-theme/jquery-ui-1.8.12.custom.css" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<!--[if IE 7]>	
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/iestyle.css" />
	<![endif]-->
	<!--[if lt IE 7]>
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/ie6style.css" />
	<![endif]-->
	<?php
		if (get_option('basic_child_css') == 'on') {
			?>
				<link rel="stylesheet" href="<?php echo(get_option('basic_child_cssurl')); ?>" type="text/css" media="screen" />
			<?php
		};
	?>
	<?php
		if (get_option('basic_custom_colors') == 'on') {
			?>
				<style type="text/css">
					#container { color: #<?php echo(get_option('basic_color_mainfont')); ?>; }
					body { background-color: #<?php echo(get_option('basic_color_bgcolor')); ?>; }
					#wrapper2 { border:10px solid #<?php echo(get_option('basic_color_bordercolor')); ?>; }
					.post-info { background-color: #<?php echo(get_option('basic_postinfo1_bgcolor')); ?>; }
					.post-info2 { background-color: #<?php echo(get_option('basic_postinfo2_bgcolor')); ?>; }
					a:link, a:visited { color: #<?php echo(get_option('basic_color_mainlink')); ?>; }
					#pages .home a:link, #pages .home a:visited, #pages .current_page_item a:link, #pages .current_page_item a:visited, #pages ul li a:link, #pages ul li a:visited, #pages ul li a:active { color: #<?php echo(get_option('basic_color_pagelink')); ?>; }
					.sidebar-box h2 { color:#<?php echo(get_option('basic_color_sidebar_titles')); ?>; }
					.titles a:link, .titles a:visited, .titles a:active { color:#<?php echo(get_option('basic_color_heading')); ?>; }
				</style>
			<?php
		}
		if (get_option('basic_integration_head') <> '' && get_option('basic_integrate_header_enable') == 'on'){
			echo(get_option('basic_integration_head'));
		}
	?>
    <!-- start Mixpanel -->
        <script type="text/javascript">
        (function(c,a){window.mixpanel=a;var b,d,h,e;b=c.createElement("script");b.type="text/javascript";b.async=!0;b.src=("https:"===c.location.protocol?"https:":"http:")+'//cdn.mxpnl.com/libs/mixpanel-2.1.min.js';d=c.getElementsByTagName("script")[0];d.parentNode.insertBefore(b,d);a._i=[];a.init=function(b,c,f){function d(a,b){var c=b.split(".");2==c.length&&(a=a[c[0]],b=c[1]);a[b]=function(){a.push([b].concat(Array.prototype.slice.call(arguments,0)))}}var g=a;"undefined"!==typeof f?
        g=a[f]=[]:f="mixpanel";g.people=g.people||[];h="disable track track_pageview track_links track_forms register register_once unregister identify name_tag set_config people.identify people.set people.increment".split(" ");for(e=0;e<h.length;e++)d(g,h[e]);a._i.push([b,c,f])};a.__SV=1.1})(document,window.mixpanel||[]);
        mixpanel.init("67a67be0004361533572d194d17cf22e");
        </script>
    <!-- end Mixpanel -->
</head>
<body>
<!--This controls pages navigation bar-->
<div id="pages">
    <ul class="nav superfish">
		<?php
			if (get_option('basic_menupages') <> ''){
				$include_pages = implode(",", get_option('basic_menupages'));
			} 
			$include_cats = implode(",", get_option('basic_menucats'));
			$strdepth = '';
			if (get_option('basic_enable_dropdowns') == 'on'){
				$strdepth = "depth=".get_option('basic_tiers_shown_pages');
			}
			if ($strdepth == ''){
				$strdepth = "depth=1";
			}
			$strdepth2 = '';
			if (get_option('basic_enable_dropdowns_categories') == 'on'){
				$strdepth2 = "depth=".get_option('basic_tiers_shown_categories');
			}
			if ($strdepth2 == ''){
				$strdepth2 = "depth=1";
			}
			if (get_option('basic_swap_navbar') == 'false') {
				if (get_option('basic_home_link') == 'on') {
					?>
						<li <?php if (is_home()) echo('class="current_page_item"') ?>>
							<a href="<?php bloginfo('url'); ?>"><?php _e('Home','Basic') ?></a>
						</li>
					<?php
				}
				wp_list_pages("sort_column=".get_option('basic_sort_pages')."&sort_order=".get_option('basic_order_page')."&".$strdepth."&include=".$include_pages."&title_li=");
			} else {
				if (get_option('basic_home_link') == 'on') {
					?>
						<li <?php if (is_home()) echo('class="current_page_item"') ?>>
							<a href="<?php bloginfo('url'); ?>"><?php _e('Home','Basic') ?></a>
						</li>
					<?php
				}
				wp_list_categories("orderby=".get_option('basic_sort_cat')."&order=".get_option('basic_order_cat')."&".$strdepth2."&include=".$include_cats."&title_li=");
			}
		?>
    </ul>
    <div id="search">
        <form method="get" action="<?php bloginfo('home'); ?>" style="padding:0px 0px 0px 0px; margin:0px 0px 0px 0px">
            <input type="text"  name="s" value="<?php echo wp_specialchars($s, 1); ?>"/>
            <input type="image" class="input" src="<?php bloginfo('stylesheet_directory'); ?>/images/search-<?php echo $basic_color; ?>.gif" value="<?php _e('submit','Basic') ?>"/>
        </form>
    </div>
</div>
<!--End pages navigation-->
<div id="wrapper2">
