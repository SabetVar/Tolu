<?php 

$icount = 1 ;

			if (class_exists('CoAuthorsIterator')) {

				$i = new CoAuthorsIterator();

				$icount = $i->count();

			}

if( $icount == 1 && get_post_meta(ThemexCourse::$data['course']['ID'], '_course_teaview', true)=='show' ) {

 $getauthor = ThemexCourse::$data['course']['author'];  

 $userdata = get_userdata($getauthor->ID);

 $authorfullname = $userdata->first_name . ' ' . $userdata->last_name ;	

  ?>

<div class="widget tdes">

	<div class="widget-title">

		<h3 class="nomargin"><?php echo ' استاد '.  $authorfullname ; ?></h3>

        <div class="tava">

            <a href="<?php echo get_author_posts_url( $getauthor->ID); ?>" target="_blank">

				<?php echo get_avatar( $getauthor->ID ); ?>

            </a>

        </div>

	</div>

	<div class="widget-content clearfix">

		<div class="users-listing clearfix">

        	<div class="nano">

            	 <div class="content">

					 <?php  echo wpautop(get_user_meta( $getauthor->ID, 'description', true))  ?>            

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

</div>

<?php } ?>



 