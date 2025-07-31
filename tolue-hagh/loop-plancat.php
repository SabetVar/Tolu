<?php $plancat=get_post_meta($post->ID, '_plan_category');
$args = array(
			'posts_per_page'   => -1, 
			'post_type' => 'course', 
			'tax_query' => array(
								array(
									'taxonomy' => 'course_category',
									'field' => 'ID', //can be set to ID
									'terms' => $plancat //if field is ID you can reference by cat/term number
								)

							)
		);
$postcat ='<li class="planli ptitle">دوره ها:</li>';
$myposts = new WP_Query($args);
$pcnum=1;
		while ($myposts->have_posts()) : $myposts->the_post();
			$postcat.='<li class="planli">'.$pcnum.'- '.'<a target="_blank" href="'.get_the_permalink().
			' "title="'.get_the_title().'">'.get_the_title().'</a>'.
			'</li>';
			$pcnum++;
		endwhile;
echo $postcat;