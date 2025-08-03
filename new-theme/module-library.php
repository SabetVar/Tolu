<?php
// Display single library post using generic layout with attachments.
$context = [
    'attachment_title' => __('دانلود الحاقات', 'new-theme'),
];
get_template_part('parts/single', 'generic', $context);
