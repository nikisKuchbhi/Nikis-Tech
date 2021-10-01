<?php
   $count = 1;
   $query_args = array('post_type' => 'bunch_testimonials' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   if ($cat) {
       $query_args['testimonials_category'] = $cat;
   }
   $query = new WP_Query($query_args) ;
   ?>
<?php if ($query->have_posts()):  ?>

<!-- Testimonial Section Two-->
<section class="testimonial-section-two">
    <div class="auto-container">
        <div class="sec-title">
            <span class="float-text"><?php echo wp_kses_post($bg_title); ?></span>
            <h2><?php echo wp_kses_post($title); ?></h2>
        </div>

        <div class="testimonial-carousel-two owl-carousel owl-theme">
            <?php while ($query->have_posts()): $query->the_post();
                global $post ;
                $testimonial_meta = _WSH()->get_meta();
            ?>
            <!-- Testimonial block two -->
            <div class="testimonial-block-two">
                <div class="inner-box">
                    <div class="text"><?php echo wp_kses_post(contra_trim(get_the_content(), $text_limit)); ?></div>
                    <div class="info-box">
                        <div class="thumb"><?php the_post_thumbnail('contra_90x90'); ?></div>
                        <h5 class="name"><?php the_title(); ?></h5>
                        <span class="date"><?php echo wp_kses_post(contra_set($testimonial_meta, 'designation')); ?></span>
                    </div>
                </div>
            </div>
            <?php $count++; endwhile;?>
        </div>
    </div>
</section>
<!--End Testimonial Section Two-->

<?php endif; wp_reset_postdata(); ?>
