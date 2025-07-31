<?php ThemexCourse::initCourseloop($post->ID); ?>
<?php if (has_post_thumbnail()) { ?>
    <div class="course-preview stre <?php echo ThemexCourse::$data['course']['status']; ?>-course">
        <div class="course-image">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('normal', ['alt' => get_the_title() . ' ' . ThemexCourse::$data['course']['author']->full_name, 'title' => get_the_title()]); ?></a>
            <?php if (
                !empty(ThemexCourse::$data['course']['price']) &&
                // empty(ThemexCourse::$data['course']['plans']) &&
                ThemexCourse::$data['course']['status'] != 'private'
            ) { ?>

            <?php } ?>
            <?php /* $excerpt = $post->post_excerpt; if($excerpt!=''){ ?>  
        <a href="<?php the_permalink(); ?>" class="imtitle"><?php echo $excerpt; ?></a>
        <?php }; */ ?>
        </div>
        <div class="course-meta">
            <header class="course-header">
                <h5 class="nomargin"><a href="<?php the_permalink(); ?>" class="ci ctitle"><?php the_title(); ?></a></h5>
                <?php list_multi_autors(); ?>


                <?php if (get_post_meta($post->ID, 'wpcf-curse_date', true)) { ?>
                    <p class="ci curse_time"> <?php echo get_post_meta($post->ID, 'wpcf-curse_date', true); ?> </p>
                <?php } ?>

                <?php if (get_post_meta($post->ID, 'wpcf-curse_date1', true)) { ?>
                    <p class="ci curse_time num"> <?php echo get_post_meta($post->ID, 'wpcf-curse_date1', true); ?> </p>
                <?php } ?>

                <?php if (get_post_meta($post->ID, 'wpcf-curse_date2', true)) { ?>
                    <p class="ci curse_cat"> <?php echo get_post_meta($post->ID, 'wpcf-curse_date2', true); ?> </p>
                <?php } ?>
                <?php if (true) { ?>
                    <div class="course-price">
                        <div class="corner-wrap">
                            <div class="corner"></div>
                            <div class="corner-background"></div>
                        </div>
                        <?php
                        $categories = array('baste');
                        $maintext = 'حضوری';
                        $prod_cat = ThemexCourse::$data['course']['categ'];
                        if (! empty(array_intersect($categories, $prod_cat))) {
                            $maintext = 'بسته بام';
                        } ?>

                        <?php if (!is_front_page()) { ?><div class="price-text"><span> <?php echo $maintext; ?> : </span><?php echo ThemexCourse::$data['course']['price']; ?></div> <?php } ?>
                        <div class="price-text"><?php if (!is_front_page()) { ?><span> مجازی : </span><?php } else { ?> <?php  } ?><?php echo ThemexCourse::$data['course']['pricev']; ?></div>

                    </div>
                <?php } ?>
            </header>
            <?php if (ThemexCourse::$data['rating'] != 'true' || ThemexCourse::$data['users_number'] != 'true' || ThemexCourse::$data['icon'] != 'true') { ?>
                <footer class="course-footer clearfix">

                    <?php if (ThemexCourse::$data['users_number'] != 'true') { ?>
                        <div class="ho-icon">
                            <div class="course-users left"><?php echo count(ThemexCourse::$data['course']['users']); ?></div>
                            <div class="course-users left"><?php echo count(ThemexCourse::$data['course']['usersb']); ?></div>
                        </div>
                        <div class="vir-icon">
                            <div class="course-users course-usersv left"><?php echo count(ThemexCourse::$data['course']['usersv']); ?></div>
                            <div class="course-users course-usersv left"><?php echo count(ThemexCourse::$data['course']['usersvb']); ?></div>
                        </div>
                        <div class="clear"></div>
                    <?php   }  ?>
                    <?php if (ThemexCourse::$data['rating'] != 'true') { ?>
                        <?php get_template_part('module', 'rating'); ?>
                    <?php } ?>
                    <?php if (ThemexCourse::$data['icon'] != 'true') { ?>
                        <?php $statusclass = get_post_meta($post->ID, '_course_statusclass', true); ?>
                        <?php if ($statusclass == 'on') {

                            $course_productv = get_post_meta($post->ID, '_course_productv', true);
                            $course_product = ($course_productv == 0) ? get_post_meta($post->ID, '_course_product', true) : $course_productv;
                        ?>

                            <?php

                            $detailtext = "افزودن به سبد خرید";
                            // $course_product && wc_get_product((int)$course_product)

                            $cart = WC()->cart;
                            $product_in_cart = false;

                            // Check if the product exists in the cart
                            if ($cart) {
                                foreach ($cart->get_cart() as $cart_item) {
                                    if ($cart_item['product_id'] == (int)$course_product) {
                                        $product_in_cart = true;
                                        break;
                                    }
                                }
                            }

                            if ($product_in_cart) {
                                $detailtext = "مشاهده سبد خرید";
                                $checkout_url = wc_get_checkout_url();
                            } else {
                                $checkout_url = "#"; // Default URL when the product doesn't exist
                            }

                            if (get_post_meta($post->ID, '_course_detailbutt', true)) {
                                $detailtext = get_post_meta($post->ID, '_course_detailbutt', true);
                            } ?>

                            <div class="incurse button">
                                <a href="<?php echo esc_url($checkout_url); ?>" data-product_id="<?php echo esc_attr($course_product); ?>" class="ci ctitle add-to-cart-ajax">
                                    <?php echo esc_html($detailtext); ?>
                                </a>
                            </div>


                        <?php } elseif ($statusclass == 'live') { ?>
                            <div class="incurse button"><a href="<?php the_permalink(); ?>" class="ci ctitle play">در حال برگزاری</a></div>
                        <?php } elseif ($statusclass == 'off') { ?>
                            <div class="incurse button"><a href="<?php the_permalink(); ?>" class="ci ctitle done">برگزار شده</a></div>
                        <?php }; ?>

                        <?php if (get_post_meta($post->ID, '_course_term2title', true) && get_post_meta($post->ID, '_course_term2link', true)) { ?>
                            <div class="incurse button"><a href="http://<?php echo get_post_meta($post->ID, '_course_term2link', true) ?>" class="ci ctitle"><?php echo get_post_meta($post->ID, '_course_term2title', true) ?></a></div>
                        <?php } ?>

                        <?php if (get_post_meta($post->ID, '_course_term3title', true) && get_post_meta($post->ID, '_course_term3link', true)) { ?>
                            <div class="incurse button"><a href="http://<?php echo get_post_meta($post->ID, '_course_term3link', true) ?>" class="ci ctitle"><?php echo get_post_meta($post->ID, '_course_term3title', true) ?></a></div>
                        <?php } ?>

                        <?php if (get_post_meta($post->ID, '_course_term4title', true) && get_post_meta($post->ID, '_course_term4link', true)) { ?>
                            <div class="incurse button"><a href="http://<?php echo get_post_meta($post->ID, '_course_term4link', true) ?>" class="ci ctitle"><?php echo get_post_meta($post->ID, '_course_term4title', true) ?></a></div>
                        <?php } ?>

                    <?php }; ?>

                </footer>
            <?php } ?>
        </div>
    </div>
<?php } ?>