<?php 
/*
Template Name: Login Page
*/
?>
<?php 
	$et_ptemplate_settings = array();
	$et_ptemplate_settings = maybe_unserialize( get_post_meta($post->ID,'et_ptemplate_settings',true) );
	
	$fullwidth = isset( $et_ptemplate_settings['et_fullwidthpage'] ) ? (bool) $et_ptemplate_settings['et_fullwidthpage'] : false;
?>

<?php get_header(); ?>

<div id="main-content"<?php if ($fullwidth) echo ' class="fullwidth"'; ?>>
	<div class="container clearfix">		
		<div id="entries-area">
			<div id="entries-area-inner">
				<div id="entries-area-content" class="clearfix">
					<div id="content-area">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php get_template_part('includes/breadcrumbs'); ?>
						
						<div class="entry post clearfix">							
							<h1 class="title" style="margin-bottom: 20px;"><?php the_title(); ?></h1>
							
							<?php if (get_option('nova_page_thumbnails') == 'on') { ?>
								<?php 
									$thumb = '';
									$width = 160;
									$height = 160;
									$classtext = '';
									$titletext = get_the_title();
									
									$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext,false,'Portfolio');
									$thumb = $thumbnail["thumb"];
								?>
								
								<?php if($thumb <> '') { ?>
									<div class="thumbnail">
										<a href="<?php the_permalink(); ?>">
											<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, $classtext); ?>
											<span class="overlay2"></span>
										</a>
									</div> <!-- .thumbnail -->
								<?php } ?>
							<?php } ?>
							
							<?php the_content(); ?>
							<?php wp_link_pages(array('before' => '<p><strong>'.esc_html__('Pages','Nova').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
							
							<div id="et-login">
								<div class='et-protected'>
									<div class='et-protected-form'>
										<form action='<?php echo home_url(); ?>/wp-login.php' method='post'>
											<p><label><?php esc_html_e('Username','Nova'); ?>: <input type='text' name='log' id='log' value='<?php echo esc_attr($user_login); ?>' size='20' /></label></p>
											<p><label><?php esc_html_e('Password','Nova'); ?>: <input type='password' name='pwd' id='pwd' size='20' /></label></p>
											<input type='submit' name='submit' value='Login' class='etlogin-button' />
										</form> 
									</div> <!-- .et-protected-form -->
									<p class='et-registration'><?php esc_html_e('Not a member?','Nova'); ?> <a href='<?php echo site_url('wp-login.php?action=register', 'login_post'); ?>'><?php esc_html_e('Register today!','Nova'); ?></a></p>
								</div> <!-- .et-protected -->
							</div> <!-- end #et-login -->
							
							<div class="clear"></div>
							
							<?php edit_post_link(esc_html__('Edit this page','Nova')); ?>
						
						</div> <!-- end .entry -->
					<?php endwhile; endif; ?>
					</div> <!-- end #content-area -->
					
					<?php if (!$fullwidth) get_sidebar(); ?>
				</div> <!-- end #entries-area-content -->
			</div> <!-- end #entries-area-inner -->
		</div> <!-- end #entries-area -->
	</div> <!-- end .container -->
</div> <!-- end #main-content -->
		
<?php get_footer(); ?>