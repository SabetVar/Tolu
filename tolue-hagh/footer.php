					</div>
				</div>

			</div>

			<!-- /content -->

            <div class="move-top"></div>

			<row>
				<div style="position: relative; z-index:9999; display: block; width: 100%; text-align: center;">
					<!--<a referrerpolicy="origin" target="_blank" href="https://trustseal.enamad.ir/?id=67961&amp;Code=YtpAEeSdSEc1lcmHo9N4">
						<img style="height: 75px; cursor:pointer" referrerpolicy="origin" src="https://Trustseal.eNamad.ir/logo.aspx?id=67961&amp;Code=YtpAEeSdSEc1lcmHo9N4" alt="" id="YtpAEeSdSEc1lcmHo9N4">
					</a>-->
                    <a referrerpolicy='origin' target='_blank' href='https://trustseal.enamad.ir/?id=67961&Code='>
                        <img referrerpolicy='origin' src='https://trustseal.enamad.ir/logo.aspx?id=67961&Code=' alt='' style='cursor:pointer' Code=''>
                    </a>
				</div>
			</row>
			<div class="footer-wrap">
				
				
				<footer class="site-footer">

                    <div class="row">

                        <div class="sixcol column">

                            <nav class="footer-navigation">
                                <?php wp_nav_menu( array( 'theme_location' => 'footer_menu' ) ); ?>

                            </nav>

                        </div>

                        <div class="fourcol column">

							<div class="fotnote"><?php ThemexStyler::siteCopyright(); ?></div>

                            <div class="umcopyright"><a style="line-height:18px; height:18px; padding:0px 2px;" href="http://sitedesignu.ir" target="_blank" rel="noreferrer" title="طراحی سایت ام البنین (س)">طراحی سایت <img alt="طراحی سایت" title="طراحی سایت" style="margin: 0px 5px -5px 5px; padding: 0px;" src="<?php echo get_site_url(); ?>/site-design.png" width="20" height="20" /> </a> <a href="https://fath.pro" title="فتح" target="_blank">فتح</a></div>                         

                        </div>

                        <div class=" twocol column last">

                            <div class="fotsocial footer-navigation"><?php wp_nav_menu( array( 'theme_location' => 'social_footer' ) ); ?></div>





                        </div>

                        

                        

					</div>  		

				</footer>				

			</div>

			<!-- /footer -->			

		</div>

		<!-- /site wrap -->

	<?php wp_footer(); ?>
<!--
<script> var $ =jQuery.noConflict(); $('.icon, .nicon').tipsy({gravity: 's', fade: true});</script>
-->
<?php /* ummu remove swiper
    <!-- Swiper JS -->

   <script type="text/javascript" src="<?php echo THEME_URI; ?>js/swiper.min.js"></script>



    <!-- Initialize Swiper -->

    <script>

	function initSwiper() {

		var screenWidth = $(window).width();

			if(screenWidth < 790 ) {            

				var swiper = new Swiper('.swiper-container', {

					pagination: '.swiper-pagination',

					slidesPerView: 2,

					centeredSlides: true,

					paginationClickable: true,

					spaceBetween: 30

				});

			}

	}

	

	//Swiper plugin initialization

	initSwiper();

	

	//Swiper plugin initialization on window resize

	$(window).on('resize', function(){

		initSwiper();        

	});

    </script>
	*/ ?>

	</body>

</html>