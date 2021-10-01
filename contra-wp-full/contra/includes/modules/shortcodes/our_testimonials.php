<?php
   $count = 1;
   $query_args = array('post_type' => 'bunch_testimonials' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   if ($cat) {
       $query_args['testimonials_category'] = $cat;
   }
   $query = new WP_Query($query_args) ;
   ?>
<?php if ($query->have_posts()):  ?>

<!-- Testimonial Section -->
<section class="testimonial-section">
    <div class="outer-container clearfix">
        <!-- Title Column -->
        <div class="title-column clearfix">
            <div class="inner-column">
                <div class="sec-title">
                    <span class="float-text"><?php echo wp_kses_post($bg_title); ?></span>
                    <h2><?php echo wp_kses_post($title); ?></h2>
                </div>
                <div class="text"><?php echo wp_kses_post($text); ?></div>
            </div>
        </div>

        <!-- Testimonial Column -->
        <div class="testimonial-column clearfix" style="background-image: url('<?php echo esc_url($bg_img); ?>');">
            <div class="inner-column">
                <div class="testimonial-carousel owl-carousel owl-theme">
                    <?php while ($query->have_posts()): $query->the_post();
                        global $post ;
                        $testimonial_meta = _WSH()->get_meta();
                    ?>
                    <!-- Testimonial Block -->
                    <div class="testimonial-block">
                        <div class="inner-box">
                            <div class="image-box"><?php the_post_thumbnail('contra_150x210'); ?></div>
                            <div class="text"><?php echo wp_kses_post(contra_trim(get_the_content(), $text_limit)); ?></div>
                            <div class="info-box">
                                <h4 class="name"><?php the_title(); ?></h4>
                                <span class="designation"><?php echo wp_kses_post(contra_set($testimonial_meta, 'designation')); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php $count++; endwhile;?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Testimonial Section -->

<?php endif; wp_reset_postdata(); ?>
