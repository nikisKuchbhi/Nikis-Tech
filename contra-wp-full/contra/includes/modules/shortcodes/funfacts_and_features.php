<?php
   $count = 1;
   $query_args = array('post_type' => 'bunch_services' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   if ($cat) {
       $query_args['services_category'] = $cat;
   }
   $query = new WP_Query($query_args) ;
   ?>
<?php if ($query->have_posts()):  ?>

<!-- Fun Fact And Features -->
<section class="fun-fact-and-features <?php if ($style_two == 'option_1') {
       echo 'alternate';
   } ?>"  style="background-image: url('<?php echo esc_url($bg_img); ?>');">
    <div class="outer-box">
        <div class="auto-container">
            <!-- Fact Counter -->
            <div class="fact-counter">
                <div class="row">
                    <?php foreach ($atts['funfact'] as $key => $item): ?>
                    <!--Column-->
                    <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
                        <div class="count-box">
                            <div class="count"><span class="count-text" data-speed="5000" data-stop="<?php echo wp_kses_post($item->counter_stop); ?>"><?php echo wp_kses_post($item->counter_start); ?></span><?php echo wp_kses_post($item->alphabet_letter); ?></div>
                            <h4 class="counter-title"><?php echo wp_kses_post($item->title); ?></h4>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>

            <!-- Features -->
            <div class="features">
                <div class="row">
                    <?php while ($query->have_posts()): $query->the_post();
                        global $post ;
                        $service_meta = _WSH()->get_meta();
                    ?>
                    <!-- Feature Block -->
                    <div class="feature-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="icon-box"><span class="icon <?php echo str_replace("icon ", "", contra_set($service_meta, 'fontawesome'));?>"></span></div>
                            <h3><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h3>
                            <div class="text"><?php echo wp_kses_post(contra_trim(get_the_content(), $text_limit)); ?></div>
                            <div class="link-box"><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php esc_html_e('Read More', 'contra'); ?></a></div>
                        </div>
                    </div>
                    <?php endwhile;?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Fun Fact Section -->

<?php endif; wp_reset_postdata(); ?>
