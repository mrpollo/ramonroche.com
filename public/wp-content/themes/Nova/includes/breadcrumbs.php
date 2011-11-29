<div id="breadcrumbs">
	<div id="breadcrumbs-left"></div>
	<div id="breadcrumbs-content">
			
		<?php if(function_exists('bcn_display')) { bcn_display(); } 
			  else { ?>
					<a href="<?php echo home_url(); ?>"><?php esc_html_e('Home','Nova') ?></a> <span class="raquo">&raquo;</span>
					
					<?php if( is_tag() ) { ?>
						<?php esc_html_e('Posts Tagged ','Nova') ?><span class="raquo">&quot;</span><?php single_tag_title(); echo('&quot;'); ?>
					<?php } elseif (is_day()) { ?>
						<?php esc_html_e('Posts made in','Nova') ?> <?php the_time('F jS, Y'); ?>
					<?php } elseif (is_month()) { ?>
						<?php esc_html_e('Posts made in','Nova') ?> <?php the_time('F, Y'); ?>
					<?php } elseif (is_year()) { ?>
						<?php esc_html_e('Posts made in','Nova') ?> <?php the_time('Y'); ?>
					<?php } elseif (is_search()) { ?>
						<?php esc_html_e('Search results for','Nova') ?> <?php the_search_query() ?>
					<?php } elseif (is_single()) { ?>
						<?php $category = get_the_category();
							  $catlink = get_category_link( $category[0]->cat_ID );
							  echo ('<a href="'.esc_url($catlink).'">'.esc_html($category[0]->cat_name).'</a> '.'<span class="raquo">&raquo;</span> '.get_the_title()); ?>
					<?php } elseif (is_category()) { ?>
						<?php single_cat_title(); ?>
					<?php } elseif (is_author()) { ?>
						<?php esc_html_e('Posts by ','Nova'); echo ' ',$curauth->nickname; ?>
					<?php } elseif (is_page()) { ?>
						<?php wp_title(''); ?>
					<?php }; ?>
		<?php }; ?>

	</div> <!-- end #breadcrumbs-content -->
	<div id="breadcrumbs-right"></div>
</div> <!-- end #breadcrumbs -->

<div class="clear"></div>