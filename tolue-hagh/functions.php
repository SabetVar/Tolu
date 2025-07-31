<?php
// Change the "Return to Shop" URL to the homepage
function custom_return_to_shop_url() {
    return home_url('/'); // Redirect to the homepage
}
add_filter('woocommerce_return_to_shop_redirect', 'custom_return_to_shop_url');


// ummu get user phone and digits

function get_phone_user_migrate($user){

	if (isset($user->digits_phone)){
		
		if($user->digits_phone !=''){
			
			$phonenu= $user->digits_phone;
			
		} else{
			$phonenu=$user->billing_phone;
		}
		
	} else {
		
		$phonenu=$user->billing_phone;
		
	}
	return $phonenu;
	
}

// ummu redirect single download page to home

add_action( 'template_redirect', 'download_redirect_post' );

function download_redirect_post() {
  $queried_post_type = get_query_var('post_type');
  if ( is_single() &&  $queried_post_type == 'wpdmpro' ) {
    wp_redirect( home_url(), 301 );
    exit;
  }
}

// ummu add plan category to course admin menu

    add_action( 'admin_menu', 'plancat_menu' );
    add_action( 'parent_file', 'menu_highlight' );

    function plancat_menu() {
        add_submenu_page( 'edit.php?post_type=course', 'دسته پلان ها', 'دسته پلان ها', 'manage_categories', 'edit-tags.php?taxonomy=plan_category');
    }

    function menu_highlight( $parent_file ) {
        global $current_screen;

        $taxonomy = $current_screen->taxonomy;
        if ( $taxonomy == 'plan_category' ) {
            $parent_file = 'edit.php?post_type=course';
        }

        return $parent_file;
    }

//ummu multi autors
function list_multi_autors() {			
			$icount = 1 ;
			if (class_exists('CoAuthorsIterator')) {
				$i = new CoAuthorsIterator();
				$icount = $i->count();
			}	 
			if ( function_exists( 'coauthors_posts_links' ) && $icount > 1 ) {	
				echo '<div class="ci authors">' ;
				coauthors_posts_links(' ، ', ' ، ');
				echo '</div>';								
			} else {
            	echo '<a href="'. ThemexCourse::$data['course']['author']->user_link .'" class="ci author nicon" title=" نمایش صفحه استاد '. ThemexCourse::$data['course']['author']->full_name. '">'. ThemexCourse::$data['course']['author']->full_name .'</a>';
 			}
}

//ummu multi autors
function list_multi_autors_table() {			
			$icount = 1 ;
			if (class_exists('CoAuthorsIterator')) {
				$i = new CoAuthorsIterator();
				$icount = $i->count();
			}	 
			if ( function_exists( 'coauthors_posts_links' ) && function_exists( 'coauthors_posts_links_lastname' ) && $icount > 1 ) {		
				coauthors_posts_links_lastname(' ، ', ' ، ');
			} else {
				echo '<a target="_blank" href="'.ThemexCourse::$data['course']['author']->user_link .'" class="ci author nicon" title=" نمایش صفحه استاد '. ThemexCourse::$data['course']['author']->full_name .'">'. get_avatar(ThemexCourse::$data['course']['author']->ID) .'</a>';
 			}
}

// ummu remove defult admin bar height
add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );

// ummu remove space aloow from username

add_filter('validate_username' , 'custom_validate_username', 10, 2);
function custom_validate_username($valid, $username ) {
		if (preg_match("/\\s/", $username)) {
   			// there are spaces
			return $valid=false;
		}
	return $valid;
}

//Define constants
define('SITE_URL', home_url().'/');
define('AJAX_URL', admin_url('admin-ajax.php'));
define('THEME_PATH', get_template_directory().'/');
define('THEME_URI', get_template_directory_uri().'/');
define('THEME_CSS_URI', get_stylesheet_directory_uri().'/');
define('THEMEX_PATH', THEME_PATH.'framework/');
define('THEMEX_URI', THEME_URI.'framework/');

//Set content width
$content_width=1140;

//Load language files
load_theme_textdomain('academy', THEME_PATH.'languages');

//Include theme functions
include(THEMEX_PATH.'functions.php');

//Include theme configuration file
include(THEMEX_PATH.'config.php');

