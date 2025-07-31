<article id="title" <?php post_class('post clearfix'); ?>>
	<div class="post-content title">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<footer class="post-footer">
			 
			<?php if(comments_open()) { ?>
			<div class="post-comment-count"><?php comments_number('0','1','%'); ?></div>
			<?php } ?>			
			<time class="post-date nomargin" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time(get_option('date_format')); ?></time>
			<?php if(ThemexCore::getOption('blog_author')!='true') { ?>
			<div class="post-author">&nbsp;<?php _e('by', 'academy'); ?> <?php the_author_posts_link(); ?></div>
			<?php } ?>
		</footer>
	</div>
</article>