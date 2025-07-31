<?php get_header(); 

$aurt= ThemexUser::$data['current_user']->ID;

		 		$user=get_userdata($aurt);

				$userview = $user->viewProfile;

?>


<div class="user-profile sevencol column">

	<?php if(ThemexUser::isProfilePage() ) { ?>

	<form action="<?php echo ThemexUser::$data['profile_page_url']; ?>" class="formatted-form user-profile-form" enctype="multipart/form-data" method="POST">

    

       

       <div class="threecol column">

		<div class="user-image">

			<div class="bordered-image thick-border">

				<?php	echo get_avatar( ThemexUser::$data['user']->ID , 96 ,'',ThemexUser::getFullName(ThemexUser::$data['current_user']) ); ?>

			</div>

			<div class="user-image-uploader">

				<a href="#" class="button"><span><span class="button-icon upload"></span><?php _e('Upload','academy'); ?></span></a>

				<input type="file" class="hidden" name="avatar" />

			</div>

		</div>

     </div>

     

     <div class="eightcol column last">

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

						<input class="text"  type="text" name="user_city" value="<?php echo ThemexUser::$data['user']->user_city; ?>" placeholder="<?php _e('شهر محل سکونت','academy'); ?>" />

				</div>

                </div>

                	

                <div class="clear"></div>

                

                <div class=" column last">

				<div class="field-wrapper user_gender">

                  <span class="descriptionse inline user_gender">جنسیت: </span>

                  

                  <label class="radio-inline">               			

                      <input type="radio" name="user_gender" value="male" <?php if(ThemexUser::$data['user']->user_gender == 'male' ) echo 'checked'; ?> > مرد 

                  </label>

                  

                  <label class="radio-inline">               			                  

                      <input type="radio" name="user_gender" value="female" <?php if(ThemexUser::$data['user']->user_gender == 'female' ) echo 'checked'; ?>> زن 

                  </label>

                  

				</div>

                </div>

                	

                <div class="clear"></div>

                  

               

                

              <span class="descriptionse">توضیح کوتاهی در باره خود که به سایر کاربران نمایش داده میشود: </span>               			

				<?php ThemexInterface::renderEditor('user_description', wpautop(ThemexUser::$data['user']->description)); ?>

				<div class="sixcol column">

					<div class="field-wrapper">

						<input type="text" class="text-left" name="user_instagram" value="<?php echo ThemexUser::$data['user']->instagram; ?>" placeholder="آدرس اینستاگرام" />

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

						<input type="text" class="text-left" name="user_facebook" value="<?php echo ThemexUser::$data['user']->facebook; ?>" placeholder=" آدرس فیس بوک " />

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

                                
			<?php if (!function_exists('digits_login_button')){ ?> 
               
                <span class="descriptionse"><?php _e("لطفاً از صحت شماره تلفن همراه خود اطمینان کسب نمایید، قسمتی از اطلاع رسانی ها از طریق ارسال پیامک انجام خواهد شد."); ?><p>توجه داشته باشید در صورتی که پیامک های تبلیغاتی خود را بسته باشید امکان اطلاع رسانی از طریق پیامک به شما وجود نخواهد داشت.</p></span> 

                

               <div class="sixcol column">

					<div class="field-wrapper">

						<input class="text-left"  type="text" name="billing_phone" value="<?php echo ThemexUser::$data['user']->billing_phone; ?>" placeholder="<?php _e('شماره تلفن همراه','academy'); ?>" />

					</div>								

				</div>

                

                <div class="clear"></div>                	

			<?php  } ?>                 

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

                   
			<div class="down-btn">
                <a class="button cpass" href="<?php echo  wc_customer_edit_account_url() ; ?>" ><span><span class="button-icon edit"></span><?php _e( 'تغییر رمز عبور ', 'woocommerce' ); ?></span></a>               

                <a class="button corder last" href="<?php echo esc_url( wc_get_account_endpoint_url( 'orders' ) ); ?>" ><span><span class="button-icon plus"></span><?php _e( 'سفارش های من', 'woocommerce' ); ?></span></a>
			</div>                
                
				<div class="clear"></div>
                
                
				<?php if (function_exists('digits_login_button')){ 
	
					 echo do_shortcode('[digits-edit-phone]');

					?>


					<span class="descriptionse"><?php _e("لطفاً از صحت شماره تلفن همراه خود اطمینان کسب نمایید، قسمتی از اطلاع رسانی ها از طریق ارسال پیامک انجام خواهد شد."); ?><p>توجه داشته باشید در صورتی که پیامک های تبلیغاتی خود را بسته باشید امکان اطلاع رسانی از طریق پیامک به شما وجود نخواهد داشت.</p></span> 
				

				<?php } ?>
                                 

		</div>

       </div>



     

	</form>

 <?php } elseif ( $userview == 'yes' && !current_user_can('administrator')  ) { ?>

					<h1> این پروفایل نمایش عمومی مشخصات خود را غیر فعال نموده است.</h1> 

				<?php	 } else { ?>

<div class="threecol column">              

	<div class="user-image">

		<div class="bordered-image thick-border">

			<?php echo get_avatar(ThemexUser::$data['current_user']->ID ,96 , '' , ThemexUser::getFullName(ThemexUser::$data['current_user'])) ; ?>

		</div>

		<?php get_template_part('module', 'links'); ?>

        <?php if ( current_user_can('administrator') ) { echo '<a class="user-edit" href="'.get_edit_user_link (ThemexUser::$data['current_user']->ID).'">ویرایش کاربر </a>'; }; ?>

	</div>

</div>

<div class="eightcol column last">

	<div class="user-description">

        <div class="regbox"> 

            <h2 class="reghead"><?php echo ThemexUser::getFullName(ThemexUser::$data['current_user']); ?></h2>

            <div class="signature"><?php echo ThemexUser::$data['current_user']->signature; ?></div>

            <?php echo wpautop(ThemexUser::$data['current_user']->description); ?>			

        </div>

    </div>

</div>

	<?php } ?>

   

