<?php class AboutMeWidget extends WP_Widget
{
    function AboutMeWidget(){
		$widget_ops = array('description' => 'Displays About Me Information');
		$control_ops = array('width' => 400, 'height' => 300);
		parent::WP_Widget(false,$name='ET About Me Widget',$widget_ops,$control_ops);
    }

  /* Displays the Widget in the front-end */
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? 'About Me' : $instance['title']);
		$imagePath = empty($instance['imagePath']) ? '' : $instance['imagePath'];
		$aboutText = empty($instance['aboutText']) ? '' : $instance['aboutText'];
		$aboutLink = empty($instance['aboutLink']) ? '' : $instance['aboutLink'];

?>
	
<div id="about">
	<h2><?php echo $title; ?></h2>
	<div id="about-content">
        <div id="about-image-border">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo($imagePath); ?>&amp;h=68&amp;w=68&amp;zc=1" id="about-image" alt="about us image" />
		</div>
		<?php echo($aboutText) ?>
		<?php if ($aboutLink <> '') { ?>
			<a href="<?php echo $aboutLink; ?>" rel="bookmark" class="readmore" title="Permanent Link to <?php the_title(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/readmore-about.gif" alt="read more" style="border: none;" /></a>
		<?php } ?>
	</div>
	<img src="<?php bloginfo('stylesheet_directory'); ?>/images/about-bottom-<?php echo(get_option('basic_color')); ?>.gif" alt="about bottom" style="float: left;" />
	<div class="clearfix"></div>
</div> <!-- end about me section -->
<?php
		
	}

  /*Saves the settings. */
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = stripslashes($new_instance['title']);
		$instance['imagePath'] = stripslashes($new_instance['imagePath']);
		$instance['aboutText'] = stripslashes($new_instance['aboutText']);
		$instance['aboutLink'] = stripslashes($new_instance['aboutLink']);

		return $instance;
	}

  /*Creates the form for the widget in the back-end. */
    function form($instance){
		//Defaults
		$instance = wp_parse_args( (array) $instance, array('title'=>'About Me', 'imagePath'=>'', 'aboutText'=>'', 'aboutLink'=>'') );

		$title = htmlspecialchars($instance['title']);
		$imagePath = htmlspecialchars($instance['imagePath']);
		$aboutText = htmlspecialchars($instance['aboutText']);
		$aboutLink = htmlspecialchars($instance['aboutLink']);

		# Title
		echo '<p><label for="' . $this->get_field_id('title') . '">' . 'Title:' . '</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></p>';
		# Image
		echo '<p><label for="' . $this->get_field_id('imagePath') . '">' . 'Image:' . '</label><textarea cols="20" rows="2" class="widefat" id="' . $this->get_field_id('imagePath') . '" name="' . $this->get_field_name('imagePath') . '" >'. $imagePath .'</textarea></p>';	
		# About Text
		echo '<p><label for="' . $this->get_field_id('aboutText') . '">' . 'Text:' . '</label><textarea cols="20" rows="5" class="widefat" id="' . $this->get_field_id('aboutText') . '" name="' . $this->get_field_name('aboutText') . '" >'. $aboutText .'</textarea></p>';
		# About Page Link
		echo '<p><label for="' . $this->get_field_id('aboutLink') . '">' . 'About Page url:' . '</label><textarea cols="20" rows="5" class="widefat" id="' . $this->get_field_id('aboutLink') . '" name="' . $this->get_field_name('aboutLink') . '" >'. $aboutLink .'</textarea></p>';
	}

}// end AboutMeWidget class

function AboutMeWidgetInit() {
  register_widget('AboutMeWidget');
}

add_action('widgets_init', 'AboutMeWidgetInit');

?>