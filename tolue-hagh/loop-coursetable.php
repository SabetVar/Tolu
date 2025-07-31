<?php ThemexCourse::initCourseloop($post->ID); ?>
 
<tr>
	<td class="ctname"><a target="_blank" href="<?php the_permalink();?>" title="<?php echo 'نمایش جزئیات دوره : '; the_title(); ?>"  class="ci ctitle nicon"><?php the_title(); ?></a></td>
    
    <td class="cttname"><?php list_multi_autors_table() ?></td>
        
    <td class="ctbuy">
        <form action="<?php the_permalink(); ?>" method="POST">
        <input type="hidden" name="course_id" value="<?php the_ID(); ?>" />
		<?php
			
        if(!ThemexCourse::isMembervirt($post->ID) ) { ?>
            <?php if(ThemexCourse::$data['course']['statusv']!='private') { ?>
            <input type="hidden" name="course_action" value="addv" />
            <a href="#" class="button medium price-button submit-button left">
                <span class="caption"><?php _e('ثبت نام دوره مجازی', 'academy'); ?></span>
                <?php if(ThemexCourse::$data['course']['statusv']=='premium') { ?>
                <span class="price"><?php echo ThemexCourse::$data['course']['pricev']; ?></span>
                <?php }
                if(ThemexCourse::$data['course']['statusv']=='free') { ?>
                <span class="price">رایگان</span>
                <?php } ?>
            </a>
            <?php } ?>
        <?php } else if(ThemexCourse::$data['unsubscribe']!='true') { ?>
        <input type="hidden" name="course_action" value="remove" />					
        <a href="#" class="button secondary medium submit-button left"><span><?php _e('Unsubscribe Now', 'academy'); ?></span></a>
        <?php } else if(ThemexCourse::isMembervirt($post->ID) ) { ?>
        <a target="_blank" href="<?php the_permalink();?>" class="button medium secondary left">
        <span class="caption"> شما دانشجوی دوره مجازی هستید </span>
        </a>
         <?php }  ?>
    </form>
    </td>
</tr>