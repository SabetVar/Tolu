<?php
// Display single meeting with author info and attachments via generic layout.
$context = [
    'show_authors'     => true,
    'attachment_title' => __('پیوندها', 'new-theme'),
];
get_template_part('parts/single', 'generic', $context);
