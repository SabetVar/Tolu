<?php
// Display single plan post with related courses and navigation
the_post();
?>
<div class="max-w-4xl mx-auto py-8 text-right">
    <?php if (has_post_thumbnail()) : ?>
        <div class="mb-4">
            <?php the_post_thumbnail('full', ['class' => 'w-full h-auto rounded']); ?>
        </div>
    <?php endif; ?>
    <h1 class="text-2xl font-bold mb-4 text-primary"><?php the_title(); ?></h1>
    <div class="prose max-w-none text-text">
        <?php
        if (get_post_meta(get_the_ID(), '_plan_stuview', true) === 'show') {
            $users = get_post_meta(get_the_ID(), 'users', true);
            if (is_array($users)) {
                echo '<p class="mb-4">' . sprintf(__('تعداد دانشجویان: %s', 'new-theme'), '<span class="font-semibold">' . count($users) . '</span>') . '</p>';
            }
        }
        the_content();
        ?>
    </div>

    <?php
    $plancat = get_post_meta(get_the_ID(), '_plan_category', true);
    if (!empty($plancat)) :
    ?>
        <div class="mt-6">
            <h2 class="text-lg font-semibold mb-2 text-secondary"><?php _e('دوره‌های مرتبط', 'new-theme'); ?></h2>
            <div class="bg-mutedBg rounded p-4">
                <?php echo do_shortcode('[courses category="' . esc_attr($plancat) . '" number="50" columns="4" order="date"]'); ?>
            </div>
        </div>
    <?php endif; ?>

    <nav class="mt-8 flex flex-row-reverse justify-between text-sm text-primary">
        <div><?php previous_post_link('%link', '&larr; ' . __('قبلی', 'new-theme')); ?></div>
        <div><?php next_post_link('%link', __('بعدی', 'new-theme') . ' &rarr;'); ?></div>
    </nav>
</div>
