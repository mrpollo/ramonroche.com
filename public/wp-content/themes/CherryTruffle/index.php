<?php get_header(); ?>
<?php if (get_option('cherrytruffle_blog_style') == 'on') { ?>
<?php include(TEMPLATEPATH . '/includes/blogstyle.php'); ?>
<?php } else { include(TEMPLATEPATH . '/includes/default.php'); } ?>
<?php get_footer(); ?>
</body>
</html>