//Include core class
include(THEMEX_PATH.'classes/themex.core.php');

// woo rial
 
add_filter( 'woocommerce_currencies', 'add_my_currency' );

function add_my_currency( $currencies ) {
$currencies['IRR'] = __( 'ریال', 'woocommerce' );
$currencies['IRT'] = __( 'تومان', 'woocommerce' );
return $currencies;
}
add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);
function add_my_currency_symbol( $currency_symbol, $currency ) {
switch( $currency ) {
case 'IRR': $currency_symbol = 'ریال'; break;
case 'IRT': $currency_symbol = 'تومان'; break;
}
return $currency_symbol;
}
//woo

/**
 * Add the field to the checkout
 **/
/* add_action('woocommerce_after_order_notes', 'my_custom_checkout_field');

function my_custom_checkout_field( $checkout ) {

    echo '<div id="my_custom_checkout_field">';

    woocommerce_form_field( 'my_field_name', array(
        'type'          => 'text',
        'class'         => array('my-field-class form-row-wide'),
        'label'         => __('Fill in this field'),
        'placeholder'       => __('شماره ملی'),
        ), $checkout->get_value( 'my_field_name' ));

    echo '</div>';

}

/**
 * Process the checkout
 **/
/* add_action('woocommerce_checkout_process', 'my_custom_checkout_field_process');

function my_custom_checkout_field_process() {
    global $woocommerce;

    // Check if set, if its not set add an error.
    if (!$_POST['my_field_name'])
         $woocommerce->add_error( __('لطفاً شماره کارت ملی خود را وارد نمایید..') );
}

/**
 * Update the order meta with field value
 **/
/* add_action('woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta');

function my_custom_checkout_field_update_order_meta( $order_id ) {
    if ($_POST['my_field_name']) update_post_meta( $order_id, 'My Field', esc_attr($_POST['my_field_name']));
}

/**
* Display field value on the order edition page
**/
/* add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );
 
function my_custom_checkout_field_display_admin_order_meta($order){
echo '<p><strong>'.__('ش شناسنامه').':</strong> ' . $order->order_custom_fields['My Field'][0] . '</p>';
}
*/
// user view in site

function teacher_cat_item() {
	$items= array('1' => 'فرهنگ، هنر، رسانه و سبک زندگی','2'=>'اقتصاد و مدیریت','3'=>'سیاست و تاریخ','4'=>'فلسفه، حقوق و علوم اجتماعی');
	return $items;
	}

 
add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );

