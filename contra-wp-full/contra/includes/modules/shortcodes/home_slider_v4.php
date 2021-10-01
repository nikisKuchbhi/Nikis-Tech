<!-- Bnner Section -->
<section class="banner-section-four">
    <div class="banner-carousel-three owl-carousel owl-theme">
        <?php foreach( $atts['slide_info'] as $key => $item ): ?>
        <div class="slide-item" style="background-image: url('<?php echo esc_url($item->bg_img); ?>');">
            <div class="auto-container">
                <div class="content-box">
                    <h2><?php echo wp_kses_post($item->title); ?></h2>
                    <div class="text"><?php echo wp_kses_post($item->text); ?></div>
                    <div class="link-box">
                        <a href="<?php echo esc_url($item->btn_link); ?>" class="theme-btn btn-style-one"><?php echo wp_kses_post($item->btn_title); ?></a>
                    </div>
                </div>
            </div>
        </div>
		<?php endforeach;?>
    </div>
</section>
<!-- End Bnner Section -->