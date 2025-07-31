<li id="comment-<?php echo $comment->comment_ID; ?>">
	<div class="comment hidden-wrap">
		<div class="avatar-container">
			<div class="bordered-image">
				<a href="<?php echo get_author_posts_url($comment->user_id); ?>"><?php echo get_avatar($comment); ?></a>
			</div>										
		</div>
		<div class="comment-text">
			<header class="comment-header hidden-wrap">
				<h5 class="comment-author">
                <?php 
				$userdata = get_userdata( $comment->user_id );
				$userfullname = (isset($userdata -> first_name) ? $userdata -> first_name : '' ) .
								' ' .
								(isset($userdata -> last_name) ? $userdata -> last_name : '' );					
				 ?>
                    <a href="<?php echo get_author_posts_url($comment->user_id); ?>"><?php echo $userfullname; ?></a>
                </h5> 
            </header>
			<?php comment_text(); ?> <?php edit_comment_link('ویرایش دیدگاه') ?>
		</div>
	</div>