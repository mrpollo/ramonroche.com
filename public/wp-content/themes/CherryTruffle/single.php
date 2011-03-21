<?php get_header(); ?>
<div id="container2"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/content-top-home-2.gif" alt="logo" style="float: left;" />
    <div id="left-div">
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <!--Begin Post-->
        <div class="post-wrapper">
         <?php if (get_option('cherrytruffle_integration_single_top') <> '' && get_option('cherrytruffle_integrate_singletop_enable') == 'on') echo(get_option('cherrytruffle_integration_single_top')); ?>	
            <h1 class="titles2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s','CherryTruffle'), get_the_title()) ?>">
                <?php the_title(); ?>
                </a></h1>
            <div style="clear: both;"></div>
            <div class="post-info"><?php _e('Posted','CherryTruffle') ?> <?php if (in_array('author', get_option('cherrytruffle_postinfo'))) { ?> <?php _e('by','CherryTruffle') ?> <span class="author"><strong><?php the_author() ?></strong></span><?php }; ?><?php if (in_array('date', get_option('cherrytruffle_postinfo'))) { ?> <?php _e('on','CherryTruffle') ?> <strong><?php the_time(get_option('cherrytruffle_date_format')) ?></strong><?php }; ?><?php if (in_array('categories', get_option('cherrytruffle_postinfo'))) { ?> <?php _e('in','CherryTruffle') ?> <strong><?php the_category(', ') ?></strong><?php }; ?><?php if (in_array('comments', get_option('cherrytruffle_postinfo'))) { ?> | <?php comments_popup_link(__('0 comments','CherryTruffle'), __('1 comment','CherryTruffle'), '% '.__('comments','CherryTruffle')); ?><?php }; ?> </div>
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/comment-bottom.gif" alt="logo" style="float: left; margin-bottom: 20px;" />
            <div style="clear: both;"></div>

<?php if (get_option('cherrytruffle_thumbnails') == 'on') { ?>
<?php $thumb = get_post_meta($post->ID, 'Thumbnail', $single = true);
if (($thumb == '') && ($cherrytruffle_grab_image == 'on')) $thumb = catch_that_image(); ?>
<?php if($thumb !== '') { ?>

<a href="<?php the_permalink() ?>" title="<?php printf(__('Permanent Link to %s','CherryTruffle'), get_the_title()) ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo $thumb; ?>&amp;h=<?php echo(get_option('cherrytruffle_thumbnail_height_posts'));?>&amp;w=<?php echo(get_option('cherrytruffle_thumbnail_width_posts'));?>&amp;zc=1" alt="<?php if($thumb_alt !== '') { echo $thumb_alt; } else { echo the_title(); } ?>"  class="thumbnail" /></a>

<?php } else { echo ''; } ?>
<?php }; ?>

            <?php the_content(); ?>

       <div style="clear: both;"></div>
          <?php if (get_option('cherrytruffle_integration_single_bottom') <> '' && get_option('cherrytruffle_integrate_singlebottom_enable') == 'on') echo(get_option('cherrytruffle_integration_single_bottom')); ?>	
        <div style="clear: both;"></div>
        <?php if (get_option('cherrytruffle_show_postcomments') == 'on') { ?>         
   
            <div class="comment-bg">
                <?php comments_template(); ?>
                <div style="clear: both;"></div>
            </div>
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/comment-bottom.gif" alt="logo" style="float: left; margin-bottom: 20px;" />
            <?php }; ?>
            <?php endwhile; ?>
        </div>
        <?php else : ?>
        <!--If no results are found-->
        <h1><?php _e('No Results Found','CherryTruffle') ?></h1>
        <p><?php _e('The page you requested could not be found. Try refining your search, or use the navigation above to locate the post.','CherryTruffle') ?></p>
        <!--End if no results are found-->
        <?php endif; ?>
    </div>
    <?php get_sidebar(); ?>
    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/content-bottom-2.gif" alt="logo" style="float: left;" /> </div>
<?php get_footer(); ?>
</body></html>