function extra_user_profile_fields( $user ) { ?>
<table class="form-table">

<?php if ( current_user_can('administrator') ) { ?>
<tr>
<th><label for="teacher_u"><?php _e("پروفایل استاد"); ?></label></th>
<td>
<input type="checkbox" name="teacher_u" id="teacher_u" value="yes" <?php if (esc_attr( get_the_author_meta( "teacher_u", $user->ID )) == "yes") echo "checked"; ?> /> <br />
<span class="description"><?php _e("در صورتی که این کاربر استاد موسسه است این گزینه را تیک بزنید."); ?></span>
</td>
</tr> 

<tr>
<th><label for="teacher_cat"><?php _e("دسته بندی اساتید"); ?></label></th>
<td>
<select name="teacher_cat" id="teacher_cat">
	
	<?php $i= 1; 
	foreach (teacher_cat_item() as $key => $item ) { ?>
    <option value="<?php echo $key ; ?>" <?php if (esc_attr( get_the_author_meta( "teacher_cat", $user->ID )) == "$key") echo 'selected="selected"'; ?> ><?php echo $item ; ?></option>
    <?php }; ?> 
    
</select> <br />
<span class="description"><?php _e("دسته استاد را مشخص کنید"); ?></span>
</td>
</tr>  
 
<?php };?>

<tr>
<th><label for="viewProfile"><?php _e("عدم نمایش  عمومی پروفایل"); ?></label></th>
<td>
<input type="checkbox" name="viewProfile" id="viewProfile" value="yes" <?php if (esc_attr( get_the_author_meta( "viewProfile", $user->ID )) == "yes") echo "checked"; ?> /> <br />
<span class="description"><?php _e("در صورتی که نمیخواهید پروفایل شما در صفحه دوره ها نمایش داده شود، این تیک را بگذارید."); ?></span>

</td>
</tr>        

<tr>
<th><label for="user_uni"><?php _e("دانشگاه"); ?></label></th>
<td>
<input  type="text" name="user_uni" id="user_uni" value="<?php echo get_the_author_meta( "user_uni", $user->ID ) ?>" placeholder="<?php _e('دانشگاه','academy'); ?>" /> <br />
</td>
</tr>   

<tr>
<th><label for="user_field"><?php _e("رشته تحصیلی"); ?></label></th>
<td>
<input  type="text" name="user_field" id="user_field" value="<?php echo get_the_author_meta( "user_field", $user->ID ) ?>" placeholder="<?php _e('رشته تحصیلی','academy'); ?>" /> <br />
</td>
</tr>  

<tr>
<th><label for="user_age"><?php _e("سن"); ?></label></th>
<td>
<input  type="text" id ="user_age" name="user_age" value="<?php echo get_the_author_meta( "user_age", $user->ID ) ?>" placeholder="<?php _e('سن','academy'); ?>" /> <br />
</td>
</tr>

<tr>
<th><label for="user_city"><?php _e("شهر محل سکونت"); ?></label></th>
<td>
<input  type="text" name="user_city" id="user_city" value="<?php echo get_the_author_meta( "user_city", $user->ID ) ?>" placeholder="<?php _e('شهر محل سکونت','academy'); ?>" /> <br />
</td>
</tr>    


<tr>
<th><label for="user_job"><?php _e("شغل"); ?></label></th>
<td>
<input  type="text" name="user_job" id="user_job" value="<?php echo get_the_author_meta( "user_job", $user->ID ) ?>" placeholder="<?php _e('شغل','academy'); ?>" /> <br />
</td>
</tr>

<tr>
<th><label for="user_job"><?php _e("جنسیت"); ?></label></th>
<td>
<label class="radio-inline">               			
                      <input type="radio" name="user_gender" value="male" <?php if(ThemexUser::$data['user']->user_gender == 'male' ) echo 'checked'; ?> > مرد 
                  </label>
                  
                  <label class="radio-inline">               			                  
                      <input type="radio" name="user_gender" value="female" <?php if(ThemexUser::$data['user']->user_gender == 'female' ) echo 'checked'; ?>> زن 
                  </label> <br />
</td>
</tr>  
        
</table>
<?php }

add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {

if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }

update_user_meta( $user_id, 'viewProfile', $_POST['viewProfile'] );
update_user_meta( $user_id, 'user_uni', $_POST['user_uni'] );
update_user_meta( $user_id, 'user_field', $_POST['user_field'] );
update_user_meta( $user_id, 'user_age', $_POST['user_age'] );
update_user_meta( $user_id, 'user_city', $_POST['user_city'] );
update_user_meta( $user_id, 'user_job', $_POST['user_job'] );
update_user_meta( $user_id, 'user_gender', $_POST['user_gender'] );
if ( current_user_can('administrator') ) { 
update_user_meta( $user_id, 'teacher_u', $_POST['teacher_u'] );
update_user_meta( $user_id, 'teacher_cat', $_POST['teacher_cat'] );

};
}
 
function admin_css()
{
echo '<link rel="stylesheet" type="text/css" href="'.THEME_URI.'admin.css">';
}
add_action( 'admin_head', 'admin_css' );

//

function woo_order_extra_columns($columns)
{
$newcolumns = array(
"cb" => "<input type = \"checkbox\" />",
"order_ID" => esc_html__('ID', 'woocommerce'),
);
$columns = array_merge($newcolumns, $columns);
return $columns;
}
add_filter("manage_edit-shop_order_columns", "woo_order_extra_columns");
/**
* Charge Order Columns Content
*
* @access public
* @since 1.0
* @return
*/
function woo_order_extra_columns_content($column)
{
global $post;
$order_id = $post->ID;
switch ($column)
{
case "order_ID":
echo $order_id;
break;	
}
}
add_action("manage_posts_custom_column", "woo_order_extra_columns_content");
//

/**
 * Check if a specific product category is in the cart
 */
