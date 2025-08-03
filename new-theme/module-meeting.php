<?php
// Display single meeting post with author info, attachments and navigation
the_post();
?>
<div class="max-w-3xl mx-auto py-8 text-right">
    <?php if (has_post_thumbnail()) : ?>
        <div class="mb-4">
            <?php the_post_thumbnail('full', ['class' => 'w-full h-auto rounded']); ?>
        </div>
    <?php endif; ?>
    <h1 class="text-2xl font-bold mb-4 text-primary"><?php the_title(); ?></h1>

    <?php
    $authors = [];
    if (function_exists('get_coauthors')) {
        $authors = get_coauthors($post->ID);
    } else {
        $authors[] = get_userdata($post->post_author);
    }
    ?>
    <div class="mb-6 flex flex-wrap justify-center gap-4">
        <?php foreach ($authors as $author) : ?>
            <a class="flex flex-col items-center" href="<?php echo get_author_posts_url($author->ID); ?>">
                <?php echo get_avatar($author->ID, 64, '', '', ['class' => 'rounded-full mb-2']); ?>
                <span class="text-sm text-text"><?php echo esc_html($author->display_name); ?></span>
            </a>
        <?php endforeach; ?>
    </div>

    <div class="prose max-w-none text-text">
        <?php the_content(); ?>
    </div>

    <?php
    $attachments = get_attached_media('', $post->ID);
    unset($attachments[get_post_thumbnail_id($post->ID)]);
    if (!empty($attachments)) :
    ?>
        <div class="mt-6">
            <h2 class="text-lg font-semibold mb-2 text-secondary"><?php _e('پیوندها', 'new-theme'); ?></h2>
            <ul class="bg-mutedBg rounded p-4 space-y-2">
                <?php foreach ($attachments as $attachment) : ?>
                    <li>
                        <a class="text-primary underline" href="<?php echo wp_get_attachment_url($attachment->ID); ?>">
                            <?php echo esc_html(get_the_title($attachment)); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <nav class="mt-8 flex flex-row-reverse justify-between text-sm text-primary">
        <div><?php previous_post_link('%link', '&larr; ' . __('قبلی', 'new-theme')); ?></div>
        <div><?php next_post_link('%link', __('بعدی', 'new-theme') . ' &rarr;'); ?></div>
    </nav>
</div>
