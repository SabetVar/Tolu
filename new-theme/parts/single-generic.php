<?php
/**
 * Generic single post layout.
 *
 * Accepts context via $args when loaded with get_template_part().
 *
 * @package new-theme
 */

// Default context values.
$defaults = [
    'container_class'     => 'max-w-3xl mx-auto py-8 text-right',
    'show_authors'        => false,
    'show_attachments'    => true,
    'attachment_title'    => __('پیوندها', 'new-theme'),
    'before_content_html' => '',
    'after_content_html'  => '',
];

// Merge passed args with defaults and allow filtering.
$context = isset($args) ? wp_parse_args($args, $defaults) : $defaults;
$context = apply_filters('new_theme_single_generic_context', $context, get_post_type());

the_post();
?>
<div class="<?php echo esc_attr($context['container_class']); ?>">
    <?php if (has_post_thumbnail()) : ?>
        <div class="mb-4">
            <?php the_post_thumbnail('full', ['class' => 'w-full h-auto rounded']); ?>
        </div>
    <?php endif; ?>

    <h1 class="text-2xl font-bold mb-4 text-primary"><?php the_title(); ?></h1>

    <?php if (!empty($context['show_authors'])) : ?>
        <?php
        $authors = function_exists('get_coauthors') ? get_coauthors($post->ID) : [get_userdata($post->post_author)];
        ?>
        <div class="mb-6 flex flex-wrap justify-center gap-4">
            <?php foreach ($authors as $author) : ?>
                <a class="flex flex-col items-center" href="<?php echo esc_url(get_author_posts_url($author->ID)); ?>">
                    <?php echo get_avatar($author->ID, 64, '', '', ['class' => 'rounded-full mb-2']); ?>
                    <span class="text-sm text-text"><?php echo esc_html($author->display_name); ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="prose max-w-none text-text">
        <?php echo $context['before_content_html']; ?>
        <?php the_content(); ?>
    </div>

    <?php echo $context['after_content_html']; ?>

    <?php if (!empty($context['show_attachments'])) :
        $attachments = get_attached_media('', get_the_ID());
        unset($attachments[get_post_thumbnail_id(get_the_ID())]);
        if (!empty($attachments)) : ?>
        <div class="mt-6">
            <h2 class="text-lg font-semibold mb-2 text-secondary"><?php echo esc_html($context['attachment_title']); ?></h2>
            <ul class="bg-mutedBg rounded p-4 space-y-2">
                <?php foreach ($attachments as $attachment) : ?>
                    <li>
                        <a class="text-primary underline" href="<?php echo esc_url(wp_get_attachment_url($attachment->ID)); ?>">
                            <?php echo esc_html(get_the_title($attachment)); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>
    <?php endif; ?>

    <nav class="mt-8 flex flex-row-reverse justify-between text-sm text-primary">
        <div><?php previous_post_link('%link', '&larr; ' . __('قبلی', 'new-theme')); ?></div>
        <div><?php next_post_link('%link', __('بعدی', 'new-theme') . ' &rarr;'); ?></div>
    </nav>
</div>
