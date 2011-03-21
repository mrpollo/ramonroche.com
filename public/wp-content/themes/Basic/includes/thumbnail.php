<?php $thumb = get_post_meta($post->ID, 'Thumbnail', $single = true); ?>
<?php if (($thumb == '') && ($basic_grab_image == 'on')) $thumb = catch_that_image(); ?>

<?php if($thumb !== '') { ?>
<a href="<?php the_permalink() ?>" title="<?php printf(__('Permanent Link to %s','Basic'), get_the_title()) ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo $thumb; ?>&amp;h=<?php if (is_page()) { echo $basic_thumbnail_height_pages; } else { echo $basic_thumbnail_height; } ?>&amp;w=<?php if (is_page()) { echo $basic_thumbnail_width_pages; } else { echo $basic_thumbnail_width; } ?>&amp;zc=1" alt="<?php if($thumb_alt !== '') { echo $thumb_alt; } else { echo the_title(); } ?>" class="thumbnail" /></a> 

<?php } ?>