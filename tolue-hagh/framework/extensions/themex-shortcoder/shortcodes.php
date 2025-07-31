<?php

//Columns



add_shortcode('one_sixth', 'themex_one_sixth');

function themex_one_sixth( $atts, $content = null ) {

   return '<div class="twocol column">'.do_shortcode($content).'</div>';

}



add_shortcode('one_sixth_last', 'themex_one_sixth_last');

function themex_one_sixth_last( $atts, $content = null ) {

   return '<div class="twocol column last">'.do_shortcode($content).'</div><div class="clear"></div>';

}



add_shortcode('one_fourth', 'themex_one_fourth');

function themex_one_fourth( $atts, $content = null ) {

   return '<div class="threecol column">'.do_shortcode($content).'</div>';

}



add_shortcode('one_fourth_last', 'themex_one_fourth_last');

function themex_one_fourth_last( $atts, $content = null ) {

   return '<div class="threecol column last">'.do_shortcode($content).'</div><div class="clear"></div>';

}



add_shortcode('one_third', 'themex_one_third');

function themex_one_third( $atts, $content = null ) {

   return '<div class="fourcol column">'.do_shortcode($content).'</div>';

}



add_shortcode('one_third_last', 'themex_one_third_last');

function themex_one_third_last( $atts, $content = null ) {

   return '<div class="fourcol column last">'.do_shortcode($content).'</div><div class="clear"></div>';

}



add_shortcode('five_twelfths', 'themex_five_twelfths');

function themex_five_twelfths( $atts, $content = null ) {

   return '<div class="fivecol column">'.do_shortcode($content).'</div>';

}



add_shortcode('five_twelfths_last', 'themex_five_twelfths_last');

function themex_five_twelfths_last( $atts, $content = null ) {

   return '<div class="fivecol column last">'.do_shortcode($content).'</div><div class="clear"></div>';

}



add_shortcode('one_half', 'themex_one_half');

function themex_one_half( $atts, $content = null ) {

   return '<div class="sixcol column">'.do_shortcode($content).'</div>';

}



add_shortcode('one_half_last', 'themex_one_half_last');

function themex_one_half_last( $atts, $content = null ) {

   return '<div class="sixcol column last">'.do_shortcode($content).'</div><div class="clear"></div>';

}



add_shortcode('seven_twelfths', 'themex_seven_twelfths');

function themex_seven_twelfths( $atts, $content = null ) {

   return '<div class="sevencol column">'.do_shortcode($content).'</div>';

}



add_shortcode('seven_twelfths_last', 'themex_seven_twelfths_last');

function themex_seven_twelfths_last( $atts, $content = null ) {

   return '<div class="sevencol column last">'.do_shortcode($content).'</div><div class="clear"></div>';

}



add_shortcode('two_thirds', 'themex_two_thirds');

function themex_two_thirds( $atts, $content = null ) {

   return '<div class="eightcol column">'.do_shortcode($content).'</div>';

}



add_shortcode('two_thirds_last', 'themex_two_thirds_last');

function themex_two_thirds_last( $atts, $content = null ) {

   return '<div class="eightcol column last">'.do_shortcode($content).'</div><div class="clear"></div>';

}



add_shortcode('three_fourths', 'themex_three_fourths');

function themex_three_fourths( $atts, $content = null ) {

   return '<div class="ninecol column">'.do_shortcode($content).'</div>';

}



add_shortcode('three_fourths_last', 'themex_three_fourths_last');

function themex_three_fourths_last( $atts, $content = null ) {

   return '<div class="ninecol column last">'.do_shortcode($content).'</div><div class="clear"></div>';

}



//Image

add_shortcode('image','themex_image');

function themex_image( $atts, $content = null ) {

	extract(shortcode_atts(array(

		'url' => '',

    ), $atts));

	

	$out='';

	if($content!='') {

		$out.='<img src="'.urldecode($content).'" alt="" />';

		if($url!='') {

			$out='<a href="'.$url.'">'.$out.'</a>';

		}

		$out='<div class="bordered-image thick-border inner-image">'.$out.'</div>';

	}	

	return $out;

}



//Slider

add_shortcode('slider', 'themex_slider');

