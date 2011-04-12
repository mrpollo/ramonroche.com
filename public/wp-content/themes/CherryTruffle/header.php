<?php
global $cherrytruffle_homepage_posts, $cherrytruffle_catnum_posts, $cherrytruffle_grab_image;
?>
<!doctype html> 
<!--[if lt IE 7 ]> 				<html class="no-js ie ie6"> <![endif]--> 
<!--[if IE 7 ]>    				<html class="no-js ie ie7"> <![endif]--> 
<!--[if IE 8 ]>    				<html class="no-js ie ie8"> <![endif]--> 
<!--[if (gte IE 9)|!(IE)]><!-->	<html class="no-js"> 		<!--<![endif]-->
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
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
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style-<?php echo(get_option('cherrytruffle_color_scheme'));?>.css" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!--[if IE 7]>	
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/iestyle.css" />
<![endif]-->
<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/ie6style-<?php echo(get_option('cherrytruffle_color_scheme'));?>.css" />
<script defer type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/pngfix.js"></script>
<![endif]-->
<?php
	if (get_option('cherrytruffle_child_css') == 'on') {
		?>
			<link rel="stylesheet" href="<?php echo(get_option('cherrytruffle_child_cssurl')); ?>" type="text/css" media="screen" />
		<?php
	};
	if (get_option('cherrytruffle_custom_colors') == 'on') {
		?>
			<style type="text/css">
				body { color: #<?php echo(get_option('cherrytruffle_color_mainfont')); ?> !important; }
				a:link, a:visited { color: #<?php echo(get_option('cherrytruffle_color_mainlink')); ?> !important; }
				#pages li a, .current_page_item a, .home-link a { color: #<?php echo(get_option('cherrytruffle_color_pagelink')); ?> !important; }
				#pages li a:hover { color: #<?php echo(get_option('cherrytruffle_color_pagelink_hover')); ?>!important; }
				#categories li a, .current_page_item a, .home-link a { color: #<?php echo(get_option('cherrytruffle_color_catlink')); ?> !important; }
				#categories li a:hover { color: #<?php echo(get_option('cherrytruffle_color_catlink_hover')); ?>!important; }
				#slogan { color: #<?php echo(get_option('cherrytruffle_color_slogan')); ?> !important; }
				.titles2 a, .titles a { color:#<?php echo(get_option('cherrytruffle_color_recentheadings')); ?> !important; }
				.sidebar-box-title { color:#<?php echo(get_option('cherrytruffle_color_sidebar_titles')); ?> !important; }
				.footer-box h3 { color:#<?php echo(get_option('cherrytruffle_color_footer_titles')); ?> !important; }
				#sidebar a { color:#<?php echo(get_option('cherrytruffle_color_sidebar_links')); ?> !important; }
				.footer-box li a:link, .footer-box li a:hover, .footer-box li a:visited, .footer-box li a  { color:#<?php echo(get_option('cherrytruffle_color_footer_link')); ?> !important; }
				.slogan { color:#<?php echo(get_option('cherrytruffle_color_slogan')); ?> !important; }
			</style>
		<?php
	};
?>
<?php
	if (get_option('cherrytruffle_integration_head') <> '' && get_option('cherrytruffle_integrate_header_enable') == 'on'){
		echo(get_option('cherrytruffle_integration_head'));
	}
?>
</head>
<body>
<div id="header">
			<?php if (get_option('cherrytruffle_menupages') <> '') $include_pages = implode(",", get_option('cherrytruffle_menupages')); 
				  $include_cats = implode(",", get_option('cherrytruffle_menucats'));
				  $strdepth = '';
				  if (get_option('cherrytruffle_categories_empty') == 'on') $hide = '1';
				  if (get_option('cherrytruffle_categories_empty') == 'false') $hide = '0';
				  if (get_option('cherrytruffle_enable_dropdowns') == 'on') $strdepth = "depth=".get_option('cherrytruffle_tiers_shown_pages');
				  if ($strdepth == '') $strdepth = "depth=1";
				  $strdepth2 = '';
				  if (get_option('cherrytruffle_enable_dropdowns_categories') == 'on') $strdepth2 = "depth=".get_option('cherrytruffle_tiers_shown_categories');
				  if ($strdepth2 == '') $strdepth2 = "depth=1"; ?>
    <!--This controls the categories navigation bar-->
    <div id="categories">
        <ul class="nav superfish">
				<?php if (get_option('cherrytruffle_swap_navbar') == 'false') { ?>
					<?php wp_list_categories("orderby=".get_option('cherrytruffle_sort_cat')."&order=".get_option('cherrytruffle_order_cat')."&".$strdepth2."&include=".$include_cats."&hide_empty=".$hide."&title_li="); ?>
				<?php } else { ?>
                	<?php if (get_option('cherrytruffle_home_link') == 'on') { ?>
					<li <?php if (is_home()) echo('class="current_page_item"') ?>><a href="<?php bloginfo('url'); ?>"><?php _e('Home','CherryTruffle') ?></a></li>
                    <?php }; ?>
					<?php wp_list_pages("sort_column=".get_option('pcherrytruffle_sort_pages')."&sort_order=".get_option('cherrytruffle_order_page')."&".$strdepth."&include=".$include_pages."&title_li="); ?>
				<?php } ?>
        </ul>
    </div>
    <!--End category navigation-->
    <div id="header-inside"> <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" alt="logo" class="logo" /></a> 
            <?php if (get_option('cherrytruffle_display_social') == 'on') { ?>  
    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/separate.png" alt="separate" style="float: left; margin: 5px 15px 0px 15px;" />
		<?php if (get_option('cherrytruffle_rss') == 'Disable') { ?>
        <?php { echo ''; } ?>
        <?php } else { include(TEMPLATEPATH . '/includes/icon-rss.php'); } ?>
        <?php if (get_option('cherrytruffle_icon_twitter_display') == 'false') { ?>
        <?php { echo ''; } ?>
        <?php } else { include(TEMPLATEPATH . '/includes/icon-twitter.php'); } ?>
        <?php if (get_option('cherrytruffle_icon_facebook_display') == 'false') { ?>
        <?php { echo ''; } ?>
        <?php } else { include(TEMPLATEPATH . '/includes/icon-facebook.php'); } ?>
        <?php if (get_option('cherrytruffle_icon_myspace_display') == 'false') { ?>
        <?php { echo ''; } ?>
        <?php } else { include(TEMPLATEPATH . '/includes/icon-myspace.php'); } ?>
        <?php if (get_option('cherrytruffle_icon_linkedin_display') == 'false') { ?>
        <?php { echo ''; } ?>
        <?php } else { include(TEMPLATEPATH . '/includes/icon-linkedin.php'); } ?>
        <?php if (get_option('cherrytruffle_icon_stumble_display') == 'false') { ?>
        <?php { echo ''; } ?>
        <?php } else { include(TEMPLATEPATH . '/includes/icon-stumble.php'); } ?>
        <?php if (get_option('cherrytruffle_icon_youtube_display') == 'false') { ?>
        <?php { echo ''; } ?>
        <?php } else { include(TEMPLATEPATH . '/includes/icon-youtube.php'); } ?>
        <?php }; ?>
        <?php if (get_option('cherrytruffle_display_search') == 'on') { ?>
        <div class="search_bg">
            <div id="search">
                <form method="get" action="<?php bloginfo('home'); ?>" style="padding:0px 0px 0px 0px; margin:0px 0px 0px 0px">
                    <input type="text"  name="s" value="<?php echo wp_specialchars($s, 1); ?>"/>
                    <input type="image" class="input" src="<?php bloginfo('stylesheet_directory'); ?>/images/search-button.png" value="submit"/>
                </form>
            </div>
        </div>
        <?php }; ?>
        <div style="clear: both;"></div>
        <div id="slogan">
            <?php bloginfo('description'); ?>
        </div>
        <?php if (get_option('cherrytruffle_468_enable') == 'on') { ?>
        <?php include(TEMPLATEPATH . '/includes/468x60.php'); ?>
        <?php } else { echo ''; } ?>
    </div>
</div>
<div style="clear: both;"></div>
<!--This controls pages navigation bar-->
<div id="pages">
    <ul class="nav superfish" id="nav2">
				<?php if (get_option('cherrytruffle_swap_navbar') == 'false') { ?>
                <?php if (get_option('cherrytruffle_home_link') == 'on') { ?>
					<li <?php if (is_home()) echo('class="current_page_item"') ?>><a href="<?php bloginfo('url'); ?>"><?php _e('Home','CherryTruffle') ?></a></li>
                <?php }; ?>
					<?php wp_list_pages("sort_column=".get_option('cherrytruffle_sort_pages')."&sort_order=".get_option('cherrytruffle_order_page')."&".$strdepth."&include=".$include_pages."&title_li="); ?>
				<?php } else { ?>
					<?php wp_list_categories("orderby=".get_option('cherrytruffle_sort_cat')."&order=".get_option('cherrytruffle_order_cat')."&".$strdepth."&include=".$include_cats."&hide_empty=".$hide."&title_li="); ?>
				<?php } ?>
    </ul>
</div>
<!--End pages navigation-->
<div id="wrapper2">
<?php if (get_option('cherrytruffle_leader_enable') == 'on') { ?>
<div style="margin: 30px 100px;">
<a href="<?php echo (get_option('cherrytruffle_leader_url')); ?>"><img src="<?php echo (get_option('cherrytruffle_leader_image')); ?>" alt="banner" style="border: none;" /></a>
</div>
<?php }; ?>