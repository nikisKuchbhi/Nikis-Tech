<!-- Bnner Section -->
<section class="banner-section-two">
    <div class="banner-carousel owl-carousel owl-theme">
        <?php foreach ($atts['slide_info'] as $key => $item): ?>
        <!-- Slide Item -->
        <div class="slide-item" style="background-image: url('<?php echo esc_url($item->bg_img); ?>');">
            <div class="auto-container">
                <div class="content-box">
                    <span class="title"><?php echo wp_kses_post($item->sub_title); ?></span>
                    <h2><?php echo wp_kses_post($item->title); ?></h2>
                    <?php if ($item->video_link): ?>
                        <div class="video-link">
                            <a href="<?php echo esc_url($item->video_link); ?>" data-fancybox="gallery" data-caption=""><i class="icon fa fa-play" aria-hidden="true"></i></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</section>
<!-- End Bnner Section -->
