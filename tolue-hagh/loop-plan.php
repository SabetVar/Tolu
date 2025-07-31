<?php 
$price = ThemexCourse::getPlanPrice($post->ID);
$pcontent = get_the_content();
$pid = get_the_ID();
$planlink = get_the_permalink();

// Safely get the author's full name
$author_name = '';
if (
    isset(ThemexCourse::$data) &&
    is_array(ThemexCourse::$data) &&
    isset(ThemexCourse::$data['course']) &&
    is_array(ThemexCourse::$data['course']) &&
    isset(ThemexCourse::$data['course']['author']) &&
    is_object(ThemexCourse::$data['course']['author']) &&
    property_exists(ThemexCourse::$data['course']['author'], 'full_name')
) {
    $author_name = ThemexCourse::$data['course']['author']->full_name;
}
?> 

<div class="widget aligncenter">
    <a href="<?php if (is_single()) { echo '#'; } else { the_permalink(); } ?>">
        <div class="widget-title">
            <?php if (is_single()) { ?>
                <h1 class="nomargin aligncenter"><?php the_title(); ?></h1>
            <?php } else { ?> 
                <h4 class="nomargin aligncenter"><?php the_title(); ?></h4>			
            <?php } ?>
        </div>
    </a>

    <div class="plan-preview">
        <?php if (!empty($price)) { ?>
            <div class="plan-price"><?php echo $price; ?></div>
        <?php } ?>

        <?php if (has_post_thumbnail()) { ?>
            <div class="course-image">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('normal', [
                        'alt' => get_the_title() . ' ' . $author_name,
                        'title' => get_the_title()
                    ]); ?>
                </a>
            </div>
        <?php } else { ?>
            <div class="plan-description">
                <ul class="bordered">
                    <?php get_template_part('loop', 'plancat'); ?>
                </ul>
            </div>
        <?php } ?>

        <footer class="plan-footer">
            <?php if (array_key_exists($pid, ThemexCourse::getSubscriptions())) { ?>
                <div class="button medium gre">
                    <span class="caption"> شما عضو این بسته هستید </span>
                </div>
            <?php } elseif (!is_single() && !is_checkout()) { ?>
                <a href="<?php echo $planlink; ?>" class="button submit-button">
                    <span> جزئیات و ثبت نام </span>
                </a>
            <?php } elseif (ThemexWoo::isActive() && !is_checkout() && !isset($_GET['order'])) { ?>
                <form action="<?php echo ThemexCourse::getAction(get_permalink()); ?>" method="POST">
                    <input type="hidden" name="course_action" value="subscribe" />
                    <input type="hidden" name="course_id" value="0" />
                    <input type="hidden" name="plan_id" value="<?php echo $pid; ?>" />
                    <a href="#" class="button submit-button"><span> ثبت نام و خرید بسته </span></a>
                </form>
            <?php } ?>
        </footer>

    </div>
</div>
