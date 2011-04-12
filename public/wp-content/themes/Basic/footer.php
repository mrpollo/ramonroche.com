<div style="clear: both;"></div>
</div>
<?php
//scripts here
?>
<!--[if lt IE 7]>
	<script defer type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/pngfix.js"></script>
<![endif]-->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/superfish.js"></script>
<script type="text/javascript">
(function($){
		$(document).ready(function(){
			$('ul.superfish').superfish();
		})
		<?php
			if (get_option('cherrytruffle_disable_toptier') == 'on'){
				?>
					jQuery("ul.nav > li > a > span.sf-sub-indicator").parent().attr("href","#")
				<?php
			}
		?>
})(jQuery);
</script>
<script> 
	var _gaq=[['_setAccount','UA-12452636-1'],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));
</script>

<div id="footer">
	&copy; <?php bloginfo('name'); _e(date('Y').'. All rights reserved. ','Basic'); ?> <?php _e('Powered by ','Basic'); ?> <a href="http://www.wordpress.org">Wordpress</a> | <?php _e('Designed by ','Basic'); ?> <a href="http://www.elegantthemes.com">Elegant Themes</a>
</div>
<?php
	if (get_option('basic_integration_body') <> '' && get_option('basic_integrate_body_enable') == 'on'){
		echo(get_option('basic_integration_body'));
	}
	wp_footer();
?>