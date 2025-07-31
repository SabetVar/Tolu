<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="google-site-verification" content="yGBgIxK-8wcaGoQ27vpgcbxbAhmsZBu4HBItbLQq8zs" />
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<!-- Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="#0f9292" />
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="#0f9292">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="#0f9292">

	<!--[if lt IE 9]>
	<script type="text/javascript" src="<?php echo THEME_URI; ?>js/html5.js"></script>
	<![endif]-->

	<?php wp_head(); ?>
	<link rel="icon" sizes="192x192" href="<?php echo THEME_URI; ?>images/tolue-192.png">
	<?php /* ummu remove swiper
    <link rel="stylesheet" href="<?php echo THEME_URI; ?>css/swiper.min.css">
	*/
	?>
	<script type="text/javascript" src="<?php echo THEME_URI; ?>js/jquery.nanoscroller.min.js"></script>
	<?php /*
	<script type="text/javascript" src="<?php echo THEME_URI; ?>js/jquery.tipsy.js"></script>
	*/
	?>
	<script type="text/javascript" src="<?php echo THEME_URI; ?>js/jquery.scrollTo.js"></script>
	<script>
		jQuery(document).ready(function($) {
			$('#b1').click(function() {
				$('body').scrollTo('#a1', 800);
			});
			$('#b2').click(function() {
				$('body').scrollTo('#a2', 800);
			});
			$('#b3').click(function() {
				$('body').scrollTo('#a3', 800);
			});
			$('#b4').click(function() {
				$('body').scrollTo('#a4', 800);
			});
			$('#b5').click(function() {
				$('body').scrollTo('#a5', 800);
			});
			$('#b6').click(function() {
				$('body').scrollTo('#a6', 800);
			});
			$('#b7').click(function() {
				$('body').scrollTo('#a7', 800);
			});
			$('#b8').click(function() {
				$('body').scrollTo('#a8', 800);
			});
		});
	</script>
	<!-- Google Tag Manager 
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KKCZ9ZP');</script>
    <!-- End Google Tag Manager -->