function wc_ninja_category_is_in_the_cart() {
	// Add your special category slugs here
	$categories = array( 'baste');
	// Products currently in the cart
	$cart_ids = array();
	// Categories currently in the cart
	$cart_categories = array();
	// Find each product in the cart and add it to the $cart_ids array
$product=WC()->cart->get_cart();

$product=reset($product);

$productID=$product['product_id'];

	// Connect the products in the cart w/ their categories
 
		$products_categories = get_the_terms( $productID, 'product_cat' );
		
		if (is_array($products_categories)) {
		// Loop through each product category and add it to our $cart_categories array
			foreach ( $products_categories as $products_category ) {
				$cart_categories[] = $products_category->slug;
			}
		}
 

	// If one of the special categories are in the cart, return true.
	if ( ! empty( array_intersect( $categories, $cart_categories ) ) ) {
		return true;
	} else {
		return false;
	}
}


/* Remove Woocommerce User Fields */
add_filter( 'woocommerce_billing_fields' , 'custom_override_billing_fields' );
add_filter( 'woocommerce_shipping_fields' , 'custom_override_shipping_fields' );

function custom_override_billing_fields( $fields ) {
	if ( ! wc_ninja_category_is_in_the_cart() ) {	
	  unset($fields['billing_state']);
	  unset($fields['billing_country']);
	  unset($fields['billing_company']);
	  unset($fields['billing_address_1']);
	  unset($fields['billing_address_2']);
	  unset($fields['billing_postcode']);
	  unset($fields['billing_city']);
	  $fields['billing_phone']['label'] = 'تلفن همراه';
	  //unset($fields['billing_first_name']);
	  //unset($fields['billing_last_name']);
	  //unset($fields['billing_email']);
	} else{
		unset($fields['billing_country']);
		unset($fields['billing_address_2']);
		unset($fields['billing_company']);	
		$fields['billing_phone']['label'] = 'تلفن همراه';
		
	}
	  return $fields;
}
function custom_override_shipping_fields( $fields ) {
  unset($fields['shipping_state']);
  unset($fields['shipping_country']);
  unset($fields['shipping_company']);
  unset($fields['shipping_address_1']);
  unset($fields['shipping_address_2']);
  unset($fields['shipping_postcode']);
  unset($fields['shipping_city']);
  return $fields;
}
/* End - Remove Woocommerce User Fields */

// change order fields in checkout page
add_filter( 'woocommerce_default_address_fields', 'custom_override_default_locale_fields' );
function custom_override_default_locale_fields( $fields ) {
	$fields['first_name']['priority'] = 3;
	$fields['last_name']['priority'] = 3;	
	$fields['country']['priority'] = 4;
    $fields['state']['priority'] = 5;
	$fields['city']['priority'] = 6;
    $fields['address_1']['priority'] = 7;
	$fields['address_1']['label'] = 'آدرس کامل پستی';
	$fields['phone']['label'] = 'تلفن همراه';
    return $fields;
}


add_filter('woocommerce_checkout_fields', 'custom_woocommerce_billing_fields');

function custom_woocommerce_billing_fields($fields)
{
	if ( wc_ninja_category_is_in_the_cart() ) {
		$fields['billing']['billing_mellicode'] = array(
			'label' => __('کد ملی', 'woocommerce'), // Add custom field label
			'placeholder' => _x('کد ملی ....', 'placeholder', 'woocommerce'), // Add custom field placeholder
			'required' => true, // if field is required or not
			'clear' => true, // add clear or not
			'type' => 'text', // add field type
			'class' => array('my-css')   // add class name
		);
	}

    return $fields;
}

/**
 * Display field value on the order edit page
 */
 
add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );

function my_custom_checkout_field_display_admin_order_meta($order){
    echo '<p><strong>'.__('کد ملی ').':</strong> ' . get_post_meta( $order->get_id(), '_billing_mellicode', true ) . '</p>';
}

/* Make Woocommerce Phone Field Not Required  
add_filter( 'woocommerce_billing_fields', 'wc_npr_filter_phone', 10, 1 );
function wc_npr_filter_phone( $address_fields ) {
	$address_fields['billing_phone']['required'] = false;
	return $address_fields;
}
*/
/* End - Make Woocommerce Phone Field Not Required  */