function themex_slider( $atts, $content = null ) {

	extract(shortcode_atts(array(

		'pause' => '0',

		'speed' => '400',

    ), $atts));



    $out='<div class="boxed-slider themex-slider"><ul>'.do_shortcode($content).'</ul>';

	$out.='<input type="hidden" class="slider-pause" value="'.$pause.'" />';

	$out.='<input type="hidden" class="slider-speed" value="'.$speed.'" />';

	$out.='<div class="arrow arrow-left"></div><div class="arrow arrow-right"></div></div>';

	

    return $out;

}



add_shortcode('slide', 'themex_slide');

function themex_slide( $atts, $content = null ) {

	extract(shortcode_atts(array(

		'url' => '',

    ), $atts));

	

	$out='';

	if($url!='') {

		$out='<li><img src="'.$url.'" alt="" />';

		if($content!='') {

			$out.='<div class="caption">'.do_shortcode($content).'</div>';			

		}

		$out.='</li>';

	}

	

    return $out;

}



//Courses

add_shortcode('courses','themex_courses');

function themex_courses( $atts, $content = null ) {

	extract(shortcode_atts(array(

		'number' => '4',

		'columns' => '4',

		'order' => 'date',

		'category' => '0',

    ), $atts));

	

	$category=is_null($term=get_term( intval($category), 'course_category' )) || is_wp_error($term)? null : $term->slug;

	

	$args=array(

		'post_type' => 'course',

		'course_category' => $category,

		'showposts' => intval($number),	

		'order' => 'DESC',

		'orderby' => $order,		

		'meta_query' => array(

			array(

				'key' => '_thumbnail_id',

			),

		),

	);

	

	if($order=='users') {

		$args['orderby']='meta_value';

		$args['meta_key']='_course_users_number';		

	} else if ($order=='title') {

		$args['order']='ASC';

	}

	

	$query = new WP_Query($args);	

	

	$layout='three';

	switch($columns) {

		case '1': $layout='twelve'; break;

		case '2': $layout='six'; break;

		case '3': $layout='four'; break;

		case '4': $layout='three'; break;
		case '6': $layout='two'; break;	

	}	

	

	$out='<div class="courses-listing clearfix">';

	$counter=0;



	while($query->have_posts()){

		$query->the_post();	

		$counter++;

	

		$out.='<div class="'.$layout.'col column ';

		if($counter==intval($columns)) {

			$out.='last';		

		}

		

		$out.='">';

		

		ob_start();

		get_template_part('loop','course');

		$out.=ob_get_contents();

		ob_end_clean();

		

		$out.='</div>';

		if($counter==intval($columns)) {

			$out.='<div class="clear"></div>';

			$counter=0;			

		}

	}



	$out.='</div><div class="clear"></div>';

	

	wp_reset_query();

	return $out;

}


//planes

add_shortcode('planes','themex_planes');

function themex_planes( $atts, $content = null ) {

	extract(shortcode_atts(array(

		'number' => '4',

		'columns' => '4',

		'order' => 'date',

		'category' => '0',

    ), $atts));

	

	$category=is_null($term=get_term( intval($category), 'plan_category' )) || is_wp_error($term)? null : $term->slug;

	

	$args=array(

		'post_type' => 'plan',

		'plan_category' => $category,

		'showposts' => intval($number),	

		'order' => 'DESC',

		'orderby' => $order,		

	);

	

	if ($order=='title') {

		$args['order']='ASC';

	}

	

	$query = new WP_Query($args);	

	

	$layout='three';

	switch($columns) {

		case '1': $layout='twelve'; break;

		case '2': $layout='six'; break;

		case '3': $layout='four'; break;

		case '4': $layout='three'; break;
		
		case '6': $layout='two'; break;	

	}	

	

	$out='<div class="courses-listing planes-listing clearfix">';

	$counter=0;



	while($query->have_posts()){

		$query->the_post();	

		$counter++;

	

		$out.='<div class="'.$layout.'col column ';

		if($counter==intval($columns)) {

			$out.='last';		

		}

		

		$out.='">';

		

		ob_start();

		get_template_part('loop','plan');

		$out.=ob_get_contents();

		ob_end_clean();

		

		$out.='</div>';

		if($counter==intval($columns)) {

			$out.='<div class="clear"></div>';

			$counter=0;			

		}

	}



	$out.='</div><div class="clear"></div>';

	

	wp_reset_query();

	return $out;

}


