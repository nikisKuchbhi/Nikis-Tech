<!-- About Section -->
<section class="about-section" style="background-image: url('<?php echo esc_url($bg_img); ?>');">
    <div class="auto-container">
        <div class="row no-gutters">
            <!-- Image Column -->
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="title-box wow fadeInLeft" data-wow-delay='1200ms'>
                        <h2><?php echo wp_kses_post($title); ?></h2>
                    </div>
                    <div class="image-box">
                        <figure class="alphabet-img wow fadeInRight"><img src="<?php echo esc_url($alphabet_img); ?>" alt="<?php esc_attr_e('Alphabet Image', 'contra');?>"></figure>
                        <figure class="image wow fadeInRight" data-wow-delay='600ms'><img src="<?php echo esc_url($about_img); ?>" alt="<?php esc_attr_e('About Image', 'contra');?>"></figure>
                    </div>
                </div>
            </div>

            <!-- Content Column -->
            <div class="content-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column wow fadeInLeft">
                    <div class="content-box">
                        <div class="title">
                            <h2><?php echo wp_kses_post($sub_title); ?></h2>
                        </div>
                        <div class="text"><?php echo wp_kses_post($text); ?></div>
                        <div class="link-box"><a href="<?php echo esc_url($btn_link); ?>" class="theme-btn btn-style-one"><?php echo wp_kses_post($btn_title); ?></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End About Section -->
