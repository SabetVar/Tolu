<form action="<?php echo ThemexCourse::getAction(get_permalink()); ?>" method="POST">

	<input type="hidden" name="course_id" value="<?php the_ID(); ?>" />

	<?php if (!ThemexCourse::isSubscriber()) { ?>

		<?php if (ThemexCourse::$data['course']['status'] != 'private') { ?>



		<?php } ?>

	<?php }

	$usercount = count(ThemexCourse::$data['course']['users']) + count(ThemexCourse::$data['course']['usersb']);

	$coursecapaciy = get_post_meta($post->ID, '_course_capacity', true);

	if (!ThemexCourse::isMember() && !ThemexCourse::isMemberb() && $coursecapaciy != 0 && $usercount >= $coursecapaciy) { ?>

		<div class="button medium secondary left">

			<?php $butttextcap = 'ظرفیت ثبت نام حضوری تکمیل شده';

			$butttextcapr = ThemexCourse::$data['course']['butttextcap'];

			if ($butttextcapr != '') {
				$butttextcap = $butttextcapr;
			}

			?>

			<span class="caption"> <?php echo $butttextcap; ?></span>
		</div>

	<?php } else if (!ThemexCourse::isMember() && !ThemexCourse::isMemberb()) { ?>

		<?php if (ThemexCourse::$data['course']['status'] != 'private') { ?>

			<input type="hidden" name="course_action" value="add" />

			<a href="#" class="button medium price-button submit-button left">

				<?php $butttext = ThemexCourse::$data['course']['butttext']; ?>

				<span class="caption"><?php if ($butttext != '') {
											echo $butttext;
										} else {
											echo 'ثبت نام دوره حضوری';
										} ?></span>

				<?php if (ThemexCourse::$data['course']['status'] == 'premium') { ?>

					<span class="price"><?php echo ThemexCourse::$data['course']['price']; ?></span>

				<?php }

				if (ThemexCourse::$data['course']['status'] == 'free') { ?>

					<span class="price">رایگان</span>

				<?php }

				?>

			</a>

		<?php } ?>

	<?php } else if (ThemexCourse::$data['unsubscribe'] != 'true') { ?>

		<input type="hidden" name="course_action" value="remove" />

		<a href="#" class="button secondary medium submit-button left"><span><?php _e('Unsubscribe Now', 'academy'); ?></span></a>

	<?php } else if (ThemexCourse::isMember() || ThemexCourse::isMemberb()) { ?>

		<div class="button medium secondary left">



			<?php $butttextaf = 'شما دانشجوی دوره حضوری هستید';

			$butttextafr = ThemexCourse::$data['course']['butttextaf'];

			if ($butttextafr != '') {
				$butttextaf = $butttextafr;
			}

			?>

			<span class="caption"> <?php echo $butttextaf;  ?> </span>
		</div>

		<?php /*

	 <span class="note-s" > در صورتی که هنوز مبلغ دوره را پرداخت نکرده اید، از قسمت زیر استفاده کنید. </span>

    <input type="hidden" name="course_action" value="add" />

		<a href="#" class="button medium price-button submit-button left">

			<span class="caption"><?php _e('دوره حضوری', 'academy'); ?></span>

			<?php if(ThemexCourse::$data['course']['status']=='premium') { ?>

			<span class="price"><?php echo ThemexCourse::$data['course']['price']; ?></span>

			<?php } ?>

		</a>

   */ ?>

	<?php } ?>

</form>







<form action="<?php echo ThemexCourse::getAction(get_permalink()); ?>" method="POST">

	<input type="hidden" name="course_id" value="<?php the_ID(); ?>" />

	<?php if (!ThemexCourse::isSubscriber()) { ?>

		<?php if (ThemexCourse::$data['course']['statusv'] != 'private') { ?>



		<?php } ?>

	<?php }

	$usercountv = count(ThemexCourse::$data['course']['usersv']) + count(ThemexCourse::$data['course']['usersvb']);

	$coursecapaciyv = get_post_meta($post->ID, '_course_capacityv', true);

	if (!ThemexCourse::isMemberv() && !ThemexCourse::isMembervb() && $coursecapaciyv != 0 && $usercountv >= $coursecapaciyv) { ?>

		<div class="button medium secondary left">

			<?php $butttextcapv = 'ظرفیت ثبت نام تکمیل شده';

			$butttextcaprv = get_post_meta($post->ID, '_course_butttextcapv', true);

			if ($butttextcaprv != '') {
				$butttextcapv = $butttextcaprv;
			}

			?>

			<span class="caption"> <?php echo $butttextcapv; ?></span>
		</div>

	<?php } else if (!ThemexCourse::isMemberv() && !ThemexCourse::isMembervb()) { ?>

		<?php if (ThemexCourse::$data['course']['statusv'] != 'private') { ?>

			<input type="hidden" name="course_action" value="addv" />

			<a href="#" class="button medium price-button submit-button left">

				<?php $butttextcapvirt = 'ثبت نام دوره مجازی';

				$butttextcapvr = ThemexCourse::$data['course']['butttextvirt'];

				if ($butttextcapvr != '') {
					$butttextcapvirt = $butttextcapvr;
				}

				?>

				<span class="caption"><?php echo $butttextcapvirt; ?></span>

				<?php if (ThemexCourse::$data['course']['statusv'] == 'premium') { ?>

					<span class="price"><?php echo ThemexCourse::$data['course']['pricev']; ?></span>

				<?php }

				if (ThemexCourse::$data['course']['statusv'] == 'free') { ?>

					<span class="price">رایگان</span>

				<?php } ?>

			</a>

		<?php } ?>

	<?php } else if (ThemexCourse::$data['unsubscribe'] != 'true') { ?>

		<input type="hidden" name="course_action" value="remove" />

		<a href="#" class="button secondary medium submit-button left"><span><?php _e('Unsubscribe Now', 'academy'); ?></span></a>

	<?php } else if (ThemexCourse::isMemberv() || ThemexCourse::isMembervb()) { ?>

		<div class="button medium secondary left">

			<?php $butttextaftvirt = 'شما دانشجوی دوره مجازی هستید';

			$butttextaftvr = ThemexCourse::$data['course']['butttextafvirt'];

			if ($butttextaftvr != '') {
				$butttextaftvirt = $butttextaftvr;
			}

			?>

			<span class="caption"> <?php echo $butttextaftvirt; ?> </span>

		</div>

		<?php /*

        <span class="note-s" > در صورتی که هنوز مبلغ دوره را پرداخت نکرده اید، از قسمت زیر استفاده کنید. </span>

    		<input type="hidden" name="course_action" value="addv" />

		<a href="#" class="button medium price-button submit-button left">

			<span class="caption"><?php _e('دوره مجازی', 'academy'); ?></span>

			<?php if(ThemexCourse::$data['course']['statusv']=='premium') { ?>

			<span class="price"><?php echo ThemexCourse::$data['course']['pricev']; ?></span>

			<?php } ?>

		</a>

		*/ ?>

	<?php }  ?>

</form>



<?php if (ThemexCourse::hasCertificate()) { ?>

	<a href="<?php echo ThemexCourse::getCertificateURL(); ?>" target="_blank" class="button medium certificate-button"><span><?php _e('View Certificate', 'academy'); ?></span></a>

<?php } ?>