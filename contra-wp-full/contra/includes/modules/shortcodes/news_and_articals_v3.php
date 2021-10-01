<?php global $post;
    $query_args = array('post_type' => 'post' , 'showposts' => $num, 'order_by' => $sort, 'order' => $order);
    if ($cat) {
        $query_args['category_name'] = $cat;
    }
    $query = new WP_Query($query_args);

    $query_args1 = array('post_type' => 'post' , 'showposts' => $num1, 'order_by' => $sort1, 'order' => $order1);
    if ($cat1) {
        $query_args1['category_name'] = $cat1;
    }
    $query1 = new WP_Query($query_args1); ?>

<?php if ($query->have_posts()): ?>

<!-- News Section Two -->
<section class="news-section-two">
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
            <div class="column col-lg-5 col-md-12 col-sm-12">
                <div class="inner-column">
                    <!-- News Block -->
                    <div class="news-block-three">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><?php the_post_thumbnail('contra_435x490'); ?></figure>
                                <div class="overlay-box"><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><i class="fa fa-link"></i></a></div>
                            </div>
                            <div class="content-box">
                                <h3><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h3>
                                <ul class="info">
                                    <li><?php echo get_the_date(); ?></li>
                                    <li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a></li>
                                    <li><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><?php comments_number(wp_kses_post(__('0 Comments', 'contra')), wp_kses_post(__('1 Comment', 'contra')), wp_kses_post(__('% Comments', 'contra'))); ?></a></li>
                                </ul>
                                <div class="text"><?php echo wp_kses_post(contra_trim(get_the_content(), $text_limit)); ?> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>


            <div class="column col-lg-7 col-md-12 col-sm-12">
                <?php while ($query1->have_posts()): $query1->the_post();
                    global $post;
                    $posts_meta1 = _WSH()->get_meta();
                ?>
                <div class="news-block-four">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><?php the_post_thumbnail('contra_270x200'); ?></figure>
                            <div class="overlay-box"><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><i class="fa fa-link"></i></a></div>
                        </div>
                        <div class="content-box">
                            <h3><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h3>
                            <ul class="info">
                                <li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a></li>
                                <li><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><?php comments_number(wp_kses_post(__('0 Comments', 'contra')), wp_kses_post(__('1 Comment', 'contra')), wp_kses_post(__('% Comments', 'contra'))); ?></a></li>
                            </ul>
                            <div class="text"><?php echo wp_kses_post(contra_trim(get_the_content(), $text_limit1)); ?></div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>
<!--End News Section Two -->

<?php endif; wp_reset_postdata(); ?>
