<?php $options = get_option('contra'.'_theme_options');
    $footer_bg = (contra_set($options, 'footer_bg_img')) ? contra_set($options, 'footer_bg_img') : get_template_directory_uri().'/images/background/5.jpg';
    $copyright = contra_set($options, 'copyright');
    $copyright = ($copyright) ? $copyright : 'Copyright © 2019 <a href="#">Expert-themes.</a> All right reserved';
?>

    <div class="clearfix"></div>

    <!-- Main Footer -->
    <footer class="main-footer alternate" style="background-image: url(<?php echo esc_url($footer_bg)?>);">
        <?php if (is_active_sidebar('footer-sidebar')) : ?>
            <?php if (!(contra_set($options, 'hide_upper_footer'))):?>
            <div class="auto-container">
                <!--Widgets Section-->
                <div class="widgets-section">
                    <div class="row">
                        <?php dynamic_sidebar('footer-sidebar'); ?>
                    </div>
                </div>
            </div>
            <?php endif;?>
        <?php endif; ?>

        <?php if (!(contra_set($options, 'hide_bottom_footer'))):?>
        <!--Footer Bottom-->
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <?php if (contra_set($options, 'footer_social')): ?>
                        <?php if (contra_set($options, 'social_media') && is_array(contra_set($options, 'social_media'))): ?>
                        <div class="social-links">
                            <ul class="social-icon-two">
                                <?php $social_icons = contra_set($options, 'social_media');
                                    foreach (contra_set($social_icons, 'social_media') as $social_icon):
                                    if (isset($social_icon['tocopy' ])) {
                                        continue;
                                    } ?>
                                    <li><a href="<?php echo esc_url(contra_set($social_icon, 'social_link')); ?>"><i class="fa <?php echo esc_attr(contra_set($social_icon, 'social_icon')); ?>"></i></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="copyright-text">
                        <p><?php echo wp_kses_post($copyright);?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php endif;?>
    </footer>
    <!-- End Main Footer -->

</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-circle-o-up"></span></div>

<?php wp_footer(); ?>
</body>
</html>
