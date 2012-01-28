<?php 
$themename = "eNews";
$shortname = "enews";

$cats_array = get_categories('hide_empty=0');
$pages_array = get_pages('hide_empty=0');
$site_pages = array();

$site_cats = array();

foreach ($pages_array as $pagg) {
	$site_pages[$pagg->ID] = $pagg->post_title;
	$pages_ids[] = $pagg->ID;
}

foreach ($cats_array as $categs) {
	$site_cats[$categs->cat_ID] = $categs->cat_name;
	$cats_ids[] = $categs->cat_ID;
}

$options = array (

	array( "name" => "wrap-general",
		   "type" => "contenttab-wrapstart",),
	
		array( "type" => "subnavtab-start",),
		
			array( "name" => "general-1",
				   "type" => "subnav-tab",
				   "desc" => "General"),
					
			array( "name" => "general-2",
				   "type" => "subnav-tab",
				   "desc" => "Homepage"),
					
			array( "name" => "general-3",
				   "type" => "subnav-tab",
				   "desc" => "Featured Slider"),	
				   
		array( "type" => "subnavtab-end",),
		
		array( "name" => "general-1",
			   "type" => "subcontent-start",),

			array( "name" => "Color Scheme",
				   "id" => $shortname."_color_scheme",
				   "type" => "select",
				   "std" => "Blue",
				   "desc" => "This theme comes with multiple color schemes. You can switch between these color schemes at any time using this dropdown menu. Once you click save your theme will be updated with the new color scheme automatically.",
				   "options" => array("Blue", "Turquoise", "Green", "Purple", "Red")),			   
			
			array( "name" => "Blog Style post format",
                   "id" => $shortname."_blog_style",
                   "type" => "checkbox",
                   "std" => "false",
                   "desc" => "By default the theme truncates your posts on index/homepages automatically to create post previews. If you would rather show your posts in full on index pages like a traditional blog then you can activate this feature."),
			
			array( "name" => "Feedburner Integration",
				   "id" => $shortname."_feedburner",
			       "type" => "checkbox2",
				   "std" => "false",
				   "desc" => "If you have a feedburner account and would like to integrate it activate this option. Next fill in the following fields pertaining to your feedburner account. Once set up your RSS links will lead to your feedburner account instead of directly to your WordPress RSS feed."),
			
			array( "type" => "clearfix",),

			array( "name" => "FeedBurner RSS Feed Address",
            "id" => $shortname."_feedburner_rss",
            "type" => "text",
            "std" => "",
			"desc" => "To integrate feedburner into the theme input your feedburner URL here. Your RSS link will then lead to your feedburner account."),
	
			array( "name" => "FeedBurner Comments Feed Address",
            "id" => $shortname."_feedburner_comments",
            "type" => "text",
            "std" => "",
			"desc" => "To integrate feedburner into the theme input your WordPress comments feedburner URL here. Your RSS link will then lead to your feedburner account."),
			
			array( "name" => "FeedBurner Email Subscription Url",
            "id" => $shortname."_feedburner_email",
            "type" => "text",
            "std" => "",
			"desc" => "To integrate feedburner into the theme input your feedburner email subscribe link here. The email rss link will then lead to your feeburner account."),
			
			array( "name" => "Date format",
				   "id" => $shortname."_date_format",
				   "std" => "M j, Y",
                   "type" => "text",
				   "desc" => "This option allows you to change how your dates are displayed. For more information please refer to the WordPress codex here:<a href='http://codex.wordpress.org/Formatting_Date_and_Time' target='_blank'>Formatting Date and Time</a>"),
			
			array( "name" => "Grab the first post image",
				   "id" => $shortname."_grab_image",
				   "type" => "checkbox2",
				   "std" => "false",
				   "desc" => "By default thumbnail images are created using custom fields. However, if you would rather use the images that are already in your post for your thumbnail (and bypass using custom fields) you can activate this option. Once activcated thumbnail images will be generated automatically using the first image in your post. The image must be hosted on your own server."),
			
			array( "type" => "clearfix",),
							   
		array( "name" => "general-1",
			   "type" => "subcontent-end",),
			   
		array( "name" => "general-2",
			   "type" => "subcontent-start",),
			   
			array( "name" => "Recent From Category 1",
                   "id" => $shortname."_recent_cat1",
                   "type" => "select",
			       "options" => $site_cats,
				   "desc" => "On the homepage there are category boxes which feature the most recent articles from specific categories. Here you can choose which categories these sections pull from. Simply choose your desired category from the dropdown menu and the category box will display the recent articles from the chosen category."),
	
			array( "name" => "Recent From Category 2",
                   "id" => $shortname."_recent_cat2",
                   "type" => "select",
			       "options" => $site_cats,
				   "desc" => "On the homepage there are category boxes which feature the most recent articles from specific categories. Here you can choose which categories these sections pull from. Simply choose your desired category from the dropdown menu and the category box will display the recent articles from the chosen category.."),
			
			array( "name" => "Recent From Category 3",
                   "id" => $shortname."_recent_cat3",
                   "type" => "select",
			       "options" => $site_cats,
				   "desc" => "On the homepage there are category boxes which feature the most recent articles from specific categories. Here you can choose which categories these sections pull from. Simply choose your desired category from the dropdown menu and the category box will display the recent articles from the chosen category."),
			
			array( "name" => "Number of Recent Posts displayed on homepage",
                   "id" => $shortname."_homepage_posts",
                   "std" => "7",
                   "type" => "text",
				   "desc" => "Here you can designate how many recent articles are displayed on the homepage. This option works independently from the Settings > Reading options in wp-admin."),
			
			array( "name" => "Exclude categories from homepage recent posts",
				   "id" => $shortname."_exlcats_recent",
				   "type" => "checkboxes",
				   "std" => $cats_ids,
				   "desc" => "By default the homepage displays a list of all of your most recent posts. However, if you would like to exlcude certain category from the list you can do so here. ",
				   "usefor" => "categories",
				   "options" => $cats_ids),
				   
		array( "name" => "general-2",
			   "type" => "subcontent-end",),
		
		array( "name" => "general-3",
				   "type" => "subcontent-start",),
				   
			array( "name" => "Display Featured Slider",
                   "id" => $shortname."_featured",
                   "type" => "checkbox",
                   "std" => "on",
                   "desc" => "You can choose whether or not to display the Featured Articles section on the homepge. If you don't want to utilize this feature simply disable this option."),				   
			
			array( "name" => "Duplicate Featured Articles",
                   "id" => $shortname."_duplicate",
                   "type" => "checkbox2",
                   "std" => "false",
                   "desc" => "In some cases your Featured Articles will also be one of your most recent articles, in which case the article will be displayed twice on the homepage. If you would like to remove duplicate posts enable this option."),
			
			array( "type" => "clearfix",),

			array( "name" => "Automatic Slider Animation",
                   "id" => $shortname."_slider_auto",
                   "type" => "checkbox",
                   "std" => "false",
                   "desc" => "If you would like the Featured Articles slider to slide automatically, without the visitor having to click the next button, enable this option and then adjust the rotation speed below if desired."),
			
			array( "name" => "Pause When Mousehover",
                   "id" => $shortname."_slider_pause",
                   "type" => "checkbox2",
                   "std" => "false",
                   "desc" => "Enabling the option will stop the automatic rotation of featured articles while the visitor's cursor is hovering over the featured articles slider. This will allow the visitor to read the article preview without the slider rotating."),
			
			array( "type" => "clearfix",),
			
			array( "name" => "Featured Category",
                   "id" => $shortname."_feat_cat",
                   "type" => "select",
			       "options" => $site_cats,
				   "desc" => "description"),
			
			array( "name" => "Number of Featured-Posts Displayed on Homepage",
                   "id" => $shortname."_homepage_featured",
                   "std" => "3",
                   "type" => "text",
				   "desc" => "Here you can designate how many articles are displayed in the Featured Articles section on the homepage."),
			
			array( "name" => "Automatic Rotation Speed",
                   "id" => $shortname."_slider_auto_speed",
                   "std" => "7000",
                   "type" => "text",
				   "desc" => "This value effects how fast/slow the slider rotates when the automatic rotation setting is enabled."),
			
			array( "name" => "Featured Slider Animation",
                   "id" => $shortname."_slider_effect",
                   "type" => "select",
                   "std" => "fade",
				   "desc" => "Here you can choose which animation type to be used when the slider is rotating between articles.",
                   "options" => array("fade", "blindX", "blindY", "blindZ", "cover", "scrollUp", "scrollDown", "scrollLeft", "scrollRight")),				      
		array( "name" => "general-3",
			   "type" => "subcontent-end",),
				   
	array(  "name" => "wrap-general",
			"type" => "contenttab-wrapend",),
			
//-------------------------------------------------------------------------------------//

	array( "name" => "wrap-navigation",
		   "type" => "contenttab-wrapstart",),
		   
		array( "type" => "subnavtab-start",),
		
			array( "name" => "navigation-1",
				   "type" => "subnav-tab",
				   "desc" => "Pages"),
					
			array( "name" => "navigation-2",
				   "type" => "subnav-tab",
				   "desc" => "Categories"),

			array( "name" => "navigation-3",
				   "type" => "subnav-tab",
				   "desc" => "General Settings"),
				   
		array( "type" => "subnavtab-end",),
		
		array( "name" => "navigation-1",
			   "type" => "subcontent-start",),
			   
			array( "name" => "Exclude pages from the navigation bar",
				   "id" => $shortname."_menupages",
				   "type" => "checkboxes",
				   "std" => $pages_ids,
				   "desc" => "Here you can choose to remove certain pages from the navigation menu. All pages marked with an X will not appear in your navigation bar. ",
				   "usefor" => "pages",
				   "options" => $pages_ids),
			
			array( "name" => "Show dropdown menus",
            "id" => $shortname."_enable_dropdowns",
            "type" => "checkbox",
            "std" => "on",
			"desc" => "If you would like to remove the dropdown menus from the pages navigation bar disable this feature."),
			
			array( "name" => "Display Home link",
            "id" => $shortname."_home_link",
            "type" => "checkbox2",
            "std" => "on",
			"desc" => "By default the theme creates a Home link that, when clicked, leads back to your blog's homepage. If, however, you are using a static homepage and have already created a page called Home to use, this will result in a duplicate link. In this case you should disable this feature to remove the link."),
			
			array( "name" => "Order Pages Links by Ascending/Descending",
                   "id" => $shortname."_order_page",
                   "type" => "select",
                   "std" => "asc",
				   "desc" => "Here you can choose to reverse the order that your pages links are displayed. You can choose between ascending and descending.",
                   "options" => array("asc", "desc")),
			
			array( "name" => "Number of dropdown tiers shown",
            "id" => $shortname."_tiers_shown_pages",
            "type" => "text",
            "std" => "3",
			"desc" => "This options allows you to control how many teirs your pages dropdown menu has. Increasing the number allows for additional menu items to be shown."),

			array( "type" => "clearfix",),

		
		array( "name" => "navigation-1",
			   "type" => "subcontent-end",),
			   
		array( "name" => "navigation-2",
			   "type" => "subcontent-start",),
			
			array( "name" => "Exclude categories from the navigation bar",
				   "id" => $shortname."_menucats",
				   "type" => "checkboxes",
				   "std" => $cats_ids,
				   "desc" => "Here you can choose to remove certain categories from the navigation menu. All categories marked with an X will not appear in your navigation bar. ",
				   "usefor" => "categories",
				   "options" => $cats_ids),
			
			array( "name" => "Show dropdown menus",
            "id" => $shortname."_enable_dropdowns_categories",
            "type" => "checkbox2",
            "std" => "on",
			"desc" => "If you would like to remove the dropdown menus from the categories navigation bar disable this feature."),

			array( "name" => "Number of dropdown tiers shown",
            "id" => $shortname."_tiers_shown_categories",
            "type" => "text",
            "std" => "3",
			"desc" => "This options allows you to control how many teirs your pages dropdown menu has. Increasing the number allows for additional menu items to be shown."),

			array( "type" => "clearfix",),
				   
		    array( "name" => "Sort Categories Links by Name/ID",
                   "id" => $shortname."_sort_cat",
                   "type" => "select",
                   "std" => "name",
				   "desc" => "By default pages are sorted by name. However if you would rather have them sorted by ID you can adjust this setting.",
                   "options" => array("name", "ID")),
			
			array( "name" => "Order Category Links by Ascending/Descending",
                   "id" => $shortname."_order_cat",
                   "type" => "select",
                   "std" => "asc",
				   "desc" => "Here you can choose to reverse the order that your categories links are displayed. You can choose between ascending and descending.",
                   "options" => array("asc", "desc")),
				 
		array( "name" => "navigation-2",
			   "type" => "subcontent-end",),	 

		array( "name" => "navigation-3",
			   "type" => "subcontent-start",),

			array( "name" => "Swap the pages/category navbar positions",
            "id" => $shortname."_swap_navbar",
            "type" => "checkbox",
            "std" => "false",
			"desc" => "By default the theme displays the Pages links in the top navigation bar and the categories links in the bottom navigation bar. You can swap the positions of these links if you would rather have your categories listed at the top and your pages listed on the bottom. "),
			
			array( "name" => "Disable top tier dropdown menu links",
            "id" => $shortname."_disable_toptier",
            "type" => "checkbox2",
            "std" => "false",
			"desc" => "In some cases users will want to create parent categories or links as placeholders to hold a list of child links or categories. In this case it is not desirable to have the parent links lead anywhere, but instead merely serve an organizational function. Enabling this options will remove the links from all parent pages/categories so that they don't lead anywhere when clicked."),
			
			array( "type" => "clearfix",),
			
		array( "name" => "navigation-3",
			   "type" => "subcontent-end",),	 
		
	array( "name" => "wrap-navigation",
		   "type" => "contenttab-wrapend",),

//-------------------------------------------------------------------------------------//

	array( "name" => "wrap-layout",
		   "type" => "contenttab-wrapstart",),
		   
		array( "type" => "subnavtab-start",),
		
			array( "name" => "layout-1",
				   "type" => "subnav-tab",
				   "desc" => "Single Post Layout"),
				 
			array( "name" => "layout-2",
				   "type" => "subnav-tab",
				   "desc" => "Single Page Layout"),
			
			array( "name" => "layout-3",
				   "type" => "subnav-tab",
				   "desc" => "Homepage Layout"),
			
		array( "type" => "subnavtab-end",),
		
		array( "name" => "layout-1",
			   "type" => "subcontent-start",),
				
			array( "name" => "Choose which items to display in the postinfo section",
				   "id" => $shortname."_postinfo",
				   "type" => "different_checkboxes",
				   "std" => array("author","date","categories","comments"),
				   "desc" => "Here you can choose which items appear in the postinfo section on single post pages. This is the area, usually below the post title, which displays basic information about your post. The highlighted itmes shown below will appear. ",
				   "options" => array("author","date","categories","comments")),

			array( "name" => "Place Thumbs on Posts",
                   "id" => $shortname."_thumbnails",
                   "type" => "checkbox",
                   "std" => "on",
                   "desc" => "By default thumbnails are placed at the beginning of your post on single post pages. If you would like to remove this initial thumbnail image to avoid repetition simply disable this option. "),

			array( "name" => "Show comments on posts",
            "id" => $shortname."_show_postcomments",
            "type" => "checkbox",
            "std" => "on",
			"desc" => "You can disable this option if you want to remove the comments and comment form from single post pages. "),
			
			array( "name" => "Adjust the width of thumbnail images",
				   "id" => $shortname."_thumbnail_width_posts",
				   "type" => "text",
				   "std" => "172",
				   "desc" => "Here you can adjust the width of your thumbnail images. The width value is in pixels.",),
			
			array( "name" => "Adjust the height of thumbnail images",
				   "id" => $shortname."_thumbnail_height_posts",
				   "type" => "text",
				   "std" => "172",
				   "desc" => "Here you can adjust the height of your thumbnail images. The height value is in pixels.",),
			
			array( "type" => "clearfix",),

		array( "name" => "layout-1",
			   "type" => "subcontent-end",),	

		array( "name" => "layout-2",
			   "type" => "subcontent-start",),
		
			array( "name" => "Place Thumbs on Pages",
                   "id" => $shortname."_page_thumbnails",
                   "type" => "checkbox",
                   "std" => "false",
                   "desc" => "By default thumbnails are not placed on pages (they are only used on posts). However, if you want to use thumbnails on posts you can! Just enable this option. "),

			array( "name" => "Show comments on pages",
            "id" => $shortname."_show_pagescomments",
            "type" => "checkbox",
            "std" => "false",
			"desc" => "By default comments are not placed on pages, however, if you would like to allow people to comment on your pages simply enable this option. "),
			
			array( "type" => "clearfix",),

			array( "name" => "Adjust the width of thumbnail images",
				   "id" => $shortname."_thumbnail_width_pages",
				   "type" => "text",
				   "std" => "172",
				   "desc" => "Here you can adjust the width of your thumbnail images. The width value is in pixels.",),
			
			array( "name" => "Adjust the height of thumbnail images",
				   "id" => $shortname."_thumbnail_height_pages",
				   "type" => "text",
				   "std" => "172",
				   "desc" => "Here you can adjust the height of your thumbnail images. The height value is in pixels.",),

		array( "name" => "layout-2",
			   "type" => "subcontent-end",),	

		array( "name" => "layout-3",
			   "type" => "subcontent-start",),	
		
			array( "name" => "Enable category boxes",
            "id" => $shortname."_home_catboxes",
            "type" => "checkbox",
            "std" => "on",
			"desc" => "Here you can turn on/off the homepage category boxes listed below the featured articles slider."),
			
			array( "type" => "clearfix",),

		
		array( "name" => "layout-3",
			   "type" => "subcontent-end",),	
		
	array( "name" => "wrap-layout",
		   "type" => "contenttab-wrapend",),
		   
//-------------------------------------------------------------------------------------//

	array( "name" => "wrap-colorization",
		   "type" => "contenttab-wrapstart",),
		   
		array( "type" => "subnavtab-start",),
		
			array( "name" => "colorization-1",
				   "type" => "subnav-tab",
				   "desc" => "Colorization"),
				   
		array( "type" => "subnavtab-end",),
		
		array( "name" => "colorization-1",
			   "type" => "subcontent-start",),
			   
			array( "name" => "Color visualizer (this is not setting, just a tool to find hexdecimal values)",
				   "type" => "colorpicker",
				   "desc" => "This is a tool that can be used to find hexdecimal color values. These values can be used to customize the colors of the various elements below. This color picker will also appear which you click in any of the fields below. ",),
				   
			array( "name" => "Enable custom colors",
                   "id" => $shortname."_custom_colors",
                   "type" => "checkbox",
                   "std" => "false",
                   "desc" => "This option allows you to customize the color of a certain element of the theme. When you click in the field a color picker will appear. Scroll to find your desired color and then click the circular submit button on the lower right to accept the value."),
			
			array( "name" => "Enable child stylesheet",
                   "id" => $shortname."_child_css",
                   "type" => "checkbox2",
                   "std" => "false",
                   "desc" => "If you would like to add a second stylsheet to your blog enable this option and input the link to your stylesheet below."),
			
			array( "type" => "clearfix",),
			
			array( "name" => "Child stylesheet URL",
				   "id" => $shortname."_child_cssurl",
				   "type" => "text",
				   "std" => "",
				   "desc" => "Input the URL to your child stylsheet here.",),
			
			array( "name" => "Background color",
				   "id" => $shortname."_color_bgcolor",
				   "type" => "textcolorpopup",
				   "std" => "",
				   "desc" => "This option allows you to customize the color of a certain element of the theme. When you click inside the field a color picker will appear. Scroll to find your desired color and then click the circular submit button on the lower right to accept the value.",),
			
			array( "name" => "Main font color",
				   "id" => $shortname."_color_mainfont",
				   "type" => "textcolorpopup",
				   "std" => "",
				   "desc" => "This option allows you to customize the color of a certain element of the theme. When you click inside the field a color picker will appear. Scroll to find your desired color and then click the circular submit button on the lower right to accept the value",),

			array( "name" => "Main link color (in the post body)",
				   "id" => $shortname."_color_mainlink",
				   "type" => "textcolorpopup",
				   "std" => "",
				   "desc" => "This option allows you to customize the color of a certain element of the theme. When you click inside the field a color picker will appear. Scroll to find your desired color and then click the circular submit button on the lower right to accept the value",),
				   
			array( "name" => "Page menu link color",
				   "id" => $shortname."_color_pagelink",
				   "type" => "textcolorpopup",
				   "std" => "",
				   "desc" => "This option allows you to customize the color of a certain element of the theme. When you click inside the field a color picker will appear. Scroll to find your desired color and then click the circular submit button on the lower right to accept the value",),
				   
			array( "name" => "Categories menu link color",
				   "id" => $shortname."_color_catslink",
				   "type" => "textcolorpopup",
				   "std" => "",
				   "desc" => "This option allows you to customize the color of a certain element of the theme. When you click inside the field a color picker will appear. Scroll to find your desired color and then click the circular submit button on the lower right to accept the value",),
				   
			array( "name" => "Featured article header color",
				   "id" => $shortname."_color_featheader",
				   "type" => "textcolorpopup",
				   "std" => "",
				   "desc" => "This option allows you to customize the color of a certain element of the theme. When you click inside the field a color picker will appear. Scroll to find your desired color and then click the circular submit button on the lower right to accept the value",),
				   
			array( "name" => "Recent posts headings color",
				   "id" => $shortname."_color_recentheadings",
				   "type" => "textcolorpopup",
				   "std" => "",
				   "desc" => "This option allows you to customize the color of a certain element of the theme. When you click inside the field a color picker will appear. Scroll to find your desired color and then click the circular submit button on the lower right to accept the value",),
				   
			array( "name" => "Sidebar title headings color",
				   "id" => $shortname."_color_sidebar_titles",
				   "type" => "textcolorpopup",
				   "std" => "",
				   "desc" => "This option allows you to customize the color of a certain element of the theme. When you click inside the field a color picker will appear. Scroll to find your desired color and then click the circular submit button on the lower right to accept the value",),
				   
		    array( "name" => "Footer widgets headings color",
				   "id" => $shortname."_color_footer_titles",
				   "type" => "textcolorpopup",
				   "std" => "",
				   "desc" => "This option allows you to customize the color of a certain element of the theme. When you click inside the field a color picker will appear. Scroll to find your desired color and then click the circular submit button on the lower right to accept the value",),
				   
			array( "name" => "Footer links color",
				   "id" => $shortname."_color_footer_links",
				   "type" => "textcolorpopup",
				   "std" => "",
				   "desc" => "This option allows you to customize the color of a certain element of the theme. When you click inside the field a color picker will appear. Scroll to find your desired color and then click the circular submit button on the lower right to accept the value",),
				   
			array( "name" => "Breadcrumb text color",
				   "id" => $shortname."_color_breadcrumb",
				   "type" => "textcolorpopup",
				   "std" => "",
				   "desc" => "This option allows you to customize the color of a certain element of the theme. When you click inside the field a color picker will appear. Scroll to find your desired color and then click the circular submit button on the lower right to accept the value",),
				   
			array( "name" => "Page/Post heading title color",
				   "id" => $shortname."_color_heading",
				   "type" => "textcolorpopup",
				   "std" => "",
				   "desc" => "This option allows you to customize the color of a certain element of the theme. When you click inside the field a color picker will appear. Scroll to find your desired color and then click the circular submit button on the lower right to accept the value",),
		
		array( "name" => "colorization-1",
			   "type" => "subcontent-end",),		
			   
	array( "name" => "wrap-colorization",
		   "type" => "contenttab-wrapend",),
		   
//-------------------------------------------------------------------------------------//
	array( "name" => "wrap-seo",
		   "type" => "contenttab-wrapstart",),
	
		array( "type" => "subnavtab-start",),
		
			array( "name" => "seo-1",
				   "type" => "subnav-tab",
				   "desc" => "Homepage SEO",),
					
			array( "name" => "seo-2",
				   "type" => "subnav-tab",
				   "desc" => "Single Post Page SEO",),
					
			array( "name" => "seo-3",
				   "type" => "subnav-tab",
				   "desc" => "Index Page SEO",),	
				   
		array( "type" => "subnavtab-end",),
		
		array( "name" => "seo-1",
			   "type" => "subcontent-start",),
			   
			array( "name" => " Enable custom title ",
				   "id" => $shortname."_seo_home_title",
				   "type" => "checkbox",
				   "std" => "false",
				   "desc" => "By default the theme uses a combination of your blog name and your blog description, as defined when you created your blog, to create your homepage titles. However if you want to create a custom title then simply enable this option and fill in the custom title field below. ",),  
			
			array( "name" => " Enable meta description",
				   "id" => $shortname."_seo_home_description",
				   "type" => "checkbox",
				   "std" => "false",
				   "desc" => "By default the theme uses your blog description, as defined when you created your blog, to fill in the meta description field. If you would like to use a different description then enable this option and fill in the custom description field below. ",),  
			
			array( "name" => " Enable meta keywords",
				   "id" => $shortname."_seo_home_keywords",
				   "type" => "checkbox",
				   "std" => "false",
				   "desc" => "By default the theme does not add keywords to your header. Most search engines don't use keywords to rank your site anymore, but some people define them anyway just in case. If you want to add meta keywords to your header then enable this option and fill in the custom keywords field below. ",),  
			
			array( "name" => " Enable canonical URL's",
				   "id" => $shortname."_seo_home_canonical",
				   "type" => "checkbox",
				   "std" => "false",
				   "desc" => "Canonicalization helps to prevent the indexing of duplicate content by search engines, and as a result, may help avoid duplicate content penalties and pagerank degradation. Some pages may have different URLs all leading to the same place. For example domain.com, domain.com/index.html, and www.domain.com are all different URLs leading to your homepage. From a search engine's perspective these duplicate URLs, which also occur often due to custom permalinks, may be treaded individually instead of as a single destination. Defining a canonical URL tells the search engine which URL you would like to use officially. The theme bases its canonical URLs off your permalinks and the domain name defined in the settings tab of wp-admin.",),  
			
			array( "type" => "clearfix",),
			
			array( "name" => "Homepage custom title (if enabled)",
				   "id" => $shortname."_seo_home_titletext",
				   "type" => "text",
				   "std" => "",
				   "desc" => "If you have enabled custom titles you can add your custom title here. Whatever you type here will be placed between the < title >< /title > tags in header.php",),

			array( "name" => "Homepage meta description (if enabled)",
				   "id" => $shortname."_seo_home_descriptiontext",
				   "type" => "textarea",
				   "std" => "",
				   "desc" => "If you have enabled meta descriptions you can add your custom description here.",),
			
			array( "name" => "Homepage meta keywords (if enabled)",
				   "id" => $shortname."_seo_home_keywordstext",
				   "type" => "text",
				   "std" => "",
				   "desc" => "If you have enabled meta keywords you can add your custom keywords here. Keywords should be separated by comas. For example: wordpress,themes,templates,elegant",),
				   
			array( "name" => "If custom titles are disabled, choose autogeneration method",
				   "id" => $shortname."_seo_home_type",
				   "type" => "select",
				   "std" => "BlogName | Blog description",
				   "options" => array("BlogName | Blog description", "Blog description | BlogName", "BlogName only"),
				   "desc" => "If you are not using cutsom post titles you can still have control over how your titles are generated. Here you can choose which order you would like your post title and blog name to be displayed, or you can remove the blog name from the title completely.",),
			
			array( "name" => "Define a character to separate BlogName and Post title",
				   "id" => $shortname."_seo_home_separate",
				   "type" => "text",
				   "std" => " | ",
				   "desc" => "Here you can change which character separates your blog title and post name when using autogenerated post titles. Common values are | or -",),
				   
		array( "name" => "seo-1",
			   "type" => "subcontent-end",),
			   
		array( "name" => "seo-2",
			   "type" => "subcontent-start",),
			   
			array( "name" => "Enable custom titles",
				   "id" => $shortname."_seo_single_title",
				   "type" => "checkbox",
				   "std" => "false",
				   "desc" => "By default the theme creates post titles based on the title of your post and your blog name. If you would like to make your meta title different than your actual post title you can define a custom title for each post using custom fields. This option must be enabled for custom titles to work, and you must choose a custom field name for your title below.",),  
			
			array( "name" => "Enable custom description",
				   "id" => $shortname."_seo_single_description",
				   "type" => "checkbox",
				   "std" => "false",
				   "desc" => "If you would like to add a meta description to your post you can do so using custom fields. This option must be enabled for descriptions to be displayed on post pages. You can add your meta description using custom fields based off the custom field name you define below.",),  
			
			array( "name" => "Enable custom keywords",
				   "id" => $shortname."_seo_single_keywords",
				   	"type" => "checkbox",
				   "std" => "false",
				   "desc" => "If you would like to add meta keywords to your post you can do so using custom fields. This option must be enabled for keywords to be displayed on post pages. You can add your meta keywords using custom fields based off the custom field name you define below.",),  
			
			array( "name" => "Enable canonical URL's",
				   "id" => $shortname."_seo_single_canonical",
				   "type" => "checkbox",
				   "std" => "false",
				   "desc" => "Canonicalization helps to prevent the indexing of duplicate content by search engines, and as a result, may help avoid duplicate content penalties and pagerank degradation. Some pages may have different URL's all leading to the same place. For example domain.com, domain.com/index.html, and www.domain.com are all different URLs leading to your homepage. From a search engine's perspective these duplicate URLs, which also occur often due to custom permalinks, may be treaded individually instead of as a single destination. Defining a canonical URL tells the search engine which URL you would like to use officially. The theme bases its canonical URLs off your permalinks and the domain name defined in the settings tab of wp-admin.",), 
			
			array( "name" => "Custom field Name to be used for title",
				   "id" => $shortname."_seo_single_field_title",
				   "type" => "text",
				   "std" => "seo_title",
				   "desc" => "When you define your title using custom fields you should use this value for the custom field Name. The Value of your custom field should be the custom title you would like to use.",), 
			
			array( "name" => "Custom field Name to be used for description",
				   "id" => $shortname."_seo_single_field_description",
				   "type" => "text",
				   "std" => "seo_description",
				   "desc" => "When you define your meta description using custom fields you should use this value for the custom field Name. The Value of your custom field should be the custom description you would like to use.",), 
			
			array( "name" => "Custom field Name to be used for keywords",
				   "id" => $shortname."_seo_single_field_keywords",
				   "type" => "text",
				   "std" => "seo_keywords",
				   "desc" => "When you define your keywords using custom fields you should use this value for the custom field Name. The Value of your custom field should be the meta keywords you would like to use, separated by comas.",), 
			
			array( "name" => "If custom titles are disabled, choose autogeneration method",
				   "id" => $shortname."_seo_single_type",
				   "type" => "select",
				   "std" => "Post title | BlogName",
				   "options" => array("Post title | BlogName", "BlogName | Post title", "Post title only"),
				   "desc" => "If you are not using cutsom post titles you can still have control over hw your titles are generated. Here you can choose which order you would like your post title and blog name to be displayed, or you can remove the blog name from the title completely.",),
			
			array( "name" => "Define a character to separate BlogName and Post title",
				   "id" => $shortname."_seo_single_separate",
				   "type" => "text",
				   "std" => " | ",
				   "desc" => "Here you can change which character separates your blog title and post name when using autogenerated post titles. Common values are | or -",), 
				   
		array( "name" => "seo-2",
			   "type" => "subcontent-end",),
		
		array( "name" => "seo-3",
				   "type" => "subcontent-start",),
		
			array( "name" => " Enable canonical URL's",
				   "id" => $shortname."_seo_index_canonical",
				   "type" => "checkbox",
				   "std" => "false",
				   "desc" => "Canonicalization helps to prevent the indexing of duplicate content by search engines, and as a result, may help avoid duplicate content penalties and pagerank degradation. Some pages may have different URL's all leading to the same place. For example domain.com, domain.com/index.html, and www.domain.com are all different URLs leading to your homepage. From a search engine's perspective these duplicate URLs, which also occur often due to custom permalinks, may be treaded individually instead of as a single destination. Defining a canonical URL tells the search engine which URL you would like to use officially. The theme bases its canonical URLs off your permalinks and the domain name defined in the settings tab of wp-admin.",),  
			
			array( "name" => "Enable meta descriptions",
				   "id" => $shortname."_seo_index_description",
				   	"type" => "checkbox",
				   "std" => "false",
				   "desc" => "Check this box if you want to display meta descriptions on category/archive pages. The description is based off the category description you choose when creating/edit your category in wp-admin.",),  
				   
			array( "name" => "Choose title autogeneration method",
				   "id" => $shortname."_seo_index_type",
				   "type" => "select",
				   "std" => "Category name | BlogName",
				   "options" => array("Category name | BlogName", "BlogName | Category name", "Category name only"),
				   "desc" => "Here you can choose how your titles on index pages are generated. You can change which order your blog name and index title are displayed, or you can remove the blog name from the title completely.",),
			
			array( "name" => "Define a character to separate BlogName and Post title",
				   "id" => $shortname."_seo_index_separate",
				   "type" => "text",
				   "std" => " | ",
				   "desc" => "Here you can change which character separates your blog title and index page name when using autogenerated post titles. Common values are | or -",), 
			
			array( "type" => "clearfix",),
					   
		array( "name" => "seo-3",
				   "type" => "subcontent-end",),
				   
	array(  "name" => "wrap-seo",
			"type" => "contenttab-wrapend",),

//-------------------------------------------------------------------------------------//

	array( "name" => "wrap-integration",
		   "type" => "contenttab-wrapstart",),
		   
		array( "type" => "subnavtab-start",),
		
			array( "name" => "integration-1",
				   "type" => "subnav-tab",
				   "desc" => "Code Integration"),
				   
		array( "type" => "subnavtab-end",),
		
		array( "name" => "integration-1",
			   "type" => "subcontent-start",),

			array( "name" => "Disable header code",
                   "id" => $shortname."_integrate_header_enable",

                   "type" => "checkbox",
                   "std" => "on",
                   "desc" => "Disabling this option will remove the header code below from your blog. This allows you to remove the code while saving it for later use."),

			array( "name" => "Disable body code",
                   "id" => $shortname."_integrate_body_enable",
                   "type" => "checkbox2",
                   "std" => "on",
                   "desc" => "Disabling this option will remove the body code below from your blog. This allows you to remove the code while saving it for later use."),
			
			array( "name" => "Disable single top code",
                   "id" => $shortname."_integrate_singletop_enable",
                   "type" => "checkbox",
                   "std" => "on",
                   "desc" => "Disabling this option will remove the single top code below from your blog. This allows you to remove the code while saving it for later use."),
			
			array( "name" => "Disable single bottom code",
                   "id" => $shortname."_integrate_singlebottom_enable",
                   "type" => "checkbox2",
                   "std" => "on",
                   "desc" => "Disabling this option will remove the single bottom code below from your blog. This allows you to remove the code while saving it for later use."),

			array( "name" => "Add code to the < head > of your blog",
				   "id" => $shortname."_integration_head",
				   "type" => "textarea",
				   "std" => "",
				   "desc" => "Any code you place here will appear in the head section of every page of your blog. This is useful when you need to add javascript or css to all pages.",),

			array( "name" => "Add code to the < body > (good tracking codes such as google analytics)",
				   "id" => $shortname."_integration_body",
				   "type" => "textarea",
				   "std" => "",
				   "desc" => "Any code you place here will appear in body section of all pages of your blog. This is usefull if you need to input a tracking pixel for a state counter such as Google Analytics.",),

			array( "name" => "Add code to the top of your posts",
				   "id" => $shortname."_integration_single_top",
				   "type" => "textarea",
				   "std" => "",
				   "desc" => "Any code you place here will be placed at the top of all single posts. This is useful if you are looking to integrating things such as social bookmarking links.",),
			
			array( "name" => "Add code to the bottom of your posts, before the comments",
				   "id" => $shortname."_integration_single_bottom",
				   "type" => "textarea",
				   "std" => "",
				   "desc" => "Any code you place here will be placed at the top of all single posts. This is useful if you are looking to integrating things such as social bookmarking links.",),
		
		array( "name" => "integration-1",
			   "type" => "subcontent-end",),		
			   
	array( "name" => "wrap-integration",
		   "type" => "contenttab-wrapend",),
		   
//-------------------------------------------------------------------------------------//

	array( "name" => "wrap-support",
		   "type" => "contenttab-wrapstart",),
		   
		array( "type" => "subnavtab-start",),
		
			array( "name" => "support-1",
				   "type" => "subnav-tab",
				   "desc" => "Installation"),
			
			array( "name" => "support-2",
				   "type" => "subnav-tab",
				   "desc" => "Troubleshooting"),
			
			array( "name" => "support-3",
				   "type" => "subnav-tab",
				   "desc" => "Tutorials"),
				   
		array( "type" => "subnavtab-end",),
		
		array( "name" => "support-1",
			   "type" => "subcontent-start",),
		
			array( "name" => "installation",
				   "type" => "support",),		   
		
		array( "name" => "support-1",
			   "type" => "subcontent-end",),
		
		array( "name" => "support-2",
			   "type" => "subcontent-start",),
		
			array( "name" => "troubleshooting",
				   "type" => "support",),
		
		array( "name" => "support-2",
			   "type" => "subcontent-end",),		
		
		array( "name" => "support-3",
			   "type" => "subcontent-start",),
		
			array( "name" => "tutorials",
				   "type" => "support",),
		
		array( "name" => "support-3",
			   "type" => "subcontent-end",),		
			   
	array( "name" => "wrap-support",
		   "type" => "contenttab-wrapend",),
		   
//-------------------------------------------------------------------------------------//

	array( "name" => "wrap-advertisements",
		   "type" => "contenttab-wrapstart",),
		   
		array( "type" => "subnavtab-start",),
		
			array( "name" => "advertisements-1",
				   "type" => "subnav-tab",
				   "desc" => "Manage Un-widgetized Advertisements"),
			
		array( "type" => "subnavtab-end",),
		
		array( "name" => "advertisements-1",
			   "type" => "subcontent-start",),

			array( "name" => "Enable 728x90 banner",
				   "id" => $shortname."_leader_enable",
				   	"type" => "checkbox",
				   "std" => "false",
				   "desc" => "Enabling this option will display a 728x90 banner ad on the top of your pages below the categories navigation bar. If enabled you must fill in the banner image and destination url below.",),  

			array( "name" => "Enable 468x60 banner",
				   "id" => $shortname."_468_enable",
				   	"type" => "checkbox",
				   "std" => "false",
				   "desc" => "Enabling this option will display a 468x60 banner ad on the bottom of your post pages below the single post content. If enabled you must fill in the banner image and destination url below.",),  
		
			array( "type" => "clearfix",),
			
			array( "name" => "Input 728x90 advertisement banner image",
				   "id" => $shortname."_leader_image",
				   "type" => "text",
				   "std" => "",
				   "desc" => "Here you can change which character separates your blog title and index page name when using autogenerated post titles. Common values are | or -",), 

			array( "name" => "Input 728x90 advertisement destination url",
				   "id" => $shortname."_leader_url",
				   "type" => "text",
				   "std" => "",
				   "desc" => "Here you can change which character separates your blog title and index page name when using autogenerated post titles. Common values are | or -",), 
			
			array( "name" => "Input 468x60 advertisement banner image",
				   "id" => $shortname."_468_image",
				   "type" => "text",
				   "std" => "",
				   "desc" => "Here you can change which character separates your blog title and index page name when using autogenerated post titles. Common values are | or -",), 

			array( "name" => "Input 468x60 advertisement destination url",
				   "id" => $shortname."_468_url",
				   "type" => "text",
				   "std" => "",
				   "desc" => "Here you can change which character separates your blog title and index page name when using autogenerated post titles. Common values are | or -",), 


		
		array( "name" => "advertisements-1",
			   "type" => "subcontent-end",),
					   
	array( "name" => "wrap-support",
		   "type" => "contenttab-wrapend",),
		   
//-------------------------------------------------------------------------------------//	

			
);

