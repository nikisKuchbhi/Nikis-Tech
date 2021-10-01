<!-- Bnner Section -->
<section class="banner-section-six">

    <div class="banner-carousel-two owl-carousel owl-theme">

        <?php $count = 1; foreach ($atts['slide_info'] as $key => $item): ?>
        <!-- Slide Item -->
        <div class="slide-item" style="background-image: url('<?php echo esc_url($item->bg_img); ?>');">
            <?php if ($item->title1): ?>
            <div class="shape-image">
                <div class="content-inner">
                    <h2><?php echo wp_kses_post($item->title1); ?></h2>
                    <a href="<?php echo esc_url($item->btn_link1); ?>" class="view-projects"><?php echo wp_kses_post($item->btn_title1); ?></a>
                </div>
            </div>
            <?php endif; ?>
            <div class="auto-container">
                <div class="content-box">
                    <div class="inner-box">
                        <span class="count"><?php $count = sprintf('%02d', $count); echo wp_kses_post($count); ?></span>
                        <h4 class="title"><?php echo wp_kses_post($item->sub_title); ?></h4>
                        <h2><?php echo wp_kses_post($item->title); ?></h2>
                        <div class="text"><?php echo wp_kses_post($item->text); ?></div>
                        <div class="link-box"><a href="<?php echo esc_url($item->btn_link); ?>"><?php echo wp_kses_post($item->btn_title); ?></a></div>
                    </div>
                </div>
            </div>
        </div>
        <?php $count++; endforeach;?>
    </div>

    <ul class="contact-info">
        <li><?php echo wp_kses_post($phone_no); ?></li>
        <li><?php echo wp_kses_post($email); ?></li>
    </ul>

    <ul class="social-links">
        <?php foreach ($atts['social_icons'] as $key => $item): ?>
        <li><a href="<?php echo esc_url($item->social_link); ?>"><span class="fa <?php echo esc_attr($item->icons); ?>"></span> <?php echo wp_kses_post($item->social_title); ?></a></li>
        <?php endforeach;?>
    </ul>
</section>
<!-- End Bnner Section -->
