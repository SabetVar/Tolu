<?php get_header(); 
$aurt= ThemexUser::$data['current_user']->ID;
		 		$user=get_userdata($aurt);
				$userview = $user->viewProfile;
?>



<div class="fivecol column">
	
	<?php if(ThemexUser::isProfilePage() || ThemexCore::getOption('user_courses')!='true') { ?>
    <?php if (((!ThemexUser::isProfilePage()) && ($userview == 'yes')) && !current_user_can('administrator') ) { } else {  ?>
	<?php
		$courses = ThemexCourse::getUserCourses(ThemexUser::$data['current_user']->ID);
		$coursesb =  ThemexCourse::getUserCoursesb(ThemexUser::$data['current_user']->ID);
	 if($courses || $coursesb ) {
		 $result = array_merge((array)$courses, (array)$coursesb);
 ?>
    <h3 class="au-h" > دوره های حضوری : </h3>
	<div class="user-courses-listing">
		<?php foreach($result as $course) { ?>
		<?php ThemexCourse::initCourse($course->ID); ?>
		<div class="course-item <?php if(!ThemexCourse::isCompletedCourse(0)){ ?>started<?php } ?>">
			<div class="course-title">
				<?php if(ThemexCourse::$data['course']['author']->ID==ThemexUser::$data['current_user']->ID) { ?>
				<div class="course-status"><?php _e('Author', 'academy'); ?></div>
				<?php } ?>
				<h4 class="nomargin"><a href="<?php echo get_permalink($course->ID); ?>"><?php echo get_the_title($course->ID); ?></a></h4>
				<?php get_template_part('module', 'progress'); ?>				
			</div>
			<?php if(ThemexCourse::$data['rating']!='true') { ?>
			<div class="course-meta">			
			<?php get_template_part('module','rating'); ?>			
			</div>
			<?php } ?>
		</div>
		<?php } ?> 
	</div>
	<?php  } else { ?>
	<h2 class="secondary"><?php _e('دوره حضوری تایید شده وجود ندارد.', 'academy'); ?></h2>
	<?php } ?>
    
    <?php
		$coursesv = ThemexCourse::getUserCoursesv(ThemexUser::$data['current_user']->ID);
		$coursesvb =  ThemexCourse::getUserCoursesvb(ThemexUser::$data['current_user']->ID);
	 if($coursesv || $coursesvb ) {
		 $result = array_merge((array)$coursesv, (array)$coursesvb); ?>
	    <h3 class="au-h">دوره های مجازی :   </h3>
    <div class="user-courses-listing">
		<?php foreach($result as $course) { ?>
		<?php ThemexCourse::initCourse($course->ID); ?>
		<div class="course-item <?php if(!ThemexCourse::isCompletedCourse(0)){ ?>started<?php } ?>">
			<div class="course-title">
				<?php if(ThemexCourse::$data['course']['author']->ID==ThemexUser::$data['current_user']->ID) { ?>
				<div class="course-status"><?php _e('Author', 'academy'); ?></div>
				<?php } ?>
				<h4 class="nomargin"><a href="<?php echo get_permalink($course->ID); ?>"><?php echo get_the_title($course->ID); ?></a></h4>
				<?php get_template_part('module', 'progress'); ?>				
			</div>
			<?php if(ThemexCourse::$data['rating']!='true') { ?>
			<div class="course-meta">			
			<?php get_template_part('module','rating'); ?>			
			</div>
			<?php } ?>
		</div>
		<?php } ?>
	</div>
	<?php  } else { ?>
	<h2 class="secondary"><?php _e('دوره مجازی تایید شده وجود ندارد.', 'academy'); ?></h2>
	<?php } ?>
	<?php } } ?>
</div>

