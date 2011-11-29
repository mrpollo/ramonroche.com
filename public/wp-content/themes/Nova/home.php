<?php get_header(); ?>

<?php if ( is_home() && get_option('nova_featured') == 'false' ) { ?>
	<div class="et_pad"></div>
<?php } ?>

<?php if ( get_option('nova_blog_style') == 'false' ) { ?>
	<div id="main-area">
		<div class="container clearfix">
			<div id="services">
				<ul id="main-tabs">
					<?php 
						$pagesContent = array();
						$i=0;
						
						$home_pages_num = count(get_option('nova_home_pages'));
													
						$arr = array( 'post_type' => 'page',
									'orderby' => 'menu_order',
									'order' => 'ASC',
									'post__in' => (array) get_option('nova_home_pages'),
									'showposts' => (int) $home_pages_num );
					
						query_posts($arr);
					?>
					<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
						<?php 
							$hash = 'service_' . strtolower( preg_replace( '/ /','_', get_the_title() ) );
							$et_nova_settings = maybe_unserialize( get_post_meta($post->ID,'et_nova_settings',true) );
							
							$tab_title = isset( $et_nova_settings['et_service_tabtitle'] ) && !empty($et_nova_settings['et_service_tabtitle']) ? $et_nova_settings['et_service_tabtitle'] : get_the_title();
							$tab_subtitle = isset( $et_nova_settings['et_service_tab_subtitle'] ) && !empty($et_nova_settings['et_service_tab_subtitle']) ? $et_nova_settings['et_service_tab_subtitle'] : '';
						?>
						
						<li><a href="#<?php #echo $hash; ?>"><strong><?php echo esc_html($tab_title); ?></strong><?php if ($tab_subtitle != '') { ?><span><?php echo esc_html($tab_subtitle); ?></span><?php } ?></a></li>
										
						<?php $pagesContent[$i]['hash'] = $hash;
						global $more; $more=0;
						
						$pagesContent[$i]['content'] = apply_filters('the_content', get_the_content(''));
						
						$pagesContent[$i]['title'] = isset( $et_nova_settings['et_service_title'] ) && !empty($et_nova_settings['et_service_title']) ? $et_nova_settings['et_service_title'] : get_the_title();
						$pagesContent[$i]['link'] = isset( $et_nova_settings['et_service_link'] ) && !empty($et_nova_settings['et_service_link']) ? $et_nova_settings['et_service_link'] : get_permalink();
						$pagesContent[$i]['et_service_postsnum'] = isset( $et_nova_settings['et_service_postsnum'] ) && !empty($et_nova_settings['et_service_postsnum']) ? $et_nova_settings['et_service_postsnum'] : 100;
						
						$thumb = '';
						$width = 160;
						$height = 160;
						$classtext = '';
						$titletext = $pagesContent[$i]['title'];
													
						$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext,false,'Portfolio');
						
						$pagesContent[$i]['thumbnail'] = $thumbnail["thumb"];
						
						$pagesContent[$i]['use_timthumb'] = $thumbnail["use_timthumb"];
											
						$pagesContent[$i]['portfolio_categories'] = isset( $et_nova_settings['et_settings_portfolio_categories'] ) && !empty( $et_nova_settings['et_settings_portfolio_categories'] ) ? $et_nova_settings['et_settings_portfolio_categories'] : array();
											
						$pagesContent[$i]['portfolio'] = ( !empty($pagesContent[$i]['portfolio_categories']) ) ? true : false;
						
						$i++; ?>
					<?php endwhile; endif; wp_reset_query(); ?>
				</ul> <!-- end ul#main-tabs -->
				
				
				<?php for($i=0; $i < $home_pages_num; $i++) { ?>
					<div class="tab-slide clearfix" id="<?php echo esc_attr($pagesContent[$i]['hash']); ?>">
						
						<?php if (!$pagesContent[$i]['portfolio']) { ?>
							<div class="content-area clearfix">
								<h3 class="title"><?php echo wp_kses( $pagesContent[$i]['title'], array( 'span' => array() ) ); ?></h3>
								<?php if ($pagesContent[$i]['thumbnail'] <> '' && get_option('nova_page_thumbnails') == 'on') { ?>
									<div class="thumbnail">
										<?php print_thumbnail($pagesContent[$i]['thumbnail'], $pagesContent[$i]['use_timthumb'], $pagesContent[$i]['title'], $width, $height, ''); ?>
										<span class="overlay2"></span>
									</div> <!-- .thumbnail -->
								<?php } ?>
								
								<?php echo $pagesContent[$i]['content']; ?>
								
								<a href="<?php echo esc_url($pagesContent[$i]['link']); ?>" class="readmore"><span><?php esc_html_e('read more','Nova'); ?></span></a>
							</div> <!-- .content-area -->
						<?php } else { ?>				
							<div class="gallery-area clearfix">
								<?php $j = 0; ?>
								<?php query_posts("showposts=".$pagesContent[$i]['et_service_postsnum']."&cat=".implode(",",$pagesContent[$i]['portfolio_categories'])); ?>
									<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
										<?php 
											$thumb = '';
											$width2 = 207;
											$height2 = 136;
											$classtext = 'portfolio';
											$titletext = get_the_title();	
											$thumbnail = get_thumbnail($width2,$height2,$classtext,$titletext,$titletext,true,'Gallery');
											
											$thumb = $thumbnail['thumb']; ?>
										<?php if ($thumb <> '') { ?>
											<?php $j++; ?>
											<div class="et_pt_gallery_entry">
												<div class="et_pt_item_image">
													<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width2, $height2, $classtext); ?>
													<span class="overlay"></span>
													
													<a class="zoom-icon fancybox" title="<?php the_title(); ?>" rel="gallery" href="<?php echo esc_attr($thumbnail['fullpath']); ?>"><?php esc_html_e('Zoom in','Nova'); ?></a>
													<a class="more-icon" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more','Nova'); ?></a>
												</div> <!-- end .et_pt_item_image -->
											</div> <!-- end .et_pt_gallery_entry -->
										<?php } ?>
									<?php endwhile; endif; wp_reset_query(); ?>
							</div> <!-- .gallery-area -->
							
							<?php if ( $pagesContent[$i]['et_service_postsnum'] <> 100 ) { ?>
								<a href="<?php echo esc_url($pagesContent[$i]['link']); ?>" class="readmore"><span><?php esc_html_e('read more','Nova'); ?></span></a>
							<?php } ?>	
						<?php } ?>
					</div> <!-- end .tab-slide -->
				<?php } ?>
			</div> <!-- #services -->
			
		</div> <!-- end .container -->
	</div> <!-- end #main-area -->
<?php } else { ?>
	<div id="home-blogstyle">
		<div id="main-content">
			<div class="container clearfix">		
				<div id="entries-area">
					<div id="entries-area-inner">
						<div id="entries-area-content" class="clearfix">
							<div id="content-area">							
								<?php get_template_part('includes/entry','home'); ?>
							</div> <!-- end #content-area -->
							
							<?php get_sidebar(); ?>
						</div> <!-- end #entries-area-content -->
					</div> <!-- end #entries-area-inner -->
				</div> <!-- end #entries-area -->
			</div> <!-- end .container -->
		</div> <!-- end #main-content -->
	</div> <!-- end #home-blogstyle -->
<?php } ?>
	
<?php get_footer(); ?>