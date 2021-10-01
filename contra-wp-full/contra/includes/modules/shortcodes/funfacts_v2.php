<!--Fun Facts Section-->
<div class="fact-counter-section fun-fact-section">
    
    <div class="outer-box" style="background-image: url('<?php echo esc_url($bg_img); ?>');">
    <div class="overlay-main"></div>
    <div class="fact-counter fact-conter-two">
        <div class="auto-container">
            <div class="row clearfix">
            	<?php foreach( $atts['funfact'] as $key => $item ): ?>
                <!--Column-->
                <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                    <div class="inner">
                        <div class="count-outer count-box">
                            <span class="count-text" data-speed="2000" data-stop="<?php echo wp_kses_post($item->counter_stop); ?>"><?php echo wp_kses_post($item->counter_start); ?></span><?php echo wp_kses_post($item->alphabet_value); ?>
                            <h5 class="counter-title"><?php echo wp_kses_post($item->title); ?></h5>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>
<!--End Fun Facts Section-->