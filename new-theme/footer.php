        </div> <!-- container -->
    </main> <!-- main-content -->
    <div class="move-top"></div>
    <div class="text-center my-4">
        <a referrerpolicy="origin" target="_blank" href="https://trustseal.enamad.ir/?id=67961&Code=">
            <img referrerpolicy="origin" src="https://trustseal.enamad.ir/logo.aspx?id=67961&Code=" alt="" class="h-20 inline-block" />
        </a>
    </div>
    <footer class="footer-wrap bg-secondary text-accent">
        <div class="container mx-auto grid md:grid-cols-3 gap-4 py-6">
            <nav class="footer-navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'footer_menu' ) ); ?>
            </nav>
            <div>
                <div class="fotnote"><?php ThemexStyler::siteCopyright(); ?></div>
                <div class="text-sm">
                    <a class="mx-1" href="http://sitedesignu.ir" target="_blank" rel="noreferrer">طراحی سایت <img src="<?php echo get_site_url(); ?>/site-design.png" width="20" height="20" class="inline-block" /></a>
                    <a href="https://fath.pro" target="_blank">فتح</a>
                </div>
            </div>
            <div class="fotsocial footer-navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'social_footer' ) ); ?>
            </div>
        </div>
    </footer>
</div> <!-- site-wrap -->
<?php wp_footer(); ?>
</body>
</html>
