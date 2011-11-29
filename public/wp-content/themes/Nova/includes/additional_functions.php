<?php 

/* Meta boxes */

function nova_add_custom_panels(){
	add_meta_box("et_post_meta", "ET Settings", "nova_post_meta", "page", "normal", "high");
	add_meta_box("et_post_meta", "ET Settings", "nova_post_meta", "post", "normal", "high");
}
add_action("admin_init", "nova_add_custom_panels");

function nova_post_meta($callback_args) {
	global $post;
	
	$post_type = $callback_args->post_type;
	$temp_array = array();

	$temp_array = maybe_unserialize(get_post_meta($post->ID,'et_nova_settings',true));
			
	$et_is_featured = isset( $temp_array['et_is_featured'] ) ? (bool) $temp_array['et_is_featured'] : false;
	$et_fs_variation = isset( $temp_array['et_fs_variation'] ) ? (int) $temp_array['et_fs_variation'] : 1;
	$et_fs_video = isset( $temp_array['et_fs_video'] ) ? $temp_array['et_fs_video'] : '';
	$et_fs_video_embed = isset( $temp_array['et_fs_video_embed'] ) ? $temp_array['et_fs_video_embed'] : '';
	$et_fs_title = isset( $temp_array['et_fs_title'] ) ? $temp_array['et_fs_title'] : '';
	$et_fs_description = isset( $temp_array['et_fs_description'] ) ? $temp_array['et_fs_description'] : '';
	$et_fs_button = isset( $temp_array['et_fs_button'] ) ? $temp_array['et_fs_button'] : '';
	$et_fs_link = isset( $temp_array['et_fs_link'] ) ? $temp_array['et_fs_link'] : '';
	
	$et_is_page_portfolio = isset( $temp_array['et_is_page_portfolio'] ) ? (bool) $temp_array['et_is_page_portfolio'] : false;
	$et_service_tabtitle = isset( $temp_array['et_service_tabtitle'] ) ? $temp_array['et_service_tabtitle'] : '';
	$et_service_tab_subtitle = isset( $temp_array['et_service_tab_subtitle'] ) ? $temp_array['et_service_tab_subtitle'] : '';
	$et_service_title = isset( $temp_array['et_service_title'] ) ? $temp_array['et_service_title'] : '';
	$et_service_link = isset( $temp_array['et_service_link'] ) ? $temp_array['et_service_link'] : '';
	$et_service_postsnum = isset( $temp_array['et_service_postsnum'] ) ? $temp_array['et_service_postsnum'] : '';
		
	$et_portfolio_categories = isset($temp_array["et_settings_portfolio_categories"]) ? $temp_array["et_settings_portfolio_categories"] : '';
	$et_settings_portfolio_cats_array = ( $et_portfolio_categories <> '' ) ? $et_portfolio_categories : array(); ?>
	
	<div id="et_custom_settings" style="margin: 13px 0 17px 4px;">
		<label class="selectit" for="et_is_featured" style="font-weight: bold;">
			<input type="checkbox" name="et_is_featured" id="et_is_featured" value=""<?php checked( $et_is_featured ); ?> /> This <?php echo $post_type; ?> is Featured</label><br/>
		
		<div id="et_settings_featured_options" style="margin-top: 12px;">
			
			<div class="et_fs_setting" style="display: none; margin: 13px 0 26px 4px;">
				<label for="et_fs_variation" style="color: #000; font-weight: bold;"> Featured Slider: </label>				
				<select id="et_fs_variation" name="et_fs_variation">
					<option value="1"<?php if ($et_fs_variation == 1) echo ' selected="selected"'; ?>>Image/Video on the left</option>
					<option value="2"<?php if ($et_fs_variation == 2) echo ' selected="selected"'; ?>>Png Image on the left</option>
					<option value="3"<?php if ($et_fs_variation == 3) echo ' selected="selected"'; ?>>Image/Video on the right</option>
					<option value="4"<?php if ($et_fs_variation == 4) echo ' selected="selected"'; ?>>Description Only</option>
				</select>
				<br />
			</div>
			
			<div class="et_fs_setting" style="display: none; margin: 13px 0 26px 4px;">
				<label for="et_fs_video" style="color: #000; font-weight: bold;"> Video url: </label>
				<input type="text" style="width: 30em;" value="<?php echo esc_url($et_fs_video); ?>" id="et_fs_video" name="et_fs_video" size="67" />
				<br />
				<small style="position: relative; top: 8px;">ex: <code><?php echo htmlspecialchars("http://www.youtube.com/watch?v=WkuHbkaieZ4");?></code></small>
			</div>
			
			<div class="et_fs_setting" style="display: none; margin: 13px 0 26px 4px;">
				<label for="et_fs_video_embed" style="color: #000; font-weight: bold;"> Video Embed Code: </label>
				<br />
				<textarea id="et_fs_video_embed" name="et_fs_video_embed" cols="40" rows="1" tabindex="6" style="display: inline; position: relative; top: 5px; width: 490px; height: 125px;"><?php echo esc_textarea($et_fs_video_embed); ?></textarea>
				<br />
				<small style="position: relative; top: 8px;">Paste embed code if video link cannot be used</small>
			</div>
			
			<div class="et_fs_setting" style="display: none; margin: 13px 0 26px 4px;">
				<label for="et_fs_title" style="color: #000; font-weight: bold;"> Custom Title: </label>
				<input type="text" style="width: 30em;" value="<?php echo esc_attr($et_fs_title); ?>" id="et_fs_title" name="et_fs_title" size="67" />
				<br />
				<small style="position: relative; top: 8px;">ex: <code><?php echo htmlspecialchars("<span>innovative</span> design is our passion");?></code></small>
			</div>
			
			<div class="et_fs_setting" style="display: none; margin: 13px 0 26px 4px;">
				<label for="et_fs_description" style="color: #000; font-weight: bold;"> Description Text: </label>
				<input type="text" style="width: 30em;" value="<?php echo esc_attr($et_fs_description); ?>" id="et_fs_description" name="et_fs_description" size="67" />
				<br />
				<small style="position: relative; top: 8px;">ex: <code><?php echo htmlspecialchars("we work hard <span>every day</span> to bring your ideas to life");?></code></small>
			</div>
			
			<div class="et_fs_setting" style="display: none; margin: 13px 0 26px 4px;">
				<label for="et_fs_button" style="color: #000; font-weight: bold;"> Button Text: </label>
				<input type="text" style="width: 30em;" value="<?php echo esc_attr($et_fs_button); ?>" id="et_fs_button" name="et_fs_button" size="67" />
				<br />
				<small style="position: relative; top: 8px;">ex: <code><?php echo htmlspecialchars("<strong>join today</strong><span>your future awaits</span>");?></code></small>
			</div>
			
			<div class="et_fs_setting" style="display: none; margin: 13px 0 26px 4px;">
				<label for="et_fs_link" style="color: #000; font-weight: bold;"> Custom Link: </label>
				<input type="text" style="width: 30em;" value="<?php echo esc_url($et_fs_link); ?>" id="et_fs_link" name="et_fs_link" size="67" />
				<br />
			</div>
			
		</div> <!-- #et_settings_featured_options -->
		
		<?php if ( 'page' == $post_type ) { ?>
			<div style="height: 1px; background: #D0D0D0; margin-top: -5px;"></div>
			<label class="selectit" for="et_is_page_portfolio" style="font-weight: bold; position: relative; top: 6px; margin-bottom: 10px;">
				<input type="checkbox" name="et_is_page_portfolio" id="et_is_page_portfolio" value=""<?php checked( $et_is_page_portfolio ); ?> /> Used For Homepage Service Tab
			</label>
			<br/>
			
			<div id="et_settings_portfolio_options" style="margin-top: 12px;">				
				<div class="et_settings_service_tab" style="display: none; margin: 13px 0 26px 4px;">
					<label for="et_service_tabtitle" style="color: #000; font-weight: bold;"> Service Page Tab Title: </label>
					<input type="text" style="width: 30em;" value="<?php echo esc_attr($et_service_tabtitle); ?>" id="et_service_tabtitle" name="et_service_tabtitle" size="67" />
					<br />
					<small style="position: relative; top: 8px;">ex: <code><?php echo htmlspecialchars("Print Media");?></code></small>
				</div>
				
				<div class="et_settings_service_tab" style="display: none; margin: 13px 0 26px 4px;">
					<label for="et_service_tab_subtitle" style="color: #000; font-weight: bold;"> Service Page Tab Subtitle: </label>
					<input type="text" style="width: 30em;" value="<?php echo esc_attr($et_service_tab_subtitle); ?>" id="et_service_tab_subtitle" name="et_service_tab_subtitle" size="67" />
					<br />
					<small style="position: relative; top: 8px;">ex: <code><?php echo htmlspecialchars("unmatched quality");?></code></small>
				</div>
				
				<div class="et_settings_service_tab" style="display: none; margin: 13px 0 26px 4px;">
					<label for="et_service_title" style="color: #000; font-weight: bold;"> Service Page Title: </label>
					<input type="text" style="width: 30em;" value="<?php echo esc_attr($et_service_title); ?>" id="et_service_title" name="et_service_title" size="67" />
					<br />
					<small style="position: relative; top: 8px;">ex: <code><?php echo htmlspecialchars("<span>beautify</span> your online presence");?></code></small>
				</div>
								
				<div class="et_settings_service_tab" style="display: none; margin: 13px 0 26px 4px;">
					<label for="et_service_postsnum" style="color: #000; font-weight: bold;"> Number of Posts: </label>
					<input type="text" style="width: 30em;" value="<?php echo esc_attr($et_service_postsnum); ?>" id="et_service_postsnum" name="et_service_postsnum" size="67" />
					<br />
				</div>
				
				<div class="et_settings_service_tab" style="display: none; margin: 13px 0 26px 4px;">
					<label for="et_service_link" style="color: #000; font-weight: bold;"> Custom Link: </label>
					<input type="text" style="width: 30em;" value="<?php echo esc_url($et_service_link); ?>" id="et_service_link" name="et_service_link" size="67" />
					<br />
				</div>
				
				<div id="et_settings_portfolio_categories_box" style="display: none;">
					<h4>Select portfolio categories:</h4>
					
					<?php $cats_array = get_categories('hide_empty=0');
						$site_cats = array();
						foreach ($cats_array as $categs) {
							$checked = '';
							
							if (!empty($et_settings_portfolio_cats_array)) {
								if (in_array($categs->cat_ID, $et_settings_portfolio_cats_array)) $checked = "checked=\"checked\"";
							} ?>
							
							<label style="width: 200px; float: left; padding-bottom: 5px;" for="<?php echo 'et_settings_portfolio_categories-',$categs->cat_ID; ?>">
								<input type="checkbox" name="et_settings_portfolio_categories[]" id="<?php echo 'et_settings_portfolio_categories-',$categs->cat_ID; ?>" value="<?php echo esc_html($categs->cat_ID); ?>" <?php echo $checked; ?> />
								<?php echo esc_html($categs->cat_name); ?>
							</label>
											
						<?php } ?>
					<br style="clear: both;" />
				</div>
				
			</div> <!-- #et_settings_portfolio_options -->
		<?php } ?>
	</div> <!-- #et_custom_settings -->
		
	<?php
}