//Courses table

add_shortcode('coursestable','themex_coursestable');

function themex_coursestable( $atts, $content = null ) {

	

	extract(shortcode_atts(array(

		'number' => '30',

		'order' => 'date',

		'columns' => '2',

		'category' => '0',

    ), $atts));

	

	$category=is_null($term=get_term( intval($category), 'course_tags' )) || is_wp_error($term)? null : $term->slug;

	

	$args=array(

		'post_type' => 'course',

		'course_tags' => $category,

		'showposts' => intval($number),	

		'order' => 'DESC',

		'orderby' => $order,		

		'meta_query' => array(

			array(

				'key' => '_course_tablecourse',

				'value' => 'yes',

				'compare' => '=',

			),

		),

	);

	

	

	if($order=='users') {

		$args['orderby']='meta_value';

		$args['meta_key']='_course_users_number';		

	} else if ($order=='title') {

		$args['order']='ASC';

	}

	

	$query = new WP_Query($args);	

	$querycount = $query->post_count;

	$querydiv = $querycount / 2;

	$count=0;



	$out='<div class="courses-table clearfix">';

	$out.='<table id="coursetable" class="rtable">';

	$out.='<thead><tr>';

	$out.='<th class="ctname" >نام دوره</th><th class="cttname">استاد</th><th class="ctbuy">خرید دوره مجازی</th>';

	$out.='</tr></thead>';

	$out.='<tbody>';





	while($query->have_posts()){

 

		if (ceil($querydiv) == $count ){

			$out.='</tbody></table>';

			$out.='<table id="coursetable" class="ltable">';

			$out.='<thead><tr>';

			$out.='<th class="ctname" >نام دوره</th><th class="cttname">استاد</th><th class="ctbuy">خرید دوره مجازی</th>';

			$out.='</tr></thead>';

			$out.='<tbody>';

		} 



		$query->the_post();

		ob_start();

		get_template_part('loop','coursetable');

		$out.=ob_get_contents();

		ob_end_clean();

		



		 $count++; 





	}



	$out.='</tbody></table><div class="clear"></div></div>';

	

	wp_reset_query();

	return $out;

}



//library

add_shortcode('library','themex_library');

function themex_library( $atts, $content = null ) {

	extract(shortcode_atts(array(

		'number' => '4',

		'columns' => '4',

		'order' => 'date',

		'category' => '0',

    ), $atts));

	

	$category=is_null($term=get_term( intval($category), 'library_category' )) || is_wp_error($term)? null : $term->slug;

	

	$args=array(

		'post_type' => 'library',

		'library_category' => $category,

		'showposts' => intval($number),	

		'order' => 'DESC',

		'orderby' => $order,		

		'meta_query' => array(

			array(

				'key' => '_thumbnail_id',

			),

		),

	);

	

	if ($order=='title') {

		$args['order']='ASC';

	}

	

	$query = new WP_Query($args);	

	

	$layout='three';

	switch($columns) {

		case '1': $layout='twelve'; break;

		case '2': $layout='six'; break;

		case '3': $layout='four'; break;

		case '4': $layout='three'; break;

	}	

	

	$out='<div class="courses-listing clearfix">';

	$counter=0;



	while($query->have_posts()){

		$query->the_post();	

		$counter++;

	

		$out.='<div class="'.$layout.'col column ';

		if($counter==intval($columns)) {

			$out.='last';		

		}

		

		$out.='">';

		

		ob_start();

		get_template_part('loop','library');

		$out.=ob_get_contents();

		ob_end_clean();

		

		$out.='</div>';

		if($counter==intval($columns)) {

			$out.='<div class="clear"></div>';

			$counter=0;			

		}

	}



	$out.='</div><div class="clear"></div>';

	

	wp_reset_query();

	return $out;

}





//Plan

add_shortcode('plan','themex_plan');

function themex_plan( $atts, $content = null ) {

	extract(shortcode_atts(array(

		'id' => '0',

    ), $atts));

	

	$query = new WP_Query(array(

		'post_type' => 'plan',

		'showposts' => 1,

		'post__in' => array(intval($id)),

	));



	$out='';
	
	

	while($query->have_posts()){

		$query->the_post();	

		ob_start();

		get_template_part('loop','plan');

		$out.=ob_get_contents();

		ob_end_clean();

	}
	

	wp_reset_query();

	return $out;

}