/**
* Better Limit Submissions Per Time Period by User or IP
* http://gravitywiz.com/2012/05/12/limit-ip-to-one-submission-per-time-period
*/
 
class GWSubmissionLimit {
var $_args;
function __construct($args) {
$this->_args = wp_parse_args($args, array(
'form_id' => false,
'limit' => 1,
'time_period' => 60 * 60 * 24, // must be provided in seconds: 60 seconds in a minute, 60 minutes in an hour, 24 hours in a day
'limit_message' => __('Sorry, you have reached the submission limit for this form.'),
'limit_by' => 'ip' // also accepts "user_id"
));
$form_filter = $this->_args['form_id'] ? "_{$this->_args['form_id']}" : '';
add_filter("gform_pre_render{$form_filter}", array($this, 'pre_render'));
add_filter("gform_validation{$form_filter}", array($this, 'validate'));
}
function pre_render($form) {
if( !$this->is_limit_reached($form['id']) )
return $form;
$submission_info = rgar(GFFormDisplay::$submission, $form['id']);
// if no submission, hide form
// if submission and not valid, hide form
if(!$submission_info || !rgar($submission_info, 'is_valid')) {
add_filter('gform_get_form_filter', create_function('', "return '<div class=\"limit-message\">{$this->_args['limit_message']}</div>';") );
//add_filter('gform_get_form_filter', create_function('$form_string, $form', 'return $form["id"] == ' . $form['id'] . ' ? \'<div class=\"limit-message\">' . $this->_args['limit_message'] . '</div>\' : $form_string;'), 10, 2 );
}
return $form;
}
function validate($validation_result) {
if($this->is_limit_reached($validation_result['form']['id']))
$validation_result['is_valid'] = false;
return $validation_result;
}
public function is_limit_reached($form_id) {
global $wpdb;
$limit_by = is_array($this->_args['limit_by']) ? $this->_args['limit_by'] : array($this->_args['limit_by']);
$where = array();
foreach($limit_by as $limiter) {
switch($limiter) {
case 'user_id':
$where[] = $wpdb->prepare('created_by = %s', get_current_user_id());
break;
case 'embed_url':
$where[] = $wpdb->prepare('source_url = %s', RGFormsModel::get_current_page_url());
break;
default:
$where[] = $wpdb->prepare('ip = %s', RGFormsModel::get_ip());
}
}
$where[] = $wpdb->prepare('form_id = %d', $form_id);
$where[] = $wpdb->prepare('date_created BETWEEN DATE_SUB(utc_timestamp(), INTERVAL %d SECOND) AND utc_timestamp()', $this->_args['time_period']);
$where = implode(' AND ', $where);
$sql = "SELECT count(id)
FROM {$wpdb->prefix}rg_lead
WHERE $where";
$entry_count = $wpdb->get_var($sql);
return $entry_count >= $this->_args['limit'];
}
}
 
// standard usage
foreach(array(3,4,5,6,7,8,9,10,11,12,13,14,15,16) as $form_id) {
    new GWSubmissionLimit(array(
'form_id' => $form_id,
'limit' => 3,
'time_period' => 60 * 60 * 24 * 360,
'limit_by' => 'user',
'limit_message' => 'با تشکر از شما، این فرم را قبلاً پر کرده اید.'
	));
}
// icon wp

add_action( 'wp_enqueue_scripts', 'themename_scripts' );
function themename_scripts() {
wp_enqueue_style( 'themename-style', get_stylesheet_uri(), array( 'dashicons' ), '1.0' );
}

/** changing default wordpres email settings */
 
add_filter('wp_mail_from', 'new_mail_from');
add_filter('wp_mail_from_name', 'new_mail_from_name');
 
function new_mail_from($old) {
 return 'no_reply@Toluehagh.ir';
}
function new_mail_from_name($old) {
 return 'موسسه طلوع';
}

add_filter( 'get_shortlink', function( $shortlink ) {return $shortlink;} ); 

// Remove Customer Role of Users that Pay
add_action( 'woocommerce_created_customer', 'change_role_on_purchase' );

