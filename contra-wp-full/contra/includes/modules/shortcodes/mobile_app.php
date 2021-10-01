<!-- App Section -->
<section class="app-section">
    <div class="outer-box">
        <div class="auto-container">
            <div class="row">
                <!-- Title Column -->
                <div class="title-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h1><?php echo wp_kses_post($title); ?></h1>
                    </div>
                </div>

                <!-- Image Column -->
                <div class="image-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="image-box wow zoomInLeft">
                            <figure class="image"><img src="<?php echo esc_url($mobile_image); ?>" alt="<?php esc_attr_e('Mobile Image', 'contra');?>"></figure>
                        </div>
                    </div>
                </div>

                <!-- Content Column -->
                <div class="content-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h3><?php echo wp_kses_post($sub_title); ?></h3>
                        <div class="text"><?php echo wp_kses_post($text); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End App Section -->
