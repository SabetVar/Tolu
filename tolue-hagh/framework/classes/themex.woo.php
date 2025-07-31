<?php

//Custom woocommerce module

class ThemexWoo
{



	public static $data;

	public static $woocommerce;

	public static $id = __CLASS__;



	//Init module

	public static function init()
	{



		//refresh module data

		self::refresh();



		if (self::isActive()) {



			//get plugin instance

			self::$woocommerce = $GLOBALS['woocommerce'];



			//filter plugin pages

			add_filter('template_redirect', array(__CLASS__, 'filterPages'));



			//filter checkout fields

			add_filter('woocommerce_checkout_fields', array(__CLASS__, 'filterFields'), 1, 1);



			//filter body classes

			add_filter('body_class', array(__CLASS__, 'filterClasses'), 99);



			//change order status

			add_action('woocommerce_order_status_completed', array(__CLASS__, 'completeOrder'));

			//add_action( 'woocommerce_order_status_pending', array(__CLASS__, 'uncompleteOrder') );

			//add_action( 'woocommerce_order_status_failed', array(__CLASS__, 'uncompleteOrder') );

			//add_action( 'woocommerce_order_status_on-hold', array(__CLASS__, 'uncompleteOrder') );

			//add_action( 'woocommerce_order_status_processing', array(__CLASS__, 'uncompleteOrder') );

			//add_action( 'woocommerce_order_status_refunded', array(__CLASS__, 'uncompleteOrder') );

			//add_action( 'woocommerce_order_status_cancelled', array(__CLASS__, 'uncompleteOrder') );



		}
	}



	//Refresh module stored data

	public static function refresh()
	{

		self::$data = ThemexCore::getOption(self::$id);
	}



	//Save module static data

	public static function save()
	{

		ThemexCore::updateOption(self::$id, self::$data);
	}



	//Save module settings

	public static function saveSettings($data)
	{



		//refresh module data

		self::refresh();



		//set module data

		if (!isset($data[self::$id])) {

			$data[self::$id] = '';
		}



		self::$data = $data[self::$id];



		//save module data

		self::save();
	}



	//Render module settings

	public static function renderSettings()
	{



		$out = '';



		$out .= ThemexInterface::renderOption(array(

			'name' => __('Show Country Field', 'academy'),

			'id' => self::$id . '[billing_country]',

			'type' => 'checkbox',

			'default' => isset(self::$data['billing_country']) ? self::$data['billing_country'] : ''

		));



		$out .= ThemexInterface::renderOption(array(

			'name' => __('Show City Field', 'academy'),

			'id' => self::$id . '[billing_city]',

			'type' => 'checkbox',

			'default' => isset(self::$data['billing_city']) ? self::$data['billing_city'] : ''

		));



		$out .= ThemexInterface::renderOption(array(

			'name' => __('Show State Field', 'academy'),

			'id' => self::$id . '[billing_state]',

			'type' => 'checkbox',

			'default' => isset(self::$data['billing_state']) ? self::$data['billing_state'] : ''

		));



		$out .= ThemexInterface::renderOption(array(

			'name' => __('Show Address Fields', 'academy'),

			'id' => self::$id . '[billing_address]',

			'type' => 'checkbox',

			'default' => isset(self::$data['billing_address']) ? self::$data['billing_address'] : ''

		));



		$out .= ThemexInterface::renderOption(array(

			'name' => __('Show Postcode Field', 'academy'),

			'id' => self::$id . '[billing_postcode]',

			'type' => 'checkbox',

			'default' => isset(self::$data['billing_postcode']) ? self::$data['billing_postcode'] : ''

		));



		$out .= ThemexInterface::renderOption(array(

			'name' => __('Show Company Field', 'academy'),

			'id' => self::$id . '[billing_company]',

			'type' => 'checkbox',

			'default' => isset(self::$data['billing_company']) ? self::$data['billing_company'] : ''

		));



		$out .= ThemexInterface::renderOption(array(

			'name' => __('Show Phone Field', 'academy'),

			'id' => self::$id . '[billing_phone]',

			'type' => 'checkbox',

			'default' => isset(self::$data['billing_phone']) ? self::$data['billing_phone'] : ''

		));



		return $out;
	}