function admin_js(){
	if ( $_GET['page'] == basename(__FILE__) ) {
?>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/theme-options/checkbox.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/theme-options/functions-init.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/theme-options/colorpicker.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/theme-options/eye.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/theme-options/layout.js"></script>

	<script type="text/javascript">
	/* <![CDATA[ */
		var clearpath = "<?php bloginfo('stylesheet_directory') ?>/images/theme-options/empty.png";
	/* ]]> */
	</script>
<?php }
}

function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {
		wp_enqueue_script('jquery');
		wp_enqueue_script('myscript', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/jquery-ui.min.js');
?>
<?php
		 if ( 'save' == $_REQUEST['action'] ) {
			foreach ($options as $value) {
				if( isset( $_REQUEST[ $value['id'] ] ) ) {
					if ($value['type'] == 'textarea' || $value['type'] == 'text') update_option( $value['id'], stripslashes($_REQUEST[$value['id']]) ); 		
					else update_option( $value['id'], $_REQUEST[$value['id']] );
				}
				else {
					if ($value['type'] == 'checkbox' || $value['type'] == 'checkbox2') update_option( $value['id'] , 'false' );
					else delete_option( $value['id'] );
				}
			}
			$send = $_GET['page'];
			header("Location: themes.php?page=$send&saved=true");
			die;
        } else if( 'reset' == $_REQUEST['action'] ) {
			foreach ($options as $value) { 
				delete_option( $value['id'] );
				$$value['id'] = $value['std'];
			}
			header("Location: themes.php?page=$send&reset=true");
			die;
		}
    }

    add_theme_page($themename." Options", $themename." Theme Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
    
?>

<div id="wrapper">
  <div id="panel-wrap">
	<form method="post">
		<div id="epanel-wrapper">
			<div id="epanel">
				<div id="epanel-content-wrap">
					<div id="epanel-content">
						<img src="<?php bloginfo('stylesheet_directory') ?>/images/theme-options/logo.png" alt="ePanel" class="pngfix" id="epanel-logo" />
						<ul id="epanel-mainmenu">
							<li><a href="#wrap-general"><img src="<?php bloginfo('stylesheet_directory') ?>/images/theme-options/general-icon.png" class="pngfix" alt="" />General Settings</a></li>
							<li><a href="#wrap-navigation"><img src="<?php bloginfo('stylesheet_directory') ?>/images/theme-options/navigation-icon.png" class="pngfix" alt="" />Navigation</a></li>
							<li><a href="#wrap-layout"><img src="<?php bloginfo('stylesheet_directory') ?>/images/theme-options/layout-icon.png" class="pngfix" alt="" />Layout Settings</a></li>
							<li><a href="#wrap-advertisements"><img src="<?php bloginfo('stylesheet_directory') ?>/images/theme-options/ad-icon.png" class="pngfix" alt="" />Ad Management</a></li>
							<li><a href="#wrap-colorization"><img src="<?php bloginfo('stylesheet_directory') ?>/images/theme-options/colorization-icon.png" class="pngfix" alt="" />Colorization</a></li>
							<li><a href="#wrap-seo"><img src="<?php bloginfo('stylesheet_directory') ?>/images/theme-options/seo-icon.png" class="pngfix" alt="" />SEO</a></li>
							<li><a href="#wrap-integration"><img src="<?php bloginfo('stylesheet_directory') ?>/images/theme-options/integration-icon.png" class="pngfix" alt="" />Integration</a></li>
							<li><a href="#wrap-support"><img src="<?php bloginfo('stylesheet_directory') ?>/images/theme-options/support-icon.png" class="pngfix" alt="" />Support Docs</a></li>
						</ul><!-- end epanel mainmenu -->

<?php foreach ($options as $value) {
if (($value['type'] == "text") || ($value['type'] == "textarea") || ($value['type'] == "select") || ($value['type'] == "checkboxes") || ($value['type'] == "different_checkboxes") || ($value['type'] == "colorpicker") || ($value['type'] == "textcolorpopup") ) { ?>
			<div class="epanel-box">
				<h3 class="box-title"><?php echo $value['name']; ?></h3>
				<img src="<?php bloginfo('stylesheet_directory') ?>/images/theme-options/help-image.png" alt="description" class="box-description" />
				<div class="box-descr">
					<p><?php echo $value['desc']; ?></p>
				</div> <!-- end box-desc-content div -->
		
				<div class="box-content">
		<?php if ($value['type'] == "text") { ?>
			<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
		<?php } elseif ($value['type'] == "colorpicker") { ?>
			<div id="colorpickerHolder"></div>
		<?php } elseif ($value['type'] == "textcolorpopup") { ?>
			<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" class="colorpopup" type="text" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
		<?php } elseif ($value['type'] == "textarea") { ?>
			<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'] )); } else { echo stripslashes($value['std']); } ?></textarea>
		<?php } elseif ($value['type'] == "select") { ?>
			<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
            <?php foreach ($value['options'] as $option) { ?>
                <option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>		
            <?php } ?>
            </select>
		<?php } elseif ($value['type'] == "checkboxes") {
			$i = 1; 
			foreach ($value['options'] as $option) {
				$checked = ""; 
				if (get_option( $value['id'])) { 
					if (in_array($option, get_option( $value['id'] ))) $checked = "checked=\"checked\"";
				} else { $checked = "checked=\"checked\""; } ?>
				<p class="inputs<?php if ($i%3 == 0) echo(' last');?>"><input type="checkbox" class="usual-checkbox" name="<?php echo $value['id']; ?>[]" id="<?php echo $option; ?>" value="<?php echo ($option); ?>" <?php echo $checked; ?> />
				<label for="<?php echo $option; ?>"><?php if ($value['usefor']=='pages') echo get_pagename($option); else echo get_categname($option); ?></label> 
				</p>
                <?php if ($i%3 == 0) echo('<br class="clearfix"/>');?>
		  <?php $i++; 
		    } ?>
			<br class="clearfix"/>
		<?php } elseif ($value['type'] == "different_checkboxes") {
			foreach ($value['options'] as $option) {
				$checked = "";
				if (get_option( $value['id'])) {
					if (in_array($option, get_option( $value['id'] ))) $checked = "checked=\"checked\"";
				} else { $checked = "checked=\"checked\""; } ?>
				<p id="<?php echo ($value['id']."-".$option) ?>"><input type="checkbox" class="usual-checkbox" name="<?php echo $value['id']; ?>[]" id="<?php echo $option; ?>" value="<?php echo ($option); ?>" <?php echo $checked; ?> /> 
				</p>
		  <?php } ?>
			<br class="clearfix"/>
		<?php } ?>
				</div> <!-- end box-content div -->
			</div> <!-- end epanel-box div -->	
<?php } elseif (($value['type'] == "checkbox") || ($value['type'] == "checkbox2")) { ?>	
			<div class="epanel-box <?php if ($value['type'] == "checkbox") {echo('epanel-box-small-1');} else {echo('epanel-box-small-2');} ?>">
				<h3 class="box-title"><?php echo $value['name']; ?></h3>
				<img src="<?php bloginfo('stylesheet_directory') ?>/images/theme-options/help-image.png" alt="description" class="box-description" />
				<div class="box-descr">
					<p><?php echo $value['desc']; ?></p>
				</div> <!-- end box-desc-content div -->
				<div class="box-content">
	<?php $checked = '';
	if((get_option($value['id'])) <> '') {
		if((get_option($value['id'])) == 'on') { $checked = 'checked="checked"'; }
		else { $checked = ''; }
	}
	elseif ($value['std'] == 'on') { $checked = 'checked="checked"'; }      
?>
    <input type="checkbox" class="checkbox" name="<?php echo($value['id']);?>" id="<?php echo($value['id']);?>" <?php echo($checked); ?> />
				</div> <!-- end box-content div -->
			</div> <!-- end epanel-box-small div -->
<?php } elseif ($value['type'] == "support") { ?>
			<div class="inner-content">
				<?php include(TEMPLATEPATH . "/includes/functions/".$value['name'].".php"); ?>
			</div>
<?php } elseif (($value['type'] == "contenttab-wrapstart") || ($value['type'] == "subcontent-start")) { ?>
			<div id="<?php echo $value['name']; ?>" class="<?php if ($value['type'] == "contenttab-wrapstart") {echo('content-div');} else {echo('tab-content');} ?>">
<?php } elseif (($value['type'] == "contenttab-wrapend") || ($value['type'] == "subcontent-end")) { ?>
			</div> <!-- end <?php echo $value['name']; ?> div -->
<?php } elseif ($value['type'] == "subnavtab-start") { ?>
			<ul class="idTabs">			
<?php } elseif ($value['type'] == "subnavtab-end") { ?>
			</ul>
<?php } elseif ($value['type'] == "subnav-tab") { ?>
			<li><a href="#<?php echo $value['name']; ?>"><span class="pngfix"><?php echo $value['desc']; ?></span></a></li>
<?php } elseif ($value['type'] == "clearfix") { ?>
			<div class="clearfix"></div>
<?php } ?>


<?php } //end foreach ($options as $value) ?>
		
					</div> <!-- end epanel-content div -->
				</div> <!-- end epanel-content-wrap div -->
			</div> <!-- end epanel div -->
		</div> <!-- end epanel-wrapper div -->
		<div id="epanel-bottom">
        			<input name="save" type="submit" value="Save changes" id="epanel-save" />
			<input type="hidden" name="action" value="save" />
		</form>
        <img src="<?php bloginfo('stylesheet_directory') ?>/images/theme-options/defaults.png" class="defaults-button" alt="no" />
        <div style="position: relative;">
        <div class="defaults-hover">
        This will return all of the settings throughout the options page to their default values. <strong>Are you sure you want to do this?</strong>
        <div class="clearfix"></div>
		<form method="post">
			<input name="reset" type="submit" value="Reset" id="epanel-reset" />
			<input type="hidden" name="action" value="reset" />
		</form>
        <img src="<?php bloginfo('stylesheet_directory') ?>/images/theme-options/no.gif" class="no" alt="no" />
        </div> <!-- end epanel-bottom div -->
        </div>
        
	  </div> <!-- end panel-wrap div -->
	</div> <!-- end wrapper div -->
	
<?php
}

add_action('admin_menu', 'mytheme_add_admin'); 

function css_admin() { ?> 
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory') ?>/panel.css" type="text/css" />
	<style type="text/css">
	.lightboxclose { background: url("<?php bloginfo('stylesheet_directory') ?>/images/theme-options/description-close.png") no-repeat; width: 19px; height: 20px; }
	</style>
	<!--[if IE 7]>
	<style type="text/css">
		#epanel-save, #epanel-reset { font-size: 0px; display:block; line-height: 0px; bottom: 18px;}
		.box-desc { width: 414px; }
		.box-desc-content { width: 340px; }
		.box-desc-bottom { height: 26px; }
		#epanel-content .epanel-box input, #epanel-content .epanel-box select, .epanel-box textarea {  width: 395px; }
		#epanel-content .epanel-box select { width:434px !important;}
	</style>
	<![endif]-->  
<?php }

global $options, $value;

foreach ($options as $value) {
	 if ( get_settings( $value['id'] ) === FALSE) {
		update_option( $value['id'], $value['std'] ); 
		$$value['id'] = $value['std']; 	
	} else {
		$$value['id'] = get_option( $value['id'] ); }
}

?>