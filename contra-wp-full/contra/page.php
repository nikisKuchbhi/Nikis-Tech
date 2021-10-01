<?php $options = _WSH()->option();
    get_header();
    $settings  = contra_set(contra_set(get_post_meta(get_the_ID(), 'bunch_page_meta', true), 'bunch_page_options'), 0);
    $meta = _WSH()->get_meta('_bunch_layout_settings');
    $meta1 = _WSH()->get_meta('_bunch_header_settings');
    if (contra_set($_GET, 'layout_style')) {
        $layout = contra_set($_GET, 'layout_style');
    } else {
        $layout = contra_set($meta, 'layout', 'full');
    }
    $sidebar = contra_set($meta, 'sidebar', 'default-sidebar');
    $layout = ($layout) ? $layout : 'full';
    $sidebar = ($sidebar) ? $sidebar : 'default-sidebar';
    
    if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
	$classes = (!$layout || $layout == 'full' || contra_set($_GET, 'layout_style')=='full') ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-8 col-md-12 col-sm-12 ' ;
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

                <!--Default Section-->
                <div class="blog-classic">

                    <!--Blog Post-->
                    <div class="thm-unit-test">

                        <?php while (have_posts()): the_post();?>
                            <!-- blog post item -->
                            <?php the_content(); ?>
                            <div class="clearfix"></div>

                            <?php comments_template(); ?><!-- end comments -->

                            <?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'contra'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>

                        <?php endwhile;?>

                    </div>

                    <!--Styled Pagination-->
                    <div class="styled-pagination clearfix">
                        <?php contra_the_pagination(); ?>
                    </div>

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
            <!--Sidebar-->

        </div>
    </div>
</div>

<?php get_footer(); ?>
