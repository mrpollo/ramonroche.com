<?php if ( ! function_exists( 'et_custom_comments_display' ) ) :
function et_custom_comments_display($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	   <div id="comment-<?php comment_ID(); ?>" class="comment-body clearfix">
			<div class="alignleft authordata">
				<div class="avatar">
					<?php echo get_avatar($comment,$size='57'); ?>
					<span class="avatar-overlay"></span>
				</div> <!-- end .avatar-->

				<div class="comment-meta commentmetadata"><?php comment_date( get_option( 'nova_comment_date_format' ) ); ?></div>
			</div>
			
			<div class="comment-wrap">
				<div class="comment-wrap-inner clearfix">
					<div class="comment-arrow"></div>
					<?php printf( '<span class="fn">%s says:</span>', get_comment_author_link() ); ?>
					
					<?php if ($comment->comment_approved == '0') : ?>
						<em class="moderation"><?php esc_html_e('Your comment is awaiting moderation.','Nova') ?></em>
						<br />
					<?php endif; ?>
					
					<div class="comment-content"><?php comment_text() ?></div> <!-- end comment-content-->
					<?php 
						$et_comment_reply_link = get_comment_reply_link( array_merge( $args, array('reply_text' => esc_attr__('Reply','Nova'),'depth' => $depth, 'max_depth' => $args['max_depth'])) );
						if ( $et_comment_reply_link ) echo '<div class="reply-container">' . $et_comment_reply_link . '</div>';
					?>
				</div> <!-- end comment-wrap-inner -->  
			</div> <!-- end comment-wrap-->
		</div> <!-- end comment-body-->	
<?php }
endif; ?>