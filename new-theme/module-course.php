<?php
// Display single course with author info, attachments and navigation via generic layout.
$context = [
    'show_authors'     => true,
    'attachment_title' => __('پیوندها', 'new-theme'),
];
get_template_part('parts/single', 'generic', $context);
