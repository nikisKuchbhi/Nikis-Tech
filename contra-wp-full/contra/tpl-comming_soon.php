<?php /* Template Name: Comming Soon Page */
    $options = _WSH()->option();
    get_header('comming-soon') ;
    $bg = (contra_set($options, 'cs_section_img')) ? contra_set($options, 'cs_section_img') : get_template_directory_uri().'/images/background/3.jpg';
    $logo_img = (contra_set($options, 'cs_logo_img')) ? contra_set($options, 'cs_logo_img') : get_template_directory_uri().'/images/logo-2.svg';
    $title = contra_set($options, 'cs_section_title');
    $count = contra_set($options, 'cs_section_count');
    $text = contra_set($options, 'cs_section_text');
    $id = contra_set($options, 'cs_id');
?>

<!-- Coming Soon -->
<section class="coming-soon" style="background-image:url('<?php echo esc_url($bg);?>')">
    <div class="auto-container">
        <div class="content">
            <div class="content-inner">
                <div class="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($logo_img);?>" alt="<?php esc_attr_e('Coming Soon Image', 'contra');?>" /></a></div>
                <h2><?php if ($title) {
    echo wp_kses_post($title);
} else {
    esc_html_e('Comming Soon', 'contra');
}?></h2>
                <div class="time-counter"><div class="time-countdown clearfix" data-countdown="<?php if ($count) {
    echo esc_attr($count);
} else {
    esc_html_e('2020/8/17', 'contra');
}?>"></div></div>
                <div class="text"><?php if ($text): echo wp_kses_post($text); else : esc_html_e('Our Website is under construction. stay tuned for something amazing!.', 'contra');?> <br> <?php esc_html_e('Subscribe to be notified,', 'contra'); endif;?></div>
                <!--Emailed Form-->
                <div class="emailed-form">
                    <form  method="post" action="http://feedburner.google.com/fb/a/mailverify" accept-charset="utf-8">
                        <div class="form-group">
                            <input type="hidden" id="uri3" name="uri" value="<?php echo wp_kses_post($id); ?>">
                            <input type="email" name="email" value="" placeholder="<?php esc_attr_e('Enter your email', 'contra');?>" required>
                            <button type="submit" class="theme-btn btn-style-one"><?php esc_html_e('Submit', 'contra');?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Coming Soon -->

<?php while (have_posts()): the_post(); ?>
    <?php the_content(); ?>
<?php endwhile;  ?>
<?php get_footer('comming-soon') ; ?>
