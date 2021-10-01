<!-- Bnner Section -->
<section class="banner-section-three">
    <div class="banner-carousel-two owl-carousel owl-theme">
        <?php foreach( $atts['slide_info'] as $key => $item ): ?>
        <!-- Slide Item -->
        <div class="slide-item" style="background-image: url('<?php echo esc_url($item->bg_img); ?>');">
            <div class="auto-container">
                <div class="content-box clearfix">
                    <div class="inner-box">
                        <h4 class="title"><?php echo wp_kses_post($item->sub_title); ?></h4>
                        <h2><?php echo wp_kses_post($item->title); ?></h2>
                        <div class="text"><?php echo wp_kses_post($item->text); ?></div>
                        <div class="link-box"><a href="<?php echo esc_url($item->btn_link); ?>"><?php echo wp_kses_post($item->btn_title); ?></a></div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>

    <div class="bottom-box">
        <div class="auto-container">
            <div class="outer-box clearfix">
                <ul class="social-links clearfix">
                    <?php foreach( $atts['social_icons'] as $key => $item ): ?>
                    <li><a href="<?php echo esc_url($item->social_link); ?>"><span class="fa <?php echo esc_attr($item->icons); ?>"></span> <?php echo wp_kses_post($item->social_title); ?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Bnner Section -->