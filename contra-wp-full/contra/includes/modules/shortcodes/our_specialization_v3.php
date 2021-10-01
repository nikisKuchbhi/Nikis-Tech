<?php if ($style_two == 'two'):?>

<!-- Specialize Section -->
<section class="specialize-section-two alternate">
    <div class="auto-container">
        <div class="row">
            <!-- Title Column -->
            <div class="title-column col-lg-5 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="sec-title">
                        <span class="float-text"><?php echo wp_kses_post($bg_title); ?></span>
                        <h2><?php echo wp_kses_post($title); ?></h2>
                    </div>

                    <div class="text-box">
                        <h4><?php echo wp_kses_post($sub_title); ?></h4>
                        <?php echo wp_kses_post($text); ?>
                    </div>
                    <div class="link-box">
                        <a href="<?php echo esc_url($btn_link); ?>"><?php echo wp_kses_post($btn_title); ?> <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Carousel Column -->
            <div class="carousel-column col-lg-7 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="carousel-outer">
                        <ul class="image-carousel owl-carousel owl-theme">
                            <?php foreach ($atts['architectural_design'] as $key => $item): ?>
                            <li><a href="<?php echo esc_url($item->image); ?>" class="lightbox-image" title="<?php esc_attr_e('Image Caption Here', 'contra');?>"><img src="<?php echo esc_url($item->image); ?>" alt="<?php esc_attr_e('Architect Image', 'contra');?>"></a></li>
                            <?php endforeach;?>
                        </ul>

                        <ul class="thumbs-carousel owl-carousel owl-theme">

                            <?php foreach ($atts['architectural_design'] as $key => $item): ?>
                            <li class="thumb-box">
                                <figure><img src="<?php echo esc_url($item->thumb_img); ?>" alt="<?php esc_attr_e('Thumbnail Image', 'contra');?>"></figure>
                                <div class="overlay"><span class="icon fa fa-arrows-alt"></span></div>
                            </li>
                            <?php endforeach;?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- End Specialize Section -->

<?php else: ?>

<!-- Specialize Section -->
<section class="specialize-section-two">
    <div class="auto-container">
        <div class="row">
            <!-- Title Column -->
            <div class="title-column col-xl-5 col-lg-12 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="sec-title">
                        <span class="float-text"><?php echo wp_kses_post($bg_title); ?></span>
                        <h2><?php echo wp_kses_post($title); ?></h2>
                    </div>

                    <div class="text-box">
                        <h4><?php echo wp_kses_post($sub_title); ?></h4>
                        <?php echo wp_kses_post($text); ?>
                    </div>
                    <div class="link-box">
                        <a href="<?php echo esc_url($btn_link); ?>"><?php echo wp_kses_post($btn_title); ?> <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Carousel Column -->
            <div class="carousel-column col-xl-7 col-lg-12 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="carousel-outer">
                        <ul class="image-carousel owl-carousel owl-theme">
                            <?php foreach ($atts['architectural_design'] as $key => $item): ?>
                            <li><a href="<?php echo esc_url($item->image); ?>" class="lightbox-image" title="<?php esc_attr_e('Image Caption Here', 'contra');?>"><img src="<?php echo esc_url($item->image); ?>" alt="<?php esc_attr_e('Architect Image', 'contra');?>"></a></li>
                            <?php endforeach;?>
                        </ul>

                        <ul class="thumbs-carousel owl-carousel owl-theme">
                            <?php foreach ($atts['architectural_design'] as $key => $item): ?>
                            <li class="thumb-box">
                                <figure><img src="<?php echo esc_url($item->thumb_img); ?>" alt="<?php esc_attr_e('Thumb Image', 'contra');?>"></figure>
                                <div class="overlay"><span class="icon fa fa-arrows-alt"></span></div>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- End Specialize Section -->

<?php endif; ?>
