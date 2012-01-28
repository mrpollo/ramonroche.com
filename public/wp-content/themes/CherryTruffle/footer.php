<?php
if (get_option('cherrytruffle_display_footer') == 'on') {
	?>
		<div id="footer">
	    	<?php
				if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer") ){
				
				}
			?>
	    	<div style="clear: both;"></div>
		</div>
	<?php
}
?>
<div style="clear: both;"></div>
<div class="bottomfooter">
	<?php _e('Powered by','CherryTruffle')?> <a href="http://www.wordpress.org">Wordpress</a> | <?php _e('Designed by','CherryTruffle')?> <a href="http://www.elegantthemes.com">Elegant Themes</a>
</div>
</div>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/superfish.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/custom.js"></script>
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

<?php
	if (get_option('cherrytruffle_integration_body') <> '' && get_option('cherrytruffle_integrate_body_enable') == 'on'){
		echo(get_option('cherrytruffle_integration_body'));
	}
	wp_footer();
?>
