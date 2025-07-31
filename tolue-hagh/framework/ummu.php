<?php
 // 5- remove update notification
add_action('admin_menu','wphidenag');
function wphidenag() {
	remove_action( 'admin_notices', 'update_nag', 3 );
}
// 6- ummu footer copyright
function remove_footer_admin () {
	echo '&copy; فناوری اطلاعات ام البنین (س) <a target="_blank" href="http://ummu.ir" > ummu.ir </a>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

//8-remove admin bar
function wps_admin_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('about');
    $wp_admin_bar->remove_menu('wporg');
    $wp_admin_bar->remove_menu('documentation');
    $wp_admin_bar->remove_menu('support-forums');
    $wp_admin_bar->remove_menu('feedback');
    $wp_admin_bar->remove_menu('view-store');
	$wp_admin_bar->remove_menu('updates');
	$wp_admin_bar->remove_menu('new-quiz');
	$wp_admin_bar->remove_menu('new-plan');
	
	
}
add_action( 'wp_before_admin_bar_render', 'wps_admin_bar' ,0 );



// add custom meta box in Course post type
abstract class WPOrg_Meta_Box
{
	protected static $newMetas = 
					array(
						 array(
							'boxid' => 'wpcf-curse_date',
							'boxtitle' => 'زمان دوره',
							'callback' => [self::class, 'html'],
							'posttype' => 'course',
							'label' => 'زمان کلاس'
						),
			
						 array(
							'boxid' => 'wpcf-curse_date1',
							'boxtitle' => '',
							'callback' => [self::class, 'html'],
							'posttype' => 'course',
							'label' => 'تعداد جلسات'							 
						),
						array(
							'boxid' => 'wpcf-curse_date2',
							'boxtitle' => '',
							'callback' => [self::class, 'html'],
							'posttype' => 'course',
							'label' => 'نوع دوره'							 
						),
					);
	
    public static function add()
    {
		$metaids = WPOrg_Meta_Box::$newMetas;
		
		foreach ($metaids as $metaid){
			add_meta_box(
				$metaid['boxid'],          // Unique ID
				$metaid['boxtitle'], // Box title
				$metaid['callback'],   // Content callback, must be of type callable
				$metaid['posttype'],                  // Post type
				'advanced',          // where the boxes should display
				'high' //priority
			);
		}

    }
 
    public static function save($post_id)
    {
		
		$metaids = WPOrg_Meta_Box::$newMetas;
		foreach ($metaids as $metaid){
			if (isset( $_POST[$metaid['boxid']] )){		
				update_post_meta(
					$post_id,
					$metaid['boxid'],
					$_POST[$metaid['boxid']]
				);
			}
		}
    }
    public static function html($post)
    {
		$metaids = WPOrg_Meta_Box::$newMetas;
 
		foreach ($metaids as $metaid){
			$value = get_post_meta($post->ID, $metaid['boxid'], true);
			?>
			<label style="display: block; font-weight: bold;" for="wporg_field"><?php echo $metaid['label']; ?></label>
			<input style="display: block; width: 100%;" type="text" id="<?php echo $metaid['boxid']; ?>" name="<?php echo $metaid['boxid']; ?>" value="<?php echo $value ; ?>" />
			<br>
        <?php 
			
		}

    }
}
    
add_action('add_meta_boxes', ['WPOrg_Meta_Box', 'add'] );
add_action('save_post', ['WPOrg_Meta_Box', 'save']);

 ?>