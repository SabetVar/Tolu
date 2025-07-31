<?php if($attachments=ThemexCore::parseMeta($post->ID, 'lesson', 'attachments')) { ?>
<div class="widget sidebar-widget">
	<div class="widget-title"><h4 class="nomargin"><?php _e('دانلود جداگانه هر سرفصل', 'academy'); ?></h4></div>
	<div class="widget-content">
		<ul class="styled-list style-4">
			<p style="color: #245150;font-size: 16px;font-weight: bold;text-align: center;font-family: 'bnazanin',Tahoma, Geneva, sans-serif;">رمز عبور جهت دانلود فایل ها : <span style="color: #e02d2c;">toluehagh</span> </p>
			<?php 
				$attnum = 0;
				foreach($attachments as $attachment) { $attnum++ ?>
			<li id="<?php echo $attnum; ?>" class="<?php echo $attachment['type']; ?>">
                <div> 
					<?php echo $attachment['title'];
					echo do_shortcode($attachment['url']); ?>
                </div>
            </li>
			<?php } ?>
		</ul>
	</div>
</div>
<?php } ?>