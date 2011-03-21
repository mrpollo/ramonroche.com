<?php if (!(is_single())) { ?>
	<span class="post-info">
		<?php _e('Posted','Basic') ?> <?php if (in_array('author', get_option('basic_postinfo1'))) { ?> <?php _e('by','Basic') ?> <?php the_author_posts_link(); ?><?php }; ?> <?php if (in_array('categories', get_option('basic_postinfo1'))) { ?> <?php _e('in','Basic') ?> <?php the_category(', ') ?><?php }; ?>
	</span>
	<span class="post-info2">
		<?php if (in_array('date', get_option('basic_postinfo1'))) { ?> <?php _e('on','Basic') ?> <?php the_time(get_option('basic_date_format')) ?><?php }; ?><?php if (in_array('comments', get_option('basic_postinfo1'))) { ?> | <?php comments_popup_link(__('0 comments','Basic'), __('1 comment','Basic'), '% '.__('comments','Basic')); ?><?php }; ?>
	</span>	
<?php } elseif (is_single()) { ?>
	<span class="post-info">
		<?php _e('Posted','Basic') ?> <?php if (in_array('author', get_option('basic_postinfo2'))) { ?> <?php _e('by','Basic') ?> <?php the_author_posts_link(); ?><?php }; ?> <?php if (in_array('categories', get_option('basic_postinfo2'))) { ?> <?php _e('in','Basic') ?> <?php the_category(', ') ?><?php }; ?>
	</span>
	<span class="post-info2">
		<?php if (in_array('date', get_option('basic_postinfo2'))) { ?> <?php _e('on','Basic') ?> <?php the_time(get_option('basic_date_format')) ?><?php }; ?><?php if (in_array('comments', get_option('basic_postinfo2'))) { ?> | <?php comments_popup_link(__('0 comments','Basic'), __('1 comment','Basic'), '% '.__('comments','Basic')); ?><?php }; ?>
	</span>	
<?php }; ?> 