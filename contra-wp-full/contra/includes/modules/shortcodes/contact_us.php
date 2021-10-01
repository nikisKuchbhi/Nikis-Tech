<!-- Contact Section -->
<section class="contact-section">
    <div class="inner-container">
        <div class="sec-title">
            <span class="float-text"><?php echo wp_kses_post($bg_title); ?></span>
            <h2><?php echo wp_kses_post($title); ?></h2>
        </div>

        <div class="row">
            <!-- Info Column -->
            <div class="info-column col-lg-4 col-md-12 col-sm-12">
                <div class="inner-column">
                    <h4><?php echo wp_kses_post($sub_title); ?></h4>
                    <ul class="contact-info">
                        <li><?php echo wp_kses_post($address); ?></li>
                        <li><?php echo wp_kses_post($phone_no); ?></li>
                        <li><a href="mailTo:<?php echo esc_attr($email); ?>"><?php echo wp_kses_post($email); ?></a></li>
                    </ul>
                </div>
            </div>

            <!-- Form Column -->
            <div class="form-column col-lg-8 col-md-12 col-sm-12">
                <div class="inner-column">
                    <!-- Contact Form -->
                    <div class="contact-form">
                        <?php echo do_shortcode($contact_form); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Contact Section -->