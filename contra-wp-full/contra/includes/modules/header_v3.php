<?php $options = _WSH()->option();
    contra_bunch_global_variable();
?>

<!-- Main Header-->
<header class="main-header header-style-three">
    <div class="auto-container">
        <div class="main-box clearfix">
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

                <?php if (contra_set($options, 'hidden_sidebar')): ?>
                    <!-- Main Menu End-->
                    <div class="outer-box clearfix">
                        <button class="nav-toggler"><span class="fa fa-bars"></span></button>
                    </div>
                <?php endif;?>
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

<!--Form Back Drop-->
<div class="form-back-drop"></div>

<?php if (contra_set($options, 'hidden_sidebar')): ?>
<!-- Hidden Bar -->
<section class="hidden-bar">
    <div class="inner-box">
        <div class="cross-icon"><span class="fa fa-times"></span></div>
        <div class="title">
            <h2><?php echo wp_kses_post(contra_set($options, 'form_title')); ?></h2>
        </div>

        <!--Appointment Form-->
        <div class="appointment-form">
            <?php echo do_shortcode(contra_set($options, 'contact_form')); ?>
        </div>

        <!--Contact Info Box-->
        <div class="contact-info-box">
            <ul class="info-list">
                <li><?php echo wp_kses_post(contra_set($options, 'email_2')); ?></li>
                <li><?php echo wp_kses_post(contra_set($options, 'phone_no_2')); ?></li>
            </ul>

            <?php if (contra_set($options, 'head_social_2')): ?>
                <?php if (contra_set($options, 'social_media') && is_array(contra_set($options, 'social_media'))): ?>
                <ul class="social-list clearfix">
                    <?php $social_icons = contra_set($options, 'social_media');
                        foreach (contra_set($social_icons, 'social_media') as $social_icon):
                        if (isset($social_icon['tocopy' ])) {
                            continue;
                        } ?>
                        <li><a href="<?php echo esc_url(contra_set($social_icon, 'social_link')); ?>"><?php echo esc_attr(contra_set($social_icon, 'title')); ?></a></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<!--End Hidden Bar -->

<?php endif; ?>
