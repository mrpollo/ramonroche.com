<?php global $basic_color, $basic_grab_image, $basic_catnum_posts; 
	
	if (get_option('basic_menupages') <> '') $include_pages = implode(",", get_option('basic_menupages')); 
	$strdepth = '';
	if (get_option('basic_enable_dropdowns') == 'on') $strdepth = "depth=".get_option('basic_tiers_shown_pages');
	if ($strdepth == '') $strdepth = "depth=1";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php elegant_titles(); ?></title>
<?php elegant_description(); ?> 
<?php elegant_keywords(); ?> 
<?php elegant_canonical(); ?>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style<?php echo $basic_color; ?>.css" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!--[if IE 7]>	
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/iestyle.css" />
<![endif]-->
<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/ie6style.css" />
<script defer type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/pngfix.js"></script>
<![endif]-->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/superfish.js"></script>
<script type="text/javascript">
jQuery(function(){
jQuery('ul.superfish').superfish();
<?php if (get_option('basic_disable_toptier') == 'on') echo('jQuery("ul.nav > li > a > span.sf-sub-indicator").parent().attr("href","#");'); ?>
});
</script>

<?php if (get_option('basic_child_css') == 'on') { //Enable child stylesheet  ?>
<link rel="stylesheet" href="<?php echo(get_option('basic_child_cssurl')); ?>" type="text/css" media="screen" />
<?php }; ?>

<?php if (get_option('basic_custom_colors') == 'on') { //Enable custom colors  ?>
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
<?php }; ?>

<?php if (get_option('basic_integration_head') <> '' && get_option('basic_integrate_header_enable') == 'on') echo(get_option('basic_integration_head')); ?>
</head>
<body>
<!--This controls pages navigation bar-->
<div id="pages">
    <ul class="nav superfish">
        
                    	<?php if (get_option('basic_menupages') <> '') $include_pages = implode(",", get_option('basic_menupages')); 
				  $include_cats = implode(",", get_option('basic_menucats'));
				  $strdepth = '';
				  if (get_option('basic_enable_dropdowns') == 'on') $strdepth = "depth=".get_option('basic_tiers_shown_pages');
				  if ($strdepth == '') $strdepth = "depth=1";
				  $strdepth2 = '';
				  if (get_option('basic_enable_dropdowns_categories') == 'on') $strdepth2 = "depth=".get_option('basic_tiers_shown_categories');
				  if ($strdepth2 == '') $strdepth2 = "depth=1"; ?>
            	<?php if (get_option('basic_swap_navbar') == 'false') { ?>
                <?php if (get_option('basic_home_link') == 'on') { ?>
					<li <?php if (is_home()) echo('class="current_page_item"') ?>><a href="<?php bloginfo('url'); ?>"><?php _e('Home','Basic') ?></a></li>
                <?php }; ?>
					<?php wp_list_pages("sort_column=".get_option('basic_sort_pages')."&sort_order=".get_option('basic_order_page')."&".$strdepth."&include=".$include_pages."&title_li="); ?>
				<?php } else { ?>
                  <?php if (get_option('basic_home_link') == 'on') { ?>
					<li <?php if (is_home()) echo('class="current_page_item"') ?>><a href="<?php bloginfo('url'); ?>"><?php _e('Home','Basic') ?></a></li>
                <?php }; ?>
					<?php wp_list_categories("orderby=".get_option('basic_sort_cat')."&order=".get_option('basic_order_cat')."&".$strdepth2."&include=".$include_cats."&title_li="); ?>
				<?php } ?>
                
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
