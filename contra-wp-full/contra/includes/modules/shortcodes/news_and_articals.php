<?php 
	global $post;
	$query_args = array('post_type' => 'post' , 'showposts' => $num, 'order_by' => $sort, 'order' => $order);
	if( $cat ) $query_args['category_name'] = $cat;
	$query = new WP_Query($query_args);
?>
<?php if($query->have_posts()): ?>

<!-- News Section -->
<section class="news-section">
    <div class="auto-container">
        <div class="sec-title">
            <span class="float-text"><?php echo wp_kses_post($bg_title); ?></span>
            <h2><?php echo wp_kses_post($title); ?></h2>
        </div>
        <div class="row">
            <?php while($query->have_posts()): $query->the_post();
				global $post;
				$posts_meta = _WSH()->get_meta(); 
			?>
            <!-- News Block -->
            <div class="news-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image"><?php the_post_thumbnail('contra_330x350'); ?></figure>
                        <div class="overlay-box"><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><i class="fa fa-link"></i></a></div>
                    </div>
                    <div class="caption-box">
                        <h3><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h3>
                        <ul class="info">
                            <li><?php echo get_the_date(); ?></li>
                            <li><?php the_author(); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<!--End News Section -->

<?php endif; wp_reset_postdata(); ?>