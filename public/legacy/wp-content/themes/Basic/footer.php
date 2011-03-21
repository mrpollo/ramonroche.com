<div style="clear: both;"></div>
</div>
<div id="footer"> &copy;
    <?php bloginfo('name'); ?>
    <?php _e('2009. All rights reserved. ','Basic'); ?> <?php _e('Powered by ','Basic'); ?> <a href="http://www.wordpress.org">Wordpress</a> | <?php _e('Designed by ','Basic'); ?> <a href="http://www.elegantthemes.com">Elegant Themes</a> </div>
<?php if (get_option('basic_integration_body') <> '' && get_option('basic_integrate_body_enable') == 'on') echo(get_option('basic_integration_body')); ?>
<?php wp_footer(); ?>
<!-- Start Google Analytics -->
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-12452636-1");
pageTracker._trackPageview();
} catch(err) {}</script>
<!-- End Google Analytics -->