function change_role_on_purchase($user_id) {
	
        	$user = new WP_User( $user_id );
        	// Change role
        	$user->remove_role( 'customer' );
			$user->add_role( 'subscriber' );
}

// Update Customer Data To user Profile Fields (Name And Family)
//add_action( 'woocommerce_checkout_update_user_meta', 'action_woocommerce_checkout_update_user_meta', 10, 2 ); 
add_action( 'woocommerce_checkout_update_user_meta', 'update_checkout_user_fname',10,2 );

function update_checkout_user_fname($id, $data) {
	
		if (isset($id) && $_POST['billing_first_name']) {
			 update_user_meta( $id, 'first_name', esc_attr($_POST['billing_first_name']));
		 }
		 
		if (isset($id) && $_POST['billing_last_name']) {
			 update_user_meta( $id, 'last_name', esc_attr($_POST['billing_last_name']));
		 }		 
	
}

// Remove Wordpress Products From Search

add_action( 'init', 'update_my_custom_type', 99 );
function update_my_custom_type() {
	
	global $wp_post_types;
	$posttypes = array('product','wpdmpro'); 
	
	foreach($posttypes as $posttype ){
		if ( post_type_exists( $posttype ) ) {
			// exclude from search results
			$wp_post_types[$posttype]->exclude_from_search = true;
		}
	}
}
// Sky Call API

function skyrcall($action,$args=''){
	
	require_once 'apisky/Skyroom.php';
	$skyapi = get_option( 'themex_skyapi_code' );
	$apiUrl ='https://www.skyroom.online/skyroom/api/'.$skyapi ;
	$api = new Skyroom($apiUrl);
	
	switch ($action) {
    case 'getRooms':
        $params = array();
        break;

    case 'countRooms':
        $params = array();
        break;

    case 'getRoom':
        $params = array(
            'room_id' => $args['room_id'],
        );
        break;

    case 'getRoomUrl':
        $params = array(
            'room_id' => $args['room_id'],
            'relative' => true,
            'language' => 'fa',
        );
        break;

    case 'createRoom':
        $params = array(
            'name' => $args['room_name'],
            'title' =>$args['room_title'],
            'max_users' => $args['room_max_users'],
            'guest_login' => $args['room_guest_login'],
        );
        break;

    case 'updateRoom':
        $params = array(
            'room_id' => $args['room_id'],
            'time_limit' => 3600,
            'session_duration' => 120,
        );
        break;

    case 'deleteRoom':
        $params = array(
            'room_id' => $args['room_id'],
        );
        break;

    case 'getRoomUsers':
        $params = array(
            'room_id' => $args['room_id'],
        );
        break;

    case 'addRoomUsers':
        $params = array(
            'room_id' => $args['room_id'],
            'users' => array(
                array('user_id' => $args['user_id'], 'access' => Skyroom::USER_ACCESS_NORMAL),
            ),
        );
        break;

    case 'removeRoomUsers':
        $params = array(
            'room_id' => 1,
            'users' => array(6344, 6345),
        );
        break;

    case 'updateRoomUser':
        $params = array(
            'room_id' => 1,
            'user_id' => 5,
            'access' => Skyroom::USER_ACCESS_OPERATOR,
        );
        break;

    case 'getUsers':
        $params = array();
        break;

    case 'countUsers':
        $params = array();
        break;

    case 'getUser':
        $params = array(
            'user_id' => $args['user_id'],
        );
        break;

    case 'createUser':
        $params = array(
            'username' => $args['user_username'],
            'nickname' => $args['user_nickname'],
            'password' => $args['password'],
            'email' => $args['email'],
            'fname' => $args['fname'],
            'lname' => $args['lname'],
            'is_public' => $args['is_public'],
        );
        break;

    case 'updateUser':
        $params = array(
            'user_id' => $args['user_id'],
        );
        break;

    case 'deleteUser':
        $params = array(
            'user_id' => $args['user_id'],
        );
        break;

    case 'getUserRooms':
        $params = array(
            'user_id' => $args['user_id'],
        );
        break;

    case 'addUserRooms':
        $params = array(
            'user_id' => $args['user_id'],
            'rooms' => array(
                array('room_id' => $args['room_id'], 'access' => Skyroom::USER_ACCESS_NORMAL),
            ),
        );
        break;

    case 'removeUserRooms':
        $params = array(
            'user_id' => $args['user_id'],
            'rooms' => array($args['room_id']),
        );
        break;

    case 'getLoginUrl':
        $params = array(
            'room_id' => $args['room_id'],
            'user_id' => 1802856,
            'language' => 'fa',
            'ttl' => 3000,
        );
        break;

    default:
        $params = array();
}
$result = $api->call($action, $params);
	
if (Skyroom\HttpError::IsError($result)) {
    return printf('<pre>%s (%d)</pre>', $result->getMessage(), $result->getCode());
} else {
    return $result;
}	
	
}