//Posts

add_shortcode('posts','themex_posts');

function themex_posts( $atts, $content = null ) {

	extract(shortcode_atts(array(

		'number' => '1',

		'order' => 'date',

		'category' => '0',

		'title' => 'no'

    ), $atts));

	

	$args= array(

		'post_type' => 'post',

		'showposts' => intval($number),	

		'orderby' => $order,		

	);

	

	if(intval($category)!=0) {

		$args['category__in']=array(intval($category));

	}

	

	$query = new WP_Query($args);

	

	$out='<div class="posts-listing">';

	while($query->have_posts()){

		$query->the_post();	

		

		ob_start();

		the_excerpt();

		$GLOBALS['content']=ob_get_contents();

		ob_end_clean();

		

		$divider=strpos($GLOBALS['content'], '</p>');

		if($divider!==false) {

			$GLOBALS['content']=substr($GLOBALS['content'], 0, $divider).'</p>';

		}

		

		ob_start();

		if ($title == 'no') { get_template_part('loop','post'); } else { get_template_part('loop','posttitle');};

		$out.=ob_get_contents();

		ob_end_clean();

	

	}

	$out.='</div>';

	

	wp_reset_query();

	return $out;

}



//Users

add_shortcode('users','themex_users');

function themex_users( $atts, $content = null ) {

	extract(shortcode_atts(array(

		'number' => '3',

		'order' => 'date',

		'display' => 'full',

    ), $atts));

	

	 

	$orderby='registered';

	$orderdir='ASC';

	switch($order) {

		case 'activity':

			$orderby='post_count';

			$orderdir='DESC';

		break;

		

		case 'name':

			$orderby='display_name';

		break;

		

		case 'date':

			$orderby='registered';

			$orderdir='DESC';

		break;

	}

	

	$users=ThemexCourse::getAuthors(array(

		'number' => intval($number),

		'orderby' => $orderby,

		'order' => $orderdir,

		'meta_key' => 'teacher_u',

		'meta_value' => 'yes',

		'fields' => 'ID',

		

	));

	

	$out='<div class="experts">';

		

	foreach (teacher_cat_item() as $key => $item ) {

	$users_a = ThemexCourse::getAuthors(array(

		'include' => $users ,

		'meta_key' => 'teacher_cat',

		'meta_value' => $key,

	)); 

	

	$out.= "<div class='widget'> <div class='widget-title'> <h3 class='nomargin center'> اساتید $item </h3> </div> <div class='widget-content'>";   

		foreach($users_a as $user) {

			$GLOBALS['user']=$user;

			ob_start();

	

				if ($display == "full" ) {get_template_part('loop','user');}

				elseif ($display == "mini" ) {get_template_part('loop','usermini');}

				else {get_template_part('loop','user');};

			$out.=ob_get_contents();

			ob_end_clean();  

		}

		$out .= '</div> </div>'; 

	} 

	$out.='</div>';

	

	return $out;

}



//Testimonials

add_shortcode('testimonials','themex_testimonials');

function themex_testimonials( $atts, $content = null ) {

	extract(shortcode_atts(array(

		'number' => '3',

		'order' => 'date',

    ), $atts));

	

	$query = new WP_Query(array(

		'post_type' => 'testimonial',

		'showposts' => intval($number),

		'orderby' => $order,

	));

	

	$out='<div class="testimonials">';

	while($query->have_posts()){

		$query->the_post();	

		ob_start();

		get_template_part('loop','testimonial');

		$out.=ob_get_contents();

		ob_end_clean();

	}

	$out.='</div>';

	

	return $out;

}



//Home Test

add_shortcode('hometop','themex_hometest');

