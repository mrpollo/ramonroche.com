<?php get_header(); ?>

<div id="container">
<div id="left-div">
    <div id="left-inside">
		<?php if (get_option('basic_integration_single_top') <> '' && get_option('basic_integrate_singletop_enable') == 'on') echo(get_option('basic_integration_single_top')); ?>
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <!--Begin Post-->
        <div class="home-post-wrap">
            <h1 class="titles"><a href="<?php the_permalink() ?>" title="<?php printf(__('Permanent Link to %s','Basic'), get_the_title()) ?>">
                <?php the_title() ?>
                </a></h1>
			<?php if(get_option('basic_postinfo_posts') == 'on') { ?>
				<?php include(TEMPLATEPATH . '/includes/postinfo.php'); ?>			
			<?php } ?>			
            <div style="clear: both;"></div>
			<?php if (get_option('basic_thumbnails') == 'on') { include(TEMPLATEPATH . '/includes/thumbnail.php'); } ?>
            <?php the_content(); ?>
        </div>
		<?php if (get_option('basic_integration_single_bottom') <> '' && get_option('basic_integrate_singlebottom_enable') == 'on') echo(get_option('basic_integration_single_bottom')); ?>
        <?php if (get_option('basic_foursixeight') == 'on') { ?>
			<?php include(TEMPLATEPATH . '/includes/468x60.php'); ?>
        <?php } ?>
        <div style="clear: both;"></div>
         <?php if (get_option('basic_show_postcomments') == 'on') { ?>
			<?php comments_template('', true); ?>
		<?php }; ?>
        <?php endwhile; ?>
        <?php else : ?>
        <!--If no results are found-->
        <h1><?php _e('No Results Found','Basic') ?></h1>
        <p><?php _e('The page you requested could not be found. Try refining your search, or use the navigation above to locate the post.','Basic') ?></p>
        <!--End if no results are found-->
        <?php endif; ?>
    </div>
</div>
<!--Begin Sidebar-->
<?php get_sidebar(); ?>
<!--End Sidebar-->
<!--Begin Footer-->
<?php get_footer(); ?>
<!--End Footer-->
</body>
</html>
