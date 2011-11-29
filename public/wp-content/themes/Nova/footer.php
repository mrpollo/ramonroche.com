		<?php if ( !is_home() ) { ?>
			<div id="footer-widgets">
				<div class="container">
					<div id="widgets-wrapper" class="clearfix">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer') ) : ?>
						<?php endif; ?>
					</div> <!-- end #widgets-wrapper -->
				</div> <!-- end .container -->
			</div> <!-- end #footer-widgets -->
		<?php } ?>
		
		<div id="footer">
			<div class="container clearfix">
				<p id="copyright"><?php esc_html_e('Designed by ','Nova'); ?> <a href="http://www.elegantthemes.com" title="Premium WordPress Themes">Elegant WordPress Themes</a> | <?php esc_html_e('Powered by ','Nova'); ?> <a href="http://www.wordpress.org">WordPress</a></p>
			</div> <!-- end .container -->	
		</div> <!-- end #footer -->	
	</div> <!-- end #center-highlight-->
	
	<?php get_template_part('includes/scripts'); ?>

	<?php wp_footer(); ?>	
	<script type="text/javascript" charset="utf-8">
		var _gaq=[['_setAccount','UA-12452636-1'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
	</script>
</body>
</html>