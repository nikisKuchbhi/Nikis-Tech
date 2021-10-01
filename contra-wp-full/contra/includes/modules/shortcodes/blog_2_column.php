<?php
    $count = 1;
    global $post;
    $paged = get_query_var('paged');
    $query_args = array('post_type' => 'post' , 'showposts' => $num, 'order_by' => $sort, 'order' => $order, 'paged'=>$paged);
    if ($cat) {
        $query_args['category_name'] = $cat;
    }
    $query = new WP_Query($query_args);
?>
<?php if ($query->have_posts()): ?>

<!-- Blog Section -->
<section class="blog-section">
    <div class="auto-container">
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

        <!--Post Share Options-->
        <div class="styled-pagination clearfix">
            <?php contra_the_pagination(array('total'=>$query->max_num_pages, 'next_text' => '<i class="fa fa-long-arrow-right"></i>', 'prev_text' => '<i class="fa fa-long-arrow-left"></i>')); ?>
        </div>
    </div>
</section>
<!--End Blog Section -->

<?php endif; wp_reset_postdata(); ?>