// course exclude from search 

function wpb_modify_search_query( $query ) {
    global $wp_the_query;
	$sellcat = get_option( 'themex_categoryexc' );
    if( $query === $wp_the_query && $query->is_search() && !current_user_can('administrator') ) {
		
		$query->set( 'post_type', 'course' );
		
        $tax_query = array(
            array(
                'taxonomy' => 'course_category',
                'field' => 'id',
                'terms' => $sellcat,
                'operator' => 'NOT IN',
            )
        );
        $query->set( 'tax_query', $tax_query );
		
		$metaquery =array(			
				'relation' => 'OR',
					array(
						'key' => '_course_status',
						'value' => 'private',
						'compare' => '!=',
					),
					array(
						'key' => '_course_statusv',
						'value' => 'private',
						'compare' => '!=',
					),
			);
		$query->set( 'meta_query', $metaquery );
	}
}
add_action( 'pre_get_posts', 'wpb_modify_search_query' );

// Reduce the strength requirement on the woocommerce password
function reduce_woocommerce_min_strength_requirement( $strength ) {
    return 0;
}
add_filter( 'woocommerce_min_password_strength', 'reduce_woocommerce_min_strength_requirement' );


function SendSmS($text, $to)
{
	date_default_timezone_set("Asia/Tehran");


	include_once("sms/SendMessage.php");

	$APIKey    = "72f514ecb2f4363f7c5f14ec";
	$SecretKey = "ToluehaghShop27";
	$LineNumber = "10002166499542";


	// Normalize recipient(s)
	if (is_array($to)) {
		$MobileNumbers = array();
		foreach ($to as $MobileNumber) {
			$converted = doubleval($MobileNumber);
			$MobileNumbers[] = $converted;
		}
	} else {
		$MobileNumbers = array(doubleval($to));
	}

	// Normalize message(s)
	if (is_array($text)) {
		$Messages = $text;
	} else {
		$Messages = array($text);
	}

	// Sending date
	$SendDateTime = date("Y-m-d") . "T" . date("H:i:s");

	// Send SMS
	try {
		$SmsIR_SendMessage = new SmsIR_SendMessage($APIKey, $SecretKey, $LineNumber);
		$SendMessage = $SmsIR_SendMessage->SendMessage($MobileNumbers, $Messages);

		if ($SendMessage && isset($SendMessage['IsSuccessful']) && $SendMessage['IsSuccessful']) {
		} else {
		}
	} catch (Exception $e) {
	}

}

//ummu Change Bask Orders from On-Hold to Processing 

add_action( 'woocommerce_thankyou_bacs', 'bacs_order_payment_processing_order_status', 100, 1 );

function bacs_order_payment_processing_order_status( $order_id ) {
    if ( ! $order_id ) {
        return;
    }

    // Get an instance of the WC_Order object
    $order = new WC_Order( $order_id );

    if ( ( get_post_meta($order->id, '_payment_method', true) == 'bacs' ) && ('on-hold' == $order->status ) ) {
        $order->update_status('pending');
    } else {
        return;
    }
}

