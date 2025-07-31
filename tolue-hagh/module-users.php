<?php if( (get_post_meta(ThemexCourse::$data['course']['ID'], '_course_stuview', true)!='hidden' )&& (ThemexCourse::hasMembers() || ThemexCourse::hasMembersv() || ThemexCourse::hasMembersb() || ThemexCourse::hasMembersvb() )) { 

			$users=ThemexCore::parseMeta($post->ID, $post->post_type, 'users');
			$usersb=ThemexCore::parseMeta($post->ID, $post->post_type, 'usersb');
			$usersv=ThemexCore::parseMeta($post->ID, $post->post_type, 'usersv');
			$usersvb=ThemexCore::parseMeta($post->ID, $post->post_type, 'usersvb');
			$mergeusers = array_merge($users,$usersb,$usersv,$usersvb);
			$userscount = count($mergeusers);
	
?>
<div class="widget stdlist">
	<div class="widget-title">
		<h4 class="nomargin"><?php _e('دانشجویان دوره', 'academy'); echo '<span> '.$userscount,' نفر </span>'; ?></h4>
        <div class="min-des">فقط دانشجویانی که نمایش پروفایلشان باز است.</div>
	</div>
	<div class="widget-content clearfix">
		<div class="users-listing clearfix">
        	<div class="nano">
            	 <div class="content">
			<?php
			$limitnum = 100;
			$mergeusers = array_unique($mergeusers);

			/*if ($userscount > $limitnum){
				$mergeusers= array_rand(array_flip($mergeusers) , $limitnum);
			}*/

			if (count($mergeusers) > $limitnum) {
				$mergeusers = array_rand(array_flip($mergeusers), $limitnum);
			}
	
			$blogusers = new WP_User_Query(array(
				'include' => $mergeusers,
				'orderby'      => 'ID',
				'number' => $limitnum,
			));
			$blogusersre = $blogusers->get_results();
			$counter=0;
			foreach ($blogusersre as $user) {

				$userview = $user->viewProfile;
				if ( $userview == 'yes' ) {} else {
				$counter++;
				?>
				<div class="user-image <?php echo $counter==3?'last':''; ?>">
					<div class="bordered-image">
						<a class="nicon" title="<?php echo ThemexUser::getFullName($user); ?>" href="<?php echo get_author_posts_url($user->ID); ?>"><?php echo get_avatar( $user->ID ); ?></a>
                  
					</div>
				</div>
					<?php if($counter==3) { ?>
					<div class="clear"></div>
					<?php
					$counter=0;
					}
				}
			}
	
				if ($userscount > $limitnum){
				echo '<p> محدودیت نمایش '. $limitnum .' نفر </p>';
				
			}
?>
			
 
            
                </div>
            </div>
				<script type="text/javascript">
					var $ =jQuery.noConflict();
					$(function(){
						$('.nano').nanoScroller({
							preventPageScrolling: true
						});
					});
                </script>
		</div>			
	</div>
</div>
<?php } ?>

 