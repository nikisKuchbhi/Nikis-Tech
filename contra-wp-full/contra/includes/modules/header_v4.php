<?php $options = _WSH()->option();
    contra_bunch_global_variable();
?>

<!-- Main Header-->
<header class="main-header header-style-five">
    <div class="main-box">
        <div class="inner-container clearfix">
            <div class="logo-box">
                <?php if (contra_set($options, 'logo_image_2')):?>
                    <div class="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(contra_set($options, 'logo_image_2'));?>" alt="<?php esc_attr_e('Contra', 'contra');?>" title="<?php esc_attr_e('Contra', 'contra');?>"></a></div>
                <?php else:?>
                    <div class="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_template_directory_uri().'/images/logo.svg');?>" alt="<?php esc_attr_e('Contra', 'contra');?>"></a></div>
                <?php endif;?>
            </div>

            <div class="nav-outer">
                <!-- Main Menu -->
                <nav class="main-menu navbar-expand-md ">
                    <div class="navbar-header">
                        <!-- Toggle Button -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon flaticon-menu-button"></span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                        <ul class="navigation clearfix">
                            <?php wp_nav_menu(array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
                                'container_class'=>'navbar-collapse collapse navbar-right',
                                'menu_class'=>'nav navbar-nav',
                                'fallback_cb'=>false,
                                'items_wrap' => '%3$s',
                                'container'=>false,
                                'depth' => 3,
                                'walker'=> new Bootstrap_walker()
                            )); ?>
                        </ul>
                    </div>
                </nav><!-- Main Menu End-->
            </div>

            <!-- Main Menu End-->
            <div class="outer-box clearfix">
                <?php if (contra_set($options, 'head_social_3')): ?>
                    <?php if (contra_set($options, 'social_media') && is_array(contra_set($options, 'social_media'))): ?>
                        <ul class="social-icon-one">
                            <?php $social_icons = contra_set($options, 'social_media');
                                foreach (contra_set($social_icons, 'social_media') as $social_icon):
                                if (isset($social_icon['tocopy' ])) {
                                    continue;
                                } ?>
                                <li><a href="<?php echo esc_url(contra_set($social_icon, 'social_link')); ?>"><i class="fa <?php echo esc_attr(contra_set($social_icon, 'social_icon')); ?>"></i></a></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if ((contra_set($options, 'phone_no_3')) || (contra_set($options, 'email_3'))): ?>
                <ul class="contact-info">
                    <li><span><?php esc_html_e('Phone :', 'contra'); ?></span> <?php echo wp_kses_post(contra_set($options, 'phone_no_3')); ?></li>
                    <li><span><?php esc_html_e('EMAIL :', 'contra'); ?></span> <a href="<?php echo esc_attr(contra_set($options, 'email_3')); ?>"><?php echo wp_kses_post(contra_set($options, 'email_3')); ?></a></li>
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Sticky Header  -->
    <div class="sticky-header">
        <div class="auto-container clearfix">
            <!--Logo-->
            <div class="logo pull-left">
                <?php if (contra_set($options, 'responsive_logo_image')):?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="img-responsive"><img src="<?php echo esc_url(contra_set($options, 'responsive_logo_image'));?>" alt="<?php esc_attr_e('Contra', 'contra');?>" title="<?php esc_attr_e('Contra', 'contra');?>"></a>
                <?php else:?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="img-responsive"><img src="<?php echo esc_url(get_template_directory_uri().'/images/sticky-logo.svg');?>" alt="<?php esc_attr_e('Contra', 'contra');?>"></a>
                <?php endif;?>
            </div>
            <!--Right Col-->
            <div class="pull-right">
                <!-- Main Menu -->
                <nav class="main-menu">
                    <div class="navbar-collapse show collapse clearfix">
                        <ul class="navigation clearfix">
                            <?php wp_nav_menu(array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
                                'container_class'=>'navbar-collapse collapse navbar-right',
                                'menu_class'=>'nav navbar-nav',
                                'fallback_cb'=>false,
                                'items_wrap' => '%3$s',
                                'container'=>false,
                                'walker'=> new Bootstrap_walker()
                            )); ?>
                        </ul>
                    </div>
                </nav><!-- Main Menu End-->
            </div>
        </div>
    </div><!-- End Sticky Menu -->
</header>
<!--End Main Header -->
