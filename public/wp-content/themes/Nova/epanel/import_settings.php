<?php 
add_action( 'admin_enqueue_scripts', 'import_epanel_javascript' );
function import_epanel_javascript( $hook_suffix ) {
	if ( 'admin.php' == $hook_suffix && isset( $_GET['import'] ) && isset( $_GET['step'] ) && 'wordpress' == $_GET['import'] && '1' == $_GET['step'] )
		add_action( 'admin_head', 'admin_headhook' );
}

function admin_headhook(){ ?>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			$("p.submit").before("<p><input type='checkbox' id='importepanel' name='importepanel' value='1' style='margin-right: 5px;'><label for='importepanel'>Import epanel settings</label></p>");
		});
	</script>
<?php }

add_action('import_end','importend');
function importend(){
	global $wpdb, $shortname;
	
	#make custom fields image paths point to sampledata/sample_images folder
	$sample_images_postmeta = $wpdb->get_results("SELECT meta_id, meta_value FROM $wpdb->postmeta WHERE meta_value REGEXP 'http://et_sample_images.com'");
	if ( $sample_images_postmeta ) {
		foreach ( $sample_images_postmeta as $postmeta ){
			$template_dir = get_template_directory_uri();
			if ( is_multisite() ){
				switch_to_blog(1);
				$main_siteurl = site_url();
				restore_current_blog();
				
				$template_dir = $main_siteurl . '/wp-content/themes/' . get_template();
			}
			preg_match( '/http:\/\/et_sample_images.com\/([^.]+).jpg/', $postmeta->meta_value, $matches );
			$image_path = $matches[1];
			
			$local_image = preg_replace( '/http:\/\/et_sample_images.com\/([^.]+).jpg/', $template_dir . '/sampledata/sample_images/$1.jpg', $postmeta->meta_value );
			
			$local_image = preg_replace( '/s:55:/', 's:' . strlen( $template_dir . '/sampledata/sample_images/' . $image_path . '.jpg' ) . ':', $local_image );
			
			$wpdb->update( $wpdb->postmeta, array( 'meta_value' => $local_image ), array( 'meta_id' => $postmeta->meta_id ), array( '%s' ) );
		}
	}

	if ( !isset($_POST['importepanel']) )
		return;
	
	$importOptions = 'YTo5MDp7czowOiIiO047czo5OiJub3ZhX2xvZ28iO3M6MDoiIjtzOjEyOiJub3ZhX2Zhdmljb24iO3M6MDoiIjtzOjE3OiJub3ZhX2NvbG9yX3NjaGVtZSI7czo0OiJHcmV5IjtzOjE1OiJub3ZhX2Jsb2dfc3R5bGUiO047czoxNToibm92YV9ncmFiX2ltYWdlIjtOO3M6MTc6Im5vdmFfY2F0bnVtX3Bvc3RzIjtzOjE6IjYiO3M6MjE6Im5vdmFfYXJjaGl2ZW51bV9wb3N0cyI7czoxOiI1IjtzOjIwOiJub3ZhX3NlYXJjaG51bV9wb3N0cyI7czoxOiI1IjtzOjE3OiJub3ZhX3RhZ251bV9wb3N0cyI7czoxOiI1IjtzOjE2OiJub3ZhX2RhdGVfZm9ybWF0IjtzOjY6Ik0gaiwgWSI7czoyNDoibm92YV9jb21tZW50X2RhdGVfZm9ybWF0IjtzOjU6ImQtbS1ZIjtzOjE2OiJub3ZhX3VzZV9leGNlcnB0IjtOO3M6MTU6Im5vdmFfaG9tZV9wYWdlcyI7YTozOntpOjA7czozOiI3MjQiO2k6MTtzOjM6IjIzNSI7aToyO3M6MzoiNjY4Ijt9czoxOToibm92YV9leGxjYXRzX3JlY2VudCI7TjtzOjEzOiJub3ZhX2ZlYXR1cmVkIjtzOjI6Im9uIjtzOjE0OiJub3ZhX2R1cGxpY2F0ZSI7czoyOiJvbiI7czoxMzoibm92YV9mZWF0X2NhdCI7czo4OiJGZWF0dXJlZCI7czoxNzoibm92YV9mZWF0dXJlZF9udW0iO3M6MToiMyI7czoxNDoibm92YV91c2VfcGFnZXMiO047czoxNToibm92YV9mZWF0X3BhZ2VzIjtOO3M6MTg6Im5vdmFfc2xpZGVyX2VmZmVjdCI7czo0OiJmYWRlIjtzOjE2OiJub3ZhX3NsaWRlcl9hdXRvIjtzOjI6Im9uIjtzOjE2OiJub3ZhX3BhdXNlX2hvdmVyIjtzOjI6Im9uIjtzOjIxOiJub3ZhX3NsaWRlcl9hdXRvc3BlZWQiO3M6NDoiNzAwMCI7czoxNDoibm92YV9tZW51cGFnZXMiO2E6MTp7aTowO3M6MzoiNzI0Ijt9czoyMToibm92YV9lbmFibGVfZHJvcGRvd25zIjtzOjI6Im9uIjtzOjE0OiJub3ZhX2hvbWVfbGluayI7czoyOiJvbiI7czoxNToibm92YV9zb3J0X3BhZ2VzIjtzOjEwOiJwb3N0X3RpdGxlIjtzOjE1OiJub3ZhX29yZGVyX3BhZ2UiO3M6MzoiYXNjIjtzOjIyOiJub3ZhX3RpZXJzX3Nob3duX3BhZ2VzIjtzOjE6IjMiO3M6MTM6Im5vdmFfbWVudWNhdHMiO2E6Mzp7aTowO3M6MToiNCI7aToxO3M6MToiNSI7aToyO3M6MToiMSI7fXM6MzI6Im5vdmFfZW5hYmxlX2Ryb3Bkb3duc19jYXRlZ29yaWVzIjtzOjI6Im9uIjtzOjIxOiJub3ZhX2NhdGVnb3JpZXNfZW1wdHkiO3M6Mjoib24iO3M6Mjc6Im5vdmFfdGllcnNfc2hvd25fY2F0ZWdvcmllcyI7czoxOiIzIjtzOjEzOiJub3ZhX3NvcnRfY2F0IjtzOjQ6Im5hbWUiO3M6MTQ6Im5vdmFfb3JkZXJfY2F0IjtzOjM6ImFzYyI7czoyMDoibm92YV9kaXNhYmxlX3RvcHRpZXIiO047czoxNDoibm92YV9wb3N0aW5mbzIiO2E6NDp7aTowO3M6NjoiYXV0aG9yIjtpOjE7czo0OiJkYXRlIjtpOjI7czoxMDoiY2F0ZWdvcmllcyI7aTozO3M6ODoiY29tbWVudHMiO31zOjE1OiJub3ZhX3RodW1ibmFpbHMiO3M6Mjoib24iO3M6MjI6Im5vdmFfc2hvd19wb3N0Y29tbWVudHMiO3M6Mjoib24iO3M6MjA6Im5vdmFfcGFnZV90aHVtYm5haWxzIjtOO3M6MjM6Im5vdmFfc2hvd19wYWdlc2NvbW1lbnRzIjtOO3M6MTQ6Im5vdmFfcG9zdGluZm8xIjthOjQ6e2k6MDtzOjY6ImF1dGhvciI7aToxO3M6NDoiZGF0ZSI7aToyO3M6MTA6ImNhdGVnb3JpZXMiO2k6MztzOjg6ImNvbW1lbnRzIjt9czoyMToibm92YV90aHVtYm5haWxzX2luZGV4IjtzOjI6Im9uIjtzOjE4OiJub3ZhX2N1c3RvbV9jb2xvcnMiO047czoxNDoibm92YV9jaGlsZF9jc3MiO047czoxNzoibm92YV9jaGlsZF9jc3N1cmwiO3M6MDoiIjtzOjE5OiJub3ZhX2NvbG9yX21haW5mb250IjtzOjA6IiI7czoxOToibm92YV9jb2xvcl9tYWlubGluayI7czowOiIiO3M6MTk6Im5vdmFfY29sb3JfcGFnZWxpbmsiO3M6MDoiIjtzOjI2OiJub3ZhX2NvbG9yX3BhZ2VsaW5rX2FjdGl2ZSI7czowOiIiO3M6MTk6Im5vdmFfY29sb3JfaGVhZGluZ3MiO3M6MDoiIjtzOjI0OiJub3ZhX2NvbG9yX3NpZGViYXJfbGlua3MiO3M6MDoiIjtzOjE2OiJub3ZhX2Zvb3Rlcl90ZXh0IjtzOjA6IiI7czoyMjoibm92YV9jb2xvcl9mb290ZXJsaW5rcyI7czowOiIiO3M6MTk6Im5vdmFfc2VvX2hvbWVfdGl0bGUiO047czoyNToibm92YV9zZW9faG9tZV9kZXNjcmlwdGlvbiI7TjtzOjIyOiJub3ZhX3Nlb19ob21lX2tleXdvcmRzIjtOO3M6MjM6Im5vdmFfc2VvX2hvbWVfY2Fub25pY2FsIjtOO3M6MjM6Im5vdmFfc2VvX2hvbWVfdGl0bGV0ZXh0IjtzOjA6IiI7czoyOToibm92YV9zZW9faG9tZV9kZXNjcmlwdGlvbnRleHQiO3M6MDoiIjtzOjI2OiJub3ZhX3Nlb19ob21lX2tleXdvcmRzdGV4dCI7czowOiIiO3M6MTg6Im5vdmFfc2VvX2hvbWVfdHlwZSI7czoyNzoiQmxvZ05hbWUgfCBCbG9nIGRlc2NyaXB0aW9uIjtzOjIyOiJub3ZhX3Nlb19ob21lX3NlcGFyYXRlIjtzOjM6IiB8ICI7czoyMToibm92YV9zZW9fc2luZ2xlX3RpdGxlIjtOO3M6Mjc6Im5vdmFfc2VvX3NpbmdsZV9kZXNjcmlwdGlvbiI7TjtzOjI0OiJub3ZhX3Nlb19zaW5nbGVfa2V5d29yZHMiO047czoyNToibm92YV9zZW9fc2luZ2xlX2Nhbm9uaWNhbCI7TjtzOjI3OiJub3ZhX3Nlb19zaW5nbGVfZmllbGRfdGl0bGUiO3M6OToic2VvX3RpdGxlIjtzOjMzOiJub3ZhX3Nlb19zaW5nbGVfZmllbGRfZGVzY3JpcHRpb24iO3M6MTU6InNlb19kZXNjcmlwdGlvbiI7czozMDoibm92YV9zZW9fc2luZ2xlX2ZpZWxkX2tleXdvcmRzIjtzOjEyOiJzZW9fa2V5d29yZHMiO3M6MjA6Im5vdmFfc2VvX3NpbmdsZV90eXBlIjtzOjIxOiJQb3N0IHRpdGxlIHwgQmxvZ05hbWUiO3M6MjQ6Im5vdmFfc2VvX3NpbmdsZV9zZXBhcmF0ZSI7czozOiIgfCAiO3M6MjQ6Im5vdmFfc2VvX2luZGV4X2Nhbm9uaWNhbCI7TjtzOjI2OiJub3ZhX3Nlb19pbmRleF9kZXNjcmlwdGlvbiI7TjtzOjE5OiJub3ZhX3Nlb19pbmRleF90eXBlIjtzOjI0OiJDYXRlZ29yeSBuYW1lIHwgQmxvZ05hbWUiO3M6MjM6Im5vdmFfc2VvX2luZGV4X3NlcGFyYXRlIjtzOjM6IiB8ICI7czoyODoibm92YV9pbnRlZ3JhdGVfaGVhZGVyX2VuYWJsZSI7czoyOiJvbiI7czoyNjoibm92YV9pbnRlZ3JhdGVfYm9keV9lbmFibGUiO3M6Mjoib24iO3M6MzE6Im5vdmFfaW50ZWdyYXRlX3NpbmdsZXRvcF9lbmFibGUiO3M6Mjoib24iO3M6MzQ6Im5vdmFfaW50ZWdyYXRlX3NpbmdsZWJvdHRvbV9lbmFibGUiO3M6Mjoib24iO3M6MjE6Im5vdmFfaW50ZWdyYXRpb25faGVhZCI7czowOiIiO3M6MjE6Im5vdmFfaW50ZWdyYXRpb25fYm9keSI7czowOiIiO3M6Mjc6Im5vdmFfaW50ZWdyYXRpb25fc2luZ2xlX3RvcCI7czowOiIiO3M6MzA6Im5vdmFfaW50ZWdyYXRpb25fc2luZ2xlX2JvdHRvbSI7czowOiIiO3M6MTU6Im5vdmFfNDY4X2VuYWJsZSI7TjtzOjE0OiJub3ZhXzQ2OF9pbWFnZSI7czowOiIiO3M6MTI6Im5vdmFfNDY4X3VybCI7czowOiIiO3M6MTY6Im5vdmFfNDY4X2Fkc2Vuc2UiO3M6MDoiIjt9';
	
	/*global $options;
	
	foreach ($options as $value) {
		if( isset( $value['id'] ) ) { 
			update_option( $value['id'], $value['std'] );
		}
	}*/
	
	$importedOptions = unserialize(base64_decode($importOptions));
	
	foreach ($importedOptions as $key=>$value) {
		if ($value != '') update_option( $key, $value );
	}
	update_option( $shortname . '_use_pages', 'false' );
} ?>