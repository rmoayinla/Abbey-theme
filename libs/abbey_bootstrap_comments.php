<?php
function html5_comment( $comment, $args, $depth ) {
		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
?>		
		<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $args['has_children'] ? 'parent media' : 'media' ); ?>
			itemscope itemtype="http://schema.org/Comment" itemprop="comment">

			<?php if ( 0 != $args['avatar_size'] ): ?>
			<div class="media-left">
				<a href="<?php echo get_comment_author_url(); ?>" class="media-object" itemprop="Author">
					<?php echo get_avatar( $comment, $args['avatar_size'], "", "", array( "class" => "img-circle" ) ); ?>
				</a>
			</div>
			<?php endif; ?>

			<div class="media-body">

				<?php printf( '<h4 class="media-heading" itemprop="author">%s</h4>', get_comment_author_link() ); ?>
				
				<div class="comment-metadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>" itemprop="url">
						<time datetime="<?php comment_time( 'c' ); ?>" itemprop="datePublished">
							<?php printf( _x( '%1$s at %2$s', '1: date, 2: time' ), get_comment_date(), get_comment_time() ); ?>
						</time>
					</a>
				</div><!-- .comment-metadata -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation label label-info"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
				<?php endif; ?>				

				<div class="comment-content" itemprop="text">
					<?php comment_text(); ?>
				</div><!-- .comment-content -->
				
				<ul class="list-inline">
					<?php edit_comment_link( __( 'Edit' ), '<li class="edit-link">', '</li>' ); ?>

					<?php
						comment_reply_link( array_merge( $args, array(
							'add_below' => 'comment',
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<li class="reply-link">',
							'after'     => '</li>'
						) ), $comment->comment_ID );	
					?>

				</ul>

			</div>		<?php
}	
