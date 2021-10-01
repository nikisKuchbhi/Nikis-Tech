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
        $layout = contra_set($meta, 'layout', 'full');
    }
    if (!$layout || $layout == 'full' || contra_set($_GET, 'layout_style')=='full') {
        $sidebar = '';
    } else {
        $sidebar = contra_set($meta, 'sidebar', 'blog-sidebar');
    }
    $layout = ($layout) ? $layout : 'full';
    $sidebar = ($sidebar) ? $sidebar : 'blog-sidebar';
    if (is_active_sidebar($sidebar)) {
        $layout = 'right';
    } else {
        $layout = 'full';
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

<!-- Sidebar Page Container -->
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">

            <!-- sidebar area -->
            <?php if ($layout == 'left'): ?>
                <?php if (is_active_sidebar($sidebar)) {
    ?>
                    <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                        <aside class="sidebar default-sidebar">
                            <?php dynamic_sidebar($sidebar); ?>
                        </aside>
                    </div>
                <?php
} ?>
            <?php endif; ?>

            <!--Content Side-->
            <div class="content-side <?php echo esc_attr($classes);?>">
                <div class="thm-unit-test">

                    <?php while (have_posts()): the_post();
                        global $post;
                        $post_meta = _WSH()->get_meta();
                    ?>

                        <div class="blog-detail">
                            <!-- News Block -->
                            <div class="news-block-two">
                                <div class="inner-box">
                                    <?php if (has_post_thumbnail()): ?>
                                    <div class="image-box">
                                        <figure class="image"><?php the_post_thumbnail('contra_1170x400'); ?></figure>
                                    </div>
                                    <?php endif; ?>
                                    <div class="caption-box">
                                        <div class="inner">
                                            <ul class="info">
                                                <li><?php echo get_the_date(); ?>,</li>
                                                <li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a></li>
                                                <li><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><?php comments_number(wp_kses_post(__('0 Comments', 'contra')), wp_kses_post(__('1 Comment', 'contra')), wp_kses_post(__('% Comments', 'contra'))); ?></a></li>
                                            </ul>
                                            <div class="text">
                                                <?php the_content();?>
                                                <div class="clearfix"></div>
                                                <?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'contra'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php if (has_tag()):?>
                            <!-- Tags -->
                            <div class="tags clearfix">
                                <span class="title"><?php esc_html_e('Tags:', 'contra'); ?></span>
                                <ul>
                                    <?php the_tags('<li>', '</li><li>', '</li>'); ?>
                                </ul>
                            </div>
                            <?php endif; ?>

                            <!-- Share Option -->
                            <?php if (contra_set($options, 'show_sharing_icon')): ?>
                                <div class="share-option">
                                    <?php echo wp_kses_post(bunch_share_us(get_the_id(), $post->post_name)); ?>
                                </div>
                            <?php endif;?>

                            <!-- comment area -->
                            <?php comments_template(); ?><!-- end comments -->

                        </div>

                    <?php endwhile;?>

                </div>

            </div>
            <!--Content Side-->

            <!-- sidebar area -->
            <?php if ($layout == 'right'): ?>
                <?php if (is_active_sidebar($sidebar)) {
                        ?>
                    <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                        <aside class="sidebar default-sidebar">
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