	//Filter plugin pages

	public static function filterPages()
	{



		if (self::isActive()) {

			if (isset($_GET['order']) && self::getOrderStatus($_GET['order']) == 'completed') {

				$item = self::getRelatedItem($_GET['order']);



				if ($item !== false) {

					if ($item->post_type == 'course') {

						wp_redirect(get_permalink($item->ID));

						exit;
					} else if ($item->post_type == 'plan') {

						$category = get_term_link(intval(get_post_meta($item->ID, '_plan_category', true)), 'course_category');

						if (!is_wp_error($category)) {

							wp_redirect($category);

							exit;
						}
					}
				}
			}
		}
	}



	//Filter plugin fields

	public static function filterFields($fields)
	{

		self::$data['billing_first_name'] = true;

		self::$data['billing_last_name'] = true;

		self::$data['billing_email'] = true;

		self::$data['shipping_first_name'] = true;

		self::$data['shipping_last_name'] = true;

		self::$data['order_comments'] = true;



		foreach ($fields as $form_key => $form) {

			foreach ($form as $field_key => $field) {

				if (isset(self::$data[$field_key]) || isset(self::$data[str_replace('shipping_', 'billing_', $field_key)]) || isset(self::$data[substr($field_key, 0, -2)]) || substr($field_key, 0, 8) == 'account_') {

					if (isset($fields[$form_key][$field_key]['label'])) {

						$fields[$form_key][$field_key]['placeholder'] = $fields[$form_key][$field_key]['label'];
					}
				} else {

					unset($fields[$form_key][$field_key]);
				}
			}
		}



		return $fields;
	}



	//Filter body classes

	public static function filterClasses($classes)
	{

		$classes = array_diff($classes, array('woocommerce-page', 'woocommerce'));

		return $classes;
	}



	//Filter form value

	public static function filterValue($value, $key = '', $prefix = '')
	{

		if (isset($value) && $value != '') {

			return $value;
		}



		return get_user_meta(get_current_user_id(), str_replace($prefix, '', $key), true);
	}



	//Chech plugin activity

	public static function isActive()
	{

		if (class_exists('Woocommerce')) {

			return true;
		}



		return false;
	}

	//Get product Category

	public static function getCategory($ID)
	{

		$products_categories = get_the_terms($ID, 'product_cat');
		$p_categories = array();

		if ($products_categories != '') {

			foreach ($products_categories as $products_category) {
				$p_categories[] = $products_category->slug;
			}
		}

		return $p_categories;
	}


	//Get product price

	public static function getPrice($ID)
	{

		$price['text'] = __('Free', 'academy');

		$price['number'] = 0;

		$price['type'] = 'simple';



		if (self::isActive() && $ID != 0) {

			$product = wc_get_product($ID);



			if ($product !== false) {


				$price['text'] = $product->get_price_html();

				$price['number'] = $product->get_price();
			}
		}



		return $price['text'];
	}



	//Complete order

