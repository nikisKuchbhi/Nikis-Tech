<!-- Fun Fact Section -->
<section class="fun-fact-section">
    <div class="outer-box" style="background-image: url('<?php echo esc_url($bg_img); ?>');">
        <div class="auto-container">
            <div class="fact-counter">
                <div class="row">
                	<?php foreach( $atts['funfact'] as $key => $item ): ?>
					<!--Column-->
                    <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
                        <div class="count-box">
                            <div class="count"><span class="count-text" data-speed="5000" data-stop="<?php echo wp_kses_post($item->counter_stop); ?>"><?php echo wp_kses_post($item->counter_start); ?></span><?php echo wp_kses_post($item->alphabet_letter); ?></div>
                            <h4 class="counter-title"><?php echo wp_kses_post($item->title); ?></h4>
                        </div>
                    </div>
					<?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Fun Fact Section -->