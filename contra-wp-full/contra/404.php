<?php
$options = _WSH()->option();
    $text = '';
    $bg = contra_set($options, '404_page_bg') ? contra_set($options, '404_page_bg') : get_template_directory_uri().'/images/background/10.jpg';
    $title = contra_set($options, '404_page_title');
    $text = contra_set($options, '404_page_text');
    $page_heading = contra_set($options, '404_page_heading');
    $page_description = contra_set($options, '404_page_tag_line');
    $page_text = contra_set($options, '404_page_text');
    get_header();
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
                    <span class="title"><?php echo wp_kses_post($text); ?></span>
                <?php endif; ?>
            </div>
            <?php echo wp_kses_post(contra_get_the_breadcrumb()); ?>
        </div>
    </div>
</section>
<!--End Page Title-->

<!--Error Section-->
<section class="error-section">
    <div class="auto-container">
        <div class="error-title">
        4<span>0</span>4
        </div>
        <h4><?php if ($page_description) {
    echo wp_kses_post($page_description);
} else {
    esc_html_e('Oops! That page cannot be found', 'contra');
} ?></h4>
        <div class="text"><?php if ($page_text) {
    echo wp_kses_post($page_text);
} else {
    esc_html_e('Sorry, but the page you are looking for does not existing', 'contra');
} ?></div>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="theme-btn btn-style-one"><?php esc_html_e('Home Page', 'contra'); ?></a>
    </div>
</section>
<!--Error Section-->

<?php get_footer(); ?>
