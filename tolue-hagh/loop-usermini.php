<?php ThemexUser::$data['current_user']=$GLOBALS['user']; ?>
<div class="tmini">
    <div class="expert-preview mini">
        <div class="expert-meta">
            <div class="expert-image bordered-image">
                <a class="nicon" target="_blank" title="<?php echo ThemexUser::getFulllastName(ThemexUser::$data['current_user']); ?>" href="<?php echo get_author_posts_url(ThemexUser::$data['current_user']->ID); ?>"><?php echo get_avatar(ThemexUser::$data['current_user']->ID); ?></a>
            </div>
        </div>							
    </div>
	<div class="tname"><a target="_blank" href="<?php echo get_author_posts_url(ThemexUser::$data['current_user']->ID); ?>"><?php echo ThemexUser::getFulllastName(ThemexUser::$data['current_user']); ?></a></div>
</div><!-- End tmini -->
