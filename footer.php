<!--    </div>
    <div class="col-md-3">
        <?php  //dynamic_sidebar('sidebar-2'); ?>
    </div>
    </div>-->

    <section id="bottom">
        <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="row">
                <div class="col-md-3">
                    <div class="widget">
                       <?php  dynamic_sidebar('sidebar-b1'); ?>
                    </div>    
                </div>
                 <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <?php  dynamic_sidebar('sidebar-b2'); ?>
                    </div>    
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <?php  dynamic_sidebar('sidebar-b3'); ?>
                    </div>    
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <?php  dynamic_sidebar('sidebar-b4'); ?>
                    </div>    
                </div>
            </div>
        </div>
    </section><!--/#bottom-->

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6" id="copyright-text">
                    <span id="copyright-float">&copy; <?php echo get_theme_mod('footer_copy_text') ?></span>
                </div>
                <div class="col-sm-6">
                    <?php  wp_nav_menu(array('theme_location' => 'footer')) ?>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
    
<?php  wp_footer() ?>
    
</body>
</html>
