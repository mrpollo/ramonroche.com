<?php 
if (is_archive() || is_search() || is_tag()) {
	if (is_archive()) $post_number = get_option('basic_archivenum_posts');
	if (is_search()) $post_number = get_option('basic_searchnum_posts');
	if (is_tag()) $post_number = get_option('basic_tagnum_posts');
	global $query_string; query_posts($query_string . "&showposts=$post_number&paged=$paged");
}
if (is_home()) {
	$args=array(
		'showposts'=>get_option('basic_homepage_posts'),
		'paged'=>$paged,
		'category__in' => get_option('basic_exlcats_recent'),
	);
	query_posts($args);
}
?>
<!--Begind recent post-->
<?php if (have_posts()) : while (have_posts()) : the_post(); 
  if( $post->ID == $do_not_duplicate ) continue; update_post_caches($posts); ?>

<div class="home-post-wrap">
    <h1 class="titles"><a href="<?php the_permalink() ?>" title="<?php printf(__('Permanent Link to %s','Basic'), get_the_title()) ?>">
        <?php the_title() ?>
        </a></h1>
    <?php include(TEMPLATEPATH . '/includes/postinfo.php'); ?>
    <div style="clear: both;"></div>
	<?php $thumb = get_post_meta($post->ID, 'Thumbnail', $single = true); ?>
	<?php if (($thumb == '') && ($basic_grab_image == 'on')) $thumb = catch_that_image(); ?>
    <?php 
if($thumb !== '') { ?>
    <a href="<?php the_permalink() ?>" title="<?php printf(__('Permanent Link to %s','Basic'), get_the_title()) ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo $thumb; ?>&amp;h=190&amp;w=190&amp;q=100&amp;zc=1" alt="<?php if($thumb_alt !== '') { echo $thumb_alt; } else { echo the_title(); } ?>"  class="thumbnail" /></a>
    <?php }
else { echo ''; } ?>
    <?php the_content(); ?>
</div>
<?php endwhile; ?>
<div style="clear: both;"></div>
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } 
else { ?>
<p class="pagination">
    <?php next_posts_link(__('&laquo; Previous Entries','Basic')) ?>
	<?php previous_posts_link(__('Next Entries &raquo;','Basic')) ?>
</p>
<?php } ?>
<!--end recent post-->
<?php else : ?>
<!--If no results are found-->
<div class="home-post-wrap2">
    <h1><?php _e('No Results Found','Basic') ?></h1>
    <p><?php _e('The page you requested could not be found. Try refining your search, or use the navigation above to locate the post.','Basic') ?></p>
</div>
<!--End if no results are found-->
<?php endif; ?>
<?php if (is_home() || is_archive() || is_search() || is_tag()) wp_reset_query(); ?>