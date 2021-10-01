<?php
    global $post;
    $query_args = array('post_type' => 'post' , 'showposts' => $num, 'order_by' => $sort, 'order' => $order);
    if ($cat) {
        $query_args['category_name'] = $cat;
    }
    $query = new WP_Query($query_args);
?>
<?php if ($query->have_posts()): ?>

<!-- News Section -->
<section class="news-section alternate">
    <div class="auto-container">
        <div class="sec-title">
            <span class="float-text"><?php echo wp_kses_post($bg_title); ?></span>
            <h2><?php echo wp_kses_post($title); ?></h2>
        </div>
        <div class="row">
            <?php while ($query->have_posts()): $query->the_post();
                global $post;
                $posts_meta = _WSH()->get_meta();
            ?>
            <!-- News Block -->
            <div class="news-block-two col-lg-6 col-md-12 col-sm-12">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image"><?php the_post_thumbnail('contra_570x215'); ?></figure>
                        <div class="overlay-box"><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><i class="fa fa-link"></i></a></div>
                    </div>
                    <div class="caption-box">
                        <div class="inner">
                            <h3><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h3>
                            <ul class="info">
                                <li><?php echo get_the_date(); ?></li>
                                <li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a></li>
                                <li><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><?php comments_number(wp_kses_post(__('0 Comments', 'contra')), wp_kses_post(__('1 Comment', 'contra')), wp_kses_post(__('% Comments', 'contra'))); ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<!--End News Section -->

<?php endif; wp_reset_postdata(); ?>
