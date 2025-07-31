<?php if( $allattachments= get_post_meta( $post->ID, '_lesson_allattachments', true) ) { ?>
<div class="widget sidebar-widget">
	<div class="widget-title"><h4 class="nomargin"><?php _e('دانلود یکباره فایل زیپ همه محتوای کلاس', 'academy'); ?></h4></div>
	<div class="widget-content">
	<p>در صورتی که این فایل را دانلود نمایید نیازی به دانلود جداگانه هر سرفصل نیست و همه فایل های این جلسه از کلاس بصورت زیپ در این فایل موجود میباشد.</p>
		<ul class="styled-list style-4">
			<li id="allattachments" class="allattachments">
                <div> 
					<?php echo do_shortcode($allattachments); ?>
                </div>
            </li>
		</ul>
	</div>
</div>
<?php } ?>