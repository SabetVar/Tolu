<?php
// Query custom post type "slide" and display simple slider
$slider_query = new WP_Query([
    'post_type'      => 'slide',
    'posts_per_page' => -1,
]);

if ($slider_query->have_posts()) :
?>
<div class="slider-wrapper relative overflow-hidden">
    <div class="slides-region" aria-live="polite" aria-atomic="true">
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
    <button class="slider-prev absolute left-2 top-1/2 -translate-y-1/2 bg-text/60 text-bg p-2" aria-label="Previous slide">&#9664;</button>
    <button class="slider-next absolute right-2 top-1/2 -translate-y-1/2 bg-text/60 text-bg p-2" aria-label="Next slide">&#9654;</button>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const wrapper = document.querySelector('.slider-wrapper');
        if (!wrapper) return;
        const list = wrapper.querySelector('.slide-list');
        const slides = wrapper.querySelectorAll('.slide');
        const prevBtn = wrapper.querySelector('.slider-prev');
        const nextBtn = wrapper.querySelector('.slider-next');
        let index = 0;
        let intervalId;

        function showSlide(i) {
            index = (i + slides.length) % slides.length;
            list.style.transform = 'translateX(' + (-index * 100) + '%)';
            slides.forEach(function (slide, idx) {
                slide.setAttribute('aria-hidden', idx !== index);
            });
        }

        function nextSlide() {
            showSlide(index + 1);
        }

        function prevSlide() {
            showSlide(index - 1);
        }

        function start() {
            stop();
            intervalId = setInterval(nextSlide, 5000);
        }

        function stop() {
            clearInterval(intervalId);
        }

        wrapper.addEventListener('mouseenter', stop);
        wrapper.addEventListener('mouseleave', start);
        wrapper.addEventListener('focusin', stop);
        wrapper.addEventListener('focusout', start);

        nextBtn.addEventListener('click', nextSlide);
        prevBtn.addEventListener('click', prevSlide);

        showSlide(index);
        start();
    });
</script>
<?php
endif;
wp_reset_postdata();
?>
