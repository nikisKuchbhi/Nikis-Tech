<?php /* Template Name: King Composer Page */
    get_header() ;
    $options = _WSH()->option();
    $meta = _WSH()->get_meta('_bunch_header_settings');
    $bg = (contra_set($meta, 'header_img')) ? contra_set($meta, 'header_img') : get_template_directory_uri().'/images/background/10.jpg';
    $title = contra_set($meta, 'header_title');
    $text = contra_set($meta, 'header_text');
?>
<?php if (contra_set($meta, 'breadcrumb')):?>

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

<?php endif;?>
<?php while (have_posts()): the_post(); ?>
    <?php the_content(); ?>
<?php endwhile;  ?>
<?php get_footer() ; ?>
