<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name' => 'Sidebar',
        'before_widget' => '<div class="sidebar-box">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
?>