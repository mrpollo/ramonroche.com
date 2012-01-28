<?php if (is_home()) {
		if (get_option('cherrytruffle_duplicate') == 'false') {
			$args=array(
			   'showposts'=>get_option('cherrytruffle_homepage_posts'),
			   'post__not_in' => $ids,
			   'paged'=>$paged,
			   'category__in' => get_option('cherrytruffle_exlcats_recent'),
			);
		} else {
			$args=array(
			   'showposts'=>get_option('cherrytruffle_homepage_posts'),
			   'paged'=>$paged,
			   'category__in' => get_option('cherrytruffle_exlcats_recent'),
			);
		};
		query_posts($args);
	  }
	  else {
		  if (is_archive()) $post_number = get_option('cherrytruffle_archivenum_posts');
		  if (is_search()) $post_number = get_option('cherrytruffle_searchnum_posts');
		  if (is_tag()) $post_number = get_option('cherrytruffle_tagnum_posts');
		global $query_string; query_posts($query_string . "&showposts=$post_number&paged=$paged");   
	  }
?>

<div id="container2"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/content-top-home-2.gif" alt="logo" style="float: left;" />
    <div id="left-div">
<?php if (have_posts()) : while (have_posts()) : the_post();

	if (get_option('cherrytruffle_grab_image') == 'on') { $thumb = catch_that_image(); } 
	else { $thumb = get_post_meta($post->ID, 'Thumbnail', $single = true); } ?>
        <div class="post-wrapper" style="margin-bottom: 40px;">
            <h1 class="titles2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s','CherryTruffle'), get_the_title()) ?>">
                <?php the_title(); ?>
                </a></h1>
            <div style="clear: both;"></div>
            <div class="post-info"><?php _e('Posted','CherryTruffle') ?> <?php if (in_array('author', get_option('cherrytruffle_postinfo'))) { ?> <?php _e('by','CherryTruffle') ?> <span class="author"><strong><?php the_author() ?></strong></span><?php }; ?><?php if (in_array('date', get_option('cherrytruffle_postinfo'))) { ?> <?php _e('on','CherryTruffle') ?> <strong><?php the_time(get_option('cherrytruffle_date_format')) ?></strong><?php }; ?><?php if (in_array('categories', get_option('cherrytruffle_postinfo'))) { ?> <?php _e('in','CherryTruffle') ?> <strong><?php the_category(', ') ?></strong><?php }; ?><?php if (in_array('comments', get_option('cherrytruffle_postinfo'))) { ?> | <?php comments_popup_link(__('0 comments','CherryTruffle'), __('1 comment','CherryTruffle'), '% '.__('comments','CherryTruffle')); ?><?php }; ?> </div>
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/comment-bottom.gif" alt="logo" style="float: left; margin-bottom: 20px;" />
            <div style="clear: both;"></div>
<?php if (get_option('cherrytruffle_thumbnails_index') == 'on') { ?>
<?php $thumb = get_post_meta($post->ID, 'Thumbnail', $single = true);
if (($thumb == '') && ($cherrytruffle_grab_image == 'on')) $thumb = catch_that_image(); ?>
<?php if($thumb !== '') { ?>

<a href="<?php the_permalink() ?>" title="<?php printf(__('Permanent Link to %s','CherryTruffle'), get_the_title()) ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo $thumb; ?>&amp;h=<?php echo(get_option('cherrytruffle_thumbnail_height_index'));?>&amp;w=<?php echo(get_option('cherrytruffle_thumbnail_width_index'));?>&amp;zc=1" alt="<?php if($thumb_alt !== '') { echo $thumb_alt; } else { echo the_title(); } ?>"  class="thumbnail" /></a>

<?php } else { echo ''; } ?>
<?php }; ?>
            <?php the_content(); ?>
        </div>
        <?php endwhile; ?>
        <div style="clear: both;"></div>
        <div style="margin-left: 20px; margin-top: 5px;">
            <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } 
else { ?>
            <p class="pagination">
                <?php next_posts_link(__('&laquo; Previous Entries','CherryTruffle')) ?>
		        <?php previous_posts_link(__('Next Entries &raquo;','CherryTruffle')) ?>
            </p>
            <?php } ?>
        </div>
        <?php else : ?>
        <!--If no results are found-->
        <h1><?php _e('No Results Found','CherryTruffle') ?></h1>
		<p><?php _e('The page you requested could not be found. Try refining your search, or use the navigation above to locate the post.','CherryTruffle') ?></p>
        <!--End if no results are found-->
        <?php endif; ?>
        <?php wp_reset_query(); ?>
    </div>
    <?php get_sidebar(); ?>
    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/content-bottom-2.gif" alt="logo" style="float: left;" /> </div>