add_action('save_post', 'nova_custom_panel_save');
function nova_custom_panel_save($post_id){
	global $pagenow;
	
	if ( 'post.php' != $pagenow ) return $post_id;
		
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
		return $post_id;
		
	$temp_array = array();
	
	if ( !isset($_POST['et_is_featured']) && !isset($_POST['et_is_page_portfolio']) ) {
		if ( get_post_meta( $post_id, "et_nova_settings", true ) ) $temp_array = maybe_unserialize( get_post_meta( $post_id, "et_nova_settings", true ) ); 
		$temp_array['et_is_featured'] = 0;
		$temp_array['et_is_page_portfolio'] = 0;
		update_post_meta( $post_id, "et_nova_settings", $temp_array );
		
		return $post_id;
	}
	
	$temp_array['et_is_featured'] = isset( $_POST["et_is_featured"] ) ? 1 : 0;
	$temp_array['et_fs_variation'] = isset($_POST["et_fs_variation"]) ? (int) $_POST["et_fs_variation"] : '';
	$temp_array['et_fs_video'] = isset($_POST["et_fs_video"]) ? esc_url($_POST["et_fs_video"]) : '';
	$temp_array['et_fs_video_embed'] = isset($_POST["et_fs_video_embed"]) ? $_POST["et_fs_video_embed"] : '';
	$temp_array['et_fs_title'] = isset($_POST["et_fs_title"]) ? wp_kses( $_POST["et_fs_title"], array( 'span' => array() ) ) : '';
	$temp_array['et_fs_description'] = isset($_POST["et_fs_description"]) ? wp_kses_post($_POST["et_fs_description"]) : '';
	$temp_array['et_fs_button'] = isset($_POST["et_fs_button"]) ? wp_kses( $_POST["et_fs_button"], array( 'span' => array(), 'strong' => array() ) ) : '';
	$temp_array['et_fs_link'] = isset($_POST["et_fs_link"]) ? esc_url($_POST["et_fs_link"]) : '';
	
	$temp_array['et_is_page_portfolio'] = isset( $_POST["et_is_page_portfolio"] ) ? 1 : 0;
	$temp_array['et_service_tabtitle'] = isset($_POST["et_service_tabtitle"]) ? esc_attr($_POST["et_service_tabtitle"]) : '';
	$temp_array['et_service_tab_subtitle'] = isset($_POST["et_service_tab_subtitle"]) ? esc_attr($_POST["et_service_tab_subtitle"]) : '';
	$temp_array['et_service_title'] = isset($_POST["et_service_title"]) ? wp_kses( $_POST["et_service_title"], array( 'span' => array() ) ) : '';
	$temp_array['et_service_postsnum'] = isset($_POST["et_service_postsnum"]) ? esc_attr($_POST["et_service_postsnum"]) : '';
	$temp_array['et_service_link'] = isset($_POST["et_service_link"]) ? esc_url($_POST["et_service_link"]) : '';
	$temp_array['et_settings_portfolio_categories'] = isset($_POST["et_settings_portfolio_categories"]) ? $_POST["et_settings_portfolio_categories"] : '';
		
	update_post_meta( $post_id, "et_nova_settings", $temp_array );
}

add_action( 'admin_enqueue_scripts', 'upload_metabox_etsettings_scripts' );
function upload_metabox_etsettings_scripts( $hook_suffix ) {
	if ( 'post.php' == $hook_suffix || 'post-new.php' == $hook_suffix ) {
		wp_register_script('et-categories', get_bloginfo('template_directory').'/js/et-categories.js', array('jquery'));
		wp_enqueue_script('et-categories');
	}
}

?>