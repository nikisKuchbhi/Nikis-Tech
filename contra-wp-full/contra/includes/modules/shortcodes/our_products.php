<?php
    $count = 1;
    $query_args = array( 'post_type' => 'product' ,'showposts' => $num , 'order_by' => $sort , 'order' => $order );
    if ($cat) {
        $query_args['product_cat'] = $cat;
    }
    $query = new WP_Query($query_args);

    if ($query->have_posts()) :
?>

<!-- Products Section -->
<section class="products-section">
    <div class="auto-container">
        <div class="sec-title">
            <span class="float-text"><?php echo wp_kses_post($bg_title); ?></span>
            <h2><?php echo wp_kses_post($title); ?></h2>
        </div>
        <div class="row">
            <div class="title-column col-lg-3 col-md-12 col-sm-12">
                <div class="inner-column">
                    <h4><?php echo wp_kses_post($sub_title); ?></h4>
                    <div class="text"><?php echo wp_kses_post($text); ?></div>
                    <div class="btn-box"><a href="<?php echo esc_url($btn_link); ?>" class="theme-btn btn-style-one"><?php echo wp_kses_post($btn_title); ?></a></div>
                </div>
            </div>

            <div class="products-column col-lg-9 col-md-12 col-sm-12">
                <div class="products-carousel owl-carousel owl-theme">
                    <?php
                        while ($query->have_posts()): $query->the_post();
                        $prod_meta = _WSH()->get_meta();
                        global $post;
                    ?>
                    <!-- Product Block -->
                    <div class="product-block">
                        <div class="inner-box">
                            <div class="info-box">
                                <a href="<?php the_permalink(); ?>" class="name"><?php the_title();?></a>
                                <span class="price"><?php woocommerce_template_loop_price();?></span>
                            </div>
                            <div class="image-box">
                                <figure class="image"><?php the_post_thumbnail('contra_270x270'); ?></figure>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Products Section -->

<?php endif; wp_reset_postdata(); ?>
