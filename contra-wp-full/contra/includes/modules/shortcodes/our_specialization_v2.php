<?php
   $count = 1;
   $query_args = array('post_type' => 'bunch_services' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   if ($cat) {
       $query_args['services_category'] = $cat;
   }
   $query = new WP_Query($query_args) ;
   ?>
<?php if ($query->have_posts()):  ?>

<!-- Specialize Section -->
<section class="specialize-section">
    <div class="auto-container">
        <div class="sec-title">
            <span class="float-text"><?php echo wp_kses_post($bg_title); ?></span>
            <h2><?php echo wp_kses_post($title); ?></h2>
        </div>

        <div class="services-carousel-two owl-carousel owl-theme">
            <?php while ($query->have_posts()): $query->the_post();
                global $post ;
                $service_meta = _WSH()->get_meta();
            ?>
            <!-- Service Block -->
            <div class="service-block-two">
                <div class="inner-box">
                    <div class="image-box"><figure class="image"><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_post_thumbnail('contra_270x289'); ?></a></figure></div>
                    <div class="caption-box">
                        <h3><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h3>
                        <div class="link-box"><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php esc_html_e('Read More', 'contra'); ?> <i class="fa fa-angle-double-right"></i></a></div>
                    </div>
                </div>
            </div>
            <?php endwhile;?>
        </div>
    </div>
</section>
<!-- End Specialize Section -->

<?php endif; wp_reset_postdata(); ?>
