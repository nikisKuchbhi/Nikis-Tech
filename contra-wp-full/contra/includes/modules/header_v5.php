<?php $options = _WSH()->option();
    contra_bunch_global_variable();
?>

<!-- Main Header-->
<header class="main-header header-style-six">
    <div class="outer-container">
        <div class="main-box clearfix">
            <div class="logo-box">
                <?php if (contra_set($options, 'logo_image')):?>
                    <div class="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(contra_set($options, 'logo_image'));?>" alt="<?php esc_attr_e('Contra', 'contra');?>" title="<?php esc_attr_e('Contra', 'contra');?>"></a></div>
                <?php else:?>
                    <div class="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_template_directory_uri().'/images/logo-2.svg');?>" alt="<?php esc_attr_e('Contra', 'contra');?>"></a></div>
                <?php endif;?>
            </div>

            <!-- Main Menu End-->
            <div class="outer-box clearfix">
                <ul class="contact-info">
                    <?php if (contra_set($options, 'phone_no_4')): ?>
                    <li><span class="fa fa-phone"></span> <?php echo wp_kses_post(contra_set($options, 'phone_no_4')); ?></li>
                    <?php endif;?>

                    <?php if (contra_set($options, 'email_4')): ?>
                    <li><span class="fa fa-envelope-o"></span> <a href="<?php echo esc_attr(contra_set($options, 'email_4')); ?>"><?php echo wp_kses_post(contra_set($options, 'email_4')); ?></a></li>
                    <?php endif;?>

                    <?php if (contra_set($options, 'address_4')): ?>
                    <li><span class="fa fa-map-marker"></span> <?php echo wp_kses_post(contra_set($options, 'address_4')); ?></li>
                    <?php endif;?>
                </ul>
            </div>

            <?php if (contra_set($options, 'sidebar_menu_icons')): ?>
            <!-- Btn Box -->
            <div class="btn-box">
                <button class="nav-toggler"><span class="icon fa fa-bars"></span></button>
            </div>
            <?php endif;?>
        </div>
    </div>

</header>
<!--End Main Header -->

<!--Form Back Drop-->
<div class="form-back-drop"></div>

<?php if (contra_set($options, 'sidebar_menu_icons')): ?>
<!-- Hidden Bar -->
<section class="sidenav-bar">
    <div class="inner-box">
        <div class="upper-box">
            <?php if (contra_set($options, 'logo_image')):?>
                <div class="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(contra_set($options, 'logo_image'));?>" alt="<?php esc_attr_e('Contra', 'contra');?>" title="<?php esc_attr_e('Contra', 'contra');?>"></a></div>
            <?php else:?>
                <div class="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_template_directory_uri().'/images/logo-2.svg');?>" alt="<?php esc_attr_e('Contra', 'contra');?>"></a></div>
            <?php endif;?>
            <div class="cross-icon"><span class="fa fa-times"></span></div>
        </div>

        <!-- .Side Nav -->
        <nav class="side-nav">
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
        </nav><!-- /.Side-menu -->


        <div class="subscribe-form">
            <h5><?php echo wp_kses_post(contra_set($options, 'form_title_2')); ?></h5>
            <form action="http://feedburner.google.com/fb/a/mailverify" accept-charset="utf-8">
                <input type="hidden" id="uri2" name="uri" value="<?php echo wp_kses_post(contra_set($options, 'id')); ?>">
                <input type="email" name="email" placeholder="<?php esc_attr_e('Your Email Address', 'contra'); ?>">
                <button type="submit" class="theme-btn btn-style-one"><?php esc_html_e('Send Now', 'contra'); ?></button>
            </form>
        </div>
    </div>
</section>
<!--End Hidden Bar -->

<?php endif; ?>
