<?php
   $count = 1;
   $query_args = array('post_type' => 'bunch_services' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   if ($cat) {
       $query_args['services_category'] = $cat;
   }
   $query = new WP_Query($query_args) ;
   ?>
<?php if ($query->have_posts()):  ?>

<!-- Services Section -->
<section class="services-section">
    <div class="upper-box" style="background-image: url('<?php echo esc_url($bg_img); ?>');">
        <div class="auto-container">
            <div class="sec-title text-center light">
                <span class="float-text"><?php echo wp_kses_post($bg_title); ?></span>
                <h2><?php echo wp_kses_post($title); ?></h2>
            </div>
        </div>
    </div>

    <div class="services-box">
        <div class="auto-container">
            <div class="services-carousel owl-carousel owl-theme">
                <?php while ($query->have_posts()): $query->the_post();
                    global $post ;
                    $service_meta = _WSH()->get_meta();
                ?>
                <!-- Service Block -->
                <div class="service-block">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_post_thumbnail('contra_370x270'); ?></a></figure>
                        </div>
                        <div class="lower-content">
                            <h3><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h3>
                            <div class="text"><?php echo wp_kses_post(contra_trim(get_the_content(), $text_limit)); ?></div>
                            <div class="link-box">
                                <a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php esc_html_e('Read More', 'contra'); ?> <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile;?>
            </div>
        </div>
    </div>
</section>
<!--End Services Section -->

<?php endif; wp_reset_postdata(); ?>