function themex_hometest( $atts, $content = null ) {

	extract(shortcode_atts(array(

		'number' => '3',

		'order' => 'date',

    ), $atts));

	

	$query = new WP_Query(array(

		'post_type' => 'testimonial',

		'showposts' => intval($number),

		'orderby' => $order,

	));

	

	$layout='three';

	switch($number) {

		case '1': $layout='twelve'; break;

		case '2': $layout='six'; break;

		case '3': $layout='four'; break;

		case '4': $layout='three'; break;

	}

	

	$out='<div class="topdiv"> <div class="courses-listing clearfix">';
    
	$counter = 0;
	while($query->have_posts()){

		$query->the_post();	

		$counter++;

	

		$out.='<div class="'.$layout.'col column ';

		if($counter==intval($number)) {

			$out.='last';		

		}

		$out.='">';

		

		ob_start();

		get_template_part('loop','hometest');

		$out.=ob_get_contents();

		ob_end_clean();

		

		$out.='</div>';

		if($counter==intval($number)) {

			$out.='<div class="clear"></div>';

			$counter=0;			

		}

		

	}

	$out.='</div></div>';

	

	return $out;

}

// top sell section

add_shortcode('topsell','themex_topsell');

function themex_topsell( $atts, $content = null ) {
	
	$sellcat = get_option( 'themex_categorysell' );

	extract(shortcode_atts(array(
		'number' => '6',
    ), $atts));
	

			$out = '<div class="twelvecol column">';
			$out .='<div class="regbox clearfix relcourse">';	 
			$out .='<h4 class="reghead" > دوره های پر فروش </h4>';
			$out .='<div class="courses-listing clearfix">';	
	
						$args=array(
							'post_type' => 'course',

							'showposts' => intval($number),

							'orderby' => 'rand',

							'tax_query' => array(

								array(

									'taxonomy' => 'course_category',

									'field' => 'id',

									'terms' => $sellcat,

								)

							),

							'meta_query' => array(
/*
								'relation' => 'OR',
									array(
										'key' => '_course_status',
										'value' => 'private',
										'compare' => '!=',
									),
*/
									array(
										'key' => '_course_statusv',
										'value' => 'private',
										'compare' => '!=',
									),
							),	
						);
	
						$query = new WP_Query($args);
	
						$counter=0;
	
						while($query->have_posts()){

						$query->the_post();	

						$counter++; 
			$out .='<div class="twocol column';
						if($counter% 6 == 0) { $out .=' last'; } 
			$out .='">';
		
						ob_start();
						get_template_part('loop','course'); 
						$out.=ob_get_contents();
						ob_end_clean();	
							
			$out .='</div>'; 
						
						if($counter% 6 == 0) { $out .='<div class="clear"></div>'; }
							
						} 
			$out .='</div>';
			$out .='</div>';
			$out .='</div>';
		
		wp_reset_query();
		return $out;

}


//Home Top Section

add_shortcode('topback','themex_topback');

function themex_topback() {

	$out='<div class="topback">

		<div class="courses-listing clearfix">	

		

			<div class="threecol column ">

				<a href="https://toluehagh.ir/?p=2709" target="_blank">

					<div class="topcir">

						<div class="iconcir i1"></div>

						<div class="textcir n1">آموزش ثبت نام</div>

					</div>

				</a>

			</div>		



			<div class="threecol column ">

				<a href="https://toluehagh.ir/?p=2715" target="_blank">

					<div class="topcir">

						<div class="iconcir i2"></div>

						<div class="textcir n2">روند برگزاری دوره</div>

					</div>

				</a>

			</div>



			<div class="threecol column ">

				<a href="https://toluehagh.ir/?p=26596" target="_blank">

					<div class="topcir">

						<div class="iconcir i3"></div>

						<div class="textcir n3">شرایط دریافت گواهی نامه</div>

					</div>

				</a>

			</div>			

							

			<div class="threecol column last ">

				<a href="https://toluehagh.ir/?p=26598" target="_blank">

					<div class="topcir">

						<div class="iconcir i4"></div>

						<div class="textcir n4">نمونه گواهینامه</div>

					</div>

				</a>

			</div>

				

		<div class="clear"></div>



		

	  </div>

	</div>		

	';

	return $out;

}



//Media Player

add_shortcode('player','themex_player');

function themex_player( $atts, $content = null ) {

	extract(shortcode_atts(array(

		'url' => '',

    ), $atts));

	

	$GLOBALS['file']=array();

	$GLOBALS['file']['title']=$content;

	$GLOBALS['file']['url']=explode(',', $url);

	$GLOBALS['file']['type']='video';

	

	if(pathinfo($GLOBALS['file']['url'][0], PATHINFO_EXTENSION)=='mp3') {

		$GLOBALS['file']['type']='audio';

	}

	

	ob_start();

	get_template_part('module', 'player');

	$out=ob_get_contents();

	ob_end_clean();	

	

	return $out;

}



