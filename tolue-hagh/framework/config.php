<?php

//Theme configuration

$config = array (



	//Modules

	'modules' => array(

	

		//basic modules

		'interface' => 'ThemexInterface',

		

		//additional

		'themex_user' => 'ThemexUser',

		'themex_woo' => 'ThemexWoo',

		'themex_course' => 'ThemexCourse',

		'themex_form' => 'ThemexForm',

		'themex_widgetiser' => 'ThemexWidgetiser',

		'themex_shortcoder' => 'ThemexShortcoder',

		'themex_styler' => 'ThemexStyler',

	),



	//Components

	'components' => array(

		

		//Theme Supports

		'supports' => array (

			'automatic-feed-links',

			'post-thumbnails',

			'woocommerce',

		),

		

		//Rewrite Rules

		'rewrite_rules' => array (

			'user' => array(

				'name' => 'user',

				'rule' => 'author_base',

				'rewrite' => 'user',

				'position' => 'top',

				'replace' => true,

			),

			

			'register' => array(

				'name' => 'register',

				'rule' => 'register/?',

				'rewrite' => 'index.php?register=1',

				'position' => 'top',

				'replace' => false,

			),

			

			'certificate' => array(

				'name' => 'certificate',

				'rule' => 'certificate/([^/]+)',

				'rewrite' => 'index.php?certificate=$matches[1]',

				'position' => 'top',

				'replace' => false,

			),

		),

		

		//User Roles

		'user_roles' => array (

			array(

				'role' => 'inactive',

				'name' => __('Inactive', 'academy'),

				'capabilities' => array(),

			),			

		),

		

		//Menus

		'custom_menus' => array (

			array(

				'slug' => 'main_menu',

				'name' => __('Main Menu','academy'),

			),

			

			array(

				'slug' => 'footer_menu',

				'name' => __('Footer Menu','academy'),

			),

			array(

				'slug' => 'social_footer',

				'name' => __('Social Footer Menu','academy'),

			),			

		),

		

		//Image Sizes

		'image_sizes' => array (

		

			array(

				'name' => 'normal',

				'width' => 420,

				'height' => 420,

				'crop' => false,

			),

			

			array(

				'name' => 'extended',

				'width' => 738,

				'height' => 738,

				'crop' => false,

			),

			

		),

		

		//Editor styles

		'editor_styles' => array(

			'bordered'=>__('Bordered List', 'academy'),

			'checked'=>__('Checked List', 'academy'),

		),

		

		//Profile fields

		'profile_fields' => array(

			'first_name', 

			'last_name',

			'user_email', 

			'signature', 

			'twitter', 

			'facebook',

			'telegram',

			'instagram', 

			'tumblr', 

			'linkedin', 

			'vimeo', 

			'google', 

			'youtube', 

			'flickr',

			'viewProfile',

		),





		//Theme backend styles

		'admin_styles' => array (

								

			//admin panel style

			array(	'name' => 'themexAdmin',

					'uri' => THEMEX_URI.'admin/css/style.css'),

		

			//color picker

			array(	'name' => 'themexColorpicker',

					'uri' => THEMEX_URI.'admin/css/colorpicker.css'),

					

			//thickbox

			array(	'name' => 'thickbox' ),



		),

		

		//Theme frontend styles

		'user_styles' => array (



			//main style

			

			/* ummu array(	'name' => 'main',

					'uri' => THEME_CSS_URI.'style.css'), */

			

		),

		

		//Theme backend scripts

		'admin_scripts' => array (

		

			//thickbox

			array(	'name' => 'thickbox' ),

			

			//media upload

			array(	'name' => 'media-upload' ),

			

			//jquery slider

			array(	'name' => 'jquery-ui-slider' ),

		

			//panel interface

			array(	'name' => 'themex_admin',

					'uri' => THEMEX_URI.'admin/js/jquery.interface.js',

					'deps' => array('jquery')),

					

			//color picker

			array(	'name' => 'themex_colorpicker',

					'uri' => THEMEX_URI.'admin/js/jquery.colorpicker.js',

					'deps' => array('jquery')),

					

			//shortcodes popup

			array(	'name' => 'themex_shortcode_popup',

					'uri' => THEMEX_URI.'extensions/themex-shortcoder/js/popup.js',

					'deps' => array('jquery')),

					

			//shortcodes preview

			array(	'name' => 'themex_livequery',

					'uri' => THEMEX_URI.'extensions/themex-shortcoder/js/jquery.livequery.js',

					'deps' => array('jquery')),

					

			//shortcodes cloner

			array(	'name' => 'themex_appendo',

				'uri' => THEMEX_URI.'extensions/themex-shortcoder/js/jquery.appendo.js',

				'deps' => array('jquery')),

							

			

		),	

		

		//Theme frontend scripts

		'user_scripts' => array (

		

			//jquery

			array(	'name' => 'jquery' ),			

					

			//slider

			array(	'name' => 'themexSliderScript',

					'uri' => THEME_URI.'js/jquery.themexSlider.js'),

					

			//hover intent

			array(	'name' => 'ratyScript',

					'uri' => THEME_URI.'js/jquery.raty.min.js'),

					

			//hover intent

			array(	'name' => 'hoverIntentScript',

					'uri' => THEME_URI.'js/jquery.hoverIntent.min.js'),

					

			//media player

			array(	'name' => 'jPlayerScript',

					'uri' => THEME_URI.'js/jplayer/jquery.jplayer.min.js'),

					

			//placeholders script

			array(	'name' => 'placeholderScript',

					'uri' => THEME_URI.'js/jquery.placeholder.min.js'),

					

			//comment reply

			array(	'name' => 'comment-reply',

					'condition' => array('function'=>'is_single','value'=>'')),

					

			//sticky-kit 

			array(	'name' => 'sticky-kit',

					'uri' => THEME_URI.'js/jquery.sticky-kit.min.js'),				

					

			//custom

			array(	'name' => 'customScript',

					'uri' => THEME_URI.'js/jquery.custom.js'),

					

		),



		//Widget settings

		'widget_settings' => array (

			'before_widget' => '<div class="widget sidebar-widget %2$s">',

			'after_widget' => '</div>',

			'before_title' => '<div class="widget-title"><h3 class="nomargin">',

			'after_title' => '</h3></div>',

		),

		

		//Default widget areas

		'widget_areas' => array (

			

		),

		

		//Widgets

		'widgets' => array (

			'themex_comments_widget',

			'themex_twitter_widget',

			'themex_authors_widget',

			'WP_Widget_Search',

			'WP_Widget_Recent_Comments',

		),	

		

		//Post types

		'post_types' => array (

			

			//Course

			array (

				'id' => 'course',

				'labels' => array (

					'name' => __('Courses','academy'),

					'singular_name' => __( 'Course','academy' ),

					'add_new' => __('Add New','academy'),

					'add_new_item' => __('Add New Course','academy'),

					'edit_item' => __('Edit Course','academy'),

					'new_item' => __('New Course','academy'),

					'view_item' => __('View Course','academy'),

					'search_items' => __('Search Courses','academy'),

					'not_found' =>  __('No Courses Found','academy'),

					'not_found_in_trash' => __('No Courses Found in Trash','academy'), 

					'parent_item_colon' => ''

				 ),

				'public' => true,

				'exclude_from_search' => false,

				'publicly_queryable' => true,

				'show_ui' => true, 

				'query_var' => true,

				'capability_type' => 'post',

				'hierarchical' => false,

				'menu_position' => null,

				'supports' => array('title','editor','excerpt','thumbnail','author','revisions','comments'),

				'rewrite' => array('slug' => __('course', 'academy')),

			),

			

			//metting

			array (

				'id' => 'meeting',

				'labels' => array (

					'name' => __('کرسی ها','academy'),

					'singular_name' => __( 'کرسی','academy' ),

					'add_new' => __('افزودن','academy'),

					'add_new_item' => __('افزودن کرسی جدید','academy'),

					'edit_item' => __('ویرایش کرسی','academy'),

					'new_item' => __('کرسی جدید','academy'),

					'view_item' => __('نمایش کرسی','academy'),

					'search_items' => __('جستجوی کرسی','academy'),

					'not_found' =>  __('کرسی پیدا نشد','academy'),

					'not_found_in_trash' => __('کرسی در زباله دان نیست','academy'), 

					'parent_item_colon' => ''

				 ),

				'public' => true,

				'exclude_from_search' => false,

				'publicly_queryable' => true,

				'show_ui' => true, 

				'query_var' => true,

				'capability_type' => 'post',

				'hierarchical' => false,

				'menu_position' => null,

				'supports' => array('title','editor','excerpt','thumbnail','author','revisions'),

				'rewrite' => array('slug' => __('meeting', 'academy')),

			),

			

			//Lesson

			array (

				'id' => 'lesson',

				'labels' => array (

					'name' => __('Lessons','academy'),

					'singular_name' => __( 'Lesson','academy' ),

					'add_new' => __('Add New','academy'),

					'add_new_item' => __('Add New Lesson','academy'),

					'edit_item' => __('Edit Lesson','academy'),

					'new_item' => __('New Lesson','academy'),

					'view_item' => __('View Lesson','academy'),

					'search_items' => __('Search Lessons','academy'),

					'not_found' =>  __('No Lessons Found','academy'),

					'not_found_in_trash' => __('No Lessons Found in Trash','academy'), 

					'parent_item_colon' => ''

				 ),

				'public' => true,

				'exclude_from_search' => true,

				'publicly_queryable' => true,

				'show_ui' => true, 

				'query_var' => true,

				'capability_type' => 'post',

				'hierarchical' => true,

				'menu_position' => null,

				'supports' => array('title','editor','comments','author','revisions','page-attributes'),

				'rewrite' => array('slug' => 'lesson'),				

			),

			

			//library

			array (

				'id' => 'library',

				'labels' => array (

					'name' => __('کتابخانه','academy'),

					'singular_name' => __( 'کتاب','academy' ),

					'add_new' => __('اضافه کردن','academy'),

					'add_new_item' => __('اضافه کردن کتاب','academy'),

					'edit_item' => __('ویرایش کتاب','academy'),

					'new_item' => __('کتاب جدید','academy'),

					'view_item' => __('نمایش کتاب','academy'),

					'search_items' => __('جستجوی کتاب','academy'),

					'not_found' =>  __('کتابی پیدا نشد','academy'),

					'not_found_in_trash' => __('کتابی در زباله دان پیدا نشد','academy'), 

					'parent_item_colon' => ''

				 ),

				'public' => true,

				'exclude_from_search' => false,

				'publicly_queryable' => true,

				'show_ui' => true, 

				'query_var' => true,

				'capability_type' => 'post',

				'hierarchical' => true,

				'menu_position' => null,

				'supports' =>array('title','editor','excerpt','thumbnail','comments','author','revisions','page-attributes'),

				'rewrite' => array('slug' => 'library'),				

			),

			

			//Quiz

			array (

				'id' => 'quiz',

				'labels' => array (

					'name' => __('Quizzes','academy'),

					'singular_name' => __( 'Quiz','academy' ),

					'add_new' => __('Add New','academy'),

					'add_new_item' => __('Add New Quiz','academy'),

					'edit_item' => __('Edit Quiz','academy'),

					'new_item' => __('New Quiz','academy'),

					'view_item' => __('View Quiz','academy'),

					'search_items' => __('Search Quizzes','academy'),

					'not_found' =>  __('No Quizzes Found','academy'),

					'not_found_in_trash' => __('No Quizzes Found in Trash','academy'), 

					'parent_item_colon' => ''

				 ),

				'public' => true,

				'exclude_from_search' => true,

				'publicly_queryable' => true,

				'show_ui' => true, 

				'query_var' => true,

				'capability_type' => 'post',

				'hierarchical' => false,

				'menu_position' => null,

				'show_in_menu' => 'edit.php?post_type=lesson',

				'supports' => array('title','editor','author'),	

				'rewrite' => array('slug' => __('quiz', 'academy')),

			),

			

			//Plan

			array (

				'id' => 'plan',

				'labels' => array (

					'name' => __('Plans','academy'),

					'singular_name' => __( 'Plan','academy' ),

					'add_new' => __('Add New','academy'),

					'add_new_item' => __('Add New Plan','academy'),

					'edit_item' => __('Edit Plan','academy'),

					'new_item' => __('New Plan','academy'),

					'view_item' => __('View Plan','academy'),

					'search_items' => __('Search Plans','academy'),

					'not_found' =>  __('No Plans Found','academy'),

					'not_found_in_trash' => __('No Plans Found in Trash','academy'), 

					'parent_item_colon' => ''

				 ),

				'public' => true,

				'exclude_from_search' => true,

				'publicly_queryable' => true,

				'show_ui' => true, 

				'query_var' => true,

				'capability_type' => 'post',

				'hierarchical' => false,

				'menu_position' => null,

				'show_in_menu' => 'edit.php?post_type=course',

				'supports' => array('title','editor','thumbnail'),	

			),

			

			//Testimonial

			array (

				'id' => 'testimonial',

				'labels' => array (

					'name' => __('Testimonials','academy'),

					'singular_name' => __( 'Testimonial','academy' ),

					'add_new' => __('Add New','academy'),

					'add_new_item' => __('Add New Testimonial','academy'),

					'edit_item' => __('Edit Testimonial','academy'),

					'new_item' => __('New Testimonial','academy'),

					'view_item' => __('View Testimonial','academy'),

					'search_items' => __('Search Testimonials','academy'),

					'not_found' =>  __('No Testimonials Found','academy'),

					'not_found_in_trash' => __('No Testimonials Found in Trash','academy'),

					'parent_item_colon' => ''

				 ),

				'public' => true,

				'exclude_from_search' => true,

				'publicly_queryable' => true,

				'show_ui' => true, 

				'query_var' => true,

				'capability_type' => 'post',

				'hierarchical' => false,

				'menu_position' => null,

				'supports' => array('title','editor','thumbnail'),				

			),

			

			//Slide

			array (

				'id' => 'slide',

				'labels' => array (

					'name' => __('Slides','academy'),

					'singular_name' => __( 'Slide','academy' ),

					'add_new' => __('Add New','academy'),

					'add_new_item' => __('Add New Slide','academy'),

					'edit_item' => __('Edit Slide','academy'),

					'new_item' => __('New Slide','academy'),

					'view_item' => __('View Slide','academy'),

					'search_items' => __('Search Slides','academy'),

					'not_found' =>  __('No Slides Found','academy'),

					'not_found_in_trash' => __('No Slides Found in Trash','academy'), 

					'parent_item_colon' => ''

				 ),

				'public' => true,

				'exclude_from_search' => true,

				'publicly_queryable' => true,

				'show_ui' => true, 

				'query_var' => true,

				'capability_type' => 'post',

				'hierarchical' => false,

				'menu_position' => null,				

				'supports' => array('title','thumbnail','editor','custom-fields'),

			),

		),

		

		//Taxonomies

		'taxonomies' => array (			

			array(	

				'taxonomy' => 'course_category',	

				'object_type' => array('course'),					

				'settings' => array(

					'hierarchical' => true,

					'show_in_nav_menus' => true,

					'labels' => array(

	                    'name' 				=> __( 'Course Categories', 'academy'),

	                    'singular_name' 	=> __( 'Course Category', 'academy'),

						'menu_name'			=> __( 'Categories', 'academy' ),

	                    'search_items' 		=> __( 'Search Course Categories', 'academy'),

	                    'all_items' 		=> __( 'All Course Categories', 'academy'),

	                    'parent_item' 		=> __( 'Parent Course Category', 'academy'),

	                    'parent_item_colon' => __( 'Parent Course Category:', 'academy'),

	                    'edit_item' 		=> __( 'Edit Course Category', 'academy'),

	                    'update_item' 		=> __( 'Update Course Category', 'academy'),

	                    'add_new_item' 		=> __( 'Add New Course Category', 'academy'),

	                    'new_item_name' 	=> __( 'New Course Category Name', 'academy')

	            	),

					'rewrite' => array(

						'slug' => __('courses', 'academy'),

						'hierarchical' => true

					),

				)

				

			),

			

			array(	

				'taxonomy' => 'course_tags',	

				'object_type' => array('course'),					

				'settings' => array(

					'hierarchical' => false,

					'show_in_nav_menus' => true,

					'labels' => array(

	                    'name' 				=> __( 'تگ های دوره', 'academy'),

	                    'singular_name' 	=> __( 'تگ دوره', 'academy'),

						'menu_name'			=> __( 'تگ ها', 'academy' ),

	                    'search_items' 		=> __( 'جستجوی تمام تگ های دوره', 'academy'),

	                    'all_items' 		=> __( 'تمام تگ های دوره', 'academy'),

	                    'parent_item' 		=> __( 'مادر تگ دوره', 'academy'),

	                    'parent_item_colon' => __( 'مادر تگ دوره:', 'academy'),

	                    'edit_item' 		=> __( 'ویرایش تگ دوره', 'academy'),

	                    'update_item' 		=> __( 'به روز رسانی تگ دوره', 'academy'),

	                    'add_new_item' 		=> __( 'افزودن تگ جدید دوره', 'academy'),

	                    'new_item_name' 	=> __( 'نام تگ جدید دوره', 'academy')

	            	),

					'rewrite' => array(

						'slug' => __('course_tags', 'academy'),

						'hierarchical' => true

					),

				)

				

			),

			

			

			array(	

				'taxonomy' => 'library_category',	

				'object_type' => array('library'),					

				'settings' => array(

					'hierarchical' => true,

					'show_in_nav_menus' => true,

					'labels' => array(

	                    'name' 				=> __( 'دسته بندی کتاب ها', 'academy'),

	                    'singular_name' 	=> __( 'دسته کتاب', 'academy'),

						'menu_name'			=> __( 'دسته بندی', 'academy' ),

	                    'search_items' 		=> __( 'جستجوی دسته کتاب ها', 'academy'),

	                    'all_items' 		=> __( 'تمام دسته های کتاب', 'academy'),

	                    'parent_item' 		=> __( 'والدین دسته کتاب', 'academy'),

	                    'parent_item_colon' => __( 'والدین دسته کتاب:', 'academy'),

	                    'edit_item' 		=> __( 'ویرایش دسته کتاب', 'academy'),

	                    'update_item' 		=> __( 'به روز رسانی', 'academy'),

	                    'add_new_item' 		=> __( 'افزودن', 'academy'),

	                    'new_item_name' 	=> __( 'نام جدید دسته کتاب', 'academy')

	            	),

					'rewrite' => array(

						'slug' => __('library-category', 'academy'),

						'hierarchical' => true

					),

				)

			),
			
			array(	

				'taxonomy' => 'plan_category',	

				'object_type' => array('plan'),					

				'settings' => array(

					'hierarchical' => true,

					'show_in_nav_menus' => true,

					'labels' => array(

	                    'name' 				=> __( 'دسته بندی پلان ها', 'academy'),

	                    'singular_name' 	=> __( 'دسته پلان', 'academy'),

						'menu_name'			=> __( ' دسته بندی پلان', 'academy' ),

	                    'search_items' 		=> __( 'جستجوی دسته پلان ها', 'academy'),

	                    'all_items' 		=> __( 'تمام دسته های پلان', 'academy'),

	                    'parent_item' 		=> __( 'والدین دسته پلان', 'academy'),

	                    'parent_item_colon' => __( 'والدین دسته پلان:', 'academy'),

	                    'edit_item' 		=> __( 'ویرایش دسته پلان', 'academy'),

	                    'update_item' 		=> __( 'به روز رسانی', 'academy'),

	                    'add_new_item' 		=> __( 'افزودن', 'academy'),

	                    'new_item_name' 	=> __( 'نام جدید دسته پلان', 'academy')

	            	),

					'rewrite' => array(

						'slug' => __('plan-category', 'academy'),

						'hierarchical' => true

					),

				)

			),
			

		),

		

		//Meta boxes

		'meta_boxes' => array(

		

			//Page

			array(

				'id' => 'page_metabox',

				'title' =>  __('Page Options', 'academy'),

				'page' => 'page',

				'context' => 'normal',

				'priority' => 'high',

				'options' => array(						

					array(	'name' => __('Page Background','academy'),

							'id' => 'background',

							'type' => 'uploader'),

				),			

			),

		

			//Slide

			array(

				'id' => 'slide_metabox',

				'title' =>  __('Slide Options', 'academy'),

				'page' => 'slide',

				'context' => 'normal',

				'priority' => 'high',

				'options' => array(

				

					array(	'name' => __('Image Link','academy'),

							'desc' => __('Slide image link.','academy'),

							'id' => 'link',

							'type' => 'text'),



					array(	'name' => __('Video Code','academy'),

							'desc' => __('Embedded video code.','academy'),

							'id' => 'video',

							'type' => 'textarea'),



				),			

			),			

				

			//Course

			array(

				'id' => 'course_metabox',

				'title' =>  __('Course Options', 'academy'),

				'page' => 'course',

				'context' => 'normal',

				'priority' => 'high',				

				'options' => array(

				

				array(	'name' => __('ارسال پیام برای داشجویان حضوری','academy'),

						'desc' => __(' ارسال ایمیل و پیامک برای دانشجویان حضوری دوره','academy'),

						'id' => 'senduser',

						'type' => 'senduser'),				

				

				array(	'name' => __('اطلاعیه های دوره','academy'),

							'desc' => __('ورود اطلاعیه های هر دوره','academy'),

							'id' => 'notif',

							'type' => 'notif'),

				array(							

							'name' => __('قرار گیری در لیست دوره های صفحه اول', 'academy'),

							'desc' => __('در صورت تایید در جدول فروش دوره های مجازی قرار می گیرد. ','academy'),

							'type' => 'select',

							'id' => 'tablecourse',

							'options' => array(

								'no' => __('قرار داده نشود', 'academy'),

								'yes' => __('قرار داده شود', 'academy'),

							),

					),



				array(							

							'name' => __('وضعیت برگزاری', 'academy'),

							'desc' => __('وضعیت دوره از نظر برگزاری','academy'),

							'type' => 'select',

							'id' => 'statusclass',

							'options' => array(

								'on' => __('در حال ثبت نام', 'academy'),

								'live' => __('در حال برگزاری', 'academy'),

								'off' => __('برگزار شده', 'academy'),								

							),

					),

				

					array(							

							'name' => __(' وضعیت فروش دوره حضوری ', 'academy'),

							'desc' => __('Course status.','academy'),

							'type' => 'select',

							'id' => 'status',

							'options' => array(

								'premium' => __(' فروشی ', 'academy'),

								'private' => __(' فروش غیر فعال ', 'academy'),

								'free' => __(' رایگان ', 'academy'),								

							),

					),

					

					array(

						'name' => __('عنوان دکمه ثبت نام حضوری', 'academy'),

						'id' => 'butttext',

						'type' => 'text',

						'description' => __(' در صورتی که میخواهید عنوان دکمه ثبت نام حضوری تغییر کند عنوان جدید را وارد نمایید.', 'academy'),

					),

					

					array(

						'name' => __('عنوان دکمه پس از ثبت نام', 'academy'),

						'id' => 'butttextaf',

						'type' => 'text',

						'description' => __(' در صورتی که میخواهید عنوان دکمه پس از ثبت نام تغییر کند عنوان جدید را وارد نمایید.', 'academy'),

					),

					

					array(

						'name' => __('عنوان دکمه در تکمیل ظرفیت', 'academy'),

						'id' => 'butttextcap',

						'type' => 'text',

						'description' => __(' در صورتی که میخواهید عنوان دکمه در هنگام تکمیل ظرفیت تغییر کند عنوان جدید را وارد نمایید.', 'academy'),

					),

					

					array(

						'name' => __('عنوان درس های ذیل صفحه', 'academy'),

						'id' => 'butttextclass',

						'type' => 'text',

						'description' => __('در صورتی که میخواهید عنوان درس ها را در زیر برگه هر دوره تغییر دهید عنوان جدید را وارد نمایید.', 'academy'),

					),																

				

				array(							

							'name' => __('نمایش دانشجویان', 'academy'),

							'desc' => __('نمایش دانشجویان در صفحه دوره','academy'),

							'type' => 'select',

							'id' => 'stuview',

							'options' => array(

								'show' => __('نمایش ', 'academy'),

								'hidden' => __('پنهان', 'academy'),							

							),

					),

					

				array(							

							'name' => __('نمایش جعبه مشخصات دوره', 'academy'),

							'desc' => __('نمایش جعبه مشخصات دوره در صفحه اصلی دوره','academy'),

							'type' => 'select',

							'id' => 'toptitle',

							'options' => array(

								'show' => __('نمایش ', 'academy'),

								'hidden' => __('پنهان', 'academy'),							

							),

					),

				

				array(							

							'name' => __('نمایش مشخصات استاد', 'academy'),

							'desc' => __('نمایش جعبه مشخصات استاد در صفحه اصلی دوره','academy'),

							'type' => 'select',

							'id' => 'teaview',

							'options' => array(

								'hidden' => __('پنهان', 'academy'),

								'show' => __('نمایش ', 'academy'),							

							),

					),

					

				array(							

							'name' => __('نمایش سایر دوره های استاد', 'academy'),

							'desc' => __('نمایش جعبه سایر دوره های مرتبط استاد زیر صفحه دوره ها','academy'),

							'type' => 'select',

							'id' => 'teachcourses',

							'options' => array(

								'show' => __('نمایش', 'academy'),

								'hidden' => __('پنهان ', 'academy'),							

							),

					),							

					

					array(

						'name' => __(' ظرفیت دوره حضوری', 'academy'),

						'id' => 'capacity',

						'type' => 'number',

						'description' => __(' ظرفیت پذیرش این دوره را وارد نمایید ', 'academy'),

					),

				

					array(	'name' => __(' انتخاب محصول دوره حضوری ','academy'),

							'desc' => __(' محصول دوره حضوری مربوطه را انتخاب نمایید','academy'),

							'id' => 'product',

							'type' => 'select_post',

							'post_type' => 'product'),	



					array(	'name' => __('Rating','academy'),

							'desc' => __('Course rating.','academy'),

							'id' => 'rating_value',

							'type' => 'number',

							'number_type' => 'float'),

							

					array(	'name' => __('تعداد کلاس های دوره','academy'),

							'desc' => __(' تعداد کلاس های دوره را برای استفاده در حضور و غیاب ها بنویسید','academy'),

							'id' => 'class_number',

							'type' => 'number',

							'number_type' => 'float'),

							

					array(							

								'name' => __('نمایش حضور و غیاب برای دانشجو', 'academy'),

								'desc' => __('نمایش لیست حضور و غیاب دانشجو در پروفایل شخصی','academy'),

								'type' => 'select',

								'id' => 'showpresent',

								'options' => array(

									'hidden' => __('پنهان', 'academy'),

									'show' => __('نمایش ', 'academy'),							

								),

						),									

							

					array(	'name' => __('دانشجویان حضوری','academy'),

							'desc' => __('مدیریت دانشجویان حضوری','academy'),

							'capability' => 'manage_options',

							'id' => 'users_manager',							

							'type' => 'users'),

					

					array(	'name' => __('دانشجویان حضوری بورس','academy'),

							'desc' => __('مدیریت دانشجویان حضوری بورس','academy'),

							'capability' => 'manage_options',

							'id' => 'users_managerb',							

							'type' => 'usersb'),										

							

					array(	'name' => __('Certificate','academy'),

							'desc' => __('Course certificate. Use %username%, %date% and %title% codes to show them in the certificate text.','academy'),

							'id' => 'certificate',

							'type' => 'certificate'),

							

							

					array(	'name' => __('Background','academy'),

							'desc' => __('Course background.','academy'),

							'id' => 'background',

							'type' => 'uploader'),

				),

			),

			

			

			//Course virTual

			array(

				'id' => 'course_metabox',

				'title' =>  __('Virtual Course Options', 'academy'),

				'page' => 'course',

				'context' => 'normal',

				'priority' => 'high',				

				'options' => array(

					array(							

							'name' => __('وضعیت فروش دوره مجازی', 'academy'),

							'desc' => __('Course status.','academy'),

							'type' => 'select',

							'id' => 'statusv',

							'options' => array(

								'premium' => __(' فروشی ', 'academy'),

								'private' => __(' فروش غیر فعال ', 'academy'),

								'free' => __(' رایگان ', 'academy'),									

							),

					),
					
					array(

						'name' => __(' ظرفیت دوره مجازی', 'academy'),

						'id' => 'capacityv',

						'type' => 'number',

						'description' => __(' ظرفیت پذیرش این دوره را وارد نمایید ', 'academy'),

					),

					array(

						'name' => __('عنوان دکمه ثبت نام مجازی', 'academy'),

						'id' => 'butttextvirt',

						'type' => 'text',

						'description' => __(' در صورتی که میخواهید عنوان دکمه ثبت نام مجازی تغییر کند عنوان جدید را وارد نمایید.', 'academy'),

					),

					

					array(

						'name' => __('عنوان دکمه پس از ثبت نام', 'academy'),

						'id' => 'butttextafvirt',

						'type' => 'text',

						'description' => __(' در صورتی که میخواهید عنوان دکمه پس از ثبت نام تغییر کند عنوان جدید را وارد نمایید.', 'academy'),

					),
					
					
					array(

						'name' => __(' عنوان دکمه در تکمیل ظرفیت مجازی', 'academy'),

						'id' => 'butttextcapv',

						'type' => 'text',

						'description' => __(' در صورتی که میخواهید عنوان دکمه در هنگام تکمیل ظرفیت تغییر کند عنوان جدید را وارد نمایید.', 'academy'),

					),


					array(	'name' => __(' انتخاب محصول دوره مجازی ','academy'),

							'desc' => __(' محصول دوره مجازی مربوطه را انتخاب نمایید','academy'),

							'id' => 'productv',

							'type' => 'select_post',

							'post_type' => 'product'),	

							

					array(	'name' => __('دانشجویان مجازی','academy'),

							'desc' => __('مدیریت دانشحویان مجازی','academy'),

							'capability' => 'manage_options',

							'id' => 'users_managerv',							

							'type' => 'usersv'),

							

					array(	'name' => __('دانشجویان مجازی بورس','academy'),

							'desc' => __('مدیریت دانشجویان مجازی بورس','academy'),

							'capability' => 'manage_options',

							'id' => 'users_managervb',							

							'type' => 'usersvb'),

					array(

						'name' => __('عنوان دکمه جزئیات و ثبت نام', 'academy'),

						'id' => 'detailbutt',

						'type' => 'text',

						'description' => __(' نمایش عنوان دکمه جزئیات و ثبت نام در زیر هر دوره را تغییر میدهد.', 'academy'),

					),							
							
					array(

						'name' => __('عنوان دکمه ترم دوم ثبت نام', 'academy'),

						'id' => 'term2title',

						'type' => 'text',

						'description' => __(' در صورتی که این دوره ترم 2 دارد این قسمت را وارد نمایید.', 'academy'),

					),
					array(

						'name' => __('لینک دکمه ترم دوم ثبت نام', 'academy'),

						'id' => 'term2link',

						'type' => 'text',

						'description' => __(' در صورتی که این دوره ترم 2 دارد این قسمت را وارد نمایید.', 'academy'),

					),
					
					array(

						'name' => __('عنوان دکمه ترم سوم ثبت نام', 'academy'),

						'id' => 'term3title',

						'type' => 'text',

						'description' => __(' در صورتی که این دوره ترم 3 دارد این قسمت را وارد نمایید.', 'academy'),

					),
					array(

						'name' => __('لینک دکمه ترم سوم ثبت نام', 'academy'),

						'id' => 'term3link',

						'type' => 'text',

						'description' => __(' در صورتی که این دوره ترم 3 دارد این قسمت را وارد نمایید.', 'academy'),

					),																								
					array(

						'name' => __('عنوان دکمه ترم چهارم ثبت نام', 'academy'),

						'id' => 'term4title',

						'type' => 'text',

						'description' => __(' در صورتی که این دوره ترم 4 دارد این قسمت را وارد نمایید.', 'academy'),

					),
					array(

						'name' => __('لینک دکمه ترم چهارم ثبت نام', 'academy'),

						'id' => 'term4link',

						'type' => 'text',

						'description' => __(' در صورتی که این دوره ترم 4 دارد این قسمت را وارد نمایید.', 'academy'),

					),																								



				),

			),

			

			

			//Plan

			array(

				'id' => 'plan_metabox',

				'title' =>  __('Plan Options', 'academy'),

				'page' => 'plan',

				'context' => 'normal',

				'priority' => 'high',			

				'options' => array(	

					array(	'name' => __('Category','academy'),

							'desc' => __('Courses category.','academy'),

							'id' => 'category',

							'type' => 'select_category',

							'show_option_none' => true,

							'taxonomy' => 'course_category'),

							

					array(							

							'name' => __('Period', 'academy'),

							'desc' => __('Time period.','academy'),

							'type' => 'select',

							'id' => 'period',

							'options' => array(						

								'7' => __('هفته', 'academy'),

								'31' => __('ماه', 'academy'),

								'93' => __('3 ماه', 'academy'),

								'186' => __('6 ماه', 'academy'),

								'279' => __('9 ماه', 'academy'),

								'365' => __('سال', 'academy'),

							),

					),

							

					array(	'name' => __('Product','academy'),

							'desc' => __('Related product.','academy'),

							'id' => 'product',

							'type' => 'select_post',

							'post_type' => 'product'),
					
					array(							

						'name' => __('نمایش تعداد', 'academy'),

						'desc' => __('نمایش تعداد دانشجویان در صفحه پلان','academy'),

						'type' => 'select',

						'id' => 'stuview',

						'options' => array(

							'hidden' => __('پنهان ', 'academy'),

							'show' => __('نمایش', 'academy'),							

						),

					),

							

					array(	'name' => __('Users','academy'),

							'desc' => __('Manage users.','academy'),

							'capability' => 'manage_options',

							'id' => 'users_manager',

							'type' => 'users'),

				),

			),

			

			//Lesson

			array(

				'id' => 'lesson_metabox',

				'title' =>  __('Lesson Options', 'academy'),

				'page' => 'lesson',

				'context' => 'normal',

				'priority' => 'high',			

				'options' => array(	

					array(							

							'name' => __('Status', 'academy'),

							'desc' => __('Lesson status.','academy'),

							'type' => 'select',

							'id' => 'status',

							'options' => array(															

								'premium' => __('Premium', 'academy'),

								'free' => __('Free', 'academy'),

							),

					),				

					array(	'name' => __('Course','academy'),

							'desc' => __('Lesson course.','academy'),

							'id' => 'course',

							'type' => 'select_post',

							'post_type' => 'course'),

							

					array(	'name' => __('Prerequisite','academy'),

							'desc' => __('Lesson prerequisite.','academy'),

							'id' => 'prerequisite',

							'type' => 'select_post',

							'post_type' => 'lesson'),

							

					array(	'name' => __('Quiz','academy'),

							'desc' => __('Lesson quiz.','academy'),

							'id' => 'quiz',

							'type' => 'select_post',

							'post_type' => 'quiz'),

					

					array(							

							'name' => __('تمام صفحه', 'academy'),

							'desc' => __('برای حذف نوار کناری از این گزینه استفاده کنید','academy'),

							'type' => 'select',

							'id' => 'fullclass',

							'options' => array(

								'normal' => __('نمایش نوار کناری', 'academy'),

								'fullwidth' => __('تمام صفحه', 'academy'),							

							),

					),

					array(							

							'name' => __('کلاس آنلاین اسکای روم', 'academy'),

							'desc' => __('اگر این کلاس آنلاین اسکای روم است، بله را انتخاب کنید.','academy'),

							'type' => 'skytemp',

							'id' => 'skyenable',

							'options' => array(

								'no' => __('خیر', 'academy'),

								'yes' => __('بله', 'academy'),							

							),

					),
					
					array(							

							'name' => __('انتخاب کلاس اسکای روم', 'academy'),

							'desc' => __('کلاسی از اسکای روم که قرار است در این درس نمایش داده شود انتخاب کنید','academy'),

							'type' => 'skytempc',

							'id' => 'skylesson',

							'options' => array(

								'no' => __('خیر', 'academy'),

								'yes' => __('بله', 'academy'),							

							),

					),
					
					array(

						'name' => __('لیتک دانلود تمام محتوا', 'academy'),

						'id' => 'allattachments',

						'type' => 'allattachments',
	
						'desc' => __('لینک فایل فشرده تمام محتویات این کلاس را وارد نمایید. ','academy'),

					),	

					array(	'name' => __('Attachments','academy'),

							'desc' => __('Lesson files.','academy'),

							'id' => 'attachments',

							'type' => 'attachments'),

				),

			),

			

			

			//library

			array(

				'id' => 'library_metabox',

				'title' =>  __('مشخصات کتاب ها', 'academy'),

				'page' => 'library',

				'context' => 'normal',

				'priority' => 'high',			

				'options' => array(	

					

					array(	'name' => __('Attachments','academy'),

							'desc' => __('Lesson files.','academy'),

							'id' => 'attachments',

							'type' => 'attachments'),

							

					array(	'name' => __('نویسنده','academy'),

							'desc' => __('نویسنده کتاب','academy'),

							'id' => 'bookau',

							'type' => 'text'),

	

						array(	'name' => __('ناشر','academy'),

							'desc' => __('ناشر کتاب','academy'),

							'id' => 'bookcop',

							'type' => 'text'),				

	

						array(	'name' => __('سال  چاپ','academy'),

							'desc' => __('سال چاپ کتاب کتاب','academy'),

							'id' => 'bookyear',

							'type' => 'text'),				

				),

			),

			

			

			//Quiz

			array(

				'id' => 'quiz_metabox',

				'title' =>  __('Quiz Options', 'academy'),

				'page' => 'quiz',

				'context' => 'normal',

				'priority' => 'high',			

				'options' => array(

					array(	'name' => __('Passing Percentage','academy'),

							'desc' => __('Minimum pass mark.','academy'),

							'id' => 'passmark',

							'type' => 'number'),

				

					array(	'name' => __('Questions','academy'),

							'desc' => __('Quiz questions.','academy'),

							'id' => 'questions',

							'type' => 'questions'),

				),

			),

			



		),

		

		'shortcodes' => array(

		

			//Columns

			'column' => array(

				'options' => array(),

				'shortcode' => '{{child_shortcode}}',

				'popup_title' => __('Insert Columns Shortcode', 'academy'),

				'child_shortcode' => array(

					'options' => array(

						'column' => array(

							'type' => 'select',

							'label' => __('Column Width', 'academy'),

							'options' => array(

								'one_sixth' => __('One Sixth', 'academy'),

								'one_sixth_last' => __('One Sixth Last', 'academy'),

								'one_fourth' => __('One Fourth', 'academy'),

								'one_fourth_last' => __('One Fourth Last', 'academy'),

								'one_third' => __('One Third', 'academy'),

								'one_third_last' => __('One Third Last', 'academy'),

								'five_twelfths' => __('Five Twelfths', 'academy'),

								'five_twelfths_last' => __('Five Twelfths Last', 'academy'),

								'one_half' => __('One Half', 'academy'),

								'one_half_last' => __('One Half Last', 'academy'),

								'seven_twelfths' => __('Seven Twelfths', 'academy'),

								'seven_twelfths_last' => __('Seven Twelfths Last', 'academy'),

								'two_thirds' => __('Two Thirds', 'academy'),

								'two_thirds_last' => __('Two Thirds Last', 'academy'),

								'three_fourths' => __('Three Fourths', 'academy'),

								'three_fourths_last' => __('Three Fourths Last', 'academy'),

							)

						),

						'content' => array(

							'std' => '',

							'type' => 'textarea',

							'label' => __('Column Content', 'academy'),

						)

					),

					'shortcode' => '[{{column}}]{{content}}[/{{column}}] ',

					'clone_button' => __('Add Column', 'academy')

				)

			),

		

			//Button

			'button' => array(

				'options' => array(

					'color' => array(

						'type' => 'select',

						'label' => __('Button Color', 'academy'),

						'options' => array(

							'primary' => __('Primary', 'academy'),

							'secondary' => __('Secondary', 'academy'),

							'dark' => __('Dark', 'academy'),	

						)

					),

					'size' => array(

						'type' => 'select',

						'label' => __('Button Size', 'academy'),

						'options' => array(

							'small' => __('Small', 'academy'),

							'medium' => __('Medium', 'academy'),

							'large' => __('Large', 'academy')

						)

					),

					'url' => array(

						'std' => '',

						'type' => 'text',

						'label' => __('Button URL', 'academy'),

					),

					'target' => array(

						'type' => 'select',

						'label' => __('Button Target', 'academy'),

						'options' => array(

							'self' => __('Current Tab', 'academy'),

							'blank' => __('New Tab', 'academy'),

						)

					),

					'content' => array(

						'std' => '',

						'type' => 'text',

						'label' => __('Button Text', 'academy'),

					)

				),

				'shortcode' => '[button url="{{url}}" target="{{target}}" size="{{size}}" color="{{color}}"]{{content}}[/button]',

				'popup_title' => __('Insert Button Shortcode', 'academy')

			),



			//Image

			'image' => array(

				'options' => array(

					'content' => array(

						'std' => '',

						'type' => 'text',

						'label' => __('Image URL', 'academy'),

					),

					'url' => array(

						'std' => '',

						'type' => 'text',

						'label' => __('Link URL', 'academy'),

					),					

				),

				'shortcode' => '[image url="{{url}}"]{{content}}[/image]',	

				'popup_title' => __('Insert Image Shortcode', 'academy')

			),

			

			//Courses

			'courses' => array(

				'options' => array(

					'category' => array(

						'type' => 'select_category',

						'label' => __('Courses Category', 'academy'),

						'taxonomy' => 'course_category',

					),

					'number' => array(

						'std' => '4',

						'type' => 'text',

						'label' => __('Courses Number', 'academy'),

					),					

					'order' => array(

						'type' => 'select',

						'label' => __('Courses Order', 'academy'),

						'options' => array(

							'date' => __('Date', 'academy'),

							'title' => __('Title', 'academy'),

							'users' => __('Users', 'academy'),

							'rand' => __('Random', 'academy'),

						)

					),

					'columns' => array(

						'type' => 'select',

						'label' => __('Columns Number', 'academy'),

						'options' => array(

							'1' => __('One', 'academy'),

							'2' => __('Two', 'academy'),

							'3' => __('Three', 'academy'),

							'4' => __('Four', 'academy'),

						)

					),

				),

				'shortcode' => '[courses category="{{category}}" number="{{number}}" columns="{{columns}}" order="{{order}}"]',		

				'popup_title' => __('Insert Courses Shortcode', 'academy')

			),

			

			//Plan

			'plan' => array(

				'options' => array(

					'category' => array(

						'type' => 'select_post',						

						'label' => __('Plan', 'academy'),

						'post_type' => 'plan',

					),

				),

				'shortcode' => '[plan id="{{category}}"]',

				'popup_title' => __('Insert Plan Shortcode', 'academy')

			),

			

			'posts' => array(

				'options' => array(

					'category' => array(

						'type' => 'select_category',

						'label' => __('Posts Category', 'academy'),

						'taxonomy' => 'category',

					),

					'number' => array(

						'std' => '4',

						'type' => 'text',

						'label' => __('Posts Number', 'academy'),

					),					

					'order' => array(

						'type' => 'select',

						'label' => __('Posts Order', 'academy'),

						'options' => array(

							'date' => __('Date', 'academy'),

							'rand' => __('Random', 'academy'),

						)

					),

				),

				'shortcode' => '[posts category="{{category}}" number="{{number}}" order="{{order}}"]',		

				'popup_title' => __('Insert Posts Shortcode', 'academy')

			),

			

			//Tabs

			'tabs' => array(

				'options' => array(

					'type' => array(

							'type' => 'select',

							'label' => __('Tabs Type', 'academy'),

							'options' => array(

								'horizontal' => __('Horizontal', 'academy'),

								'vertical' => __('Vertical', 'academy'),

						)

					),

					'titles' => array(

						'type' => 'text',

						'label' => __('Tab Titles', 'academy'),

						'desc' => __('Enter the comma separated tab titles.', 'academy')

					),		

				),

				'shortcode' => '[tabs type="{{type}}" titles="{{titles}}"]{{child_shortcode}}[/tabs]',

				'popup_title' => __('Insert Tabs Shortcode', 'academy'),

				'child_shortcode' => array(

					'options' => array(

						'content' => array(

							'std' => '',

							'type' => 'textarea',

							'label' => __('Tab Content', 'academy'),

						)

					),

					'shortcode' => '[tab]{{content}}[/tab]',

					'clone_button' => __('Add Tab', 'academy')

				)

			),

			

			//Toggles

			'toggles' => array(

				'options' => array(

					'type' => array(

							'type' => 'select',

							'label' => __('Toggles Type', 'academy'),

							'options' => array(

								'multiple' => __('Multiple', 'academy'),

								'accordion' => __('Accordion', 'academy'),

						)

					),	

				),

				'shortcode' => '[toggles type="{{type}}"]{{child_shortcode}}[/toggles]',

				'popup_title' => __('Insert Toggles Shortcode', 'academy'),

				'child_shortcode' => array(

					'options' => array(

						'title' => array(

							'std' => '',

							'type' => 'text',

							'label' => __('Toggle Title', 'academy'),

						),

						'content' => array(

							'std' => '',

							'type' => 'textarea',

							'label' => __('Toggle Content', 'academy'),

						),

					),

					'shortcode' => '[toggle title="{{title}}"]{{content}}[/toggle]',

					'clone_button' => __('Add Toggle', 'academy')

				)

			),

			

			//Toggles

			'slider' => array(

				'options' => array(

					'pause' => array(

						'std' => '0',

						'type' => 'text',

						'label' => __('Slider Pause', 'academy'),

					),

					'speed' => array(

						'std' => '400',

						'type' => 'text',

						'label' => __('Transition Speed', 'academy'),

					),	

				),

				'shortcode' => '[slider pause="{{pause}}" speed="{{speed}}"]{{child_shortcode}}[/slider]',

				'popup_title' => __('Insert Slider Shortcode', 'academy'),

				'child_shortcode' => array(

					'options' => array(

						'url' => array(

							'std' => '',

							'type' => 'text',

							'label' => __('Slide Image', 'academy'),

						),

						'content' => array(

							'std' => '',

							'type' => 'textarea',

							'label' => __('Slide Caption', 'academy'),

						),

					),

					'shortcode' => '[slide url="{{url}}"]{{content}}[/slide]',

					'clone_button' => __('Add Slide', 'academy')

				)

			),

			

			//Testimonials

			'testimonials' => array(

				'options' => array(

					'number' => array(

						'std' => '3',

						'type' => 'text',

						'label' => __('Testimonials Number', 'academy'),

					),

					'order' => array(

						'type' => 'select',

						'label' => __('Testimonials Order', 'academy'),

						'options' => array(

							'date' => __('Date', 'academy'),

							'rand' => __('Random', 'academy'),

						)

					),

				),

				'shortcode' => '[testimonials number="{{number}}" order="{{order}}"]',

				'popup_title' => __('Insert Testimonials Shortcode', 'academy')

			),

			

			//Users

			'users' => array(

				'options' => array(

					'number' => array(

						'std' => '3',

						'type' => 'text',

						'label' => __('Users Number', 'academy'),

					),

					'order' => array(

						'type' => 'select',

						'label' => __('Users Order', 'academy'),

						'options' => array(

							'date' => __('Date', 'academy'),														

							'name' => __('Name', 'academy'),	

							'activity' => __('Activity', 'academy'),							

						)

					),

				),

				'shortcode' => '[users number="{{number}}" order="{{order}}"]',

				'popup_title' => __('Insert Users Shortcode', 'academy')

			),	

			

			//Google Map

			'map' => array(

				'no_preview' => true,

				'options' => array(

					'latitude' => array(

						'type' => 'text',

						'label' => __('Latitude', 'academy'),

					),

					'longitude' => array(

						'type' => 'text',

						'label' => __('Longitude', 'academy'),

					),

					'zoom' => array(

						'type' => 'text',

						'label' => __('Zoom', 'academy'),

					),

					'height' => array(

						'type' => 'text',

						'std' => '250',

						'label' => __('Height', 'academy'),

					),

					'description' => array(

						'type' => 'textarea',

						'std' => '',

						'label' => __('Description', 'academy'),

					),

				),

				'shortcode' => '[map latitude="{{latitude}}" longitude="{{longitude}}" zoom="{{zoom}}" description="{{description}}" height="{{height}}"]',

				'popup_title' => __('Insert Map Shortcode', 'academy')

			),

			

			//Block

			'block' => array(

				'options' => array(

					'title' => array(

						'std' => '',

						'type' => 'text',

						'label' => __('Block Title', 'academy'),

					),

					'content' => array(

						'std' => '',

						'type' => 'textarea',

						'label' => __('Block Content', 'academy'),

					),

				),

				'shortcode' => '[block title="{{title}}"]{{content}}[/block]',			

				'popup_title' => __('Insert Block Shortcode', 'academy')

			),

			

			//Player

			'player' => array(

				'options' => array(

					'url' => array(

						'std' => '',

						'type' => 'text',

						'label' => __('File URL', 'academy'),

					),

					'content' => array(

						'std' => '',

						'type' => 'text',

						'label' => __('File Title', 'academy'),

					),

				),

				'shortcode' => '[player url="{{url}}"]{{content}}[/player]',			

				'popup_title' => __('Insert Media Player Shortcode', 'academy')

			),

			

			//Contact Form

			'contact_form' => array(

				'shortcode' => '[contact_form]',

				'popup_title' => __('Insert Contact Form Shortcode', 'academy')

			),

		

		),

		

		//Theme custom styles

		'custom_styles' => array (

			array(

				'elements' => '.featured-content',

				'attributes' => array('background-image'=>'background_pattern'),

			),

			

			array(

				'elements' => '.featured-content',

				'attributes' => array('background-image'=>'background_image'),

			),

		

			array(

				'elements' => 'body, input, select, textarea',

				'attributes' => array('font-family'=>'content_font'),

			),

			

			array(

				'elements' => 'h1,h2,h3,h4,h5,h6, .header-navigation div > ul > li > a',

				'attributes' => array('font-family'=>'heading_font'),

			),

			

			array(

				'elements' => '.button.dark, .jp-gui, .jp-controls a, .jp-video-play-icon, .header-wrap, .header-navigation ul ul, .select-menu, .search-form, .mobile-search-form, .login-button .tooltip-text, .footer-wrap, .site-footer:after, .site-header:after, .widget-title',

				'attributes' => array('background-color'=>'header_color'),

			),

			

			array(

				'elements' => '.jp-jplayer',

				'attributes' => array('border-color'=>'header_color'),

			),

			

			array(

				'elements' => '.widget-title',

				'attributes' => array('border-bottom-color'=>'header_color'),

			),

			

			array(

				'elements' => 'input[type="submit"], input[type="button"], .button, .jp-play-bar, .jp-volume-bar-value, .free-course .course-price .price-text, .lessons-listing .lesson-attachments a, ul.styled-list.style-4 li:before, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce #content input.button.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, .woocommerce-page #respond input#submit.alt, .woocommerce-page #content input.button.alt, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce #content input.button.alt:hover, .woocommerce-page a.button.alt:hover, .woocommerce-page button.button.alt:hover, .woocommerce-page input.button.alt:hover, .woocommerce-page #respond input#submit.alt:hover, .woocommerce-page #content input.button.alt:hover',

				'attributes' => array('background-color'=>'primary_color'),

			),

			

			array(

				'elements' => '.free-course .course-price .corner',

				'attributes' => array('border-top-color'=>'primary_color'),

			),

			

			array(

				'elements' => '.free-course .course-price .corner',

				'attributes' => array('border-right-color'=>'primary_color'),

			),

			

			array(

				'elements' => '.button.secondary, .quiz-listing .question-number, .lessons-listing .lesson-title .course-status, .course-price .price-text, .course-price .corner, .course-progress span, .questions-listing .question-replies, .course-price .corner-background, .user-links a:hover, .payment-listing .expanded .toggle-title:before, .styled-list.style-5 li:before, .faq-toggle .toggle-title:before, ul.styled-list.style-1 li:before, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce #content input.button, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce-page #respond input#submit, .woocommerce-page #content input.button, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit:hover, .woocommerce #content input.button:hover, .woocommerce-page a.button:hover, .woocommerce-page button.button:hover, .woocommerce-page input.button:hover, .woocommerce-page #respond input#submit:hover, .woocommerce-page #content input.button:hover',

				'attributes' => array('background-color'=>'secondary_color'),

			),

			

			array(

				'elements' => 'a, a:hover, a:focus, ul.styled-list li > a:hover',

				'attributes' => array('color'=>'secondary_color'),

			),

			

			array(

				'elements' => '::-moz-selection',

				'attributes' => array('background-color'=>'primary_color'),

			),

			

			array(

				'elements' => '::selection',

				'attributes' => array('background-color'=>'primary_color'),

			),

		

		),

	),



	

	//Options

	'options' => array (

			

		//General Settings

		array(	'name' => __('General','academy'),

				'type' => 'page'),

				

		array(	'name' => __('Site Favicon','academy'),

				'description' => __('Upload an image for your site favicon.','academy'),

				'id' => 'favicon',

				'type' => 'uploader'),

				

		array(	'name' => __('Site Logo Type','academy'),

				'id' => 'logo_type',

				'options' => array('image' => __('Image','academy'), 'text' => __('Text','academy')),

				'type' => 'select'),

				

		array(	'name' => __('Site Logo Image','academy'),

				'description' => __('Upload an image for your site logo.','academy'),

				'id' => 'logo_image',

				'type' => 'uploader',

				'parent' => array('logo_type','0')),

				

		array(	'name' => __('Site Logo Text','academy'),

				'description' => __('Enter the text for your site logo.','academy'),

				'id' => 'logo_text',

				'type' => 'text',

				'parent' => array('logo_type','1')),

				

		array(	'name' => __('Login Logo Image','academy'),

				'description' => __('Upload an image to show on the login page.','academy'),

				'id' => 'login_logo',

				'type' => 'uploader'),

				

		array(	'name' => __('Copyright Text','academy'),

				'description' => __('Enter the copyright text to be displayed in the footer.','academy'),

				'id' => 'copyright_text',

				'default' => '',

				'type' => 'textarea'),

				

		array(	'name' => __('Tracking Code','academy'),

				'description' => __('Add tracking analytics code here.','academy'),

				'id' => 'tracking_code',

				'default' => '',

				'type' => 'textarea'),
		
		array(	'name' => __('دسته دوره های پر فروش','academy'),

							'desc' => __('انتخاب دسته دوره های پر فروش','academy'),

							'id' => 'categorysell',

							'type' => 'select_category',

							'show_option_none' => true,

							'taxonomy' => 'course_category'),
		
		
		array(	'name' => __('دسته دوره های حذفی از جستجوها','academy'),

							'desc' => __('انتخاب دسته دوره های حذفی از جستجوهای سایت','academy'),

							'id' => 'categoryexc',

							'type' => 'select_category',

							'show_option_none' => true,

							'taxonomy' => 'course_category'),	
		
		array(	'name' => __('کد api اسکای روم','academy'),


				'id' => 'skyapi_code',

				'default' => '',

				'type' => 'text'),		

				

		//Styling

		array(	'name' => __('Styling','academy'),

				'type' => 'page'),

								

		array(	'name' => __('Primary Theme Color','academy'),

				'default' => '#f3715d',

				'id' => 'primary_color',

				'type' => 'color'),

				

		array(	'name' => __('Secondary Theme Color','academy'),

				'default' => '#5ea5d7',

				'id' => 'secondary_color',

				'type' => 'color'),

				

		array(	'name' => __('Header Background Color','academy'),

				'default' => '#3d4e5b',

				'id' => 'header_color',

				'type' => 'color'),

				

		array(	'name' => __('Background Type','academy'),

				'id' => 'background_type',

				'options' => array('default' => __('Default','academy'), 'custom' => __('Custom','academy')),

				'description' => __('Choose from the default patterns or upload your own image.','academy'),

				'type' => 'select'),

				

		array(	'name' => __('Background Pattern','academy'),

				'id' => 'background_pattern',

				'options' => array(

					THEMEX_URI.'admin/images/patterns/pattern_1.png'=>THEMEX_URI.'admin/images/patterns/pattern_1_thumb.png', 

					THEMEX_URI.'admin/images/patterns/pattern_2.png'=>THEMEX_URI.'admin/images/patterns/pattern_2_thumb.png', 

					THEMEX_URI.'admin/images/patterns/pattern_3.png'=>THEMEX_URI.'admin/images/patterns/pattern_3_thumb.png', 

					THEMEX_URI.'admin/images/patterns/pattern_4.png'=>THEMEX_URI.'admin/images/patterns/pattern_4_thumb.png', 

					THEMEX_URI.'admin/images/patterns/pattern_5.png'=>THEMEX_URI.'admin/images/patterns/pattern_5_thumb.png', 

					THEMEX_URI.'admin/images/patterns/pattern_6.png'=>THEMEX_URI.'admin/images/patterns/pattern_6_thumb.png', 

					THEMEX_URI.'admin/images/patterns/pattern_7.png'=>THEMEX_URI.'admin/images/patterns/pattern_7_thumb.png', 

					THEMEX_URI.'admin/images/patterns/pattern_8.png'=>THEMEX_URI.'admin/images/patterns/pattern_8_thumb.png', 

					THEMEX_URI.'admin/images/patterns/pattern_9.png'=>THEMEX_URI.'admin/images/patterns/pattern_9_thumb.png', 

					THEMEX_URI.'admin/images/patterns/pattern_10.png'=>THEMEX_URI.'admin/images/patterns/pattern_10_thumb.png', 

					THEMEX_URI.'admin/images/patterns/pattern_11.png'=>THEMEX_URI.'admin/images/patterns/pattern_11_thumb.png', 

					THEMEX_URI.'admin/images/patterns/pattern_12.png'=>THEMEX_URI.'admin/images/patterns/pattern_12_thumb.png', 

					THEMEX_URI.'admin/images/patterns/pattern_13.png'=>THEMEX_URI.'admin/images/patterns/pattern_13_thumb.png', 

					THEMEX_URI.'admin/images/patterns/pattern_14.png'=>THEMEX_URI.'admin/images/patterns/pattern_14_thumb.png', 

					THEMEX_URI.'admin/images/patterns/pattern_15.png'=>THEMEX_URI.'admin/images/patterns/pattern_15_thumb.png', 

					THEMEX_URI.'admin/images/patterns/pattern_16.png'=>THEMEX_URI.'admin/images/patterns/pattern_16_thumb.png', 

				),

				'type' => 'select_image',				

				'parent' => array('background_type','0')),

				

		array(	'name' => __('Background Image','academy'),

				'id' => 'background_image',

				'type' => 'uploader',

				'parent' => array('background_type','1')),

				

		array(	'name' => __('Tiled Background','academy'),

				'id' => 'background_tiled',

				'description' => __('Check this to use tiled background instead of the full width image.','academy'),

				'type' => 'checkbox'),

					

		array(	'name' => __('Heading Font','academy'),					

				'id' => 'heading_font',

				'default' => 'Crete Round',

				'options' => array(

					'Arial' => 'Arial',					

					'Helvetica' => 'Helvetica',

				),

				'type' => 'select_font'),

				

		array(	'name' => __('Content Font','academy'),

				'id' => 'content_font',

				'default' => 'Open Sans',

				'options' => array(

					'Arial' => 'Arial',					

					'Helvetica' => 'Helvetica',

				),

				'type' => 'select_font'),

				

		array(	'name' => __('Custom CSS','academy'),

				'description' => __('Write CSS rules here to overwrite the default styles.','academy'),

				'default' => '',

				'id' => 'css',

				'type' => 'textarea'),

				

		//Header

		array(	'name' => __('Header','academy'),

				'type' => 'page'),

				

			array(	'name' => __('Share Button Code','academy'),

					'description' => __('Add any share buttons code here.','academy'),

					'id' => 'share_code',

					'default' => '',

					'type' => 'textarea'),

				

			array(	'name' => __('Slider','academy'),

				'type' => 'section'),

				

			array(	'name' => __('Slider Type','academy'),

					'id' => 'slider_type',

					'options' => array(

						'slide' => __('Stretched Slider','academy'),

						'fade' => __('Boxed Slider','academy'), 						

					),

					'type' => 'select'),

					

			array(	'name' => __('Disable Parallax Effect','academy'),

				'id' => 'slider_parallax',

				'type' => 'checkbox',

				'parent' => array('slider_type','0')),

					

			array(	'name' => __('Slider Pause','academy'),

					'default' => '0',

					'id' => 'slider_pause',

					'attributes' => array('min_value' => '0', 'max_value' => '20000', 'unit' => 'ms'),

					'type' => 'slider'),

					

			array(	'name' => __('Transition Speed','academy'),

					'default' => '1000',

					'id' => 'slider_speed',

					'attributes' => array('min_value' => '100', 'max_value' => '2000', 'unit' => 'ms'),

					'type' => 'slider'),

					

		//Courses

		array(	'name' => __('Courses','academy'),

				'type' => 'page'),

				

			array(	'name' => __('Courses View','academy'),

					'id' => 'course_view',

					'options' => array(

						'grid' => __('Grid','academy'),

						'list' => __('List','academy'), 						

					),

					'type' => 'select'),

		

			array(	

				'name' => __('Courses Layout','academy'),

				'id' => 'course_layout_grid',

				'options' => array(								

					'two'=>THEMEX_URI.'admin/images/layouts/7.jpg',
					
					'three'=>THEMEX_URI.'admin/images/layouts/6.png',

					'four'=>THEMEX_URI.'admin/images/layouts/5.png',

				),

				'type' => 'select_image',

				'parent' => array('course_view','0'),

			),

			

			array(	

				'name' => __('Courses Layout','academy'),

				'id' => 'course_layout_list',

				'options' => array(								

					'right'=>THEMEX_URI.'admin/images/layouts/3.png',

					'left'=>THEMEX_URI.'admin/images/layouts/2.png',

				),

				'type' => 'select_image',

				'parent' => array('course_view','1'),

			),

			

			array(	'name' => __('Courses Per Page','academy'),

				'id' => 'course_limit',

				'default' => '12',

				'description' => __('Number of courses to show per page.','academy'),

				'type' => 'number' ),

				

			array(	'name' => __('Students Per Course','academy'),

				'id' => 'course_users_limit',

				'default' => '9',

				'description' => __('Number of students to show on the course page.','academy'),

				'type' => 'number' ),

				

			array(	'name' => __('Questions Per Course','academy'),

				'id' => 'course_questions_number',

				'default' => '7',

				'description' => __('Number of questions to show on the course page.','academy'),

				'type' => 'number' ),



			array(	'name' => __('Disable Retaking Lessons','academy'),

				'id' => 'course_retake',

				'type' => 'checkbox'),

				

			array(	'name' => __('Disable Unsubscribing','academy'),

				'id' => 'course_unsubscribe',

				'type' => 'checkbox'),

				

			array(	'name' => __('Hide Course Rating','academy'),

				'id' => 'course_rating',

				'type' => 'checkbox'),



			array(	'name' => __('Hide Course Icones','academy'),

				'id' => 'course_icon',

				'type' => 'checkbox'),				

				

			array(	'name' => __('Hide Student Profiles','academy'),

				'id' => 'course_users',

				'type' => 'checkbox'),

				

			array(	'name' => __('Hide Students Number','academy'),

				'id' => 'course_users_number',

				'type' => 'checkbox'),

				

			array(	'name' => __('Hide Student Courses','academy'),

				'id' => 'user_courses',

				'type' => 'checkbox'),

				

			array(	'name' => __('Hide Related Courses','academy'),

				'id' => 'course_related',

				'type' => 'checkbox'),

				

		//Users

		array(	'name' => __('Users','academy'),

				'type' => 'page'),

				

			array(	'type' => 'themex_user',

					'id' => 'user_settings' ),

					

		//Blog

		array(	'name' => __('Blog','academy'),

				'type' => 'page'),

					

			array(	'name' => __('Blog Layout','academy'),

					'id' => 'blog_layout',

					'options' => array(									

						'right'=>THEMEX_URI.'admin/images/layouts/3.png',

						'left'=>THEMEX_URI.'admin/images/layouts/2.png',

					),

					'type' => 'select_image'),

					

			array(	'name' => __('Hide Post Author','academy'),

				'id' => 'blog_author',

				'type' => 'checkbox'),

				

			array(	'name' => __('Hide Single Post Image','academy'),

				'id' => 'blog_image',

				'type' => 'checkbox'),

		

		//Contact Form

		array(	'name' => __('Contact Form','academy'),

				'type' => 'page'),

				

			array(	'type' => 'themex_form',

					'id' => 'contact_form' ),	

					

		array(	'name' => __('Checkout Form','academy'),

				'type' => 'page'),

				

			array(	'type' => 'themex_woo',

					'id' => 'checkout_form' ),



		//Custom Sidebars

		array(	'name' => __('Sidebars','academy'),

				'type' => 'page'),

				

			array(	'type' => 'themex_widgetiser',

					'id' => 'themex_widgetiser' ),

					

	),



);