</head>
<?php
if (current_user_can('edit_posts') && get_user_option('show_admin_bar_front', get_current_user_id()) != 'false') { ?>
	<div style="height:28px; width:100%; display:block;"></div>
<?php }; ?>
<body <?php body_class(); ?>>
	<style>
		.promo-banner {
			background-color: #0693e3;
			color: white;
			text-align: center;
			padding: 5px 0;
			font-size: 18px;
			font-family: Tahoma, Geneva, sans-serif;
		}
		/* Mobile-specific style */
		@media (max-width: 767px) {
			.promo-banner {
				margin-top: 50px;
			}
		}
	</style>
	<!-- Google Tag Manager (noscript)
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KKCZ9ZP"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<div class="site-wrap">
		<div class="header-wrap">
			<header class="site-header">

				<div class="mob-head">
					<div class="dicon mob-menu-icon"></div>
					<div class="mlogo"><?php ThemexStyler::siteLogo(); ?></div>
				</div><!-- end mob-head-->

				<div class="mob-menu mob-close">
					<div class="mob-menu-content">
						<div class="mob-logo">
							<div class="dicon mob-close-icon"></div>
							<a href="<?php echo SITE_URL; ?>"><img alt="<?php bloginfo('name'); ?>" src="<?php echo THEME_URI; ?>/images/tolu-white.png"></a>
						</div>
						<div class="mob-menubar">
							<?php ThemexInterface::create_bootstrap_menu('main_menu'); ?>
						</div>
					</div>
				</div>
				<div class="mob-overaly ov-close"></div>

				<div class="row">
					<div class="site-logo left">
						<?php ThemexStyler::siteLogo(); ?>

					</div>
					<!-- /logo -->

					<div class="mobile-search-form">
						<?php get_search_form(); ?>
					</div>
					<!-- /mobile search form -->
					<nav class="header-navigation right">
						<?php wp_nav_menu(array('theme_location' => 'main_menu', 'container_class' => 'menu')); ?>
						<div class="select-menu">
							<?php ThemexInterface::renderDropdownMenu('main_menu'); ?>
							<span>&nbsp;</span>
						</div><!--/ select menu-->
					</nav>
					<!-- /navigation -->

					<div class="header-options right clearfix">
						<div class="login-options right">
							<?php if (ThemexUser::userActive()) { ?>
								<div class="button-wrap left">
									<?php if (is_author()) { ?>
										<a href="<?php echo wp_logout_url(SITE_URL); ?>" class="button dark">
										<?php } else { ?>
											<a href="<?php echo wp_logout_url(get_permalink()); ?>" class="button dark">
											<?php } ?>
											<span><span class="button-icon logout"></span><?php _e('Sign Out', 'academy'); ?></span>
											</a>
								</div>
								<div class="button-wrap left">
									<a href="<?php echo ThemexUser::$data['profile_page_url']; ?>" class="button secondary">
										<span><span class="button-icon register"></span><?php _e('My Profile', 'academy'); ?></span>
									</a>
								</div>
							<?php } elseif (function_exists('digits_login_button')) { ?>

								<a href="#" class="button dark"><span><span class="button-icon login"></span><?php echo do_shortcode('[dm-page]') ?></span></a>

							<?php } else { ?>
								<div class="button-wrap left tooltip login-button">
									<a href="#" class="button dark"><span><span class="button-icon login"></span><?php _e('Sign In', 'academy'); ?></span></a>
									<div class="tooltip-wrap">
										<div class="tooltip-text">
											<form action="<?php echo AJAX_URL; ?>" class="login-form popup-form" method="POST">
												<div class="message"></div>
												<div class="field-wrap"><input class="text-left" type="text" name="user_login" value="<?php _e('Username', 'academy'); ?>" /></div>
												<div class="field-wrap"><input class="text-left" type="password" name="user_password" value="<?php _e('Password', 'academy'); ?>" /></div>
												<input type="hidden" name="login_nonce" class="nonce" value="<?php echo wp_create_nonce('login_nonce'); ?>" />
												<input type="hidden" class="action" value="themex_login" />
												<div class="button-wrap left nomargin">
													<a href="#" class="button submit-button">
														<span><?php _e('Sign In', 'academy'); ?></span>
													</a>
												</div>

												<a target="_blank" class="redirectpass" href="<?php echo wc_lostpassword_url(); ?>" title="<?php _e('Password Recovery', 'academy'); ?>">رمز عبور خود را فرآموش کرده اید؟</a>
											</form>
										</div>
									</div>

								</div>
								<?php if (get_option('users_can_register')) { ?>
									<div class="button-wrap left">
										<a href="<?php echo ThemexUser::$data['register_page_url']; ?>" class="button">
											<!-- <a href="login-2" class="button"> -->
											<span><span class="button-icon register"></span><?php _e('Register', 'academy'); ?></span>
											<!-- <span><span class="button-icon register"></span>ورود</span> -->
										</a>
									</div>
								<?php } ?>
							<?php } ?>
						</div>
						<?php
						if (function_exists('WC') || WC()->cart->is_empty()) { ?>
							<a href="<?php echo wc_get_checkout_url(); ?>" class="button dark add-cart-button"><span>سبد خرید</span></a>
						<?php
						}
						?>

						<!-- /login options -->
						<div class="search-form right">
							<?php get_search_form(); ?>
						</div>
						<!-- /search form -->
					</div>
					<!-- /header options -->

				</div>
			</header>
			<!-- /header -->
		</div>
		<div class="featured-content">
			<?php
			ThemexStyler::pageBackground();
			if (is_front_page() && !ThemexUser::isLoginPage()) {
				get_template_part('module', 'slider');
			} else {
			?>
				<div class="row">

					<?php if (function_exists('wc_print_notices')) : ?>
						<div class="woocommerce-notices-wrapper">
							<?php wc_print_notices(); ?>
						</div>
					<?php endif; ?>
					
					<?php
					if (get_post_type() == 'course' && is_single()) {
						get_template_part('module', 'course');
					} else if (get_post_type() == 'library' && is_single()) {
						get_template_part('module', 'library');
					} else if (get_post_type() == 'meeting' && is_single()) {
						get_template_part('module', 'meeting');
					} elseif (get_post_type() == 'plan' && is_single()) {
						get_template_part('module', 'plan');
					} else {
					?>
						<div class="page-title">
							<h1 class="nomargin"><?php ThemexStyler::pageTitle(); ?></h1>
						</div>
						<!-- /page title -->
					<?php }	?>
				</div>
			<?php } ?>
		</div>
		<!-- /featured -->
		<div class="main-content">
			<div class="row">
				<div class="norpadding">