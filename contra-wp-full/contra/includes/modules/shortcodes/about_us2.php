<!--Studio Section-->
<section class="studio-section">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Image Column-->
            <div class="image-column col-md-5 col-sm-12 col-xs-12">
                <div class="image">
                    <img src="<?php echo esc_url($image); ?>" alt="<?php esc_attr_e('Studio Image', 'contra');?>" />
                </div>
            </div>

            <!--Content Column-->
            <div class="content-column col-md-7 col-sm-12 col-xs-12">
                <div class="inner-column">
                    <div class="sec-title">
                        <div class="title"><?php echo wp_kses_post($upper_title); ?></div>
                        <h3><?php echo wp_kses_post($title); ?></h3>
                        <strong><?php echo wp_kses_post($heading_title); ?></strong>
                    </div>
                    <div class="text">
                        <?php echo wp_kses_post($text); ?>
                    </div>
                    <div class="styled-text"><?php echo wp_kses_post($text1); ?></div>
                    <a href="<?php echo esc_url($btn_link); ?>" class="view-projects"><?php echo wp_kses_post($btn_title); ?></a>
                </div>
            </div>

        </div>
    </div>
</section>
<!--End Studio Section-->
