<?php $options = _WSH()->option();
    contra_bunch_global_variable();
?>

<!-- Main Header-->
<header class="main-header header-style-two">
    <?php if (contra_set($options, 'show_topbar')): ?>
    <!--Header Top-->
    <div class="header-top">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="top-left">
                    <ul class="contact-list clearfix">
                        <?php if (contra_set($options, 'phone_no_1')): ?>
                            <li><i class="fa fa-volume-control-phone"></i> <?php echo wp_kses_post(contra_set($options, 'phone_no_1')); ?></li>
                        <?php endif; ?>

                        <?php if (contra_set($options, 'email_1')): ?>
                            <li><i class="fa fa-envelope"></i><a href="<?php echo wp_kses_post(contra_set($options, 'email_1')); ?>"><?php echo wp_kses_post(contra_set($options, 'email_1')); ?></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <?php if (contra_set($options, 'head_social_1')): ?>
                    <?php if (contra_set($options, 'social_media') && is_array(contra_set($options, 'social_media'))): ?>
                    <div class="top-right">
                        <ul class="social-icon-four clearfix">
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
            </div>
        </div>
    </div>
    <!-- End Header Top -->
    <?php endif; ?>

    <div class="header-lower">
        <div class="auto-container">
            <div class="main-box clearfix">
                <div class="logo-box">
                    <?php if (contra_set($options, 'logo_image')):?>
                        <div class="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(contra_set($options, 'logo_image'));?>" alt="<?php esc_attr_e('Contra', 'contra');?>" title="<?php esc_attr_e('Contra', 'contra');?>"></a></div>
                    <?php else:?>
                        <div class="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_template_directory_uri().'/images/logo-2.svg');?>" alt="<?php esc_attr_e('Contra', 'contra');?>"></a></div>
                    <?php endif;?>
                </div>

                <div class="nav-outer clearfix">
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

                    <!-- Outer Box-->
                    <div class="outer-box">
                        <?php if (contra_set($options, 'cart_icon')): ?>
                        <?php if (function_exists('WC')): global $woocommerce; ?>
                        <!-- Cart Btn -->
                        <div class="cart-btn">
                            <a href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" title="<?php esc_attr_e('Cart Image', 'contra');?>">
                                <i class="fa fa-shopping-basket"></i>
                                <span class="count"><?php echo esc_attr($woocommerce->cart->cart_contents_count)?></span>
                            </a>
                        </div>
                        <?php endif;?>
                        <?php endif;?>

                        <?php if (contra_set($options, 'search_form_2')): ?>
                        <!--Search Box-->
                        <div class="search-box-outer">
                            <div class="dropdown">
                                <button class="search-box-btn" type="button"><span class="fa fa-search"></span></button>
                                <!-- <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu3">
                                    <li class="panel-outer">
                                        <div class="form-container">

                                        </div>
                                    </li>
                                </ul> -->
                            </div>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quik search -->
        <div class="dez-quik-search">
            <form action="<?php echo esc_url(home_url('/')); ?>" method="get">
                <input name="s" autocomplete="off" type="text" class="form-control" placeholder="<?php esc_attr_e('Search Here', 'contra');?>">
                <button type="submit" class="search-btn"><span class="fa fa-search"></span></button>
                <span id="quik-search-remove"><i class="fa fa-remove"></i></span>
            </form>
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
