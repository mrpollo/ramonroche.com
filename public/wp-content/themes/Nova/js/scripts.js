jQuery.noConflict();
jQuery(document).ready(function(){
	var sf = jQuery.fn.superfish,
		is_ie = jQuery.browser.msie;
		
	jQuery.fn.hideSuperfishUl = function(){
		var o = sf.op,
			not = (o.retainPath===true) ? o.$path : '';
		o.retainPath = false;
		var $ul = jQuery(['li.',o.hoverClass].join(''),this).add(this).not(not).removeClass(o.hoverClass)
				.find('>ul').animate({opacity:'hide',height:'hide'},200);
		o.onHide.call($ul);
		return this;
	}
	
	var $top_menu = jQuery('ul.nav');
			
	$top_menu.superfish({ 
		delay:       200,                            // one second delay on mouseout 
		animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation 
		speed:       200,                          // faster animation speed 
		autoArrows:  true,                           // disable generation of arrow mark-up 
		dropShadows: false,                            // disable drop shadows
		onBeforeShow: function() {
			if ( this.parent('li').css('background-image') === 'none' ) {
				if (!is_ie)
					this.parent('li').find('>a').fadeTo('fast',.5).siblings('span.menu_arrow').stop(true, true).animate( {opacity:'show', top:'-5px'}, 400);
				else 
					this.parent('li').find('>a').siblings('span.menu_arrow').stop(true, true).animate( {opacity:'show', top:'-5px'}, 400);
			}
		},
		onHide: function() {
			if (!is_ie)
				this.parent('li').find('>a').fadeTo('fast',1).siblings('span.menu_arrow').stop(true, true).animate( {opacity:'hide', top:'-15px'}, 400);
			else
				this.parent('li').find('>a').siblings('span.menu_arrow').stop(true, true).animate( {opacity:'hide', top:'-15px'}, 400);
		}
	});
	
	$top_menu.find('> li > ul').parent('li').addClass('sf-ul');
	$top_menu.find('> li').each(function(index,domEle) {
		$li = jQuery(domEle);
		if ($li.css('background-image') === 'none')
			$li.append('<span class="menu_arrow"></span>');
	}).find('> ul').prepend('<span class="menu_top_arrow"><span>');
	
	var menu_arrow = 'span.menu_arrow';
	$top_menu.find('>li:not(.sf-ul) > a').hover(function(){
		if ( jQuery(this).parent('li').css('background-image') === 'none' ) {
			if (!is_ie) 
				jQuery(this).fadeTo('fast',.5).siblings('span.menu_arrow').stop(true, true).animate( {opacity:'show', top:'-5px'}, 400);
			else
				jQuery(this).siblings('span.menu_arrow').stop(true, true).animate( {opacity:'show', top:'-5px'}, 400);
		}
	},function(){
		if (!is_ie) 
			jQuery(this).fadeTo('fast',1).siblings('span.menu_arrow').stop(true, true).animate( {opacity:'hide', top:'-15px'}, 400);
		else
			jQuery(this).siblings('span.menu_arrow').stop(true, true).animate( {opacity:'hide', top:'-15px'}, 400);
	});
	
	if (!is_ie) {
		$top_menu.find('li ul a').hover(function(){
			jQuery(this).fadeTo('fast',.5);
		},function(){
			jQuery(this).fadeTo('fast',1);
		});
	}
	
	var $searchform = jQuery('#searchform');
	
	jQuery('#header a#search').toggle(
		function () { $searchform.animate( {opacity:'toggle', left:'-220px'}, 500); },
		function () { $searchform.animate( {opacity:'toggle', left:'-230px'}, 500); }
	);
	
	et_search_bar();
	
	
	
	et_service_tabs($service_tabs);		
		
	var $footer_widget = jQuery("#footer-widgets .widget");
	
	if (!($footer_widget.length == 0)) {
		$footer_widget.each(function (index, domEle) {
			// domEle == this
			if ((index+1)%4 == 0) jQuery(domEle).addClass("last").after("<div class='clear'></div>");
		});
	}
	/*
	<!---- Search Bar Improvements ---->
	*/
	function et_search_bar(){
		var $searchform = jQuery('#header div#search-form'),
			$searchinput = $searchform.find("input#searchinput"),
			searchvalue = $searchinput.val();
			
		$searchinput.focus(function(){
			if (jQuery(this).val() === searchvalue) jQuery(this).val("");
		}).blur(function(){
			if (jQuery(this).val() === "") jQuery(this).val(searchvalue);
		});
	};		
	/*
	<!---- Service Tabs ---->
	*/
	function et_service_tabs($service_tabs){
		var active_tabstate = 'ui-state-active',
		active_tab = 0,
		$service_div = $service_tabs.find('>div').hide(),
		$service_li = $service_tabs.find('>ul>li');
	
		$service_div.filter(':first').show();
		$service_li.filter(':first').addClass(active_tabstate);
				
		$service_li.find('a').click(function(){
			var $a = jQuery(this),
				next_tab = $a.parent('li').prevAll().length,
				next_tab_height = $service_tabs.find('>div').eq(next_tab).outerHeight();
			
			if ( next_tab != active_tab ) {
				$service_tabs.css({height:next_tab_height});
				$service_div.filter(':visible')
					.animate( {opacity: 'hide'},500, function(){
						jQuery(this).parent().find('>div').eq(next_tab).animate( {opacity: 'show'},500 );
					} )
					//.end()
					//.eq(next_tab)
					//.animate( {opacity: 'show'},500 )
					;
				$service_li.removeClass(active_tabstate).filter(':eq('+next_tab+')').addClass(active_tabstate);
				active_tab = next_tab;
			}
			
			return false;
		}).hover(function(){
			if ( !jQuery(this).parent('li').hasClass(active_tabstate) && !is_ie ) jQuery(this).fadeTo('slow',.7);
		}, function(){
			if (!is_ie) jQuery(this).fadeTo('slow',1);
		});
	}
	
	var maintabswidth = $home_tabs.width();
	var maintabsleft = Math.round((960 - maintabswidth) / 2);
	if ( maintabswidth < 960 ) $home_tabs.css('left',maintabsleft);
	
	jQuery('.js #featured .container').css('visibility','visible');
	jQuery('.js #featured').css('background','none');
	
	
	 
	// window.setInterval( function() {Cufon.refresh('#main-tabs a');}, 100 ); 
	 
	// Cufon.now();
});