// ummu Remove unsused Css and JS file  (front-end).
function ummu_disable_scripts_styles() {
	
	$curenttype =get_post_type();
	
	if ( $curenttype != 'lesson'  ) {
			wp_dequeue_style('wpdm-front-bootstrap');
			wp_dequeue_style('wpdm-front');
			wp_dequeue_style('wpdm-font-awesome');		
			//wp_dequeue_style('');		

			wp_dequeue_script('wpdm-front-bootstrap');
			wp_dequeue_script('frontjs');
			wp_dequeue_script('jquery-choosen');
			//wp_dequeue_script('');
	}
	
	if(!is_woocommerce() && !is_cart() && !is_checkout() && !is_account_page() ) {
		
		//remove all woocomerce
		wp_dequeue_style( 'woocommerce-layout' );
		wp_dequeue_style( 'woocommerce-general' );
		wp_dequeue_style( 'woocommerce-smallscreen' );
		
		## Dequeue WooCommerce scripts
		wp_dequeue_script('wc-cart-fragments');
		wp_dequeue_script('woocommerce'); 
		wp_dequeue_script('wc-add-to-cart'); 

		wp_deregister_script( 'js-cookie' );
		wp_dequeue_script( 'js-cookie' );		
		
	}
	
	

	
		//all
			wp_dequeue_style( 'wc-block-style' );
		//  	

	
}
add_action('wp_enqueue_scripts', 'ummu_disable_scripts_styles', 100);


add_action('wp_ajax_custom_add_to_cart', 'custom_ajax_add_to_cart');
add_action('wp_ajax_nopriv_custom_add_to_cart', 'custom_ajax_add_to_cart');

function custom_ajax_add_to_cart() {
    if (!isset($_POST['product_id'])) {
        wp_send_json_error();
    }

    $product_id = absint($_POST['product_id']);

    $added = WC()->cart->add_to_cart($product_id);

    if ($added) {
        wp_send_json_success();
    } else {
        wp_send_json_error();
    }
}

function custom_enqueue_ajax_add_to_cart() {
    wp_enqueue_script('custom-ajax-add-to-cart', get_template_directory_uri() . '/js/custom-ajax-cart.js', array('jquery'), null, true);

    wp_localize_script('custom-ajax-add-to-cart', 'ajax_cart_params', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'custom_enqueue_ajax_add_to_cart');

add_filter('woocommerce_add_to_cart_validation', 'limit_cart_quantity_to_one', 10, 3);
function limit_cart_quantity_to_one($passed, $product_id, $quantity) {
    foreach(WC()->cart->get_cart() as $cart_item) {
        if ($cart_item['product_id'] == $product_id) {
            // wc_add_notice(__('You can only add one quantity of this product to the cart.', 'woocommerce'), 'error');
            return false;
        }
    }
    return $passed;
}

// Ensure cart updates respect the one-item limit
add_filter('woocommerce_update_cart_validation', 'limit_cart_update_quantity_to_one', 10, 4);
function limit_cart_update_quantity_to_one($passed, $cart_item_key, $values, $quantity) {
    if ($quantity > 1) {
        // wc_add_notice(__('You can only have one quantity of this product in your cart.', 'woocommerce'), 'error');
        return false;
    }
    return $passed;
}




// include ummu functions

include(THEMEX_PATH.'ummu.php');

//Init theme
$theme=new ThemexCore($config);


//add_filter('woocommerce_product_get_price', 'set_price_zero_for_admin', 10, 2);
//add_filter('woocommerce_product_get_regular_price', 'set_price_zero_for_admin', 10, 2);
//add_filter('woocommerce_product_get_sale_price', 'set_price_zero_for_admin', 10, 2);

function set_price_zero_for_admin($price, $product) {
    // Replace with your user ID or user email
    $current_user = wp_get_current_user();

    // Use one of these:
    // if ($current_user->user_email === 'you@example.com') {
    // if ($current_user->user_login === 'yourusername') {
    if ($current_user->ID == 43159) {  // Replace 123 with your WP user ID
        return 0;
    }

    return $price;
}

if (function_exists('add_action')) {

    add_action('wp_footer', 'pretty_links_conversion_script');

    function pretty_links_conversion_script() {

        if (is_wc_endpoint_url('order-received')) {

            ?>

            <script>

                if (typeof prli_conversion !== 'undefined') {

                    prli_conversion('product1'); // اسلاگ لینک رو بذار اینجا

                }

            </script>

            <?php

        }

    }

}

function theme_enqueue_styles() {
    wp_enqueue_style('tailwind', get_template_directory_uri() . '/css/tailwind-output.css', array(), null);
    // ...other styles
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');