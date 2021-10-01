<?php
   $count = 1;
   $query_args = array('post_type' => 'bunch_services' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   if ($cat) {
       $query_args['services_category'] = $cat;
   }
   $query = new WP_Query($query_args) ;
   ?>
<?php if ($query->have_posts()):  ?>

<!-- Process Section -->
<section class="process-section" style="background-image: url('<?php echo esc_url($bg_img); ?>');">
    <div class="auto-container">
        <div class="sec-title light">
            <span class="float-text"><?php echo wp_kses_post($bg_title); ?></span>
            <h2><?php echo wp_kses_post($title); ?></h2>
        </div>
        <div class="row">
            <?php while ($query->have_posts()): $query->the_post();
                global $post ;
                $service_meta = _WSH()->get_meta();
            ?>
            <!-- Process Block -->
            <div class="process-block col-lg-3 col-md-6 col-sm-12">
                <div class="inner-box">
                    <span class="count"><?php $count = sprintf('%02d', $count); echo wp_kses_post($count); ?></span>
                    <h4><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h4>
                    <div class="text"><?php echo wp_kses_post(contra_trim(get_the_content(), $text_limit)); ?></div>
                    <div class="link-box"><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php esc_html_e('Read More', 'contra'); ?></a></div>
                </div>
            </div>
            <?php $count++; endwhile;?>
        </div>
    </div>
</section>
<!--End Process Section -->

<?php endif; wp_reset_postdata(); ?>
