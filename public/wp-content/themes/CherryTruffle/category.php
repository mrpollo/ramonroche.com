<?php get_header(); ?>
<?php if (get_option('cherrytruffle_blog_style') == 'on') { ?>
<?php include(TEMPLATEPATH . '/includes/blogstylecat.php'); ?>
<?php } else { include(TEMPLATEPATH . '/includes/defaultcat.php'); } ?>
<?php get_footer(); ?>
</body>
</html>