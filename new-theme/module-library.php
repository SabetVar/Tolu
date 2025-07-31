<?php
// Display single library post
?>
<div class="max-w-3xl mx-auto py-8">
    <?php if (has_post_thumbnail()) : ?>
        <div class="mb-4">
            <?php the_post_thumbnail('full', ['class' => 'w-full h-auto']); ?>
        </div>
    <?php endif; ?>
    <h1 class="text-2xl font-bold mb-4"><?php the_title(); ?></h1>
    <div>
        <?php the_content(); ?>
    </div>
</div>