</div>



<div class="fivecol column last">

	

	<?php if(ThemexUser::isProfilePage() || ThemexCore::getOption('user_courses')!='true') { ?>

    <?php if (((!ThemexUser::isProfilePage()) && ($userview == 'yes')) && !current_user_can('administrator') ) { } else {  ?>

	<?php

		$coursesTeacher = ThemexCourse::getTeacherCourses(ThemexUser::$data['current_user']->ID);

		if($coursesTeacher ) { ?>

        <div class="regbox"> 

            <h3 class="reghead" > دوره های استاد <?php echo ThemexUser::getFullName(ThemexUser::$data['current_user']); ?> : </h3>

            <div class="user-courses-listing">

                <?php foreach($coursesTeacher as $course) { ?>

                <?php ThemexCourse::initCourse($course->ID); ?>

                <div class="course-item <?php if(!ThemexCourse::isCompletedCourse(0)){ ?>started<?php } ?>">

                    <div class="course-title">

                        <div class="course-status"><?php _e('Author', 'academy'); ?></div>

                        <h4 class="nomargin"><a href="<?php echo get_permalink($course->ID); ?>"><?php echo get_the_title($course->ID); ?></a></h4>

                    </div>

                    <?php if(ThemexCourse::$data['rating']!='true') { ?>

                    <div class="course-meta">			

                    <?php get_template_part('module','rating'); ?>			

                    </div>

                    <?php } ?>

                </div>

                <?php } ?> 

            </div>

         </div>		

		

		

		<?php } else {

		

		$allcourseid = array();

		$courses = ThemexCourse::getUserCourses(ThemexUser::$data['current_user']->ID);

		$coursesb =  ThemexCourse::getUserCoursesb(ThemexUser::$data['current_user']->ID);

		

		$user_info = get_userdata(ThemexUser::$data['current_user']->ID);

		$nickname = $user_info->nickname;		

		$args = array(

			'post_type' => 'course',

			'posts_per_page' => -1,

			'author_name' => $nickname,

		);

		$author_query = new WP_Query( $args );

		$author_courser_id=wp_list_pluck($author_query ->posts, 'ID');

?>

<div class="regbox"> 

    <h3 class="reghead" > دوره های حضوری <?php echo ThemexUser::getFullName(ThemexUser::$data['current_user']); ?> : </h3>

<?php		

	 if($courses || $coursesb ) {

		 $result = array_merge((array)$courses, (array)$coursesb);

 ?>

	<div class="user-courses-listing cphis">

		<?php foreach($result as $course) { ?>

		<?php ThemexCourse::initCourse($course->ID); $allcourseid[] = $course->ID;  ?>

		<div class="course-item <?php if(!ThemexCourse::isCompletedCourse(0)){ ?>started<?php } ?>">

			<div class="course-title">

				

				<h4 class="nomargin"><a href="<?php echo get_permalink($course->ID); ?>"><?php echo get_the_title($course->ID); ?></a></h4>

				<?php if(ThemexUser::isProfilePage() ) { get_template_part('module', 'progressMini'); } ?>

                <?php if(ThemexUser::isProfilePage() ) { echo ThemexCourse::UserPresentList(ThemexUser::$data['current_user']->ID,$course->ID); } ?>				

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

	<h4 class="secondary"><?php _e('دوره حضوری تایید شده وجود ندارد.', 'academy'); ?></h4>

	<?php } ?>

</div>

    

    <?php

		$coursesv = ThemexCourse::getUserCoursesv(ThemexUser::$data['current_user']->ID);

		$coursesvb =  ThemexCourse::getUserCoursesvb(ThemexUser::$data['current_user']->ID);

?>

<div class="regbox"> 

    <h3 class="reghead" > دوره های مجازی <?php echo ThemexUser::getFullName(ThemexUser::$data['current_user']); ?> : </h3>

<?php		

	 if($coursesv || $coursesvb ) {

		 $result = array_merge((array)$coursesv, (array)$coursesvb); ?>

    <div class="user-courses-listing">

		<?php foreach($result as $course) { ?>

		<?php ThemexCourse::initCourse($course->ID); $allcourseid[] = $course->ID; ?>

		<div class="course-item <?php if(!ThemexCourse::isCompletedCourse(0)){ ?>started<?php } ?>">

			<div class="course-title">

				<h4 class="nomargin"><a href="<?php echo get_permalink($course->ID); ?>"><?php echo get_the_title($course->ID); ?></a></h4>

				<?php if(ThemexUser::isProfilePage() ) { get_template_part('module', 'progressMini'); } ?>				

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

</div>

	<?php } } } ?>

</div>

<?php if (isset($allcourseid) && ThemexUser::isProfilePage() ) {

$courses=ThemexCourse::getRelatedCoursesUser($allcourseid)

 ?>

<div class="twelvecol column">

    <div class="regbox clearfix"> 

        <h4 class="reghead" > دوره های پیشنهادی به شما  <?php echo ThemexUser::getFullName(ThemexUser::$data['current_user']); ?> </h4>

        <div class="courses-listing clearfix">

            <?php 

            $counter=0;

            foreach($courses as $post) { 

            $counter++;

            ?>

            <div class="twocol column <?php if($counter==6) { ?>last<?php } ?>">

                <?php get_template_part('loop', 'course'); ?>

            </div>

            <?php }	wp_reset_query(); ?>	

        </div>

    </div>

</div>
<?php } ?>


<?php 
	
	$getauthor = ThemexUser::$data['current_user']->ID;
	$coursesTeacher = ThemexCourse::getAuthorCourses($getauthor);
	if($coursesTeacher ) {
		$authordata = get_userdata($getauthor);		
		$display_name = $authordata->first_name . ' ' .$authordata->last_name ; ?>
		<div class="twelvecol column">
			<div class="regbox clearfix relcourse"> 
				<div class="reghead" > دوره های آموزشی فعال <?php echo $display_name ?> </div>
				<div class="courses-listing clearfix">
					<?php 
					$counter=0;
					foreach($coursesTeacher as $post) { 
					$counter++; ?>
					<div class="twocol column <?php if($counter% 6 == 0) { ?>last<?php } ?>">
						<?php get_template_part('loop', 'course'); ?>
					</div>
					<?php if($counter% 6 == 0) { ?> <div class="clear"></div> <?php } } wp_reset_query(); ?>	
				</div>
			</div>
		</div>
<?php }  ?>

<?php if ( !in_array( 'author', (array) ThemexUser::$data['current_user']->roles ) ) { get_template_part('module', 'topsell');} ?>
<?php get_footer(); ?>