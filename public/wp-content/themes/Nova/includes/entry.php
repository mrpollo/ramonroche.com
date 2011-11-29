<?php
	if ( is_home() ){
		$args=array(
			   'showposts'=> (int) get_option('nova_homepage_posts'),
			   'paged'=>$paged,
			   'category__not_in' => (array) get_option('nova_exlcats_recent'),
		);
		
		if (get_option('nova_duplicate') == 'false'){
			global $ids;
			$args['post__not_in'] = $ids;
		}

		query_posts($args);
	}
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="entry clearfix">
		<?php $thumb = ''; 	  

			$width = 160;
			$height = 160;
			$classtext = '';
			$titletext = get_the_title();
			
			$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext,false,'Portfolio');
			$thumb = $thumbnail["thumb"]; ?>
			
		<?php global $post;
			  $page_result = is_search() && ($post->post_type == 'page') ? true : false; ?>	
			  
		<h2 class="title<?php if ($page_result) echo(' page_result'); ?>"><a href="<?php the_permalink() ?>" title="<?php printf(esc_attr__ ('Permanent Link to %s', 'Nova'), $titletext) ?>"><?php the_title(); ?></a></h2>

		<?php if ((get_option('nova_postinfo1') <> '') && !($page_result)) { ?>
			<?php get_template_part('includes/postinfo'); ?>
		<?php }; ?>

		<?php if($thumb <> '' && get_option('nova_thumbnails_index') == 'on') { ?>
			<div class="thumbnail">
				<a href="<?php the_permalink(); ?>">
					<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, $classtext); ?>
					<span class="overlay2"></span>
				</a>
			</div> <!-- .thumbnail -->
		<?php }; ?>

		<?php if (get_option('nova_blog_style') == 'on') the_content(""); else { ?>
			<p><?php truncate_post(600); ?></p>
		<?php }; ?>
		<a class="readmore" href="<?php the_permalink(); ?>"><span><?php esc_html_e('read more','Nova'); ?></span></a>
		<div class="clear"></div>
	</div> <!-- end .entry -->
<?php endwhile; ?>
	<div class="clear"></div>			
	<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
	else { ?>
		 <?php get_template_part('includes/navigation'); ?>
	<?php } ?>
<?php else : ?>
	<?php get_template_part('includes/no-results'); ?>
<?php endif; if ( is_home() ) wp_reset_query(); ?>