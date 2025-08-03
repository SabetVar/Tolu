<?php
// Query custom post type "slide" and display simple slider
$slider_query = new WP_Query([
    'post_type'      => 'slide',
    'posts_per_page' => -1,
]);

if ($slider_query->have_posts()) :
?>
<div class="slider-wrapper relative overflow-hidden">
    <ul class="slide-list flex transition-transform duration-700">
        <?php
        while ($slider_query->have_posts()) : $slider_query->the_post();
            ?>
            <li class="slide w-full flex-shrink-0 relative">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('full', ['class' => 'w-full h-auto']); ?>
                <?php endif; ?>
                <div class="caption absolute bottom-0 inset-x-0 bg-text/60 text-bg p-4">
                    <?php the_title('<h2 class="text-lg">', '</h2>'); ?>
                    <?php the_content(); ?>
                </div>
            </li>
            <?php
        endwhile;
        ?>
    </ul>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const wrapper = document.querySelector('.slider-wrapper');
        if (!wrapper) return;
        const list = wrapper.querySelector('.slide-list');
        const slides = wrapper.querySelectorAll('.slide');
        let index = 0;
        function showSlide(i) {
            list.style.transform = 'translateX(' + (-i * 100) + '%)';
        }
        setInterval(function () {
            index = (index + 1) % slides.length;
            showSlide(index);
        }, 5000);
    });
</script>
<?php
endif;
wp_reset_postdata();
?>