<div class="user-profile sevencol column last">
	<?php if(ThemexUser::isProfilePage() ) { ?>
	<form action="<?php echo ThemexUser::$data['profile_page_url']; ?>" class="formatted-form user-profile-form" enctype="multipart/form-data" method="POST">
    
     
     <div class="eightcol column">
		<div class="user-description">
				<?php if(!empty(ThemexUser::$data['messages'])) { ?>
				<div class="message"><?php ThemexUser::renderMessages(); ?></div>
				<?php } ?>
				<div class="sixcol column">
					<div class="field-wrapper">
						<input type="text" name="user_first_name" value="<?php echo ThemexUser::$data['user']->first_name; ?>" placeholder="<?php _e('First Name','academy'); ?>" />
					</div>								
				</div>
				<div class="sixcol column last">
					<div class="field-wrapper">
						<input type="text" name="user_last_name"  value="<?php echo ThemexUser::$data['user']->last_name; ?>" placeholder="<?php _e('Last Name','academy'); ?>" />
					</div>
				</div>	
                			
				<div class="clear"></div>
                
                <div class="sixcol column">
					<div class="field-wrapper">
						<input class="text-left" type="text" name="user_email" value="<?php echo ThemexUser::$data['user']->user_email; ?>" placeholder="<?php _e('آدرس پست الکترونیکی','academy'); ?>" />
					</div>								
				</div>

                
              
                <div class="sixcol column last">
				<div class="field-wrapper">
					<input type="text" name="user_signature" value="<?php echo ThemexUser::$data['user']->signature; ?>" placeholder="<?php _e('Signature','academy'); ?>" />
				</div>
                </div>
                	
                <div class="clear"></div>
                  
               
                
                			
				<?php ThemexInterface::renderEditor('user_description', wpautop(ThemexUser::$data['user']->description)); ?>
				<div class="sixcol column">
					<div class="field-wrapper">
						<input type="text" class="text-left" name="user_facebook" value="<?php echo ThemexUser::$data['user']->facebook; ?>" placeholder="<?php _e('Facebook','academy'); ?>" />
					</div>								
				</div>
				<div class="sixcol column last">
					<div class="field-wrapper">
						<input type="text" class="text-left" name="user_twitter" value="<?php echo ThemexUser::$data['user']->twitter; ?>" placeholder="<?php _e('Twitter','academy'); ?>" />
					</div>
				</div>				
				<div class="clear"></div>
				<div class="sixcol column">
					<div class="field-wrapper">
						<input type="text" class="text-left" name="user_google" value="<?php echo ThemexUser::$data['user']->google; ?>" placeholder="<?php _e('Google','academy'); ?>+" />
					</div>								
				</div>
				<div class="sixcol column last">
					<div class="field-wrapper">
						<input type="text" class="text-left" name="user_youtube" value="<?php echo ThemexUser::$data['user']->youtube; ?>" placeholder="<?php _e('سایت یا وبلاگ','academy'); ?>" />
					</div>
				</div>				
				<div class="clear"></div>
				
                
 <span class="descriptionse">موارد ذیل صرفاً جهت ایجاد شناخت بیشتر (جهت همکاری های احتمالی) می باشد و برای سایر کاربران نمایش داده نخواهد شد.</span>
                                  
                <div class="sixcol column">
					<div class="field-wrapper">
						<input  type="text" name="user_uni" value="<?php echo ThemexUser::$data['user']->user_uni; ?>" placeholder="<?php _e('دانشگاه','academy'); ?>" />
					</div>								
				</div>
                
                <div class="sixcol column last">
                    <div class="field-wrapper">
                        <input  type="text" name="user_field" value="<?php echo ThemexUser::$data['user']->user_field; ?>" placeholder="<?php _e('رشته و مقطع تحصیلی','academy'); ?>" />
                    </div>
                </div>
                <div class="clear"></div>
                
                <div class="sixcol column">
					<div class="field-wrapper">
						<input class="text-left"  type="text" name="user_age" value="<?php echo ThemexUser::$data['user']->user_age; ?>" placeholder="<?php _e('سن','academy'); ?>" />
					</div>								
				</div>
                
                <div class="sixcol column last">
                    <div class="field-wrapper">
                        <input type="text" name="user_job" value="<?php echo ThemexUser::$data['user']->user_job; ?>" placeholder="<?php _e('شغل','academy'); ?>" />
                    </div>
                </div>
                
                <div class="clear"></div>
                
                
                <div class="sixcol column last">
					<div class="field-wrapper">
						<input class="text"  type="text" name="user_city" value="<?php echo ThemexUser::$data['user']->user_city; ?>" placeholder="<?php _e('شهر محل سکونت','academy'); ?>" />
					</div>								
				</div>
                
                <div class="clear"></div>
                                
                <span class="descriptionse"><?php _e("لطفاً از صحت شماره تلفن همراه خود اطمینان کسب نمایید، قسمتی از اطلاع رسانی ها از طریق ارسال پیامک انجام خواهد شد."); ?><p>توجه داشته باشید در صورتی که پیامک های تبلیغاتی خود را بسته باشید امکان اطلاع رسانی از طریق پیامک به شما وجود نخواهد داشت.</p></span> 
                
               <div class="sixcol column">
					<div class="field-wrapper">
						<input class="text-left"  type="text" name="billing_phone" value="<?php echo ThemexUser::$data['user']->billing_phone; ?>" placeholder="<?php _e('شماره تلفن همراه','academy'); ?>" />
					</div>								
				</div>
                
                <div class="clear"></div>                	
                 
				<div class="">
					<div class="field-wrapper">
                    
                    <input class="vie-s" type="checkbox" name="viewProfile"   value="yes" <?php if ( (ThemexUser::$data['user']->viewProfile) == "yes") echo "checked"; ?> />
                    <input type="hidden" name="changeit" />
                    <label class="vie-s" for="viewProfile"><?php _e("عدم نمایش  عمومی پروفایل"); ?></label> 
                    <div class="clear"></div>
                    <span class="descriptionse"><?php _e("در صورتی که نمیخواهید پروفایل شما در صفحه دوره ها نمایش داده شود، این تیک را بگذارید."); ?></span>                                  
					</div>
				</div>
                

                                 	
                   <div class="clear"></div>                 
				<a href="#" class="button submit-button"><span><span class="button-icon save"></span><?php _e('Save Changes','academy'); ?></span></a>
                 <div class="clear" style=" display:block; height:20px;"></div> 
                  <div class="clear"></div>
                   
                <a class="button submit-button" href="<?php echo get_permalink( wc_get_page_id( 'change_password' ) ); ?>" ><span><span class="button-icon edit"></span><?php _e( 'تغییر رمز عبور', 'woocommerce' ); ?></span></a>
                
                <a class="button submit-button" href="<?php echo get_permalink(wc_get_page_id( 'myaccount' ) ); ?>" ><span><span class="button-icon plus"></span><?php _e( 'سفارشات', 'woocommerce' ); ?></span></a>
                
                                 
		</div>
       </div>
       
       <div class="threecol column last">
		<div class="user-image">
			<div class="bordered-image thick-border">
				<?php echo get_avatar( ThemexUser::$data['user']->ID ); ?>
			</div>
			<div class="user-image-uploader">
				<a href="#" class="button"><span><span class="button-icon upload"></span><?php _e('Upload','academy'); ?></span></a>
				<input type="file" class="hidden" name="avatar" />
			</div>
		</div>
     </div>
     
	</form>
 <?php } elseif ( $userview == 'yes' ) { ?>
					<h1> این پروفایل نمایش عمومی مشخصات خود را غیر فعال نموده است.</h1> 
				<?php	 } else { ?>
	<div class="user-image">
		<div class="bordered-image thick-border">
			<?php echo get_avatar(ThemexUser::$data['current_user']->ID); ?>
		</div>
		<?php get_template_part('module', 'links'); ?>
        <?php if ( current_user_can('administrator') ) { echo '<a class="user-edit" href="'.get_edit_user_link (ThemexUser::$data['current_user']->ID).'">ویرایش کاربر </a>'; }; ?>
	</div>
	<div class="user-description">
		<h1><?php echo ThemexUser::getFullName(ThemexUser::$data['current_user']); ?></h1>
		<div class="signature"><?php echo ThemexUser::$data['current_user']->signature; ?></div>
		<?php echo wpautop(ThemexUser::$data['current_user']->description); ?>
	</div>
	<?php } ?>
 <?php if( !ThemexUser::isProfilePage()){ ?>   
 <div class="formatted-form" >
		<form class="login-form" action="<?php echo AJAX_URL; ?>" method="POST">
			<div class="message"></div>
			<div class="field-wrapper">
				<input class="text-left" type="text" name="user_login" placeholder="<?php _e('Username','academy'); ?>" />
			</div>
			<div class="field-wrapper">
				<input class="text-left" type="password" name="user_password" placeholder="<?php _e('Password','academy'); ?>" />
			</div>			
			<a href="#" class="button submit-button left"><span><span class="button-icon login"></span><?php _e('Sign In','academy'); ?></span></a>
			<?php if(ThemexUser::getOption('facebook_login')=='true') { ?>
			<a href="#" title="<?php _e('Sign in with Facebook','academy'); ?>" class="button facebook-button left">
				<span><span class="button-icon facebook"></span></span>
			</a>
			<?php } ?>
			<div class="form-loader"></div>
			<input type="hidden" name="login_nonce" class="nonce" value="<?php echo wp_create_nonce('login_nonce'); ?>" />
			<input type="hidden" class="action" value="themex_login" />
		</form>
	</div>
 <?php } ?>   
</div>

<?php get_footer(); ?>