<!-- FAQ Section -->
<section class="faq-section">
    <div class="auto-container">
        <div class="row">
            <!-- Image Column -->
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="image-box">
                        <figure class="image"><img src="<?php echo esc_url($feature_img); ?>" alt="<?php esc_attr_e('Faq Image', 'contra');?>"></figure>
                    </div>
                </div>
            </div>

            <div class="accordion-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="sec-title">
                        <span class="float-text"><?php echo wp_kses_post($bg_title); ?></span>
                        <h2><?php echo wp_kses_post($title); ?></h2>
                    </div>
                    <ul class="accordion-box">
                        <?php foreach ($atts['accordion'] as $key => $item): ?>
                        <!--Block-->
                        <li class="accordion block <?php if ($key == 2) {
    echo 'active-block';
} ?>">
                            <div class="acc-btn <?php if ($key == 2) {
    echo 'active';
} ?>"><?php echo wp_kses_post($item->acc_title); ?> <div class="icon fa fa-plus-square"></div></div>
                            <div class="acc-content <?php if ($key == 2) {
    echo 'current';
} ?>">
                                <div class="content">
                                    <div class="text"><?php echo wp_kses_post($item->acc_text); ?></div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End FAQ Section -->