//Contact Form

add_shortcode('contact_form','themex_contact_form');

function themex_contact_form( $atts, $content = null ) {

	ob_start();

	ThemexForm::renderData('contact_form');

	$out=ob_get_contents();

	ob_end_clean();

	return $out;

}



//Buttons

add_shortcode('button','themex_button');

function themex_button( $atts, $content = null ) {	

	extract(shortcode_atts(array(

		'url'     	 => '#',

		'color'   => 'primary',

		'size'	=> 'small',

		'target' => 'self',

		'align' => '',

    ), $atts));	

   return '<a href="'.$url.'" target="_'.$target.'" class="'.$align.' button '.$size.' '.$color.'"><span>'.do_shortcode($content).'</span></a>';

}



//Tabs

add_shortcode('tabs', 'themex_tabs');

function themex_tabs( $atts, $content = null ) {

    extract(shortcode_atts(array(

        'titles' => '',

		'type' => 'horizontal'

    ), $atts));

	

    if( $titles == '' ) return;

	

	$out = '<div class="tabs-container '.$type.'-tabs">';

	

	if($type=='vertical') {

		$out.='<div class="column threecol tabs"><ul>';

	} else {

		$out .= '<ul class="tabs">';

	}    

	

    $titles = explode(',', $titles);

	if(is_array($titles)) {

		foreach($titles as $title) {

			$out .= '<li><h5 class="nomargin">'.trim($title).'</h5></li>';

		}

	}

    $out .= '</ul>';

	

	if($type=='vertical') {

		$out.='</div><div class="panes column ninecol last">';

	} else {

		$out.='<div class="panes">';

	}

	

	$out .=do_shortcode($content);

    $out .= '</div></div>';

    return $out;

}



add_shortcode('tab', 'themex_tabs_panes');

function themex_tabs_panes( $atts, $content = null ) {

	$out = '<div class="pane">'.do_shortcode($content).'</div>';

    return $out;

}



//Toggle

add_shortcode('toggle', 'themex_toggle');

function themex_toggle( $atts, $content = null ) {	

    extract(shortcode_atts(array(

		'title'    	 => '',

    ), $atts));

	$out='<div class="toggle-container faq-toggle"><div class="toggle-title"><h4 class="nomargin">'.$title.'</h4></div><div class="toggle-content"><p>'.do_shortcode($content).'</p></div></div>';	

	return $out;

}



add_shortcode('toggles', 'themex_toggles');

function themex_toggles( $atts, $content = null ) {	

	 extract(shortcode_atts(array(

		'type'    	 => 'multiple',

    ), $atts));

	$out='<div class="toggles-wrap '.$type.'">'.do_shortcode($content).'</div>';	

    return $out;

}



//Block

add_shortcode('block', 'themex_block');

function themex_block( $atts, $content = null ) {	

	 extract(shortcode_atts(array(

		'title'    	 => '',
		'align'		=>'center',
		'id' => '',
		'class' => '',

    ), $atts));

	$out='<div class="widget '.$class.'" id="'.$id.'"><div class="widget-title"><h3 style="text-align:'.$align.'" class="nomargin">'.$title.'</h3></div><div class="widget-content">'.do_shortcode($content).'</div></div>';	

    return $out;

}



//Google Map



add_shortcode('map', 'themex_google_map');
	
function themex_google_map( $atts, $content = null ) {

    extract(shortcode_atts(array(

		'latitude' => '40.714',

		'longitude' => '-74',

		'zoom' => '16',

		'height' => '165',

		'description' => '',

    ), $atts));

	

	wp_enqueue_script( 'google_map','http://maps.google.com/maps/api/js?sensor=false' );

	

	$out='<div class="google-map-container"><div class="google-map" id="google-map" style="height:'.$height.'px"></div><input type="hidden" class="map-latitude" value="'.$latitude.'" />';

	$out.='<input type="hidden" class="map-longitude" value="'.$longitude.'" /><input type="hidden" class="map-zoom" value="'.$zoom.'" /><input type="hidden" class="map-description" value="'.$description.'" /></div>';

   

    return $out;

}
