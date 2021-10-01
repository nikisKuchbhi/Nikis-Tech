<?php $options = _WSH()->option();
    get_header();
    $settings  = contra_set(contra_set(get_post_meta(get_the_ID(), 'bunch_page_meta', true), 'bunch_page_options'), 0);
    $meta = _WSH()->get_meta('_bunch_layout_settings');
    $meta1 = _WSH()->get_meta('_bunch_header_settings');
    $meta2 = _WSH()->get_meta();
    _WSH()->page_settings = $meta;
    if (contra_set($_GET, 'layout_style')) {
        $layout = contra_set($_GET, 'layout_style');
    } else {
        $layout = contra_set($meta, 'layout', 'right');
    }
    if (!$layout || $layout == 'full' || contra_set($_GET, 'layout_style')=='full') {
        $sidebar = '';
    } else {
        $sidebar = contra_set($meta, 'sidebar', 'blog-sidebar');
    }
    $classes = (!$layout || $layout == 'full' || contra_set($_GET, 'layout_style')=='full') ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-8 col-md-12 col-sm-12 ' ;
    _WSH()->post_views(true);
    $bg = contra_set($meta1, 'header_img');
    $title = contra_set($meta1, 'header_title');
    $text = contra_set($meta1, 'header_text');
?>

<!--Page Title-->
<section class="page-title" <?php if ($bg):?>style="background-image:url(<?php echo esc_url($bg)?>);"<?php endif;?>>
    <div class="auto-container">
        <div class="inner-container clearfix">
            <div class="title-box">
                <h1><?php if ($title) {
    echo wp_kses_post($title);
} else {
    wp_title('');
}?></h1>
                <?php if ($text): ?>
                    <span class="title"><?php echo wp_kses_post($text) ;?></span>
                <?php endif; ?>
            </div>
            <?php echo wp_kses_post(contra_get_the_breadcrumb()); ?>
        </div>
    </div>
</section>
<!--End Page Title-->

<!--Sidebar Page Container-->
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">

            <!-- sidebar area -->
            <?php if ($layout == 'left'): ?>
                <?php if (is_active_sidebar($sidebar)) {
    ?>
                    <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                        <aside class="sidebar services-sidebar">
                            <?php dynamic_sidebar($sidebar); ?>
                        </aside>
                    </div>
                <?php
} ?>
            <?php endif; ?>

            <!--Content Side-->
            <div class="content-side <?php echo esc_attr($classes);?>">

                <?php while (have_posts()): the_post();
                    global $post;
                    $service_meta = _WSH()->get_meta();
                ?>

                    <div class="service-detail">
                        <div class="inner-box">
                            <?php if ($projects_img = contra_set($service_meta, 'bunch_projects_image')): ?>
                            <div class="image-box">
                                <div class="single-item-carousel owl-carousel owl-theme">
                                    <?php foreach ($projects_img as $key => $value):?>
                                    <figure class="image"><img src="<?php echo esc_url(contra_set($value, 'projects_image'));?>" alt="<?php esc_attr_e('Services Image', 'contra');?>" /></figure>
                                    <?php endforeach;?>
                                </div>
                            </div>
                            <?php endif; ?>

                            <h2><?php the_title(); ?></h2>
                            <div class="text">
                               <?php the_content();?>
                            </div>
                        </div>

                        <?php if ($accordion = contra_set($service_meta, 'bunch_services_accordion')):?>
                        <!--Product Info Tabs-->
                        <div class="product-info-tabs">
                            <!--Product Tabs-->
                            <div class="prod-tabs tabs-box">
                                <!--Tab Btns-->
                                <ul class="tab-btns tab-buttons clearfix">
                                    <?php foreach ($accordion as $keys => $value):?>
                                        <li data-tab="#prod-details<?php echo esc_attr($keys); ?>" class="tab-btn <?php if ($keys == 1) {
                    echo 'active-btn';
                } ?>"><?php echo wp_kses_post(contra_set($value, 'acc_title')); ?></li>
                                    <?php endforeach;?>
                                </ul>

                                <!--Tabs Container-->
                                <div class="tabs-content">
                                    <?php foreach ($accordion as $keys => $value):?>
                                        <!--Tab / Active Tab-->
                                        <div class="tab <?php if ($keys == 1) {
                    echo 'active-tab';
                } ?>" id="prod-details<?php echo esc_attr($keys); ?>">
                                            <div class="content">
                                                <?php echo wp_kses_post(contra_set($value, 'acc_text')); ?>
                                            </div>
                                        </div>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                        <!--End Product Info Tabs-->
                        <?php endif;?>
                    </div>

                <?php endwhile;?>

            </div>
            <!--Content Side-->

            <!-- sidebar area -->
            <?php if ($layout == 'right'): ?>
                <?php if (is_active_sidebar($sidebar)) {
                    ?>
                    <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                        <aside class="sidebar services-sidebar">
                            <?php dynamic_sidebar($sidebar); ?>
                        </aside>
                    </div>
                <?php
                } ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
