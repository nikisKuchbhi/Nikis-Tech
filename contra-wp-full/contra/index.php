<?php contra_bunch_global_variable();
    $options = _WSH()->option();
    get_header();
    if ($wp_query->is_posts_page) {
        $meta = _WSH()->get_meta('_bunch_layout_settings', get_queried_object()->ID);
        $meta1 = _WSH()->get_meta('_bunch_header_settings', get_queried_object()->ID);
        if (contra_set($_GET, 'layout_style')) {
            $layout = contra_set($_GET, 'layout_style');
        } else {
            $layout = contra_set($meta, 'layout', 'full');
        }
        $sidebar = contra_set($meta, 'sidebar', 'default-sidebar');
        $bg = contra_set($meta1, 'header_img');
        $title = contra_set($meta1, 'header_title');
        $text = contra_set($meta1, 'header_text');
    } else {
        $settings  = _WSH()->option();
        if (contra_set($_GET, 'layout_style')) {
            $layout = contra_set($_GET, 'layout_style');
        } else {
            $layout = contra_set($settings, 'archive_page_layout', 'full');
        }
        $sidebar = contra_set($settings, 'archive_page_sidebar', 'default-sidebar');
        $bg = contra_set($settings, 'archive_page_header_img');
        $title = contra_set($settings, 'archive_page_header_title');
        $text = contra_set($settings, 'archive_page_header_text');
    }
    $layout = contra_set($_GET, 'layout') ? contra_set($_GET, 'layout') : $layout;
    $sidebar = ($sidebar) ? $sidebar : 'default-sidebar';
    $layout = ($layout) ? $layout : 'full';

    if (is_active_sidebar($sidebar)) {
        $layout = 'right';
    } else {
        $layout = 'full';
    }

    _WSH()->page_settings = array('layout'=>'right', 'sidebar'=>$sidebar);
    $classes = (!$layout || $layout == 'full' || contra_set($_GET, 'layout_style')=='full') ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-9 col-md-12 col-sm-12 ' ;
    ?>

    <!--Page Title-->
    <section class="page-title">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1><?php esc_html_e('Our Blog', 'contra');?></h1>
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
                        <div class="sidebar-side col-lg-3 col-md-12 col-sm-12">
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
                                <!-- Post -->
                                <div id="post-<?php the_ID(); ?>" <?php post_class();?>>
                                    <?php get_template_part('blog'); ?>
                                <!-- blog post item -->
                                </div><!-- End Post -->
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
                        <div class="sidebar-side col-lg-3 col-md-12 col-sm-12">
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
