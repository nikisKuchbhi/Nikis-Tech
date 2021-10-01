<?php $options = _WSH()->option();
    get_header();
    $settings  = contra_set(contra_set(get_post_meta(get_the_ID(), 'bunch_page_meta', true), 'bunch_page_options'), 0);
    $meta = _WSH()->get_meta('_bunch_layout_settings');
    $meta1 = _WSH()->get_meta('_bunch_header_settings');
    $meta2 = _WSH()->get_meta();
    _WSH()->page_settings = $meta;
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

<?php while (have_posts()): the_post();
    $post_meta = _WSH()->get_meta('bunch_projects');
?>

<!--Project Detail Section-->
<section class="project-details-section">
    <div class="project-detail">
        <div class="auto-container">
            <!-- Upper Box -->
            <div class="upper-box">
                <!--Project Tabs-->
                <div class="project-tabs tabs-box clearfix">
                    <!--Tab Btns-->
                    <ul class="tab-btns tab-buttons clearfix">
                    <?php if ($projects_img = contra_set($meta2, 'bunch_projects_image')): ?>
                        <?php foreach ($projects_img as $key => $value):?>
                            <li data-tab="#tab-<?php echo esc_attr($key); ?>" class="tab-btn <?php if ($key == 1) {
    echo 'active-btn';
} ?>"><img src="<?php echo esc_url(contra_set($value, 'projects_image'));?>" alt="<?php esc_attr_e('Project Image', 'contra');?>"></li>
                        <?php endforeach;?>
                    <?php endif;?>
                    </ul>

                    <!--Tabs Container-->
                    <div class="tabs-content">
                        <?php if ($projects_img = contra_set($meta2, 'bunch_projects_image')): ?>
                        <?php foreach ($projects_img as $key => $value):?>
                        <!--Tab / Active Tab-->
                        <div class="tab <?php if ($key == 1) {
    echo 'active-tab';
} ?>" id="tab-<?php echo esc_attr($key); ?>">
                            <figure class="image"><a href="<?php echo esc_url(contra_set($value, 'projects_image'));?>" class="lightbox-image" data-fancybox="images"><img src="<?php echo esc_url(contra_set($value, 'projects_image'));?>" alt="<?php esc_attr_e('Project Image', 'contra');?>"></a></figure>
                        </div>
                        <?php endforeach;?>
                        <?php endif;?>
                    </div>
                </div>
            </div>

            <!--Lower Content-->
            <div class="lower-content">
                <div class="row clearfix">
                    <!--Content Column-->
                    <div class="content-column col-lg-8 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <h2><?php the_title(); ?></h2>

                            <?php the_content(); ?>
                        </div>
                    </div>

                    <!--Info Column-->
                    <div class="info-column col-lg-4 col-md-12 col-sm-12 ">
                        <div class="inner-column wow fadeInRight">
                            <h3><?php echo wp_kses_post(contra_set($meta2, 'sub_title'));?></h3>
                            <p><?php echo wp_kses_post(contra_set($meta2, 'description'));?></p>
                            <?php if ($project_info = contra_set($meta2, 'bunch_project_info')):?>
                            <ul class="info-list">
                                <?php foreach ($project_info as $keys => $value):?>
                                <li><strong><?php echo wp_kses_post(contra_set($value, 'info_title')); ?></strong> <?php echo wp_kses_post(contra_set($value, 'info_description')); ?></li>
                                <?php endforeach;?>
                            </ul>
                            <?php endif;?>
                            <!--Help Box-->
                            <div class="help-box-two">
                                <div class="inner">
                                    <span class="title"><?php echo wp_kses_post(contra_set($meta2, 'con_upper_title'));?></span>
                                    <h2><?php echo wp_kses_post(contra_set($meta2, 'con_title'));?></h2>
                                    <div class="text"><?php echo wp_kses_post(contra_set($meta2, 'con_text'));?></div>
                                    <a class="theme-btn btn-style-two" href="<?php echo esc_url(contra_set($meta2, 'con_btn_link'));?>"><?php echo wp_kses_post(contra_set($meta2, 'con_btn_title'));?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Portfolio Details-->

<?php endwhile;?>

<?php get_footer(); ?>
