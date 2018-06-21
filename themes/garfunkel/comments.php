<?php 
if ( post_password_required() ) 
	return;

	if ( have_comments() ) : ?>
	
		<div class="comments">
		
			<a name="comments"></a>
			
			<div class="comments-title-container">
				
				<h2 class="comments-title fleft">
				
					<?php 
					$comment_count = count( $wp_query->comments_by_type['comment'] );
					printf( _n( '%s Comment', '%s Comments', $comment_count, 'garfunkel' ), $comment_count ); ?>
					
				</h2>
				
				<?php if ( comments_open() ) : ?>
				
					<h2 class="comments-subtitle fright"><a href="#respond"><?php echo __( 'Add yours', 'garfunkel' ) . ' &rarr;'; ?></a></h2>
				
				<?php endif; ?>
				
				<div class="clear"></div>
			
			</div><!-- .comments-title-container -->
	
			<ol class="commentlist">
			    <?php wp_list_comments( array( 'type' => 'comment', 'callback' => 'garfunkel_comment' ) ); ?>
			</ol>
			
			<?php if ( ! empty( $comments_by_type['pings'] ) ) : ?>
			
				<div class="pingbacks-container">
								
					<h3 class="pingbacks-title">
					
						<?php 
						$pingback_count = count( $wp_query->comments_by_type['pings'] );
						printf( _n( '%s Pingback', '%s Pingbacks', $pingback_count, 'garfunkel' ), $pingback_count ); ?>
					
					</h3>
				
					<ol class="pingbacklist">
					    <?php wp_list_comments( array( 'type' => 'pings', 'callback' => 'garfunkel_comment' ) ); ?>
					</ol>
											
				</div><!-- .pingbacks-container -->
			
			<?php endif; ?>
			
		</div><!-- /comments -->
		
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			
			<div class="comments-nav" role="navigation">
								
				<div class="post-nav-older fleft"><?php previous_comments_link( '&laquo; ' . __( 'Older Comments', 'garfunkel' ) ); ?></div>
				
				<div class="post-nav-newer fright"><?php next_comments_link( __( 'Newer Comments', 'garfunkel' ) . ' &raquo;' ); ?></div>
				
				<div class="clear"></div>
				
			</div><!-- .comments-nav -->
			
		<?php endif; ?>
		
	<?php endif; ?>
	
	<?php if ( ! comments_open() && ! is_page() ) : ?>
	
		<p class="nocomments"><?php _e( 'Comments are closed.', 'garfunkel' ); ?></p>
		
	<?php endif; ?>
	
	<?php $comments_args = array(
	
		'comment_notes_before' => 
			'<p class="comment-notes">' . __( 'Your email address will not be published.', 'garfunkel' ) . '</p>',
	
		'comment_field' => 
			'<p class="comment-form-comment">' . 
			'<label for="comment">' . __( 'Comment', 'garfunkel' ) . '</label>' . 
			'<textarea id="comment" name="comment" cols="45" rows="6" required>' . '</textarea></p>',		
	);
	
	comment_form( $comments_args );
	
	?>