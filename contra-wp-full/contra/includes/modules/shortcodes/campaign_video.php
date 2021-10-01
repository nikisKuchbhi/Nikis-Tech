<?php if ($style_two == 'two'):?>

<!-- Video Section -->
<section class="video-section style-two">
    <div class="outer-box">
        <div class="auto-container">
            <div class="row">
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title">
                            <span class="float-text"><?php echo wp_kses_post($bg_title); ?></span>
                            <h2><?php echo wp_kses_post($title); ?></h2>
                        </div>
                        <span class="title"><?php echo wp_kses_post($sub_title); ?></span>
                        <div class="text"><?php echo wp_kses_post($text); ?></div>
                    </div>
                </div>

                <!-- Video Column -->
                <div class="video-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="video-box">
                             <figure class="image"><img src="<?php echo esc_url($video_img); ?>" alt="<?php esc_attr_e('Video Image', 'contra');?>">
                                <a href="<?php echo esc_url($video_link); ?>" class="link" data-fancybox="gallery" data-caption=""><span class="icon fa fa-play"></span></a>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Video Section -->

<?php else: ?>

<!-- Video Section -->
<section class="video-section">
    <div class="outer-box" style="background-image: url('<?php echo esc_url($bg_img); ?>');">
        <div class="auto-container">
            <div class="row">
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title light">
                            <span class="float-text"><?php echo wp_kses_post($bg_title); ?></span>
                            <h2><?php echo wp_kses_post($title); ?></h2>
                        </div>
                        <span class="title"><?php echo wp_kses_post($sub_title); ?></span>
                        <div class="text"><?php echo wp_kses_post($text); ?></div>
                    </div>
                </div>

                <!-- Video Column -->
                <div class="video-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="video-box">
                             <figure class="image"><img src="<?php echo esc_url($video_img); ?>" alt="<?php esc_attr_e('Video Image', 'contra');?>">
                                <a href="<?php echo esc_url($video_link); ?>" class="link" data-fancybox="gallery" data-caption=""><span class="icon fa fa-play"></span></a>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Video Section -->

<?php endif; ?>