	public static function completeOrder($ID = 0)
	{

		if (!$ID) {
			return;
		}

		$data         = get_post_meta($ID, '_cart_discount', true);
		$totalpay     = get_post_meta($ID, '_order_total', true);
		$customerID   = get_post_meta($ID, '_customer_user', true);
		$customerdata = get_userdata($customerID);

		if (!$customerdata) {
			return;
		}


		$item   = self::getRelatedItem($ID);
		$items  = self::getRelatedItems($ID);
		$itemv  = self::getRelatedItemv($ID);
		$itemsv = self::getRelatedItemsv($ID);


		$has_discount = ($data != '0');

		// Helper function for plan-category course enrollment
		$enrollPlanCourses = function ($planID, $customerID, $has_discount) {
			$plancat = get_post_meta($planID, '_plan_category', true);

			if (!empty($plancat)) {
				$args = array(
					'posts_per_page' => -1,
					'post_type' => 'course',
					'tax_query' => array(
						array(
							'taxonomy' => 'course_category',
							'field'    => 'ID',
							'terms'    => is_array($plancat) ? $plancat : array($plancat),
						),
					),
				);

				$myposts = get_posts($args);

				foreach ($myposts as $post) {
					setup_postdata($post);
					if ($has_discount) {
						ThemexCourse::addUservb($post->ID, $customerID, 'پلان شماره ' . $planID);
					} else {
						ThemexCourse::addUserv($post->ID, $customerID);
					}
				}
				wp_reset_postdata();
			}
		};

		// Process regular items
		foreach ($items as $item1) {
			if ($item1->post_type === 'course') {
				if ($has_discount) {
					ThemexCourse::addUserb($item1->ID, $customerID, $totalpay);
				} else {
					ThemexCourse::addUser($item1->ID, $customerID);
				}
			} else {
				ThemexCourse::subscribeUser($item1->ID, $customerID);
			}
		}

		// Process virtual items
		foreach ($itemsv as $itemv1) {
			if ($itemv1->post_type === 'course') {
				if ($has_discount) {
					ThemexCourse::addUservb($itemv1->ID, $customerID, $totalpay);
				} else {
					ThemexCourse::addUserv($itemv1->ID, $customerID);
				}
			} else {
				ThemexCourse::subscribeUser($itemv1->ID, $customerID);
				$enrollPlanCourses($itemv1->ID, $customerID, $has_discount);
			}
		}

		// SMS Notification
		$text = ' موسسه طلوع حق : ' . "\r\n" . ' شما با نام کاربری ' . $customerdata->user_login;
		$to = get_post_meta($ID, '_billing_phone', true);

		$countCourse = (is_array($items) ? count($items) : 0) + (is_array($itemsv) ? count($itemsv) : 0);

		if ($countCourse > 1) {
			if ($item->post_type === 'course') {
				$text .= ' در دوره ' . $item->post_title . ' با موفقیت ثبت نام شدید. ';
			} elseif ($itemv->post_type === 'course') {
				$text .= ' در دوره ' . $itemv->post_title . ' با موفقیت ثبت نام شدید. ';
			} elseif ($item->post_type === 'plan') {
				$text .= ' در ' . $item->post_title . ' با موفقیت ثبت نام شدید. ';
			}
		} else {
			$text = "با موفقیت در چند دوره ثبت نام شده اید";
		}

		$text .= "\r\n" . ' Toluehagh.ir';

		SendSmS($text, $to);
	}



	//Uncomplete order

	public static function uncompleteOrder($ID = 0)
	{

		$item = self::getRelatedItem($ID);



		if ($item->post_type == 'course') {

			ThemexCourse::removeUser($item->ID, $item->post_author);
		} else if ($item->post_type == 'plan') {

			ThemexCourse::unsubscribeUser($item->ID, $item->post_author);
		}
	}



	//Get related item

	public static function getRelatedItem($ID = 0)
	{



		$item = false;

		$order = wc_get_order($ID);

		if (!empty($order)) {
			$products = $order->get_items();

			if (!empty($products)) {

				foreach ($products as $product) {
					$ID = $product->get_product_id();
				}
			}
		}


		/* New Remove ummu
		
		$order=new WC_Order( intval($ID) );	

		$products=$order->get_items();		

		if(!empty($products)) {

			$product=reset($products);

			$ID=$product['product_id'];

		}

		End New Remove ummu */

		$items = get_posts(array(

			'numberposts' => 1,

			'post_type' => array('course'),

			'meta_query' => array(

				'relation' => 'OR',

				array(

					'key' => '_course_product',
					'value' => $ID,

				),
				array(

					'key' => '_plan_product',
					'value' => $ID,

				),

			),

		));



		if (!empty($items)) {

			$item = $items[0];

			if (!empty($products)) {

				$item->post_author = $order->get_user_id();
			}
		}



		return $item;
	}

