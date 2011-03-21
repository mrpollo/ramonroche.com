<div id="sidebar">

    <div id="header"> <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-<?php echo(get_option('basic_color')); ?>.gif" alt="<?php bloginfo('name'); ?> Logo" class="logo" /></a> </div>
  
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar") ) : ?>
    <?php endif; ?>
</div>
</div>
