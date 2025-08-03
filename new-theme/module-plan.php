<?php
// Display single plan post with related courses using generic layout.
$before = '';
if (get_post_meta(get_the_ID(), '_plan_stuview', true) === 'show') {
    $users = get_post_meta(get_the_ID(), 'users', true);
    if (is_array($users)) {
        $before .= '<p class="mb-4">' . sprintf(__('تعداد دانشجویان: %s', 'new-theme'), '<span class="font-semibold">' . count($users) . '</span>') . '</p>';
    }
}

$after = '';
$plancat = get_post_meta(get_the_ID(), '_plan_category', true);
if (!empty($plancat)) {
    $after .= '<div class="mt-6">';
    $after .= '<h2 class="text-lg font-semibold mb-2 text-secondary">' . __('دوره‌های مرتبط', 'new-theme') . '</h2>';
    $after .= '<div class="bg-mutedBg rounded p-4">';
    $after .= do_shortcode('[courses category="' . esc_attr($plancat) . '" number="50" columns="4" order="date"]');
    $after .= '</div></div>';
}

$context = [
    'container_class'     => 'max-w-4xl mx-auto py-8 text-right',
    'show_attachments'    => false,
    'before_content_html' => $before,
    'after_content_html'  => $after,
];
get_template_part('parts/single', 'generic', $context);
