<?php the_post(); ?>

<?php ThemexCourse::initCourse($post->ID); ?>

<div class="curtop">

    <div class="threecol column sticky">

    <?php get_template_part('loop','coursesticky'); ?>

    </div>

    <?php

		$icount = 1 ;

			if (class_exists('CoAuthorsIterator')) {

				$i = new CoAuthorsIterator();

				$icount = $i->count();

			}

	

	 if( (get_post_meta(ThemexCourse::$data['course']['ID'], '_course_stuview', true)!='hidden' && (ThemexCourse::hasMembers() || ThemexCourse::hasMembersv() || ThemexCourse::hasMembersb() || ThemexCourse::hasMembersvb() ) ) || ( $icount == 1 && get_post_meta(ThemexCourse::$data['course']['ID'], '_course_teaview', true)=='show' )   ) { ?>

    <div class="sixcol column">

    <?php } else { ?>

    <div class="ninecol column last">

    <?php } ?>

    

    <?php if( get_post_meta(ThemexCourse::$data['course']['ID'], '_course_toptitle', true)!='hidden') { ?>

        <div class="course-title widget">

                <div class="widget-title"><h1 class="nomargin ci ctitle"><?php the_title(); ?></h1></div>

                <div class="widget-content">
                

                

                <?php $getauthor = ThemexCourse::$data['course']['author'];  ?>

                   

                   <?php	 

						if ( function_exists( 'coauthors_posts_links' ) && $icount > 1 ) {

							$au_ids = coauthors_ids(',', ',',null,null,false);

							$myArray = explode(',', $au_ids);

							$sn=1;

							foreach ( $myArray as $i_single ){

								$class = 'fourcol column';

								if ( $sn % 3 == 0 ) { $class = 'fourcol column last';} 

								$userdata = get_userdata($i_single);
								$author = $userdata->first_name . ' ' . $userdata->last_name ;

								?>

                                

                                    <div class="<?php echo $class; ?>">

                                        <a href="<?php echo get_author_posts_url($i_single); ?>" target="_blank">

                                            <div class="topcir"> 

                                                <div class="iconcir i1"><?php echo get_avatar( $i_single ); ?></div>

                                                <div class="textcir"><?php echo $author; ?></div>

                                            </div>

                                        </a>

                                     </div>

                                    

								<?php

								$sn++;

							}

						} else { 

						

					?>

                                 

                    <div class="fourcol column">

                        <a href="<?php echo $getauthor->user_link; ?>" target="_blank">

                            <div class="topcir"> 

                                <div class="iconcir i1"><?php echo get_avatar( $getauthor->ID ); ?></div>

                                <div class="textcir"><?php echo $getauthor->full_name; ?></div>

                            </div>

                        </a>

                    </div>

                    

                    <?php } ?>

                    

    <?php if ( get_post_meta($post->ID, 'wpcf-curse_date', true) ) { ?>

                    

                    <div class="fourcol column">

                        <a href="#">

                            <div class="topcir">

                                <div class="iconcir curse_time"></div>

                                <div class="textcir"><?php echo get_post_meta($post->ID, 'wpcf-curse_date', true); ?></div>

                            </div>

                        </a>

                    </div>

    <?php } ?>

    

    <?php if ( get_post_meta($post->ID, 'wpcf-curse_date1', true) ) { ?>

                    <div class="fourcol column last">

                        <a href="#">

                            <div class="topcir">

                                <div class="iconcir curse_time num"></div>

                                <div class="textcir"><?php echo get_post_meta($post->ID, 'wpcf-curse_date1', true); ?></div>

                            </div>

                        </a>

                    </div>                             

    <?php } ?>

                            
				<div class="clear"></div>
                </div>						

        </div>

    <?php } ?>  

        <div class="course-description widget <?php echo ThemexCourse::$data['course']['status']; ?>-course">

            <div class="widget-title"><h2 class="nomargin"><?php echo 'توضیحات ' . get_the_title()  ?></h2></div>

            <div class="widget-content">


            

                <?php	the_content(); ?>

                

                            

                <footer class="course-footer">

                <?php get_template_part('module', 'form'); ?>

                </footer>			

            </div>						

        </div>

    </div>

    <div class="threecol column last">

	<?php get_template_part('module', 'author'); ?>

    <?php get_template_part('module', 'users'); ?>

    </div>

</div>

<?php if($attachments=ThemexCore::parseMeta($post->ID, 'course', 'notif')) { ?>

<div class="curtop">

	<div class="course-notif widget <?php echo ThemexCourse::$data['course']['status']; ?>-course">

		<div class="widget-title"><h4 class="nomargin"><?php echo 'اطلاعیه های دوره ' . get_the_title()  ?></h4></div>

		<div class="widget-content">

        	

            <ul>

            <?php $in= count($attachments); foreach( array_reverse($attachments) as $attachment) { ?>

			<li class="cource-notif">

				<div class="not-num"> <div> <?php echo $in; ?></div>  </div><div class="not-des"><?php echo stripslashes($attachment['title']);?></div>

                <div class="clear"></div>

            </li>

			<?php $in--; } ?>

            </ul>

       

        </div>

    </div>

</div>

<?php } ?>