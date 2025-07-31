<div id="themex-statistics" class="themex-statistics wrap">

	<div id="icon-edit" class="icon32"><br></div><h2><?php _e('آمار', 'academy'); ?></h2>

	<div id="poststuff">		

		<div id="post-body" class="columns-2">

			<div id="post-body-content">

			<?php

			

			$query = new WP_Query( 'post_type=course&posts_per_page=-1' );

			$is=1;

			$is1=1;

			 if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();

			 

			$usersa  =ThemexCore::parseMeta($query->post->ID  , 'course' , 'users');				

			$usersva  =ThemexCore::parseMeta($query->post->ID  , 'course' , 'usersv');

 			$usersb  =ThemexCore::parseMeta($query->post->ID  , 'course' , 'usersb');

 			$usersvb  =ThemexCore::parseMeta($query->post->ID  , 'course' , 'usersvb');

			

			$users = array_merge((array)$usersa, (array)$usersb );	

			$usersv = array_merge((array)$usersva, (array)$usersvb );				

			// print_r($$users);	

		if ($users){	

					$blogusers = get_users(array(

						'include' => $users,

						'orderby'      => 'login',

					));

					

				

    foreach ($blogusers as $user) {

		$registered = ($user->user_registered . "\n");

        $out.= '<tr>'.

		 '<td>'. $is .'</td>'.

		 '<td>'. get_the_title() .'</td>'.

		 '<td>'. $user->user_login . '</td>'.

		 '<td>'. $user->user_email . '</td>'.

		 '<td>'. $user->first_name . '</td>'.

		 '<td>'. $user->last_name . '</td>'.

		 '<td>'. $user->billing_phone . '</td>'.

		// '<td>'. date("j/n/Y", strtotime($registered)). '</td>'.	 

		  	'</tr>';

			$is ++;

    }

		}

 

		if ($usersv){	

					$blogusersv = get_users(array(

						'include' => $usersv,

						'orderby'      => 'login',

					));

					

				

    foreach ($blogusersv as $userv) {

		$registeredv = ($userv->user_registered . "\n");

        $out1.= '<tr>'.

		 '<td>'. $is1 .'</td>'.

		 '<td>'. get_the_title() .'</td>'.

		 '<td>'. $userv->user_login . '</td>'.

		 '<td>'. $userv->user_email . '</td>'.

		 '<td>'. $userv->first_name . '</td>'.

		 '<td>'. $userv->last_name . '</td>'.

		 '<td>'. $userv->billing_phone . '</td>'.

		// '<td>'. date("j/n/Y", strtotime($registered)). '</td>'.	 

		  	'</tr>';

			$is1 ++;

    }

		}	 

			 endwhile; endif;

			 

			 echo '<h2>دانشجویان حضوری </h2><table id="table_results" class="data"> <thead><tr> <th >ردیف</th> <th >نام دوره</th> <th>نام کاربری</th> <th>پست الکترونیکی</th>  <th>نام </th><th>نام خانوادگی </th><th>شماره تماس </th></tr></thead><tbody>'; 

			 

			 echo $out; 

			 

			 echo '</tbody></table>';

			 

			 echo '<h2>دانشجویان مجازی </h2><table id="table_results" class="data"> <thead><tr> <th >ردیف</th> <th >نام دوره</th> <th>نام کاربری</th> <th>پست الکترونیکی</th>  <th>نام </th><th>نام خانوادگی </th><th>شماره تماس </th></tr></thead><tbody>'; 

			 

			 echo $out1; 

			 

			 echo '</tbody></table>';	

			 

			 wp_reset_query();		 

			?>

			</div>

			<div id="postbox-container-1" class="postbox-container">

				  

			</div>

		</div>		

	</div>	

</div>