	public static function getRelatedItems($ID = 0)
	{
		$items = []; // Initialize an array to hold all related items

		// Get the order object
		$order = new WC_Order(intval($ID));

		// Get all products in the order
		$products = $order->get_items();

		// Check if there are products in the order
		if (!empty($products)) {
			// Loop through each product in the order
			foreach ($products as $product) {
				$product_id = $product['product_id']; // Get the product ID

				// Fetch related items (courses or plans) for the current product
				$related_items = get_posts(array(
					'numberposts' => -1, // Get all posts
					'post_type' => array('course'), // Look for courses or plans
					'meta_query' => array(
						'relation' => 'OR',
						array(
							'key' => '_course_product',
							'value' => $product_id,
						),
						array(
							'key' => '_plan_product',
							'value' => $product_id,
						),
					),
				));

				// If related items are found, add them to the result array
				if (!empty($related_items)) {
					foreach ($related_items as $item) {
						// Set the post author to the order's user ID
						$item->post_author = $order->get_user_id();
						$items[] = $item; // Add the item to the result array
					}
				}
			}
		}

		// Return all related items
		return $items;
	}

	public static function getRelatedItemsv($ID = 0)
	{
		$items = []; // Initialize an array to hold all related items

		// Get the order object
		$order = new WC_Order(intval($ID));

		// Get all products in the order
		$products = $order->get_items();

		// Check if there are products in the order
		if (!empty($products)) {
			// Loop through each product in the order
			foreach ($products as $product) {
				$product_id = $product['product_id']; // Get the product ID

				// Fetch related items (courses or plans) for the current product
				$related_items = get_posts(array(
					'numberposts' => -1, // Get all posts
					'post_type' => array('course', 'plan'), // Look for courses or plans
					'meta_query' => array(
						'relation' => 'OR',
						array(
							'key' => '_course_productv', // Updated meta key
							'value' => $product_id,
						),
						array(
							'key' => '_plan_product', // Existing meta key
							'value' => $product_id,
						),
					),
				));

				// If related items are found, add them to the result array
				if (!empty($related_items)) {
					foreach ($related_items as $item) {
						// Set the post author to the order's user ID
						$item->post_author = $order->get_user_id();
						$items[] = $item; // Add the item to the result array
					}
				}
			}
		}

		// Return all related items
		return $items;
	}






	//Get Virtual related item

	public static function getRelatedItemv($ID = 0)
	{



		$item = false;

		$order = wc_get_order($ID);

		if (!empty($order)) {
			$products = $order->get_items();

			if (!empty($products)) {

				foreach ($products as $product) {
					$ID = $product->get_product_id();
				}
			}
		}

		/* New Remove ummu

		$order=new WC_Order( intval($ID) );	

		$products=$order->get_items();		

		

		if(!empty($products)) {

			$product=reset($products);

			$ID=$product['product_id'];

		}

		End New Remove ummu */

		$items = get_posts(array(

			'numberposts' => 1,

			'post_type' => array('course', 'plan'),

			'meta_query' => array(

				'relation' => 'OR',

				array(

					'key' => '_course_productv',

					'value' => $ID,

				),

				array(

					'key' => '_plan_product',

					'value' => $ID,

				),

			),

		));



		if (!empty($items)) {

			$item = $items[0];

			if (!empty($products)) {

				$item->post_author = $order->get_user_id();
			}
		}



		return $item;
	}





	//Get order status

	public static function getOrderStatus($ID = 0)
	{

		//$order=new WC_Order( $ID );

		$order = wc_get_order($ID);

		$order_status  = $order->get_status();

		return $order_status;
	}



	//Add product and redirect

	/*public static function addProduct($ID=0) {

		// self::$woocommerce->cart->empty_cart();

		self::$woocommerce->cart->add_to_cart($ID, 1);

		wp_redirect(self::$woocommerce->cart->get_checkout_url());

		exit();

	}*/

	public static function addProduct($ID = 0)
	{
		$found = false;

		// Check if the product already exists in the cart
		foreach (self::$woocommerce->cart->get_cart() as $cart_item_key => $values) {
			if ($values['product_id'] == $ID) {
				$found = true;
				break;
			}
		}

		if ($found) {
			// Show error message (no redirect)
			wc_add_notice(__('این دوره قبلاً به سبد خرید شما اضافه شده است.', 'academy'), 'error');
			return; // stay on the current page
		}

		// Add to cart and redirect to checkout
		self::$woocommerce->cart->add_to_cart($ID, 1);
		wp_redirect(self::$woocommerce->cart->get_checkout_url());
		exit();
	}
}
