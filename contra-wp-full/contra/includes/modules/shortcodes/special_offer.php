<!-- Offer Section -->
<section class="offer-section" style="background-image: url('<?php echo esc_url($bg_img); ?>');">
    <div class="auto-container">
        <div class="row">
            <div class="content-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column">
                    <span class="title"><?php echo wp_kses_post($sub_title); ?></span>
                    <h2><?php echo wp_kses_post($title); ?></h2>
                    <span class="discount"><?php echo wp_kses_post($discount_value); ?></span>
                    <div class="text"><?php echo wp_kses_post($text); ?></div>
                </div>
            </div> 

            <div class="form-column order-last col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="discount-form">
                        <!--Comment Form-->
                        <?php echo do_shortcode($contact_form); ?>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</section>
<!--End Offer Section -->